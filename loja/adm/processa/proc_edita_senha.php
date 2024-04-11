<?php
	session_start();
	include_once("../conexao/conexao.php");
	//Variavel controla a necessidade de salvar no banco
	$salvar_dados_bd = 1; //Valor $salvar_dados_bd = 1 deve salvar no banco / $salvar_dados_bd = 2 não salvar no banco
	
	if(empty($_POST['id'])){
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/editar_senha.php'>
		";	
		$_SESSION['usuario_senha_vazio'] = "Erro ao atualizar a senha. Entre em contato cesar@celke.com.br.";		
		$salvar_dados_bd = 2;
	}
	
	if(empty($_POST['txt_senha'])){
		if(!empty($_POST['id'])){
			$usuario_id = $_POST['id'];
			$result_usuario = "SELECT * FROM usuarios WHERE id = '$usuario_id'";
			$resultado_usuario = mysqli_query($conn, $result_usuario);
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(isset($row_usuario)){
				$recuperar_senha = $row_usuario['recuperar_senha'];
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/editar_senha.php?chave=$recuperar_senha'>
				";	
				$_SESSION['usuario_senha_vazio'] = "Campo senha é obrigatorio!";
			}
		}
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_senha'] = $_POST['txt_senha'];
	}
	if($salvar_dados_bd == 1){
		$txt_senha = mysqli_real_escape_string($conn, $_POST['txt_senha']);
		$txt_senha = md5($txt_senha);
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		
		$result_usuario = "UPDATE usuarios SET senha='$txt_senha', recuperar_senha = '', modified =  NOW() WHERE id = '$id'";
		
		$resultado_usuario = mysqli_query($conn, $result_usuario);	
		unset($_SESSION['value_senha']);
		
		?>
		<!DOCTYPE html>
		<html lang="pt-br">
			<head>
				<meta charset="utf-8">
			</head>

			<body> <?php
				if(mysqli_affected_rows($conn) != 0){
					$_SESSION['recuperarsenha'] = "Senha alterada com sucesso.";
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/index.php'>
						<script type=\"text/javascript\">
							alert(\"Senha alterada com Sucesso.\");
						</script>
					";	
				}else{
					$_SESSION['recuperarsenha'] = "Erro ao atualizar a senha. Entre em contato cesar@celke.com.br.";
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/editar_senha.php'>
						<script type=\"text/javascript\">
							alert(\"Erro ao atualizar a senha. Entre em contato cesar@celke.com.br.\");
						</script>
					";	
				}?>
			</body>
		</html>
		<?php 
	}else{
		
	}
	$conn->close(); ?>