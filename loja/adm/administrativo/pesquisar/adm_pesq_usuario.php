
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
				<input type="text" name="pesquisa" class="form-control" id="pesquisa" placeholder="Nome do Usuários">
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
				<tbody class="resultado">
					
				</tbody>
			</table>
        </div>
	</div>
</div>