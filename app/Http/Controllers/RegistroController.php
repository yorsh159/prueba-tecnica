<?php

namespace App\Http\Controllers;

use App\Models\Colaborator;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function store(Request $request){
        $this->validate($request,[
            'nombre' => 'required',
            'ap_paterno' => 'required',
            'ap_paterno' => 'required',
            'dni' => 'required|max:8|min:8|numeric',
            'fec_nac' => 'required|date',
            'sexo' => 'required',
        ],

        );

        $colaborador = new Colaborator;
        $colaborador->nombre = $request->names;
        $colaborador->ap_paterno=$request->paternal_surname;
        $colaborador->ap_materno=$request->maternal_surname;
        $colaborador->dni=$request->document;
        $colaborador->fec_nac=$request->birth_date;
        $colaborador->sexo=$request->gender;
        $colaborador->save();

        //dd($colaborador);
        //$colaborador->cant_hijos=$request->children_quantity;
        //$colaborador->foto='';
        // $colaborador->area=$request->area;
        // $colaborador->cargo=$request->cargo;
        // $colaborador->fec_ingreso=$request->fec_ingreso;
        // $colaborador->sueldo=$request->sueldo;

        
    }
}
