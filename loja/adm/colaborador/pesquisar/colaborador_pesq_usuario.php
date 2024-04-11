<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Pesquisar de Usuários</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">			
			<a href="colaborador.php?link=2"><button type='button' class='btn btn-sm btn-primary'>Listar</button></a>
			<a href="colaborador.php?link=3"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
	<form class="form-horizontal" method="POST" action="">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
				<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome do Usuários">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-info">Pesquisar</button>
			</div>
		</div>
	</form>
	
		

	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Inscrição</th>
						<th class="text-center">Nome</th>
						<th class="text-center">E-mail</th>
						<th class="text-center">Situação</th>
						<th class="text-center">Nivel de Acesso</th>
						<th class="text-center">Inserido</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php if(isset($_POST['nome'])){
						$pesquisar = $_POST['nome'];
						$result_usuarios = "SELECT * FROM usuarios WHERE nome LIKE '%$pesquisar%'";
						$resultado_usuarios = mysqli_query($conn, $result_usuarios);
						while($row_usuarios = mysqli_fetch_assoc($resultado_usuarios)){ ?>
							<tr>
								<td class="text-center"><?php echo $row_usuarios["id"]; ?></td>
								<td class="text-center"><?php echo $row_usuarios["nome"]; ?></td>
								<td class="text-center"><?php echo $row_usuarios["email"]; ?></td>
								<td class="text-center">
									<?php $situacoe = $row_usuarios["situacoe_id"]; 
										$result_situacoe = "SELECT * FROM situacoes WHERE id = '$situacoe' LIMIT 1";
										$resultado_situacoe = mysqli_query($conn, $result_situacoe);
										$row_situacoe = mysqli_fetch_assoc($resultado_situacoe);
										echo $row_situacoe['nome'];
									?>
								</td>
								<td class="text-center">
									<?php $nivel_acesso = $row_usuarios["niveis_acesso_id"]; 
										$result_nivel_acesso = "SELECT * FROM niveis_acessos WHERE id = '$nivel_acesso' LIMIT 1";
										$resultado_nivel_acesso = mysqli_query($conn, $result_nivel_acesso);
										$row_nivel_acesso = mysqli_fetch_assoc($resultado_nivel_acesso);
										echo $row_nivel_acesso['nome'];
									?>
								</td>
								<td class="text-center"><?php echo date('d/m/Y H:i:s',strtotime($row_usuarios["created"])); ?></td>
								<td class="text-center">
									<a href="colaborador.php?link=5&id=<?php echo $row_usuarios["id"]; ?>">
										<button type="button" class="btn btn-xs btn-primary">
											Visualizar
										</button>
									</a>
									<a href="colaborador.php?link=4&id=<?php echo $row_usuarios["id"]; ?>">
										<button type="button" class="btn btn-xs btn-warning">
											Editar
										</button>
									</a>
									<a href="colaborador/processa/colab_apagar_usuario.php?id=<?php echo $row_usuarios["id"]; ?>">
										<button type="button" class="btn btn-xs btn-danger">
											Apagar
										</button>
									</a>
								</td>
							</tr>
						<?php }
					}?>
				</tbody>
			</table>
        </div>
	</div>
</div>