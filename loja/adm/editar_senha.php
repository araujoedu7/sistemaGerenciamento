<?php
	session_start();
	include_once("conexao/conexao.php");
	if(!empty($_GET['chave'])){
		$chave_alt_senha = $_GET['chave'];
		$result_usuario = "SELECT * FROM usuarios WHERE recuperar_senha = '$chave_alt_senha'";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$row_usuario = mysqli_fetch_assoc($resultado_usuario);
		if(isset($row_usuario)){
			$usuario_id = $row_usuario['id'];
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

					<title>Celke - Editar a senha</title>
					<link href="css/bootstrap.css" rel="stylesheet">
					<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
					<link href="css/signin.css" rel="stylesheet">
					<script src="js/ie-emulation-modes-warning.js"></script>
				</head>
				<body>
					<div class="container">
						<form class="form-signin" method="POST" action="processa/proc_edita_senha.php">
							<h2 class="form-signin-heading">Insira a nova senha</h2>
							<label for="inputEmail" class="sr-only">Senha</label>
							<input type="password" name="txt_senha" id="inputEmail" class="form-control" placeholder="Digite 6 caracteres alfanuméricos" autofocus  <?php
								if(!empty($_SESSION['value_senha'])){
									echo "value='".$_SESSION['value_senha']."'";
									unset($_SESSION['value_senha']);
								}
							?>					
							/>
							<?php 
								if(!empty($_SESSION['usuario_senha_vazio'])){
									echo "<p style='color: #ff0000; '>".$_SESSION['usuario_senha_vazio']."</p>";
									unset($_SESSION['usuario_senha_vazio']);
								}
							?> 						
							<input type="hidden" name="id" value="<?php echo $usuario_id; ?>">
							<button class="btn btn-lg btn-success btn-block" type="submit">Atualizar</button>
							<div class="row text-center" style="margin-top: 20px;">
								<a href="index.php">Login</a> - <a href="cadastrar_usuario.php">Cadastrar</a>
							</div>
						</form>
					</div> <!-- /container -->
				<script src="js/ie10-viewport-bug-workaround.js"></script>
				</body>
			</html>
		<?php
		}else{
			$_SESSION['recuperarsenha'] = "Código de recuperação inválido.";
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/recuperar_senha.php'>
			";	
		}
	}else{
		$_SESSION['recuperarsenha'] = "Código de recuperação inválido.";
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/recuperar_senha.php'>
		";	
	}
	