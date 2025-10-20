@extends('tamplate.tamplate')

@section('content')
<div class='wrap py-5'>
    <h2>Parceiros da ACAMIS</h2>
    <p class='subtitle'>Conheça as instituições e empresas que apoiam nossos projetos.</p>

    <div class='grid'>
        @if(!empty($parceiros) && $parceiros->count() > 0)
            @foreach($parceiros as $parceiro)
                <article class="card shadow-sm text-center">
                    <div class="ratio ratio-1x1 d-flex align-items-center justify-content-center bg-light">
                        <img src="{{ asset($parceiro->url) }}" 
                             class="img-fluid p-3 object-fit-contain" 
                             alt="{{ $parceiro->nome }}" 
                             style="max-height: 150px;">
                    </div>
                    <div class="card-body">
                        <h5 class="fw-bold ">{{ $parceiro->nome }}</h5>
                    </div>
                </article>
            @endforeach
        @else 
            <h5 class="text-muted">Nenhum parceiro cadastrado até o momento.</h5>
        @endif
    </div>
</div>
@endsection
