<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transparencia;

class TransparenciaController extends Controller
{
    //
    public function index()
    {
        if(!empty(session('user'))){
            $trans = transparencia::where('ativo','1')->orderBy('created_at','desc')->get();
            //dd($not);
            return view('adm.transparencia')->with(['trans'=> $trans]);
        }else{
            return redirect('/adm')->with('msg','Você precisa estar logado para acessar essa página');
        }
    }

    public function store(Request $request)
    {
       if(!empty(session('user'))){
            $trans = new transparencia;

            $trans->nome = $request->nome;
            $trans->url = $request->url;
            
        

            if($trans->save()){
                return redirect()->back()->with(['msg'=> 'Documento cadastrada com sucesso!', 'ok'=>1]);
            }else{
                return redirect()->back()->with(['msg'=> 'Tivemos um problema ao cadastrar o projeto!', 'ok' =>0 ]);
            }
        }else{
            return redirect('/adm')->with('msg','Você precisa estar logado para acessar essa página');
        } 
    }

    public function update(Request $request)
    {
        if(!empty(session('user'))){
            $trans = transparencia::find($request->id);

            $trans->nome = $request->nome;
            $trans->url = $request->url;
            
            
            if($trans->save()){
                return redirect()->back()->with(['msg'=> 'Documento atualizado com sucesso!', 'ok'=>1]);
            }else{
                return redirect()->back()->with(['msg'=> 'Tivemos um erro ao atualizar o documento!', 'ok' =>0 ]);
            }
        }else{
            return redirect('/adm')->with('msg','Você precisa estar logado para acessar essa página');
        }
    }

    public function delete(Request $request)
    {
        if(!empty(session('user'))){
            //dd($request);
            $trans = transparencia::find($request->id);

            $trans->ativo = '0';
            
            if($trans->save()){
                return redirect()->back()->with(['msg'=> 'Documento excluído com sucesso!', 'ok'=>1]);
            }else{
                return redirect()->back()->with(['msg'=> 'Tivemos um erro ao excluir o documento!', 'ok' =>0 ]);
            }
        }else{
            return redirect('/adm')->with('msg','Você precisa estar logado para acessar essa página');
        }
    }
}
