<?php

use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\FormulacionController;
use App\Http\Controllers\mipres\ActivoController;
use App\Http\Controllers\mipres\EntregaMendicamentosController;
use App\Http\Controllers\mipres\MedicamentoController;
use App\Http\Controllers\mipres\PacienteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});




Route::resource('/users', UserController::class)/* ->middleware(['can:admin_usuarios']) */;

Route::resource('/roles', RoleController::class)/* ->middleware(['can:crear_roles']) */;
Route::resource('/permissions', PermissionController::class)/* ->middleware(['can:crear_permisos']) */;


/* premis mipres */

Route::resource('pacientes', PacienteController::class)/* ->middleware(['can:Mipres_Crear_Paciente'] )*/;
Route::resource('solicitud', SolicitudController::class)/* ->middleware(['can:Mipres_Crear_Paciente'] )*/;
Route::resource('formulacion', FormulacionController::class)/*->middleware(['can:Mipres_Crear_mipres'])*/;


/* anulacion de mipres */
Route::get('/cancelacion_mipres', [ActivoController::class, 'Cancelarmipres'])->name('cancelacion_mipres.cancelacion');

/* mipres reportes */
// Route::get('/reporte-activos', [ActivoController::class, 'ReporteActivos'])->name('reporte.activos');
// Route::get('/reporte-terminados', [ActivoController::class, 'Reporteterminados'])->name('reporte.terminados');
// Route::get('/reporte-detallado', [ActivoController::class, 'Reportedetallado'])->name('reporte.detallado');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});