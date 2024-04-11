<?php
	session_start();
	include_once("../../conexao/conexao.php");
	
	//Variavel controla a necessidade de salvar no banco
	$salvar_dados_bd = 1; //Valor $salvar_dados_bd = 1 deve salvar no banco / $salvar_dados_bd = 2 não salvar no banco
	//Verifica o campo nome não esta vazio
	//Estando vazio redirecionao usuário para o formulário
	
	if(empty($_POST['nome'])){
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=7'>
		";	
		$_SESSION['usuario_nome_vazio'] = "Campo nome é obrigatorio!";		
		$salvar_dados_bd = 2;
	}else{
		$_SESSION['value_nome'] = $_POST['nome'];
	}
	if($salvar_dados_bd == 1){
		
		$nome = mysqli_real_escape_string($conn, $_POST['nome']);
		
		$result_niveis_acessos = "INSERT INTO niveis_acessos (nome, created) VALUES ('$nome', NOW())";
		$resultado_niveis_acessos = mysqli_query($conn, $result_niveis_acessos);	
		?>
		<!DOCTYPE html>
		<html lang="pt-br">
			<head>
				<meta charset="utf-8">
			</head>

			<body> <?php
				if(mysqli_affected_rows($conn) != 0){
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=6'>
						<script type=\"text/javascript\">
							alert(\"Nivel de Acesso cadastrado com Sucesso.\");
						</script>
					";	
				}else{
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=6'>
						<script type=\"text/javascript\">
							alert(\"Nivel de Acesso não foi cadastrado com Sucesso.\");
						</script>
					";	
				}?>
			</body>
		</html>
		<?php 
	}
	$conn->close(); ?>