@extends('tamplate.tamplate')

@section('style', '/css/styles.css')

@section('js', '/js/main.js')

@section('logo', '/assets/logo.png')

@section('content')
       <section class='hero' id='inicio'>
                        <div class='wrap'>
                            <div class='grid'>
                                <div>
                                    <span class='badge text-dark'>🌞 Bem-vindo(a) à ACAMIS</span>
                                    <h1>Arte, educação e oportunidades que iluminam o futuro.</h1>
                                    <p>A Associação Caminhando Para Mais Um Sonho – ACAMIS, é uma organização da sociedade civil, sem fins lucrativos de direitos privados, de interesse público, de caráter educativo e de duração por tempo indeterminado. A ACAMIS teve início em maio de 2011 a partir do olhar de sua Idealizadora e fundadora, a Assistente Social Maria Domingas, que identificou a carência que sua comunidade apresentava de um espaço dedicado ao desenvolvimento de ações de proteção social para crianças e adolescentes em vulnerabilidade e risco social onde fosse possível contribuir para a construção de um futuro mais justo e igualitário a esse público. Essa comunidade frequentemente enfrentava desafios socioeconômicos, falta de acesso a serviços básicos e oportunidades limitadas, o que resultava em condições precárias de vida para muitas crianças e jovens que ali viviam.</p>
                                    <div style='display:flex;gap:12px;align-items:center;flex-wrap:wrap;margin-top:10px'>
                                        <a class='cta' href='/doe'>Quero apoiar</a>
                                        
                                    </div>
                                </div>
                                <div class='hero-illu' aria-hidden='true'>
                                    <img src='assets/logo.png' alt='Logotipo ACAMIS'/>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section>
                        <div class='wrap'>
                            <h2>Projetos em destaque</h2>
                            <p class='subtitle'>Conheça algumas iniciativas em andamento.</p>
                            <div class='grid'>
                                @if(!empty($proj))
                                    @foreach($proj as $item)
                                        <article class="card shadow-sm">
                                            <div class="ratio ratio-16x9">
                                                <img src="{{$item->img}}" class="card-img-top img-fluid object-fit-cover" alt="{{$item->nome}}">
                                            </div>
                                            <div class="card-body">
                                                <span class="pill">{{$item->categoria}}</span>
                                                <h3>{{$item->nome}}</h3>
                                                <p>{{$item->objetivo}}</p>
                                                
                                            </div>
                                        </article>
                                    @endforeach
                                @else 
                                    <h1>Não há projetos cadastradas!</h1>
                                @endif
                                
                                
                            </div>
                            <a class='read mt-10' href='/projeto'>Ver todas os projetos →</a>
                        </div>
                    </section>
                    <section style='background:linear-gradient(180deg,#fff 0,var(--sky) 100%)'>
                        <div class='wrap'>
                            <h2>Últimas notícias</h2>
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
                            <a class='read mt-10' href='/noticia'>Ver todas as notícias →</a>
                        </div>
                        
                    </section>        
@endsection