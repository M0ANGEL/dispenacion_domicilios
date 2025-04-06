<?php

namespace App\Models\mipres;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mipres extends Model
{
    use HasFactory;

    protected $table = "pacientes";

    protected $fillable = [
        'nombre1',
        'nombre2',
        'apellido1',
        'apellido2',
        'tipo_doc',
        'documento',
        'telfono',
        'observacion',
        'user_id'
    ];

    // App\Models\mipres\Mipres.php
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
