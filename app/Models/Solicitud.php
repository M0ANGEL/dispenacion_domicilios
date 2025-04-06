<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'cantida_formula',
        'valor',
        'producto',
        'observacion',
        'estado',
        'fecha_solicitud',
        'fecha_domicilio',
        'fecha_entreda',
    ];

    protected $table = 'dispenacion';
}
