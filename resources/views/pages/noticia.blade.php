@extends('tamplate.tamplate')

@section('content')
    
    
    <section style='background:linear-gradient(180deg,#fff 0,var(--sky) 100%)'>
        <div class='wrap'>
            <h2>Todas as notícias</h2>
            <p class='subtitle'>Acompanhe as novidades da ACAMIS.</p>
            <div class='grid'>
                @if(!empty($not))
                    @foreach($not as $item)
                        <article class="card shadow-sm">
                            <div class="ratio ratio-16x9">
                                <img src="{{$item->img}}" class="card-img-top img-fluid object-fit-cover" alt="Logotipo ACAMIS">
                            </div>
                            <div class="card-body">
                                <span class="pill">{{$item->categoria}}</span>
                                <h3>{{$item->titulo}}</h3>
                                <p>{{$item->subtitulo}}</p>
                                <p><a class='read mt-10' href='/noticia/{{$item->id}}'>Ler mais →</a></p>
                            </div>
                        </article>
                    @endforeach
                @else 
                    <h1>Não há noticias cadastradas!</h1>
                @endif
                
                
            </div>
            
        </div>
        
    </section>          
@endsection