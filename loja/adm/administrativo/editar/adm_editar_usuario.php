<?php
	if(!empty($_GET['id'])){
		$id = $_GET['id'];
		//Buscar os dados referente ao usuario situado neste id
		$result_usuario = "SELECT * FROM usuarios WHERE id = '$id' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$row_usuario = mysqli_fetch_assoc($resultado_usuario);	
	}
	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Editar Usuário</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=2"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form name="adm_cad_usuario" class="form-horizontal" method="POST" action="administrativo/processa/adm_proc_edita_usuario.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
				<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome Completo" required
				<?php
					if(!empty($row_usuario['nome'])){
						echo "value='".$row_usuario['nome']."'";
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
		
		<div class="form-group">
			<label class="col-sm-2 control-label">E-mail</label>
			<div class="col-sm-10">
				<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="E-mail" required
				<?php
					if(!empty($_SESSION['value_email'])){
						echo "value='".$_SESSION['value_email']."'";
						unset($_SESSION['value_email']);
					}
					if(!empty($row_usuario['email'])){
						echo "value='".$row_usuario['email']."'";
					}
				?>
				>
				<?php 
					if(!empty($_SESSION['usuario_email_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['usuario_email_vazio']."</p>";
						unset($_SESSION['usuario_email_vazio']);
					}
				?> 
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Senha</label>
			<div class="col-sm-10">
				<input type="password" name="senha" class="form-control" id="inputPassword3" placeholder="Senha" value="" required  
				<?php
					if(!empty($_SESSION['value_senha'])){
						echo "value='".$_SESSION['value_senha']."'";
						unset($_SESSION['value_senha']);
					}
					if(!empty($row_usuario['senha'])){
						echo "value=''";
					}
				?>
				>
				<?php 
					if(!empty($_SESSION['usuario_senha_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['usuario_senha_vazio']."</p>";
						unset($_SESSION['usuario_senha_vazio']);
					}
				?> 
			</div>
		</div>	
		
		<?php if(!empty($row_usuario['situacoe_id'])){
			$situcoe_id = $row_usuario['situacoe_id']; 
		}?>
		<div class="form-group">
			<label class="col-sm-2 control-label">Situação</label>
			<div class="col-sm-10">
				<select class="form-control" name="select_situacao">
					<option value="">Selecione</option>
					<?php
					$result_situacao = "SELECT * FROM situacoes";
					$result_situacao = mysqli_query($conn, $result_situacao);
					while($row_situacoes = mysqli_fetch_assoc($result_situacao)){ ?> 
						<option value="<?php echo $row_situacoes['id']; ?>"<?php
						if(!empty($_SESSION['value_select_situacao'])){
							if($_SESSION['value_select_situacao'] == $row_situacoes['id']){
								echo 'selected';
								unset($_SESSION['value_select_situacao']);
							}
						}
						if(!empty($row_usuario['situacoe_id'])){
							if($situcoe_id == $row_situacoes['id']){
								echo 'selected';
							}
						}
						?> >						
						<?php echo $row_situacoes['nome']; ?></option>
					<?php } ?>
				</select>
				<?php 
					if(!empty($_SESSION['usu_sel_situacao_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['usu_sel_situacao_vazio']."</p>";
						unset($_SESSION['usu_sel_situacao_vazio']);
					}
				?> 
			</div>
		</div>	
		
		<?php if(!empty($row_usuario['niveis_acesso_id'])){
			$niveis_acesso_id = $row_usuario['niveis_acesso_id']; 
		}?>
		<div class="form-group">
			<label class="col-sm-2 control-label">Nivel de Acesso</label>
			<div class="col-sm-10">
				<select class="form-control" name="select_nivel_acesso">
					<option value="">Selecione</option>
					<?php
					$result_niveis_acessos = "SELECT * FROM niveis_acessos";
					$result_niveis_acessos = mysqli_query($conn, $result_niveis_acessos);
					while($row_niveis_acessos = mysqli_fetch_assoc($result_niveis_acessos)){ ?> 
							<option value="<?php echo $row_niveis_acessos['id']; ?>"
							<?php 
							if(!empty($_SESSION['value_select_nivel_acesso'])){
								if($_SESSION['value_select_nivel_acesso'] == $row_niveis_acessos['id']){
									echo 'selected';
									unset($_SESSION['value_select_nivel_acesso']);
								}
							}
							
							if(!empty($row_usuario['niveis_acesso_id'])){
								if($niveis_acesso_id == $row_niveis_acessos['id']){
									echo 'selected';
								}
							}
						
							?> >						
							<?php echo $row_niveis_acessos['nome']; ?></option>
						<?php } ?>
				</select>
				<?php 
					if(!empty($_SESSION['usu_sel_nivel_aces_vazio'])){
						echo "<p style='color: #ff0000; '>".$_SESSION['usu_sel_nivel_aces_vazio']."</p>";
						unset($_SESSION['usu_sel_nivel_aces_vazio']);
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
				if(!empty($row_usuario['id'])){
					echo "value='".$row_usuario['id']."'";
				}
			?>>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-success" value="Editar" onclick="return val_adm_cad_usuario()">
			</div>
		</div>
	</form>
</div>