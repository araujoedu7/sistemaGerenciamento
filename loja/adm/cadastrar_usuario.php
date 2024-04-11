<?php
	session_start();
	include_once("conexao/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="imagens/favicon.ico">

		<title>Cadastrar usuário</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<link href="css/theme.css" rel="stylesheet">
		<script src="js/ie-emulation-modes-warning.js"></script>
		<script src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/javascriptpersonalizado.js"></script>
	</head>

	<body role="document">
		<div class="container theme-showcase" role="main">
			<div class="page-header text-center">
				<h1>Cadastrar Usuário</h1>
			</div>
			<form name="adm_cad_usuario" class="form-horizontal" method="POST" action="processa/proc_cad_usuario.php" enctype="multipart/form-data">
				<div class="form-group">
					<label class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-10">
						<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome Completo" required
						<?php
							if(!empty($_SESSION['value_nome'])){
								echo "value='".$_SESSION['value_nome']."'";
								unset($_SESSION['value_nome']);
							}
						?>					
						/>
						<?php 
							if(!empty($_SESSION['usuario_nome_vazio'])){
								echo "<p style='color: #ff0000; '>".$_SESSION['usuario_nome_vazio']."</p>";
								unset($_SESSION['usuario_nome_vazio']);
							}
						?> 
					</div>			
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">E-mail</label>
					<div class="col-sm-10">
						<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="E-mail" required
						<?php
							if(!empty($_SESSION['value_email'])){
								echo "value='".$_SESSION['value_email']."'";
								unset($_SESSION['value_email']);
							}
						?>
						>
						<?php 
							if(!empty($_SESSION['usuario_email_vazio'])){
								echo "<p style='color: #ff0000; '>".$_SESSION['usuario_email_vazio']."</p>";
								unset($_SESSION['usuario_email_vazio']);
							}
						?> 
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Senha</label>
					<div class="col-sm-10">
						<input type="password" name="senha" class="form-control" id="inputPassword3" placeholder="Senha" required 
						<?php
							if(!empty($_SESSION['value_senha'])){
								echo "value='".$_SESSION['value_senha']."'";
								unset($_SESSION['value_senha']);
							}
						?>
						>
						<?php 
							if(!empty($_SESSION['usuario_senha_vazio'])){
								echo "<p style='color: #ff0000; '>".$_SESSION['usuario_senha_vazio']."</p>";
								unset($_SESSION['usuario_senha_vazio']);
							}
						?> 
					</div>
				</div>	
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" class="btn btn-success" value="Cadastrar" onclick="return val_adm_cad_usuario()">
					</div>
				</div>
			</form>
		</div>
		
		<script src="js/bootstrap.min.js"></script>
		<script src="js/docs.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>
