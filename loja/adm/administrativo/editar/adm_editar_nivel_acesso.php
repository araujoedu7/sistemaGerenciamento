<?php
	if(!empty($_GET['id'])){
		$id = $_GET['id'];
		//Buscar os dados referente ao usuario situado neste id
		$result_niveis_acessos = "SELECT * FROM niveis_acessos WHERE id = '$id' LIMIT 1";
		$resultado_niveis_acessos = mysqli_query($conn, $result_niveis_acessos);
		$row_niveis_acessos = mysqli_fetch_assoc($resultado_niveis_acessos);	
	}
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Editar Nivel de Acesso</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=6"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form name="adm_cad_nivel_acesso" class="form-horizontal" method="POST" action="administrativo/processa/adm_proc_edita_nivel_acesso.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
				<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome Completo" required
				<?php
					if(!empty($row_niveis_acessos['nome'])){
						echo "value='".$row_niveis_acessos['nome']."'";
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
				if(!empty($row_niveis_acessos['id'])){
					echo "value='".$row_niveis_acessos['id']."'";
				}
			?>>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-warning" value="Alterar" onclick="return val_cad_nivel_acesso()">
			</div>
		</div>
	</form>
</div>