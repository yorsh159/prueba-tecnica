<?php

namespace App\Http\Controllers;

use App\Models\Colaborator;
use Illuminate\Http\Request;

class ColaboradorController extends Controller
{
    public function index(){
        
        $colabs = Colaborator::all();

        return view('colaborador',['colabs'=>$colabs]);
    }
}
