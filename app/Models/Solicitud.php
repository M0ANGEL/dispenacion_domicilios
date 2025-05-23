<?php

namespace App\Models;

use App\Models\mipres\Mipres;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $fillable = [
        //solicitud
        'paciente_id',
        'usuario_solicitud_id',
        'observacion_solicitud',
        'fecha_solicitud',

        //creacion de dispensacion
        'usuario_dispemsacion_id',
        'cantida_formula',
        'valor',
        'producto',
        'observacion_dispensacion',
        'fecha_dispensacion',

        //estado domicilio
        'estado',
        'fecha_domicilio',
        'usuario_baja_reporte_id',

        //condirmacion de entrega

        'usuario_confirma_domicilio_id',
        'fecha_entrega',
        'fecha_confirmacion_entrega',
        'observacion_entrega_domicilio',

    ];

    protected $table = 'dispenacion';

    public function paciente()
    {
        return $this->belongsTo(Mipres::class, 'paciente_id');
    }

    public function userSolicita()
    {
        return $this->belongsTo(user::class, 'usuario_solicitud_id');
    }
}
