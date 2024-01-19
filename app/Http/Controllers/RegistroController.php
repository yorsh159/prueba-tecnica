<?php

namespace App\Http\Controllers;

use App\Models\Colaborator;
use Illuminate\Http\Request;

class RegistroController extends Controller
{

    public function index(){

        $colab = Colaborator::all();

        return view('worker');
    }

    public function store(Request $request){

        //dd('desde el boton guardar');
        $this->validate($request,[
            'names' => 'required',
            'paternal_surname' => 'required',
            'maternal_surname' => 'required',
            'document' => 'required|numeric|digits:8|unique:colaborators,dni',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'cant_hijos' => 'required|numeric',
            'sueldo' => 'required|numeric',

        ],

        );

        $cant_hijos = $request->cant_hijos;

        $colaborador = new Colaborator();
        $colaborador->nombre = $request->names;
        $colaborador->ap_paterno = $request->paternal_surname;
        $colaborador->ap_materno = $request->maternal_surname;
        $colaborador->dni = $request->document;
        $colaborador->fec_nac = $request->birth_date;
        $colaborador->sexo = $request->gender;
        $colaborador->cant_hijos=$request->cant_hijos;
        $colaborador->sueldo_bruto = $request->sueldo;
        if($cant_hijos>0){
            $sueldo=$request->sueldo+102.5;
        }else{
            $sueldo = $request->sueldo;
        }
        $afp = $sueldo*0.1;
        $afp_comision = $sueldo * 0.025;
        $renta =$sueldo * 0.1;

        $colaborador->sueldo = $sueldo - ($afp + $afp_comision + $renta + 100);
        $colaborador->fec_ingreso=now();
        $colaborador->save();
        
        return redirect()->route('home');
        //dd($colaborador);
        //$colaborador->foto='';
        // $colaborador->area=$request->area;
        // $colaborador->cargo=$request->cargo;


        
    }
}
