<!doctype html>
<html lang='pt-BR'>
	<head>
		<meta charset='utf-8'/>
		<meta name='viewport' content='width=device-width, initial-scale=1'/>
		<title>ACAMIS — Associação Caminhando Para Mais Um Sonho</title>
		<meta name='description' content='ACAMIS — Notícias, projetos, transparência e contato.'/>
		<meta name='theme-color' content='#1e56a0'/>
		<link rel='stylesheet' href='css/styles.css'/>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
		</head>
		<body>
			<a class='sr-only' href='#conteudo'>Pular para o conteúdo</a>
			<div class='topbar'>
				<div class='wrap'>
					<div class='row'>
						<div class='col-9'>
							<span class="me-2">📍 Várzea Grande · MT</span>
							<a class="me-2" href='mailto:contato@acamis.org.br'>✉ acamis2511@gmail.com</a>
							<a class="me-2" href='tel:+5565999397561'>☎ (65) 9 9939-7561</a>
                            <a href='/transparencia'>Transparência</a>
                            
						</div>
						<div class='col-2 m-3'>
							<a href='/doe' class='cta'>Doe agora</a>
							
						</div>
					</div>
				</div>
			</div>
			<header>
				<nav class='wrap nav' aria-label='Principal'>
					<div class='brand'>
						<a href='/'>
							<img src='assets/logo.png' alt='Logomarca ACAMIS'/>
							<div class='t'>
								<b>ACAMIS</b>
								<span>Associação Caminhando Para Mais Um Sonho</span>
							</div>
						</div>
						<button class='burger' aria-controls='menu' aria-expanded='false' onclick='toggleMenu()'>☰</button>
						<div id='menu' class='menu' role='menubar'>
							<a href='/' role='menuitem'>Início</a>
							<a href='/projeto' role='menuitem'>Projetos</a>
							<a href='/noticia' role='menuitem'>Notícias</a>
							<a href='/transparencia' role='menuitem'>Transparência</a>
							<a href='/parceiro' role='menuitem'>Parceiros</a>
							
						</div>
					</nav>
				</header>
                <div id="content">
                    @yield('content')
                </div>
				<footer>
					<section class='wrap'>
						<div class='cols'>
							<div class="m-3">
								<h5>ACAMIS</h5>
								<p>Associação Caminhando Para Mais Um Sonho.</p>
								<p>📍 Cuiabá · MT<br>✉ contato@acamis.org.br</p>
							</div>
							<div class="m-3">
									<h5>Institucional</h5>
									<p>
										<br>
											<a href='/projeto'>Projetos</a>
											<br>
												<a href='/transparencia'>Transparência</a>
											</p>
										</div>
										<div class="m-3">
											<h5>Conecte-se</h5>
											<p>
												<a href='https://www.instagram.com/acamisoficial/' target="_blank">Instagram</a>
												<br>
													<a href='https://www.facebook.com/acamis.vg/' target="_blank">Facebook</a>
												</p>
											</div>
										</div>
										<div class='copyright'>© <span id='ano'/> ACAMIS. Todos os direitos reservados.</div>
									</section>
								</footer>
								<script src='js/main.js'/>
							</body>
						</html>