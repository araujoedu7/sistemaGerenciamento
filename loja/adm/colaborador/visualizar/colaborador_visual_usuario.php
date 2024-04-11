<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_usuario = "SELECT * FROM usuarios WHERE id = '$id' LIMIT 1";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	$row_usuario = mysqli_fetch_assoc($resultado_usuario);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Usuário</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="colaborador.php?link=2">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			
			<a href="colaborador.php?link=4&id=<?php echo $row_usuario["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			
			<a href="colaborador/processa/colab_apagar_usuario.php?id=<?php echo $row_usuario["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_usuario['id']; ?></dd>
		<dt>Nome: </dt>
		<dd><?php echo $row_usuario['nome']; ?></dd>
		<dt>E-mail: </dt>
		<dd><?php echo $row_usuario['email']; ?></dd>
		<dt>Situação: </dt>
		<dd><?php 
			$situacao_atual = $row_usuario['situacoe_id'];
			$result_situacao = "SELECT * FROM situacoes WHERE id = '$situacao_atual'";
			$result_situacao = mysqli_query($conn, $result_situacao);
			$row_situacoes = mysqli_fetch_assoc($result_situacao);
			echo $row_situacoes['nome']; ?>
		</dd>
		<dt>Nivel de Acesso: </dt>
		<dd><?php 
			$niveis_acesso_atual = $row_usuario['niveis_acesso_id'];
			$result_niveis_acesso = "SELECT * FROM niveis_acessos WHERE id = '$niveis_acesso_atual'";
			$result_niveis_acesso = mysqli_query($conn, $result_niveis_acesso);
			$row_niveis_acesso = mysqli_fetch_assoc($result_niveis_acesso);
			echo $row_niveis_acesso['nome']; ?>
		</dd>
		<dt>Inserido: </dt>
		<dd><?php 
			if(isset($row_usuario['created'])){
				$inserido = $row_usuario['created'];
				echo date('d/m/Y H:i:s', strtotime($inserido)); 
			}?>
		</dd>
		<dt>Alterado: </dt>
		<dd><?php 
			if(isset($row_usuario['modified'])){				
				echo date('d/m/Y H:i:s',strtotime($row_usuario['modified'])); 
			} ?>
		</dd>
	</dl>
</div>