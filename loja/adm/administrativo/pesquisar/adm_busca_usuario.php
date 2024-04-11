<?php
	//Conexao com banco de dados
	include_once('../../conexao/conexao.php');
	
	//Recuperar o valor da palavra
	$usuarios = $_POST['palavra'];
	
	//Pesquisar no banco de dados o nome do usuario referente a palavra digitada
	$result_usuarios = "SELECT * FROM usuarios WHERE nome LIKE '%$usuarios%'";
	$resultado_usuarios = mysqli_query($conn, $result_usuarios);
	
	if(mysqli_num_rows($resultado_usuarios) <= 0 ){
		echo "Nenhum usuario encontrado";
	}else{
		while($rows_usuarios = mysqli_fetch_assoc($resultado_usuarios)){
			echo "<tr>";
			echo "<td class='text-center'>".$rows_usuarios['id']."</td>";
			echo "<td class='text-center'>".$rows_usuarios['nome']."</td>";
			echo "<td class='text-center'>".$rows_usuarios['email']."</td>";
			echo "<td class='text-center'>".$rows_usuarios['situacoe_id']."</td>";
			echo "<td class='text-center'>".$rows_usuarios['niveis_acesso_id']."</td>";
			echo "<td class='text-center'>".date('d/m/Y H:i:s',strtotime($rows_usuarios["created"]))."</td>";
			echo "<td class='text-center'> 
				<a href='administrativo.php?link=5&id=".$rows_usuarios['id']."'>
					<button type='button' class='btn btn-xs btn-primary'>
						Visualizar
					</button>
				</a>
				<a href='administrativo.php?link=4&id=".$rows_usuarios['id']."'>
					<button type='button' class='btn btn-xs btn-warning'>
						Editar
					</button>
				</a>
				<a href='administrativo/processa/adm_apagar_usuario.php?id=".$rows_usuarios['id']."'>
					<button type='button' class='btn btn-xs btn-danger'>
						Apagar
					</button>
				</a></td>";
			echo "</tr>";
		}
	}
?>