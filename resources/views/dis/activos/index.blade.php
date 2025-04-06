<x-app-layout>

    <style>
        /* busqueda */
        .buscar {
            margin: 0px 30%;
            margin-bottom: 30px;
        }

        .barra {
            width: 350px;
            border-radius: 10px;
            padding: 10px;
            border: solid 2px #111827;
        }

        .btn-buscar {
            padding: 10px;
            border-radius: 10px;
            font-size: 15px;
            background-color: #0f52e4;
            color: aliceblue;
        }

        .btn-buscar:hover {
            padding: 10px;
            border-radius: 10px;
            font-size: 15px;
            background-color: aliceblue;
            border: 3px solid #111827;
            color: #111827;
        }

        #marco {
            border: 2px solid #BDC3C7;
        }

        #filas:hover {
            background: rgb(234, 242, 248);
        }

        /* Asegúrate de que el contenedor tenga display: flex */
        .contenedor {
            display: flex;
            justify-content: flex-end;
            /* Alinea los elementos al final del contenedor */
        }

        #alerta {
            background: #055b23;
            text-align: center;
            border-radius: 7px;
            margin-bottom: 10px;
            width: 350px;
            padding: 6px;
            color: white;
        }
    </style>


    {{-- barra buscar --}}
    <form action="{{ route('Mipres_Activos.index') }}" method="get">
        <div class="buscar">
            <input class="barra" type="text" name="text" value="{{ $busqueda }}" />
            <input class="btn-buscar" type="submit" value="Buscar">
        </div>
    </form>

    @if ($users->count())
        <div class="contenedor">
            <div id="alerta" role="alert">
                <span class="font-medium"><b>Filtros Busqueda!</b></span><b> Nombre - Cedula - Historia</b>
            </div>
        </div>
    @endif

    @if ($users->count())
        <div id="marco" class="relative overflow-x-auto" style="border-radius: 6px">
            <table class="w-full text-sm text-center rtl:text-right text-gray-800 " style="border: rgb(172, 174, 175)">
                <thead class="text-xs text-gray-50 uppercase  " style="background: rgb(52, 73, 94);">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            fecha creacion
                        </th>
                        <th scope="col" class="px-6 py-3">
                            N. PRESCRIPCION
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            TIpo Documento
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Documento
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Medicamento
                        </th>
                        <th scope="col" class="px-6 py-3">
                            usuario
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cantidad Total
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Saldo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            DESPACHO
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $Mipres_Activo)
                        <tr class="bg-white border-b  dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray-900">
                                {{ $Mipres_Activo->paciente->created_at }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $Mipres_Activo->prescripcion }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $Mipres_Activo->paciente->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $Mipres_Activo->paciente->tipoDocumento }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $Mipres_Activo->paciente->documento }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $Mipres_Activo->medicamento->descripcion ?? 'Acetaminofen' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $Mipres_Activo->paciente->usuario->name }}
                            </td>
                            <td class="px-6 py-4" style="color: #13572b">
                                <b>{{ $Mipres_Activo->cantidad_entregada }}</b>
                            </td>
                            <td class="px-6 py-4" style="color: red;">
                                <b>{{ $Mipres_Activo->cantidad_restante }}</b>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('Mipres_Activos.create', $Mipres_Activo->id) }}">
                                    <i class="fa-solid fa-people-arrows"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-8">
            {{ $users->links() }}
        </div>
    @else
        {{-- alert --}}
        <div class="mt-5  bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">No hay resultado en la busqueda.</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
    @endif

</x-app-layout>
