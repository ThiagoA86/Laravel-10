<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Controller do Contato Cap 2.
class ContatoController extends Controller
{
   public function Index(){
    $data['titulo']="Minha página.";
    return view ('contato',$data);
   }
}
