<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>Administração do Site</title>
				<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
					<style> body { background: linear-gradient(135deg, #002b5b, #005792); min-height: 100vh; display: flex; align-items: center; justify-content: center; } .login-card { background-color: #fff; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.2); max-width: 400px; width: 100%; padding: 2rem; } .login-title { color: #002b5b; font-weight: 700; text-align: center; margin-bottom: 1.5rem; } .btn-primary { background-color: #005792; border: none; } .btn-primary:hover { background-color: #00406a; } </style>
				</head>
				<body>
					<div class="login-card">
						<h2 class="login-title">Administração do Site</h2>
						<form action="/logar" method="POST">
                            @csrf
							<div class="mb-3">
								<label for="login" class="form-label">Usuário</label>
								<input type="text" class="form-control" id="login" placeholder="Digite seu usuário" name="login" required>
							</div>
							<div class="mb-3">
								<label for="senha" class="form-label">Senha</label>
								<input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
							</div>
                            @if(session('msg'))
                                <div class="alert alert-danger">
                                    {{session('msg')}}
                                </div>
                            @endif
							<div class="d-grid">
								<button type="submit" class="btn btn-primary">Entrar</button>
							</div>
						</form>
					</div>
					<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"/>
				</body>
			</html>