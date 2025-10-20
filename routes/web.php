<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\TransparenciaController;
use App\Http\Controllers\ParceiroController;



//////rotas site
Route::get('/', [SiteController::class, 'home']);
route::get('/adm', function(){
    return view('pages.login');
});
route::get('/noticia', [SiteController::class, 'noticias']);
route::get('/noticia/{id}', [SiteController::class, 'showNoticia']);
route::get('/projeto', [SiteController::class, 'projeto']);
route::get('/transparencia', [SiteController::class, 'transparencia']);
route::get('/parceiro', [SiteController::class, 'parceiro']);
route::get('/doe', [SiteController::class, 'doe']);

///rotas adm
route::post('/logar', [UsuarioController::class, 'logar']);
route::get('/adm/noticias', [NoticiaController::class, 'index']);
route::post('/adm/noticias/cad', [NoticiaController::class, 'store']);
route::post('/adm/noticias/update', [NoticiaController::class, 'update']);
route::post('/adm/noticias/delete', [NoticiaController::class, 'delete']);
Route::get('/adm/projetos', [ProjetoController::class, 'index']);
route::post('/adm/projetos/cad', [ProjetoController::class, 'store']);
route::post('/adm/projetos/update', [ProjetoController::class, 'update']);
route::post('/adm/projetos/delete', [ProjetoController::class, 'delete']);
route::get('/adm/transparencia', [TransparenciaController::class, 'index']);
route::post('/adm/transparencia/cad', [TransparenciaController::class, 'store']);
route::post('/adm/transparencia/update', [TransparenciaController::class, 'update']);
route::post('/adm/transparencia/delete', [TransparenciaController::class, 'delete']);
route::get('/adm/parceiro', [ParceiroController::class, 'index']);
route::post('/adm/parceiro/cad', [ParceiroController::class, 'store']);
route::post('/adm/parceiro/update', [ParceiroController::class, 'update']);
route::post('/adm/parceiro/delete', [ParceiroController::class, 'delete']);
