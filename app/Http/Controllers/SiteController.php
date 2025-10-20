<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuario;
use App\Models\noticia;
use App\Models\projeto;
use App\Models\transparencia;
use App\Models\parceiro;

class SiteController extends Controller
{
    //

    public function home()
    {
        $not = noticia::where('ativo','1')->orderBy('created_at','desc')->take(3)->get();
        $proj = projeto::where('ativo','1')->orderBy('created_at','desc')->take(3)->get();

        return view('pages.index')->with(['not' => $not, 'proj'=>$proj]);
    }

    public function noticias()
    {
        $not = noticia::where('ativo', '1')->orderBy('created_at', 'desc')->get();

        return view('pages.noticia')->with(['not' => $not]);
    }

    public function showNoticia($id)
    {
        $not = noticia::find($id);

        return view('pages.noticiaShow')->with(['not'=>$not]);
    }

    public function projeto()
    {
        $proj = projeto::where('ativo', '1')->orderBy('created_at', 'desc')->get();

        return view('pages.projeto')->with(['proj'=>$proj]);
    }

    public function transparencia()
    {
        $dados = transparencia::where('ativo', '1')->orderBy('created_at', 'desc')->get();

        return view('pages.transparencia')->with(['dados'=>$dados]);
    }

    public function parceiro()
    {
        $dados = parceiro::where('ativo', '1')->orderBy('nome')->get();

        return view('pages.parceiro')->with(['parceiros'=>$dados]);
    }

    public function doe()
    {
        return view('pages.doe');
    }

    
}
