<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_usuario = "SELECT * FROM usuarios WHERE id = '$id' LIMIT 1";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	$row_usuario = mysqli_fetch_assoc($resultado_usuario);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Editar Usuário</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="colaborador.php?link=2"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form class="form-horizontal" method="POST" action="colaborador/processa/colab_proc_edita_usuario.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
				<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome Completo" value="<?php echo $row_usuario['nome']; ?>">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">E-mail</label>
			<div class="col-sm-10">
				<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="E-mail" value="<?php echo $row_usuario['email']; ?>">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Senha</label>
			<div class="col-sm-10">
				<input type="password" name="senha" class="form-control" id="inputPassword3" placeholder="Senha" value="">
			</div>
		</div>	
		
		<?php $situcoe_id = $row_usuario['situacoe_id']; ?>
		<div class="form-group">
			<label class="col-sm-2 control-label">Situação</label>
			<div class="col-sm-10">
				<select class="form-control" name="select_situacao">
					<option>Selecione</option>
					<?php
					$result_situacao = "SELECT * FROM situacoes";
					$result_situacao = mysqli_query($conn, $result_situacao);
					while($row_situacoes = mysqli_fetch_assoc($result_situacao)){ ?> 
						<option value="<?php echo $row_situacoes['id']; ?>"<?php
						if($situcoe_id == $row_situacoes['id']){
							echo 'selected';
						}?> >						
						<?php echo $row_situacoes['nome']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>	
		
		<?php $niveis_acesso_id =  $row_usuario['niveis_acesso_id']; ?>
		<div class="form-group">
			<label class="col-sm-2 control-label">Nivel de Acesso</label>
			<div class="col-sm-10">
				<select class="form-control" name="select_nivel_acesso">
					<option>Selecione</option>
					<?php
					$result_niveis_acessos = "SELECT * FROM niveis_acessos";
					$result_niveis_acessos = mysqli_query($conn, $result_niveis_acessos);
					while($row_niveis_acessos = mysqli_fetch_assoc($result_niveis_acessos)){ ?> 
							<option value="<?php echo $row_niveis_acessos['id']; ?>"
							<?php if($niveis_acesso_id == $row_niveis_acessos['id']){
								echo 'selected';
							}?> >						
							<?php echo $row_niveis_acessos['nome']; ?></option>
						<?php } ?>
				</select>
			</div>
		</div>
		
		<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-warning">Alterar</button>
			</div>
		</div>
	</form>
</div>