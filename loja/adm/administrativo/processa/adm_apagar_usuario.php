<?php
	include_once("../../conexao/conexao.php");
	$id = $_GET['id'];
	
	$result_usuario = "DELETE FROM usuarios WHERE id = '$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=2'>
				<script type=\"text/javascript\">
					alert(\"Usuário apagado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=2'>
				<script type=\"text/javascript\">
					alert(\"O Usuário não foi apagado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>