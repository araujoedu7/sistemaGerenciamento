<?php
	if(!empty($_GET['id'])){
		$id = $_GET['id'];
		//Buscar os dados referente ao usuario situado neste id
		$result_situacoes = "SELECT * FROM situacoes WHERE id = '$id' LIMIT 1";
		$resultado_situacoes = mysqli_query($conn, $result_situacoes);
		$row_situacoes = mysqli_fetch_assoc($resultado_situacoes);	
	}
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Editar Situação</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=10"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form name="adm_cad_situacoes" class="form-horizontal" method="POST" action="administrativo/processa/adm_proc_edita_situacoes.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
				<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome" required
				<?php
					if(!empty($row_situacoes['nome'])){
						echo "value='".$row_situacoes['nome']."'";
					}
					if(!empty($_SESSION['value_nome'])){
						echo "value='".$_SESSION['value_nome']."'";
						unset($_SESSION['value_nome']);
					}
				?>					
				/>
				<?php 
					if(!empty($_SESSION['usuario_nome_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['usuario_nome_vazio']."</p>";
						unset($_SESSION['usuario_nome_vazio']);
					}
				?>
			</div>
		</div>
				
		<input type="hidden" name="id" 
			<?php
				if(!empty($_SESSION['value_id'])){
					echo "value='".$_SESSION['value_id']."'";
					unset($_SESSION['value_id']);
				}
				if(!empty($row_situacoes['id'])){
					echo "value='".$row_situacoes['id']."'";
				}
			?>>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-warning" value="Editar" onclick="return val_adm_cad_situacoes()">
			</div>
		</div>
	</form>
</div>