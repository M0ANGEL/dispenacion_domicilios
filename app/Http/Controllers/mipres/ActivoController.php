<?php

namespace App\Http\Controllers\mipres;

use App\Http\Controllers\Controller;
use App\Models\mipres\Entregas;
use App\Models\mipres\Historial;
use App\Models\mipres\Medicamento;
use App\Models\mipres\Mipres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ActivoController extends Controller
{
    public function index(Request $request)
    {
        // Obtiene el texto de búsqueda desde la solicitud
        $busqueda = $request->get('text', '');

        // Realiza la consulta para filtrar las entregas y buscar pacientes por nombre, documento y prescripción
        $users = Entregas::with('paciente', 'medicamento') // Cargar la relación paciente
            ->where('cantidad_restante', '>', 0) // Filtra donde cantidad_restante no sea cero
            ->where('cancelado_estado', '=', 0) // Filtra donde estado de cancelado  sea cero
            ->where(function ($query) use ($busqueda) {
                $query->whereHas('paciente', function ($query) use ($busqueda) {
                    // Filtra por nombre y documento en el modelo relacionado paciente
                    $query->where('name', 'like', '%' . $busqueda . '%');
                    /*  ->orWhere('documento', 'like', '%' . $busqueda . '%'); */
                })
                    ->orWhere('prescripcion', 'like', '%' . $busqueda . '%'); // Filtra por prescripción en Entregas
            })
            ->orderBy('id', 'desc')
            ->paginate(8);

        return view('mypres.activos.index', compact('users', 'busqueda'));
    }

    public function create($Mipres_Activo)
    {
        $paciente = Entregas::with(['paciente', 'medicamento'])
            ->where('id', $Mipres_Activo)
            ->orderBy('id', 'desc') // Order by ID in descending order to get the latest record
            ->first();

        return view('mypres.activos.create', compact('paciente', 'Mipres_Activo'));
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'entrega__id' => 'required|integer',
            'cantidad_entregada' => 'required|integer',
            'cantidad_entrego' => 'required|integer',
        ]);

        // Obtener la entrega correspondiente
        $entrega = Entregas::findOrFail($request->entrega__id);

        // Verificar que la cantidad a entregar no supere la cantidad restante
        if ($request->cantidad_entrego > $entrega->cantidad_restante) {
            return redirect()->back()->withInput()->with('error', 'La cantidad a entregar no puede ser mayor que el saldo: ' . $entrega->cantidad_restante);
        }

        $resta = $request->cantidad_restante - $request->cantidad_entrego;

        // Crear el historial de entrega
        Historial::create([
            'entrega__id' => $request->entrega__id,
            'cantidad_entregada' => $request->cantidad_entregada,
            'cantidad_restante' => $resta, // Guardar la cantidad restante en el historial, si es necesario
            'cantidad_entrego' => $request->cantidad_entrego,
            'fecha_entrega' => date('Y-m-d'),
            'user_id' => Auth::id(),
        ]);

        // Actualizar la cantidad restante en la tabla `entrega_`
        $entrega->cantidad_restante -= $request->cantidad_entrego;
        $entrega->save();

        // Flash message para la sesión
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'La entrega se creó correctamente',
        ]);

        // Redireccionar a la vista de índice
        return redirect()->route('Mipres_Activos.index');
    }

    public function historialIndex(Request $request)
    {
        // Obtiene el texto de búsqueda desde la solicitud
        $busqueda = $request->get('text', '');

        // Inicializa la consulta de historial
        $users = Historial::orderBy('id', 'asc')
            ->select('*')
            ->whereHas('entrega', function ($query) use ($busqueda) {
                // Filtra por mipres_paciente_id, prescripcion o datos del paciente
                $query->where('mipres_paciente_id', 'like', '%' . $busqueda . '%')
                    ->orWhere('prescripcion', 'like', '%' . $busqueda . '%') // Busca por prescripción en Entrega
                    ->orWhereHas('paciente', function ($subQuery) use ($busqueda) {
                        // Filtra por nombre y documento del paciente
                        $subQuery->where('name', 'like', '%' . $busqueda . '%')
                            ->orWhere('documento', 'like', '%' . $busqueda . '%');
                    });
            });

        // Ejecuta la consulta solo si hay texto de búsqueda
        if (!empty($busqueda)) {
            $users = $users->paginate(100);
        } else {
            // Si no hay búsqueda, asigna una colección vacía
            $users = collect();
        }

        return view('mypres.historial.index', compact('users', 'busqueda'));
    }

    public function reportes()
    {
        $inactivos = Entregas::where('cantidad_restante', '=', 0)->count();
        $activos = Entregas::where('cantidad_restante', '<>', 0)->count();
        $medicamentos = Medicamento::count();
        $personas = Mipres::count();

        return view('mypres.reportes.index', compact('activos', 'inactivos', 'medicamentos', 'personas'));
    }

    public function ReporteActivos()
    {
        // Filtramos los registros donde entrega_restante no sea 0, y cargamos relaciones
        $entregas = Entregas::where('cantidad_restante', '!=', 0)
            ->with(['paciente', 'usuario'])
            ->get();

        // Configuración de datos en el archivo Excel y conversión a array
        $excelData = $entregas->map(function ($entrega) {
            return [
                'ID' => $entrega->id,
                'Nombre Paciente' => optional($entrega->paciente)->name,
                'Tipo Documento' => optional($entrega->paciente)->tipoDocumento,
                'Documento' => optional($entrega->paciente)->documento,
                'Prescripción' => $entrega->prescripcion,
                'Ámbito' => $entrega->ambito,
                'Fecha Mipres' => $entrega->fecha_mipres,
                'Cantidad Entregada' => $entrega->cantidad_entregada,
                'Entrega Restante' => $entrega->entrega_restante,
                'Fecha de Entrega' => $entrega->fecha_entrega,
                'Nombre Usuario' => optional($entrega->usuario)->name,
            ];
        })->toArray();

        // Generación y descarga del archivo Excel con encabezados
        return Excel::download(new class($excelData) implements \Maatwebsite\Excel\Concerns\FromArray, WithHeadings {
            protected $data;

            public function __construct(array $data)
            {
                $this->data = $data;
            }

            public function array(): array
            {
                return $this->data;
            }

            public function headings(): array
            {
                return [
                    'ID',
                    'Nombre Paciente',
                    'Tipo Documento',
                    'Documento',
                    'Prescripción',
                    'Ámbito',
                    'Fecha Mipres',
                    'Cantidad Entregada',
                    'Entrega Restante',
                    'Fecha de Entrega',
                    'Nombre Usuario',
                ];
            }
        }, 'reporte_activos.xlsx');
    }

    public function ReporteTerminados()
    {
        // Filtramos los registros donde entrega_restante no sea 0, y cargamos relaciones
        $entregas = Entregas::where('cantidad_restante', '=', 0)
            ->with(['paciente', 'usuario'])
            ->get();

        // Configuración de datos en el archivo Excel y conversión a array
        $excelData = $entregas->map(function ($entrega) {
            return [
                'ID' => $entrega->id,
                'Nombre Paciente' => optional($entrega->paciente)->name,
                'Tipo Documento' => optional($entrega->paciente)->tipoDocumento,
                'Documento' => optional($entrega->paciente)->documento,
                'Prescripción' => $entrega->prescripcion,
                'Ámbito' => $entrega->ambito,
                'Fecha Mipres' => $entrega->fecha_mipres,
                'Cantidad Entregada' => $entrega->cantidad_entregada,
                'Entrega Restante' => $entrega->entrega_restante,
                'Fecha de Entrega' => $entrega->fecha_entrega,
                'Nombre Usuario' => optional($entrega->usuario)->name,
            ];
        })->toArray();

        // Generación y descarga del archivo Excel con encabezados
        return Excel::download(new class($excelData) implements \Maatwebsite\Excel\Concerns\FromArray, WithHeadings {
            protected $data;

            public function __construct(array $data)
            {
                $this->data = $data;
            }

            public function array(): array
            {
                return $this->data;
            }

            public function headings(): array
            {
                return [
                    'ID',
                    'Nombre Paciente',
                    'Tipo Documento',
                    'Documento',
                    'Prescripción',
                    'Ámbito',
                    'Fecha Mipres',
                    'Cantidad Entregada',
                    'Entrega Restante',
                    'Fecha de Entrega',
                    'Nombre Usuario',
                ];
            }
        }, 'reporte_activos.xlsx');
    }

    public function ReporteDetallado()
    {
        // Filtrar registros y cargar relaciones
        $historiales = Historial::with([
            'entrega',
            'creador' // Cargar la relación del creador (usuario)
        ])->get();

        // Configurar datos para el archivo Excel
        $excelData = $historiales->map(function ($historial) {
            return [
                'ID' => $historial->id,
                'Nombre Paciente' => optional($historial->entrega->paciente)->name,
                'Tipo Documento' => optional($historial->entrega->paciente)->tipoDocumento,
                'Documento' => optional($historial->entrega->paciente)->documento,
                'Historia' => optional($historial->entrega->paciente)->historia,
                'Medicamento' => optional($historial->entrega->medicamento)->descripcion,
                'Prescripción' => optional($historial->entrega)->prescripcion,
                'Ámbito' => optional($historial->entrega)->ambito,
                'Fecha Mipres' => optional($historial->entrega)->fecha_mipres,
                'Cantidad Entregada' => $historial->cantidad_entregada,
                'Cantidad Restante' => $historial->cantidad_restante,
                'Cantidad Entrego' => $historial->cantidad_entrego == 0 ? 'inicio' : $historial->cantidad_entrego, // Cambiar a 'inicio' si es 0
                'Fecha de Entrega' => $historial->fecha_entrega,
                'Nombre Usuario' => optional($historial->creador)->name, // Acceder al nombre del creador (usuario)
            ];
        })->toArray();

        // Generación y descarga del archivo Excel con encabezados
        return Excel::download(new class($excelData) implements \Maatwebsite\Excel\Concerns\FromArray, \Maatwebsite\Excel\Concerns\WithHeadings {
            protected $data;

            public function __construct(array $data)
            {
                $this->data = $data;
            }

            public function array(): array
            {
                return $this->data;
            }

            public function headings(): array
            {
                return [
                    'ID',
                    'Nombre Paciente',
                    'Tipo Documento',
                    'Documento',
                    'Historia',
                    'Medicamento',
                    'Prescripción',
                    'Ámbito',
                    'Fecha Mipres',
                    'Cantidad Entregada',
                    'Cantidad Restante',
                    'Cantidad Entrego',
                    'Fecha de Entrega',
                    'Nombre Usuario',
                ];
            }
        }, 'reporte_detallado.xlsx');
    }

    public function Cancelarmipres(Request $request)
    {

        /* return $request; */
        $request->validate([
            'cancelado' => 'nullable',
            'usuario_cancela' => 'nullable',
            'cancelado_estado' => 'nullable',
        ]);

        $id = $request->id_entrega;

        $entrega = Entregas::find($id);

        $entrega->update([
            'cancelado_estado' => $request->cancelado_estado,
            'cancelado' => $request->cancelado,
            'usuario_cancela' => $request->usuario_cancela,
        ]);

        Historial::create([
            'entrega__id' => $id,
            'cantidad_entregada' => !empty($request->cantidad_entregada) ? $request->cantidad_entregada : null,
            'cantidad_restante' => !empty($request->cantidad_restante) ? $request->cantidad_restante : null,
            'cantidad_entrego' => !empty($request->cantidad_entrego) ? $request->cantidad_entrego : null,
            'fecha_entrega' => date('Y-m-d'),
            'usuario_cancela' => $request->usuario_cancela,
            'motivo' => $request->cancelado,
            'user_id' => Auth::id(),
        ]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'El mipres se cancelo manualmente  correctamente',
        ]);

        return redirect()->route('Mipres_Activos.index');
    }
}
