<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Cesar Szpak - Celke">
		<link rel="icon" href="imagens/favicon.ico">

		<title>Area Restrita</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<link href="css/signin.css" rel="stylesheet">
		<script src="js/ie-emulation-modes-warning.js"></script>
	</head>
	<body>
		<div class="container">
			<form class="form-signin" method="POST" action="valida.php">
				<h2 class="form-signin-heading">Área Restrita</h2>
				<label for="inputEmail" class="sr-only">Usuário</label>
				<input type="email" name="txt_usuario" id="inputEmail" class="form-control" placeholder="Usuário" required autofocus>
				<label for="inputPassword" class="sr-only">Senha</label>
				<input type="password" name="txt_senha" id="inputPassword" class="form-control" placeholder="Senha" required>
				<button class="btn btn-lg btn-danger btn-block" type="submit">Acessar</button>
				<div class="row text-center" style="margin-top: 20px;">
					<a href="recuperar_senha.php">Esqueci a senha</a> - <a href="cadastrar_usuario.php">Cadastrar</a>
				</div>
				<p class="text-center text-danger">
					<?php if(isset($_SESSION['loginErro'])){
						echo $_SESSION['loginErro'];
						unset ($_SESSION['loginErro']);
					}?>
				</p>
				<p class="text-center text-success">
					<?php if(isset($_SESSION['loginDeslogado'])){
						echo $_SESSION['loginDeslogado'];
						unset ($_SESSION['loginDeslogado']);
					}?>
				</p>
				<p class="text-center text-success">
					<?php if(isset($_SESSION['recuperarsenha'])){
						echo $_SESSION['recuperarsenha'];
						unset ($_SESSION['recuperarsenha']);
					}?>
				</p>
			</form>
		</div> <!-- /container -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>
