<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_niveis_acessos = "SELECT * FROM niveis_acessos WHERE id = '$id' LIMIT 1";
	$resultado_niveis_acessos = mysqli_query($conn, $result_niveis_acessos);
	$row_niveis_acessos = mysqli_fetch_assoc($resultado_niveis_acessos);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Usuário</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=6">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			
			<a href="administrativo.php?link=8&id=<?php echo $row_niveis_acessos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			
			<a href="administrativo/processa/adm_apagar_nivel_acesso.php?id=<?php echo $row_niveis_acessos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">	
		<dt>Id: </dt>
		<dd><?php echo $row_niveis_acessos['id']; ?></dd>
		<dt>Nome: </dt>
		<dd><?php echo $row_niveis_acessos['nome']; ?></dd>
		<dt>Inserido: </dt>
		<dd><?php 
			if(isset($row_niveis_acessos['created'])){
				$inserido = $row_niveis_acessos['created'];
				echo date('d/m/Y H:i:s', strtotime($inserido)); 
			}?>
		</dd>
		<dt>Alterado: </dt>
		<dd><?php 
			if(isset($row_niveis_acessos['modified'])){				
				echo date('d/m/Y H:i:s',strtotime($row_niveis_acessos['modified'])); 
			} ?>
		</dd>
	</dl>
</div>