<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\noticia;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    //
    public function index()
    {
        if(!empty(session('user'))){
            $not = noticia::where('ativo','1')->orderBy('created_at','desc')->get();
            //dd($not);
            return view('adm.noticia')->with(['not'=> $not]);
        }else{
            return redirect('/adm')->with('msg','Você precisa estar logado para acessar essa página');
        }
    }

    public function store (Request $request)
    {
        if(!empty(session('user'))){
            $not = new noticia;

            $not->titulo = $request->titulo;
            $not->subtitulo = $request->subtitulo;
            $not->categoria = $request->categoria;
            $not->noticia = $request->noticia;

            if ($request->hasFile('imagem')) {
                // Salva a imagem em storage/app/public/noticias
                $path = $request->file('imagem')->store('noticias', 'public');
                $not->img = 'storage/' . $path; // caminho público
            }

            if($not->save()){
                return redirect()->back()->with(['msg'=> 'Notícia cadastrada com sucesso!', 'ok'=>1]);
            }else{
                return redirect()->back()->with(['msg'=> 'Notícia cadastrada com sucesso!', 'ok' =>0 ]);
            }

        }else{
            return redirect('/adm')->with('msg','Você precisa estar logado para acessar essa página');
        }
    }

    public function update(Request $request)
    {
        if(!empty(session('user'))){
            $not = noticia::find($request->id);

            $not->titulo = $request->titulo;
            $not->subtitulo = $request->subtitulo;
            $not->categoria = $request->categoria;
            $not->noticia = $request->noticia;

            if ($request->hasFile('imagem')) {
                //deletar o arquivo
                Storage::delete($not->img);
                // Salva a imagem em storage/app/public/noticias
                $path = $request->file('imagem')->store('noticias', 'public');
                $not->img = 'storage/' . $path; // caminho público
            }
            if($not->save()){
                return redirect()->back()->with(['msg'=> 'Notícia atualizada com sucesso!', 'ok'=>1]);
            }else{
                return redirect()->back()->with(['msg'=> 'Tivemos um erro ao atualizar a noticia', 'ok' =>0 ]);
            }
        }else{
            return redirect('/adm')->with('msg','Você precisa estar logado para acessar essa página');
        }
    }
    
    public function delete(Request $request)
    {
        if(!empty(session('user'))){
            $not = noticia::find($request->id);

            $not->ativo='0';

            if($not->save()){
                return redirect()->back()->with(['msg'=> 'Notícia excluída com sucesso!', 'ok'=>1]);
            }else{
                return redirect()->back()->with(['msg'=> 'Tivemos um erro ao excluir a noticia', 'ok' =>0 ]);
            }
            
        }else{
            return redirect('/adm')->with('msg','Você precisa estar logado para acessar essa página');
        }
    }
    
}
