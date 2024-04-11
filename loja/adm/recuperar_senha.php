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

		<title>Celke - Recuperar a senha</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<link href="css/signin.css" rel="stylesheet">
		<script src="js/ie-emulation-modes-warning.js"></script>
	</head>
	<body>
		<div class="container">
			<form class="form-signin" method="POST" action="processa/proc_edita_rec_senha.php">
				<h2 class="form-signin-heading">Recupera a senha</h2>
				<label for="inputEmail" class="sr-only">E-mail</label>
				<input type="email" name="txt_email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus <?php
					if(!empty($_SESSION['value_email'])){
						echo "value='".$_SESSION['value_email']."'";
						unset($_SESSION['value_email']);
					}
				?>					
				/>
				<?php 
					if(!empty($_SESSION['usuario_email_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['usuario_email_vazio']."</p>";
						unset($_SESSION['usuario_email_vazio']);
					}
				?> 
				<button class="btn btn-lg btn-warning btn-block" type="submit">Recuperar</button>
				<div class="row text-center" style="margin-top: 20px;">
					<a href="index.php">Login</a> - <a href="cadastrar_usuario.php">Cadastrar</a>
				</div>		
				<p class="text-center text-danger">
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
