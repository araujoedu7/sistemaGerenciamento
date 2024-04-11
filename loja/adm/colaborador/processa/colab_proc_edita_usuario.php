<?php
	include_once("../../conexao/conexao.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$senha = mysqli_real_escape_string($conn, $_POST['senha']);
	$senha = md5($senha);
	$select_situacao = mysqli_real_escape_string($conn, $_POST['select_situacao']);
	$select_nivel_acesso = mysqli_real_escape_string($conn, $_POST['select_nivel_acesso']);
	
	$result_usuario = "UPDATE usuarios SET nome='$nome', email = '$email', senha = '$senha', situacoe_id= '$select_situacao', niveis_acesso_id = '$select_nivel_acesso', modified =  NOW() WHERE id = '$id'";
	
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/colaborador.php?link=2'>
				<script type=\"text/javascript\">
					alert(\"Usuário alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/colaborador.php?link=2'>
				<script type=\"text/javascript\">
					alert(\"O Usuário não foi alterado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>