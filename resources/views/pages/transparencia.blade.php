@extends('tamplate.tamplate')

@section('style', '/css/styles.css')

@section('js', '/js/main.js')

@section('logo', '/assets/logo.png')

@section('content')
<section>
    <div class='wrap'>
        <h2>Transparência</h2>
        <p class='subtitle'>Abaixo publicaremos documentos, relatórios e informações institucionais.</p>
        <div class='card' style='padding:18px'>
            @foreach($dados as $dado)
                <p>• {{$dado->nome}} - <a href="{{$dado->url}}" target="_blank">Link</a></p>
            @endforeach
            
        </div>
    </div>
</section>       
@endsection