<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_situacoes = "SELECT * FROM situacoes WHERE id = '$id' LIMIT 1";
	$resultado_situacoes = mysqli_query($conn, $result_situacoes);
	$row_situacoes = mysqli_fetch_assoc($resultado_situacoes);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Situação</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=10">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			
			<a href="administrativo.php?link=12&id=<?php echo $row_situacoes["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			
			<a href="administrativo/processa/adm_apagar_situacoes.php?id=<?php echo $row_situacoes["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">
		<dt>Id: </dt>
		<dd><?php echo $row_situacoes['id']; ?></dd>
		<dt>Nome: </dt>
		<dd><?php echo $row_situacoes['nome']; ?></dd>
		<dt>Inserido: </dt>
		<dd><?php 
			if(isset($row_situacoes['created'])){
				$inserido = $row_situacoes['created'];
				echo date('d/m/Y H:i:s', strtotime($inserido)); 
			}?>
		</dd>
		<dt>Alterado: </dt>
		<dd><?php 
			if(isset($row_situacoes['modified'])){				
				echo date('d/m/Y H:i:s',strtotime($row_situacoes['modified'])); 
			} ?>
		</dd>
	</dl>
</div>