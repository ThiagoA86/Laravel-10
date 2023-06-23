<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
   public function Index(){
    $data['titulo']="Minha página.";
    return view ('contato',$data);
   }
}
