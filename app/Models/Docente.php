<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_cuerpo_academico',
        'id_adscripcion',
        'orcid',
        'edad',
        'genero',
        'nivel_estudio',
        'sni',
        'perfil_deseable'
    ];
}
