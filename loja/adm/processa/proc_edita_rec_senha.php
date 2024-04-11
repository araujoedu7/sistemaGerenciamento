<?php
	session_start();
	include_once("../conexao/conexao.php");
	include_once("../PHPMailer/PHPMailerAutoload.php"); //Pacote enviar E-mail
	//Variavel controla a necessidade de salvar no banco
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

		<title>Area Restrita</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<link href="css/signin.css" rel="stylesheet">
		<script src="js/ie-emulation-modes-warning.js"></script>
	</head>
	<body>
		<?php
		$salvar_dados_bd = 1; //Valor $salvar_dados_bd = 1 deve salvar no banco / $salvar_dados_bd = 2 não salvar no banco
		
		if(empty($_POST['txt_email'])){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/recuperar_senha.php'>
			";	
			$_SESSION['usuario_email_vazio'] = "Campo e-mail é obrigatorio!";		
			$salvar_dados_bd = 2;
		}else{
			$_SESSION['value_email'] = $_POST['txt_email'];
		}
		if($salvar_dados_bd == 1){
			$txt_email = mysqli_real_escape_string($conn, $_POST['txt_email']);
			$resul_usuario = "SELECT * FROM usuarios WHERE email = '$txt_email'";
			$resultado_usuario = mysqli_query($conn, $resul_usuario);
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			$id = $row_usuario['id'];
			$email = $row_usuario['email'];
			$recuperar_senha = time();
			$recuperar_senha = $recuperar_senha."f".$id;
			$recuperar_senha = md5($recuperar_senha);
			
			$result_situacoes = "UPDATE usuarios SET recuperar_senha='$recuperar_senha', modified =  NOW() WHERE email = '$txt_email'";
			
			$resultado_situacoes = mysqli_query($conn, $result_situacoes);	
			unset($_SESSION['value_email']);
			
			//Enviar e-mail
			$Mailer = new PHPMailer();
		
			//Define que será usado SMTP
			$Mailer->IsSMTP();
			
			//Enviar e-mail em HTML
			$Mailer->isHTML(true);
			
			//Aceitar carasteres especiais
			$Mailer->Charset = 'UTF-8';
			
			//Configurações
			$Mailer->SMTPAuth = true;
			$Mailer->SMTPSecure = 'ssl';
			
			//nome do servidor
			$Mailer->Host = 'nome-do-servidor';
			//Porta de saida de e-mail 
			$Mailer->Port = 465;
			
			//Dados do e-mail de saida - autenticação
			$Mailer->Username = 'usuario@dominio.com';
			$Mailer->Password = 'senha';
			
			//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
			$Mailer->From = 'usuario@dominio.com';
			
			//Nome do Remetente
			$Mailer->FromName = 'Celke';
		
			//Assunto da mensagem
			$titulo = "Alterar a senha";
			$titulo=htmlentities($titulo);
			$Mailer->Subject = $titulo;
		
			//Corpo da Mensagem
			$mensagem = "Olá <br><br>";
			$mensagem .= "Você solicitou uma alteração de senha em Celke.<br>";
			$mensagem .= "Seguindo o link abaixo você poderá alterar sua senha.<br>";
			$mensagem .= "Para continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço abaixo no seu navegador.<br><br>";
			$mensagem .= "http://localhost/loja/adm/editar_senha.php?chave=".$recuperar_senha."<br><br>";
			$mensagem .= "Usuário: ".$email."<br><br>";
			$mensagem .= "Se você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.<br><br>";
			$mensagem .= "Respeitosamente, celke.com.br<br>";

			$Mailer->Body = $mensagem;

			//Corpo da mensagem em texto
			$Mailer->AltBody = 'conteudo do E-mail em texto';

			//Destinatario 
			$Mailer->AddAddress($email);
		
			//Fim Enviar e-mail
			?>
			<!DOCTYPE html>
			<html lang="pt-br">
				<head>
					<meta charset="utf-8">
				</head>

				<body> <?php
					if($Mailer->Send()){
						if(mysqli_affected_rows($conn) != 0){
							$_SESSION['recuperarsenha'] = "Instruções de redefinição de senha foram enviadas para o seu e-mail com Sucesso.";
							echo "
								<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/index.php'>
								<script type=\"text/javascript\">
									alert(\"Instruções de redefinição de senha foram enviadas para o seu e-mail com Sucesso.\");
								</script>
							";	
						}else{
							$_SESSION['recuperarsenha'] = "Instruções de redefinição de senha não foram enviadas para o seu e-mail. Entre em contato cesar@celke.com.br.";
							echo "
								<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/recuperar_senha.php'>
								<script type=\"text/javascript\">
									alert(\"Instruções de redefinição de senha não foram enviadas para o seu e-mail. Entre em contato cesar@celke.com.br.\");
								</script>
							";	
						}
					}else{
						//echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
						$_SESSION['recuperarsenha'] = "Instruções de redefinição de senha não foram enviadas para o seu e-mail. Entre em contato cesar@celke.com.br.";
						echo "
							<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/recuperar_senha.php'>
							<script type=\"text/javascript\">
								alert(\"Instruções de redefinição de senha não foram enviadas para o seu e-mail. Entre em contato cesar@celke.com.br.\");
							</script>
						";
					}?>
				</body>
			</html>
			<?php 
		}else{
			
		}
		$conn->close(); ?>
	</body>
</html>