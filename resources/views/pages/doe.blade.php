@extends('tamplate.tamplate')

@section('style', '/css/styles.css')

@section('js', '/js/main.js')

@section('logo', '/assets/logo.png')

@section('content')
<section>
    <div class='wrap'>
        <div class='card' style='padding:20px'>
            <h2>Doe e fortaleça nossos projetos</h2>
            <p class='subtitle'>Use a chave PIX ou entre em contato para outras formas de apoio.</p>
            <div style='display:grid;grid-template-columns:1fr 1fr;gap:16px'>
                <div>
                    <h3>Chave PIX</h3>
                    <p>
                        <b>CNPJ: 14.904.923/0001-82</b>
                    </p>
                </div>
                <div>
                    <h3>Dados Bancários</h3>
                    <p>Banco Sicred · Ag. 0804 · Conta 12533-5</p>
                </div>
            </div>
        </div>
    </div>
</section>       
@endsection