@extends('tamplate.tamplate')

@section('style', '/css/styles.css')

@section('js', '/js/main.js')

@section('logo', '/assets/logo.png')

@section('content')
<section>
    <div class="wrap">
        <h2>Transparência</h2>
        <p class="subtitle">Abaixo publicamos documentos, relatórios e informações institucionais.</p>

        <div class="accordion" id="accordionTransparencia">
            @php
                // Agrupa os dados por categoria
                $dadosPorCategoria = $dados->groupBy('categoria');
            @endphp

            @foreach($dadosPorCategoria as $categoria => $itens)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-{{ Str::slug($categoria) }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ Str::slug($categoria) }}" aria-expanded="false" aria-controls="collapse-{{ Str::slug($categoria) }}">
                            {{ $categoria ?? 'Sem Categoria' }}
                        </button>
                    </h2>
                    <div id="collapse-{{ Str::slug($categoria) }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ Str::slug($categoria) }}" data-bs-parent="#accordionTransparencia">
                        <div class="accordion-body">
                            @foreach($itens as $dado)
                                <p class="mb-1">
                                    • {{ $dado->nome }} — 
                                    <a href="{{ $dado->url }}" target="_blank">Abrir</a>
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
