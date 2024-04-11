<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_usuario = "SELECT * FROM usuarios WHERE id = '$id' LIMIT 1";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	$row_usuario = mysqli_fetch_assoc($resultado_usuario);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Meu Perfil</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="cliente.php?link=3&id=<?php echo $row_usuario["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">		
		<dt>Número da Inscrição: </dt>
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
		<dt>Foto: </dt>
		<dd>
			<?php if($row_usuario['foto'] == ""){ ?>
				<a href="cliente.php?link=3&id=<?php echo $row_usuario["id"]; ?>">
					<img src="cliente/foto/icone-perfil.png" width="100" height="100">
				</a>
			<?php }else{ ?>
				<img src="cliente/foto/<?php echo $row_usuario['foto']; ?>" width="100" height="100">
			<?php }?>			
		</dd>
	</dl>
</div>