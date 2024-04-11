$(function(){
	//Ler sempre que o usuario digitar algo
	$("#pesquisa").keyup(function(){
		var pesquisa = $(this).val();
		//Verificar se a variavel pesquisa possui algo
		if(pesquisa != ''){
			var dados = {
				palavra : pesquisa
			}
			$.post('administrativo/pesquisar/adm_busca_usuario.php', dados, function(retorna){
				//Mostrar os dados obtidos
				$(".resultado").html(retorna);
			});
		}else{
			$(".resultado").html('');
		}
	});
});

/*Validar formulário usuário */
function val_adm_cad_usuario(){
	var nome = adm_cad_usuario.nome.value;
	var email = adm_cad_usuario.email.value;
	var senha = adm_cad_usuario.senha.value;
	var select_situacao = adm_cad_usuario.select_situacao.value;
	var select_nivel_acesso = adm_cad_usuario.select_nivel_acesso.value;
	
	if(nome == ""){
		alert("Campo nome é obrigatorio!");
		adm_cad_usuario.nome.focus();
		return false;
	}
	
	if(email == "" || email.indexOf('@') == -1){
		alert("Campo email é obrigatorio!");
		adm_cad_usuario.email.focus();
		return false;
	}
	
	if(senha == "" || senha.length <= 5){
		alert("Campo senha é obrigatorio com minimo 6 caracteres!");
		adm_cad_usuario.senha.focus();
		return false;
	}
	
	if(select_situacao == ""){
		alert("Campo situação é obrigatorio!");
		adm_cad_usuario.select_situacao.focus();
		return false;
	}
	
	if(select_nivel_acesso == ""){
		alert("Campo nivel de acesso é obrigatorio!");
		adm_cad_usuario.select_nivel_acesso.focus();
		return false;
	}
	
}

/*Validar formulário situacao usuário */
function val_adm_cad_situacoes(){
	var nome = adm_cad_situacoes.nome.value;
	
	if(nome == ""){
		alert("Campo nome é obrigatorio!");
		adm_cad_situacoes.nome.focus();
		return false;
	}	
}

/*Validar formulário nivel de acesso usuário */
function val_cad_nivel_acesso(){
	var nome = adm_cad_nivel_acesso.nome.value;
	
	if(nome == ""){
		alert("Campo nome é obrigatorio!");
		adm_cad_nivel_acesso.nome.focus();
		return false;
	}	
}