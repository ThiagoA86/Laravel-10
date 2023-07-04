<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
//Controller do Contato Cap 2.
class ContatoController extends Controller
{
   public function Index(){
    $data['titulo']="Minha página.";
    return view ('contato',$data);
   }
   public function enviar(Request $request)
   {
    $data=array(
        'assunto'=>$request->input('assunto'),
        'mensagem'=>$request->input('mensagem'),
    );

    Mail::send('mensagem', $data, function ($message) {
        $message->from('tapgordo@gmail.com', 'Thiago');
        $message->subject("Mensagem encaminhada por meio do formulário de contato.");
        $message->to('thiago.data_consult@hotmail.com')->cc('thiago.data_consult@hotmail.com');
      });

      return redirect ('contato');
   }
}
