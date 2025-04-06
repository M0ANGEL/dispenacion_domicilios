<?php

namespace App\Models;

use App\Models\mipres\Mipres;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispensacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_dispensacion_id',
        'cantida_formula',
        'valor',
        'producto',
        'estado',
        'observacion_dispensacion',
        'fecha_dispensacion',
        'fecha_domicilio',
        'usuario_baja_reporte_id',
        'usuario_confirma_domicilio_id',
        'fecha_entrega',
        'fecha_donfirmacion_entrega',
        'observacion_entrega_domicilio'
    ];
    protected $table = 'dispenacion';

    public function paciente()
    {
        return $this->belongsTo(Mipres::class, 'paciente_id');
    }

    public function userDispensa()
    {
        return $this->belongsTo(User::class, 'usuario_solicitud_id');
    }
}
