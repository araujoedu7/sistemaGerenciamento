<?php
	session_start();
	include_once("seguranca.php");
	include_once("conexao/conexao.php");
	seguranca_cliente();
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

		<title>Area do Cliente</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<link href="css/theme.css" rel="stylesheet">
		<script src="js/ie-emulation-modes-warning.js"></script>
	</head>

	<body role="document">
	
		<?php include_once("cliente/menu_cliente.php"); 			
			
			$pag[1] = "cliente/cliente_home.php";
			$pag[2] = "cliente/visualizar/cliente_visual_usuario.php";			
			$pag[3] = "cliente/editar/cliente_editar_usuario.php";
			
			if(!empty($_GET["link"])){
				$link = $_GET["link"];
				if(file_exists($pag[$link])){
					include $pag[$link];
				}else{
					include "cliente/cliente_home.php";
				}				
			}else{
				include "cliente/cliente_home.php";
			}
		
		?>	
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="js/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/docs.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>
