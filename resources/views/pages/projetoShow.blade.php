@extends('tamplateadm.tamplate')

@section('content')
<div class="container py-4">

    <div class="mb-3">
        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">
            ← Voltar
        </a>
    </div>

    <div class="card shadow-sm">
        @if($not->img)
            <img 
                src="../{{$not->img}}" 
                alt="{{ $not->titulo }}" 
                class="card-img-top" 
                style="max-height: 400px; object-fit: cover;">
        @endif

        <div class="card-body">
            <h2 class="card-title text-primary">{{ $not->titulo }}</h2>
            @if($not->subtitulo)
                <h5 class="text-muted">{{ $not->subtitulo }}</h5>
            @endif

            <div class="d-flex justify-content-between align-items-center mt-2 mb-3">
                <span class="badge bg-info text-dark">{{ $not->categoria ?? 'Sem categoria' }}</span>
                <small class="text-muted">
                    Publicado em {{ \Carbon\Carbon::parse($not->created_at)->format('d/m/Y') }}
                </small>
            </div>

            <p class="card-text" style="white-space: pre-line; text-align: justify;">
                {{ $not->noticia }}
            </p>
        </div>
    </div>
</div>
@endsection
