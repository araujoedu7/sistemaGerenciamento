<?php
	session_start();
	include_once("seguranca.php");
	include_once("conexao/conexao.php");
	seguranca_colaborador();
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

		<title>Area do Colaborador</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<link href="css/theme.css" rel="stylesheet">
		<script src="js/ie-emulation-modes-warning.js"></script>
	</head>

	<body role="document">
	
		<?php include_once("colaborador/menu_colaborador.php"); 			
			
			$pag[1] = "colaborador/colaborador_home.php";
			$pag[2] = "colaborador/listar/colaborador_listar_usuario.php";			
			$pag[3] = "colaborador/cadastro/colaborador_cad_usuario.php";
			$pag[4] = "colaborador/editar/colaborador_editar_usuario.php";
			$pag[5] = "colaborador/visualizar/colaborador_visual_usuario.php";
			$pag[6] = "colaborador/pesquisar/colaborador_pesq_usuario.php";
			
			if(!empty($_GET["link"])){
				$link = $_GET["link"];
				if(file_exists($pag[$link])){
					include $pag[$link];
				}else{
					include "colaborador/colaborador_home.php";
				}				
			}else{
				include "colaborador/colaborador_home.php";
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
