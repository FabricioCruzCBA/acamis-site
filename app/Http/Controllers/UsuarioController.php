<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuario;
class UsuarioController extends Controller
{
    //

    public function logar(Request $request)
    {
        $user = usuario::Where('nome', $request->login)->where('senha', $request->senha)->where("ativo", '1')->first();
        //echo(count($user));
        //dd($request);
        if(!empty($user)){
            session(['user'=> $user->id]);
            return redirect('/adm/noticias');
        }else{
            echo('deu ruim');
            return redirect()->back()->with(['msg'=>'Usuario não cadastrado!']);
        }
    }

    
}
