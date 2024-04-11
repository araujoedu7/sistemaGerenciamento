<?php
	session_start();
	include_once("../../conexao/conexao.php");
	
	//Variavel controla a necessidade de salvar no banco
	$salvar_dados_bd = 1; //Valor $salvar_dados_bd = 1 deve salvar no banco / $salvar_dados_bd = 2 não salvar no banco
	//Verifica o campo nome não esta vazio
	//Estando vazio redirecionao usuário para o formulário
	
	if(empty($_POST['nome'])){
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=3'>
		";	
		$_SESSION['usuario_nome_vazio'] = "Campo nome é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_nome'] = $_POST['nome'];
	}
	

	if(empty($_POST['email'])){
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=3'>
		";	
		$_SESSION['usuario_email_vazio'] = "Campo email é obrigatorio!";
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_email'] = $_POST['email'];
	}
	
	
	if(empty($_POST['senha'])){
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=3'>
		";	
		$_SESSION['usuario_senha_vazio'] = "Campo senha é obrigatorio!";
		$salvar_dados_bd = 2;
	}else{		
		$_SESSION['value_senha'] = $_POST['senha'];
	}
	
	
	if(empty($_POST['select_situacao'])){
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=3'>
		";	
		$_SESSION['usu_sel_situacao_vazio'] = "Campo situação é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_select_situacao'] = $_POST['select_situacao'];
	}
	
	if(empty($_POST['select_nivel_acesso'])){
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=3'>
		";	
		$_SESSION['usu_sel_nivel_aces_vazio'] = "Campo nivel de acesso é obrigatorio!";
		$salvar_dados_bd = 2;	
	}else{
		$_SESSION['value_select_nivel_acesso'] = $_POST['select_nivel_acesso'];
		}
	if($salvar_dados_bd == 1){
		$nome = mysqli_real_escape_string($conn, $_POST['nome']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$senha = mysqli_real_escape_string($conn, $_POST['senha']);
		$senha = md5($senha);
		$select_situacao = mysqli_real_escape_string($conn, $_POST['select_situacao']);
		$select_nivel_acesso = mysqli_real_escape_string($conn, $_POST['select_nivel_acesso']);
		
		$result_usuario = "INSERT INTO usuarios (nome, email, senha, situacoe_id, niveis_acesso_id, created) VALUES ('$nome', '$email', '$senha', '$select_situacao', '$select_nivel_acesso', NOW())";
		$resultado_usuario = mysqli_query($conn, $result_usuario); 
		
		unset($_SESSION['value_nome'], $_SESSION['value_email'], $_SESSION['value_senha'], $_SESSION['value_select_situacao'], $_SESSION['value_select_nivel_acesso']);
		
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
								alert(\"Usuário cadastrado com Sucesso.\");
							</script>
						";	
					}else{
						echo "
							<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=2'>
							<script type=\"text/javascript\">
								alert(\"O Usuário não foi cadastrado com Sucesso.\");
							</script>
						";	
					}?>
				</body>
			</html>
			<?php $conn->close(); 
	}
	
?>
