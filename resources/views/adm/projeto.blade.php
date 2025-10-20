@extends('tamplateadm.tamplate')

@section('projeto','active')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
	<h4 class="text-primary">Lista de Registros</h4>
	<button class="btn btn-primary" id="btnCadastrar">Cadastrar</button>
</div>

<div class="table-responsive">
	<table class="table table-striped table-hover align-middle">
		<thead class="table-primary">
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Objetivo</th>
				<th>Categoria</th>
				<th class="text-center">Ações</th>
			</tr>
		</thead>
		<tbody>
			@if(!empty($proj))
				@foreach($proj as $lin)
					<tr>
						<td>{{$lin->id}}.</td>
						<td>{{$lin->nome}}</td>
						<td>{{$lin->objetivo}}</td>
						<td>{{$lin->categoria}}</td>
						<td class="text-center">
							<button 
								class="btn btn-sm btn-outline-primary me-1 mb-1 btnEditar"
								data-id="{{$lin->id}}"
								data-nome="{{$lin->nome}}"
								data-objetivo="{{$lin->objetivo}}"
								data-categoria="{{$lin->categoria}}"
								data-imagem="../{{$lin->img}}"
								data-img="{{$lin->img}}"
								>
								Editar
							</button>
							<button 
								class="btn btn-sm btn-outline-danger btnExcluir" 
								data-id="{{ $lin->id }}">
								Excluir
							</button>
						</td>
					</tr>
				@endforeach
			@else 
				<tr>Não há projetos cadastrados cadastradas!</tr>
			@endif
		</tbody>
	</table>
</div>

<!-- Modal -->
<div class="modal fade" id="modalNoticia" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary text-white">
				<h5 class="modal-title" id="modalLabel">Cadastrar Notícia</h5>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<form id="formNoticia" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div id="csrfContainer"></div>
					<input type="hidden" name="id" id="id">
					<input type="hidden" name="img" id="img">

					<div class="row">
						<div class="col-md-8">
							<div class="mb-3">
								<label for="titulo" class="form-label">Nome</label>
								<input type="text" class="form-control" id="nome" name="nome" required>
							</div>
							<div class="mb-3">
								<label for="subtitulo" class="form-label">Objetivo</label>
								<input type="text" class="form-control" id="objetivo" name="objetivo">
							</div>
							<div class="mb-3">
								<label for="categoria" class="form-label">Categoria</label>
								<input type="text" class="form-control" id="categoria" name="categoria" required>
							</div>
						</div>

						<div class="col-md-4">
							<label class="form-label">Imagem</label>
							<div class="mb-2 text-center">
								<img id="previewImagem" src="{{ asset('assets/sem-imagem.png') }}" alt="Preview" class="img-thumbnail" style="max-height: 180px; object-fit: cover;">
							</div>
							<input class="form-control" type="file" id="imagem" name="imagem" accept="image/*">
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
	const modal = new bootstrap.Modal(document.getElementById('modalNoticia'));
	const form = document.getElementById('formNoticia');
	const csrfContainer = document.getElementById('csrfContainer');
	const previewImagem = document.getElementById('previewImagem');
	const inputImagem = document.getElementById('imagem');

	const btnCadastrar = document.getElementById('btnCadastrar');
	const btnEditar = document.querySelectorAll('.btnEditar');

	// Função para inserir o CSRF dinamicamente
	function inserirCSRF() {
		csrfContainer.innerHTML = `@csrf`;
	}

	// Função para resetar preview
	function resetPreview() {
		previewImagem.src = "{{ asset('assets/sem-imagem.png') }}";
	}

	// Atualiza o preview da imagem quando o usuário seleciona um arquivo
	inputImagem.addEventListener('change', function (event) {
		const file = event.target.files[0];
		if (file) {
			const reader = new FileReader();
			reader.onload = e => previewImagem.src = e.target.result;
			reader.readAsDataURL(file);
		} else {
			resetPreview();
		}
	});

	// Botão Cadastrar
	btnCadastrar.addEventListener('click', function () {
		form.reset();
		resetPreview();
		inserirCSRF();
		form.action = "{{ url('adm/projetos/cad') }}";
		document.getElementById('modalLabel').textContent = 'Cadastrar Projeto';
		modal.show();
	});

	// Botões Editar
	btnEditar.forEach(btn => {
		btn.addEventListener('click', function () {
			inserirCSRF();
			form.action = "{{ url('adm/projetos/update') }}";

			document.getElementById('id').value = this.dataset.id;
			document.getElementById('nome').value = this.dataset.nome;
			document.getElementById('objetivo').value = this.dataset.objetivo;
			document.getElementById('categoria').value = this.dataset.categoria;
			document.getElementById('img').value = this.dataset.img;
			

			// Carrega a imagem existente no preview
			if (this.dataset.imagem) {
				previewImagem.src = this.dataset.imagem;
			} else {
				resetPreview();
			}

			document.getElementById('modalLabel').textContent = 'Editar Projeto';
			modal.show();
		});
	});
});
</script>

<!-- Modal de Exclusão -->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="modalExcluirLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger text-white">
				<h5 class="modal-title" id="modalExcluirLabel">Confirmar Exclusão</h5>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="formExcluir" method="POST">
				<div class="modal-body">
					<div id="csrfExcluir"></div>
					<input type="hidden" name="id" id="idExcluir">
					<p class="mb-0">Tem certeza que deseja excluir este projeto? Essa ação não pode ser desfeita!</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-danger">Excluir</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
	const modalExcluir = new bootstrap.Modal(document.getElementById('modalExcluir'));
	const formExcluir = document.getElementById('formExcluir');
	const csrfExcluir = document.getElementById('csrfExcluir');
	const idExcluir = document.getElementById('idExcluir');

	// Botões Excluir
	document.querySelectorAll('.btnExcluir').forEach(btn => {
		btn.addEventListener('click', function () {
			const id = this.dataset.id;
			idExcluir.value = id;
			csrfExcluir.innerHTML = `@csrf`;
			formExcluir.action = "{{ url('adm/projetos/delete') }}";
			modalExcluir.show();
		});
	});
});
</script>



<!-- notificação-->
 @if (session('msg'))
<div 
    class="toast-container position-fixed top-0 end-0 p-3" 
    style="z-index: 1100;">
    <div 
        id="toastMsg" 
        class="toast align-items-center text-white border-0 
        {{ session('ok') == 1 ? 'bg-success' : 'bg-danger' }}" 
        role="alert" 
        aria-live="assertive" 
        aria-atomic="true"
        data-bs-delay="3000">

        <div class="d-flex">
            <div class="toast-body">
                {{ session('msg') }}
            </div>
            <button 
                type="button" 
                class="btn-close btn-close-white me-2 m-auto" 
                data-bs-dismiss="toast" 
                aria-label="Close"></button>
        </div>
    </div>
</div>
@endif
@if (session('msg'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    const toastEl = document.getElementById('toastMsg');
    if (toastEl) {
        const toast = new bootstrap.Toast(toastEl);
        toast.show();
    }
});
</script>
@endif

@endsection
