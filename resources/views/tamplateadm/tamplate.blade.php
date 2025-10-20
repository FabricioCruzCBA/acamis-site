<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>Administração - ACAMIS</title>
				<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
				<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
		
					<style> body { background-color: #f5f6fa; } .navbar { background-color: #002b5b; } .navbar-brand, .nav-link { color: #fff !important; font-weight: 500; } .nav-link.active, .nav-link:hover { color: #d1e7ff !important; } .btn-primary { background-color: #005792; border: none; } .btn-primary:hover { background-color: #00406a; } .content { padding: 2rem; } </style>
				</head>
				<body>
					<!-- Navbar -->
					<nav class="navbar navbar-expand-lg navbar-dark">
						<div class="container">
							<a class="navbar-brand" href="#">Administração</a>
							<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
								<span class="navbar-toggler-icon"/>
							</button>
							<div class="collapse navbar-collapse" id="navbarNav">
								<ul class="navbar-nav ms-auto">
									<li class="nav-item">
										<a class="nav-link @yield('noticia')" href="/adm/noticias">Notícias</a>
									</li>
									<li class="nav-item">
										<a class="nav-link @yield('projeto')" href="/adm/projetos">Projetos</a>
									</li>
									<li class="nav-item">
										<a class="nav-link @yield('trans')" href="/adm/transparencia">Transparência</a>
									</li>
									<li class="nav-item">
										<a class="nav-link @yield('parceiro')" href="/adm/parceiro">Parceiros</a>
									</li>
								</ul>
							</div>
						</div>
					</nav>
					<!-- Conteúdo -->
					<div class="content container">
						@yield('content')
					</div>
					<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"/>
				</body>
			</html>