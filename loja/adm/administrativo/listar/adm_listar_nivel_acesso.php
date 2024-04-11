<?php
	$result_niveis_acessos = "SELECT * FROM niveis_acessos";
	$resultado_niveis_acessos = mysqli_query($conn , $result_niveis_acessos);
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Lista de Nivel de Acesso</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=7"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Nome</th>
						<th class="text-center">Inserido</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row_niveis_acessos = mysqli_fetch_assoc($resultado_niveis_acessos)){?>
						<tr>
							<td class="text-center"><?php echo $row_niveis_acessos["id"]; ?></td>
							<td class="text-center"><?php echo $row_niveis_acessos["nome"]; ?></td>
							<td class="text-center"><?php echo date('d/m/Y H:i:s',strtotime($row_niveis_acessos["created"])); ?></td>
							<td class="text-center">
								<a href="administrativo.php?link=9&id=<?php echo $row_niveis_acessos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-primary">
										Visualizar
									</button>
								</a>
								<a href="administrativo.php?link=8&id=<?php echo $row_niveis_acessos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-warning">
										Editar
									</button>
								</a>
								<a href="administrativo/processa/adm_apagar_nivel_acesso.php?id=<?php echo $row_niveis_acessos["id"]; ?>">
									<button type="button" class="btn btn-xs btn-danger">
										Apagar
									</button>
								</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
        </div>
	</div>
</div>