<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\projeto;
use Illuminate\Support\Facades\Storage;

class ProjetoController extends Controller
{
    //

    public function index()
    {
        if(!empty(session('user'))){
            $proj = projeto::where('ativo','1')->orderBy('created_at','desc')->get();
            //dd($not);
            return view('adm.projeto')->with(['proj'=> $proj]);
        }else{
            return redirect('/adm')->with('msg','Você precisa estar logado para acessar essa página');
        }
    }

    public function store(Request $request)
    {
       if(!empty(session('user'))){
            $proj = new projeto;

            $proj->nome = $request->nome;
            $proj->objetivo = $request->objetivo;
            $proj->categoria = $request->categoria;
            
            if ($request->hasFile('imagem')) {
                // Salva a imagem em storage/app/public/noticias
                $path = $request->file('imagem')->store('projetos', 'public');
                $proj->img = 'storage/' . $path; // caminho público
            }

            if($proj->save()){
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
            $proj = projeto::find($request->id);

            $proj->nome = $request->nome;
            $proj->objetivo = $request->objetivo;
            $proj->categoria = $request->categoria;
            
            if ($request->hasFile('imagem')) {
                //deletar o arquivo
                Storage::delete($proj->img);
                // Salva a imagem em storage/app/public/noticias
                $path = $request->file('imagem')->store('noticias', 'public');
                $proj->img = 'storage/' . $path; // caminho público
            }
            if($proj->save()){
                return redirect()->back()->with(['msg'=> 'Projetos atualizada com sucesso!', 'ok'=>1]);
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
            $proj = projeto::find($request->id);

            $proj->ativo = '0';
            
            if($proj->save()){
                return redirect()->back()->with(['msg'=> 'Projetos excluído com sucesso!', 'ok'=>1]);
            }else{
                return redirect()->back()->with(['msg'=> 'Tivemos um erro ao excluir o projeto!', 'ok' =>0 ]);
            }
        }else{
            return redirect('/adm')->with('msg','Você precisa estar logado para acessar essa página');
        }
    }
}
