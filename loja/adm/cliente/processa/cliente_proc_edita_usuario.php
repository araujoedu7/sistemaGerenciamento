<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> 
		<?php
			session_start();
			include_once("../../conexao/conexao.php");
			$id = mysqli_real_escape_string($conn, $_POST['id']);
			$nome = mysqli_real_escape_string($conn, $_POST['nome']);
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$senha = mysqli_real_escape_string($conn, $_POST['senha']);
			$senha = md5($senha);
			
			$result_usuarios = "SELECT * FROM usuarios WHERE id = '$id' LIMIT 1";
			$resultado_usuarios = mysqli_query($conn, $result_usuarios);
			$rows_usuarios = mysqli_fetch_assoc($resultado_usuarios);
			
			$nome_foto_antiga = "../foto/".$rows_usuarios['foto'];
			unlink($nome_foto_antiga);
			
			//Pasta onde o arquivo vai se salvo
			$_UP['pasta'] = '../foto/';
			
			//Tamanho máximo do arquivo em Bytes
			$_UP['tamanho'] = 1024*1024*5; //5mb
			
			//Array com as extensões permitido
			$_UP['extensoes'] = array('png','jpg','jpeg','gif');
			
			//Renomeia o arquivo? (se true, o arquivo será salvo como .jpg e em nome único)
			$_UP['renomeia'] = false;
			
			//Array com os tipos de erros de upload do PHP
			$_UP['erros'][0] = 'Não houve erro';
			$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
			$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
			$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
			$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
			
			//Verfica se houve algum erro com o upload. Se sim, exibe mensagem de erro
			if($_FILES['arquivo']['error'] != 0){
				die("Não foi possivel fazer o upload, erro: <br>". $_UP['erros'][$_FILES['arquivo']['error']]);
				exit; //para a execução do script
			}
			
			//Fazer a verificacao da extensão do arquivo
			$extensao = strtolower(end(explode('.',$_FILES['arquivo']['name'])));
			if(array_search($extensao, $_UP['extensoes']) === false){	
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/cliente.php?link=3&id=$id'>
					<script type=\"text/javascript\">
						alert(\"Extensão da imagem inválida.\");
					</script>
				";	
			}
			
			//Fazer a verificação do tamanho do arquivo
			elseif($_UP['tamanho'] < $_FILES['arquivo']['size']){	
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/cliente.php?link=3&id=$id'>
					<script type=\"text/javascript\">
						alert(\"O arquivo enviado é muito grande, envie arquivos até 5mb. \");
					</script>
				";	
			}
			
			//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
			else{
				//Verificar se deve trocar o nome do arquivo
				if($_UP['renomeia'] == true){
					//Criar um nome baseado no UNIX TIMESTAMP atual e com a extensão jpg
					$nome_final = time().'.jpg';
				}else{
					//Mantem o nome original do arquivo
					$nome_final = time().'_'.$_FILES['arquivo']['name'];
				}
				
				//Verificar se é possivel mover o arquivo para a pasta escolhida
				if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'].$nome_final)){
					//Upload efetuado com sucesso
					$result_usuario = "UPDATE usuarios SET nome='$nome', email = '$email', senha = '$senha', foto='$nome_final', modified =  NOW() WHERE id = '$id'";
			
					$resultado_usuario = mysqli_query($conn, $result_usuario);
					
					if(mysqli_affected_rows($conn) != 0){
						echo "
							<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/cliente.php?link=2&id=$id'>
							<script type=\"text/javascript\">
								alert(\"Perfil alterado com Sucesso.\");
							</script>
						";	
					}else{
						echo "
							<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/cliente.php?link=2&id=$id'>
							<script type=\"text/javascript\">
								alert(\"O Perfil não foi alterado com Sucesso.\");
							</script>
						";	
					}
				}else{
					//Upload não foi efetuado com sucesso
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/cliente.php?link=2&id=$id'>
						<script type=\"text/javascript\">
							alert(\"O Perfil não foi alterado com Sucesso. Entre em contato com cesar@celke.com.br.\");
						</script>
					";
				}
			}
			$conn->close(); 
		?>
	</body>
</html>


