<?php
	$result_situacoes = "SELECT * FROM situacoes";
	$resultado_situacoes = mysqli_query($conn , $result_situacoes);
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Nome do Projeto</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=11"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
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
					<?php while($row_situacoes = mysqli_fetch_assoc($resultado_situacoes)){?>
						<tr>
							<td class="text-center"><?php echo $row_situacoes["id"]; ?></td>
							<td class="text-center"><?php echo $row_situacoes["nome"]; ?></td>
							<td class="text-center"><?php echo date('d/m/Y H:i:s',strtotime($row_situacoes["created"])); ?></td>
							<td class="text-center">
								<a href="administrativo.php?link=13&id=<?php echo $row_situacoes["id"]; ?>">
									<button type="button" class="btn btn-xs btn-primary">
										Visualizar
									</button>
								</a>
								<a href="administrativo.php?link=12&id=<?php echo $row_situacoes["id"]; ?>">
									<button type="button" class="btn btn-xs btn-warning">
										Editar
									</button>
								</a>
								<a href="administrativo/processa/adm_apagar_situacoes.php?id=<?php echo $row_situacoes["id"]; ?>">
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