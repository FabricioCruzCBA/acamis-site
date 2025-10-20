<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parceiro;
use Illuminate\Support\Facades\Storage;

class ParceiroController extends Controller
{
    //
    public function index()
    {
        if(!empty(session('user'))){
            $dados = parceiro::where('ativo','1')->orderBy('nome','asc')->get();
            //dd($not);
            return view('adm.parceiro')->with(['dados'=> $dados]);
        }else{
            return redirect('/adm')->with('msg','Você precisa estar logado para acessar essa página');
        }
    }

    public function store(Request $request)
    {
       if(!empty(session('user'))){
            $parc = new parceiro;

            $parc->nome = $request->nome;
            
            if ($request->hasFile('imagem')) {
                // Salva a imagem em storage/app/public/noticias
                $path = $request->file('imagem')->store('parceiros', 'public');
                $parc->url = 'storage/' . $path; // caminho público
            }

            if($parc->save()){
                return redirect()->back()->with(['msg'=> 'Projeto cadastrada com sucesso!', 'ok'=>1]);
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
            $parc = parceiro::find($request->id);

            $parc->nome = $request->nome;
            
            if ($request->hasFile('imagem')) {
                //deletar o arquivo
                Storage::delete($parc->url);
                // Salva a imagem em storage/app/public/noticias
                $path = $request->file('imagem')->store('noticias', 'public');
                $parc->url = 'storage/' . $path; // caminho público
            }
            if($parc->save()){
                return redirect()->back()->with(['msg'=> 'Parceiro atualizada com sucesso!', 'ok'=>1]);
            }else{
                return redirect()->back()->with(['msg'=> 'Tivemos um erro ao atualizar o projeto!', 'ok' =>0 ]);
            }
        }else{
            return redirect('/adm')->with('msg','Você precisa estar logado para acessar essa página');
        }
    }

    public function delete(Request $request)
    {
        if(!empty(session('user'))){
            //dd($request);
            $parc = parceiro::find($request->id);

            $parc->ativo = '0';
            
            if($parc->save()){
                return redirect()->back()->with(['msg'=> 'Parceiro excluído com sucesso!', 'ok'=>1]);
            }else{
                return redirect()->back()->with(['msg'=> 'Tivemos um erro ao excluir o documento!', 'ok' =>0 ]);
            }
        }else{
            return redirect('/adm')->with('msg','Você precisa estar logado para acessar essa página');
        }
    }
}
