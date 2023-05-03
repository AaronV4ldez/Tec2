<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lineas_de_investigacione extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'id_docente',
    ];
}
