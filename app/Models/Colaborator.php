<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborator extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ap_paterno',
        'ap_paterno',
        'dni',
        'fec_nac',
        'sexo',
        //'cant_hijos',
        //'foto',
        //'area',
        //'cargo',
        //'fec_ingreso',
        //'sueldo',
    ];

}
