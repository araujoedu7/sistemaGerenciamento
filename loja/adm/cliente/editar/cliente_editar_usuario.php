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
	<form class="form-horizontal" method="POST" action="cliente/processa/cliente_proc_edita_usuario.php" enctype="multipart/form-data">
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
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Foto</label>
			<div class="col-sm-10">
				<input type="file" name="arquivo">
			</div>
		</div>
		
		<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-warning">Alterar</button>
				<a href="cliente.php?link=2&id=<?php echo $_SESSION['usuarioId']; ?>">
					<button type="button" class="btn btn-success">Cancelar</button>
				</a>
			</div>
		</div>
	</form>
</div>