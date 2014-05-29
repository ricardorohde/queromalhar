//Imagem Loading Jquery
$(function() {
$("#loading").bind("ajaxSend", function(){
   $(this).show();
 }).bind("ajaxComplete", function(){
	$(this).hide();
 });
} );

//Excluir Registro
$(document).ready(function(){
  $(".excluir").click(function(){
	  if (!confirm("Você tem certeza que deseja excluir?")){
  		return false;
  	  }
  });
});

// Máscara
$(document).ready(function(){
	$("#telefone,#telefone_usuario,#celular,#fax").mask("(99)9999-9999");
	$("#cpf").mask("999.999.999-99");
	$("#cep").mask("99999-999");
	$("#data").mask("99/99/9999");
});

// Máscara Money
$(document).ready(function(){
  $('#valor').priceFormat({
	  prefix: 'R$',
	  centsSeparator: ',',
	  thousandsSeparator: '.'
  });
});

// Exibir conteúdo oculto
function abre_conteudo(id,tipo){
  if(tipo == 1){
	  document.getElementById("conteudo"+id).style.display = "";
	  document.getElementById("seta_cima"+id).style.display = "";
	  document.getElementById("seta_baixo"+id).style.display = "none";
  } else {
	  document.getElementById("conteudo"+id).style.display = "none";
	  document.getElementById("seta_cima"+id).style.display = "none";
	  document.getElementById("seta_baixo"+id).style.display = "";
  }
}

// Refresh no Combo Municipio ao selecionar o estado
function RefreshEstado(){
	form = document.form_servico;
	$.post("mostrarMunicipio.php",{estado:form.estado.value},
	function(data){
		$("#divMunicipio").html(data);
	});
}

//Cadastrar Newsletter
$(document).ready(function(){
	$(".btn_cadastrar_newsletter").click(function(){
	var nome = $("#nome").val();
	var email = $("#email").val();
	$.post("grava_cadastrar.php",{nome:nome, email:email},function(){
		alert(nome);
	});
	return false;
	});
});

// Exibir Enquete Sim Não
function enqueteSN(){
	document.getElementById('multipla').style.display = 'none';
}

// Exibir Enquete Multipla
function enqueteMultipla(){
	document.getElementById('multipla').style.display = '';
}

// Exibir Plano Bronze
function planoBronze(){
	document.getElementById('bronze').style.display = 'none';
	document.getElementById('prata').style.display = 'none';
	document.getElementById('ouro').style.display = 'none';
}

// Exibir Plano Prata
function planoPrata(){
	document.getElementById('bronze').style.display = '';
	document.getElementById('prata').style.display = '';
	document.getElementById('ouro').style.display = 'none';
}

// Exibir Plano Ouro
function planoOuro(){
	document.getElementById('bronze').style.display = '';
	document.getElementById('prata').style.display = '';
	document.getElementById('ouro').style.display = '';
}

// Ajax Paginação Notícia
function paginarNoticia(){
	form = document.form_academia;
	ajax('ajax_academia.php?academia='+form.academia.value,'divNoticia');
}

// Ajax Pesquisar Academia
function pesquisarAcademia(){
	form = document.form_academia;
	ajax('ajax_academia.php?academia='+form.academia.value,'divAcademia');
}

// Ajax Pesquisar Fisoterapeuta
function pesquisarFisioterapeuta(){
	form = document.form_fisioterapeuta;
	ajax('ajax_fisioterapeuta.php?fisioterapeuta='+form.fisioterapeuta.value,'divFisioterapeuta');
}

// Ajax Pesquisar Loja Esportiva
function pesquisarLoja(){
	form = document.form_loja;
	ajax('ajax_loja.php?loja='+form.loja.value,'divLoja');
}

// Ajax Pesquisar Nutricionista
function pesquisarNutricionista(){
	form = document.form_nutricionista;
	ajax('ajax_nutricionista.php?nutricionista='+form.nutricionista.value,'divNutricionista');
}

// Ajax Pesquisar Personal
function pesquisarPersonal(){
	form = document.form_personal;
	ajax('ajax_personal.php?personal='+form.personal.value,'divPersonal');
}

// Ajax Pesquisar Spa
function pesquisarSpa(){
	form = document.form_spa;
	ajax('ajax_spa.php?spa='+form.spa.value,'divSpa');
}

// Ajax Pesquisar Dica
function pesquisarDica(){
	form = document.form_dica;
	ajax('pesquisar.php?fonte='+form.fonte.value,'divDica');
}

// Ajax Pesquisar Banner
function pesquisarBanner(){
	form = document.form_banner;
	ajax('pesquisar.php?nome='+form.nome.value,'divBanner');
}

// Ajax Pesquisar Tipo Serviço
function pesquisarTipoServico(){
	form = document.form_tipo_servico;
	ajax('pesquisar.php?nome='+form.nome.value,'divTipoServico');
}

// Ajax Pesquisar Usuário
function pesquisarUsuario(){
	form = document.form_usuario;
	ajax('pesquisar.php?nome='+form.nome.value,'divUsuario');
}

// Ajax Pesquisar Depoimento
function pesquisarDepoimento(){
	form = document.form_depoimento;
	ajax('pesquisar.php?nome='+form.nome.value,'divDepoimento');
}

// Ajax Pesquisar Pagamento
function pesquisarPagamento(){
	form = document.form_pagamento;
	ajax('pesquisar.php?usuario='+form.usuario.value,'divPagamento');
}

// Ajax Pesquisar Enquete
function pesquisarEnquete(){
	form = document.form_enquete;
	ajax('pesquisar.php?nome='+form.nome.value,'divEnquete');
}

// Ajax Pesquisar Newsletter
function pesquisarNewsletter(){
	form = document.form_newsletter;
	ajax('pesquisar.php?nome='+form.nome.value,'divNewsletter');
}

// Ajax Pesquisar Notícia
function pesquisarNoticia(){
	form = document.form_noticia;
	ajax('pesquisar.php?titulo='+form.titulo.value,'divNoticia');
}

// Ajax Pesquisar Preço
function pesquisarPreco(){
	form = document.form_preco;
	ajax('pesquisar.php?produto='+form.produto.value,'divPreco');
}

// Ajax Pesquisar História
function pesquisarHistoria(){
	form = document.form_historia;
	ajax('pesquisar.php?titulo='+form.titulo.value,'divHistoria');
}

// Ajax Pesquisar Evento
function pesquisarEvento(){
	form = document.form_evento;
	ajax('pesquisar.php?nome='+form.nome.value,'divEvento');
}

// Voltar Página
function voltarPagina(aURL) {
      location.href = aURL;
}

//Validação da Data
function ValidaData(campo){
dia_inicio=campo.value.substr(0,2);
mes_inicio=campo.value.substr(3,2);
ano_inicio=campo.value.substr(6,4);  
if(campo.value != ''){
 if (campo.value.length!=10) 
 { 
  //alert("A data " + msg + " deve obedecer o formato:(dd/mm/aaaa).");
  alert("Data Inválida!");
  campo.select();
  return false;
 } 
 //Validação do dia
 if (
  (dia_inicio<1)||
  ((dia_inicio>30)&&((mes_inicio==2)||(mes_inicio==4)||(mes_inicio==6)||(mes_inicio==9)||(mes_inicio==11) ))||
  ((dia_inicio>31)&&((mes_inicio==1)||(mes_inicio==3)||(mes_inicio==5)||(mes_inicio==7)||(mes_inicio==8)||(mes_inicio==10)||(mes_inicio==12) ))||
  ((dia_inicio>28)&&(mes_inicio==2)&&((ano_inicio % 4)!=0))||
  ((dia_inicio>29)&&(mes_inicio==2)&&((ano_inicio % 4)==0)))
 {
  if (mes_inicio!=2)
  	//alert("O dia " + msg + " deve estar entre 01-31.");
   alert("Data Inválida!");
  else
   //alert("O dia deve estar entre 01-28.");  
 	alert("Data Inválida!");
  campo.select();
  return false;
 }

 //Validacao do mês
 if ((mes_inicio<1)||(mes_inicio>12)){
 	// alert("O mês " + msg + " deve estar entre 01-12.");  
	 alert("Data Inválida!");
  campo.select();
  return false;
 }
}
return true;
}

// Submit do Formulário Efetuar Login
function Login(){
	if (ValidarLogin()){
	document.form_login.submit();
	}
}
 
//Submit do Formulário Enviar Newsletter
function Newsletter(){
	if (ValidarNewsletter()){
		document.form_newsletter.submit();
	}
}

//Submit do Formulário Enviar Fale Conosco
function FaleConosco(){
	if (ValidarFaleConosco()){
		document.form_faleconosco.submit();
	}
}

//Submit do Formulário Enviar Academia
function Academia(){
	if (ValidarAcademia()){
		document.form_servico.submit();
	}
}

// Submit do Formulário Enviar Fisoterapeuta
function Fisioterapeuta(){
	if (ValidarFisioterapeuta()){
		document.form_servico.submit();
	}
}

//Submit do Formulário Enviar Loja
function Loja(){
	if (ValidarLoja()){
		document.form_servico.submit();
	}
}

//Submit do Formulário Enviar Nutricionista
function Nutricionista(){
	if (ValidarNutricionista()){
		document.form_servico.submit();
	}
}

//Submit do Formulário Enviar Personal
function Personal(){
	if (ValidarPersonal()){
		document.form_servico.submit();
	}
}

//Submit do Formulário Enviar Spa
function Spa(){
	if (ValidarSpa()){
		document.form_servico.submit();
	}
}

//Submit do Formulário Enviar Enquete
function Enquete(){
	if (ValidarVotacao()){
		document.form_enquete.submit();
	}
}

// Submit do Formulário Enviar Depoimento
function Depoimento(){
	if (ValidarDepoimento()){
		document.form_depoimento.submit();
	}
}

// Submit do Formulário Enviar História
function Historia(){
	if (ValidarHistoria()){
		document.form_historia.submit();
	}
}
 
// Validação do Formulário Efetuar Login
function ValidarLogin() {
   CPF = document.form_login.usuario.value;
   CPF = CPF.replace( ".", "" );
   CPF = CPF.replace( ".", "" );
   CPF = CPF.replace( "-", "" );
	if (document.form_login.usuario.value == ""){
			alert ("Informe o Login!");
			document.form_login.usuario.focus();
			return false;
		}		
		if (CPF.length != 11 || CPF == "00000000000" || CPF == "11111111111" || CPF == "22222222222" ||	CPF == "33333333333" || CPF == "44444444444" ||	CPF == "55555555555" || CPF == "66666666666" || CPF == "77777777777" ||	CPF == "88888888888" || CPF == "99999999999"){
		     alert('Login Inválido !');
		     document.form_login.usuario.focus();
		     return false;
		   }
			soma = 0;
			for (i=0; i < 9; i ++)
				soma += parseInt(CPF.charAt(i)) * (10 - i);
			resto = 11 - (soma % 11);
			if (resto == 10 || resto == 11)
				resto = 0;
			if (resto != parseInt(CPF.charAt(9)))
			  {
			    alert('Login Inválido !');
				document.form_login.usuario.focus();
				return false;
			  }
			soma = 0;
			for (i = 0; i < 10; i ++)
				soma += parseInt(CPF.charAt(i)) * (11 - i);
			resto = 11 - (soma % 11);
			if (resto == 10 || resto == 11)
				resto = 0;
			if (resto != parseInt(CPF.charAt(10)))
			  {
				alert('Login Inválido !');
				document.form_login.usuario.focus();
				return false;
			  }		
		if (document.form_login.senha.value == ""){
			alert ("Informe a Senha!");
			document.form_login.senha.focus();
			return false;
		}		
	return true;
} 

// Validação do Formulário Enviar Newsletter	
function ValidarNews() {
	if (document.form_news.nome.value == ""){
		alert ("Informe o Nome!");
		document.form_news.nome.focus();
		return false;
	}		
	if (document.form_news.email.value == ""){
		alert ("Informe o E-Mail!");
		document.form_news.email.focus();
		return false;
	}	
	//Valida o Campo E-mail
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.form_news.email.value))
	   		{

      		}
  	else
	   {
        alert("E-mail Inválido!");
		document.form_news.email.focus();
		return false;
	   }			
	 //Fim Valida E-mail	
	 return true;
}

// Validação do Formulário Fale Conosco	
function ValidarFaleConosco() {
   if (document.form_faleconosco.nome.value == ""){
		alert ("Informe o Nome!");
		document.form_faleconosco.nome.focus();
		return false;
	}
	if (document.form_faleconosco.email.value == ""){
		alert ("Informe o E-mail!");
		document.form_faleconosco.email.focus();
		return false;
	}	
	//Valida o Campo E-mail
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.form_faleconosco.email.value)) {
    } else {
        alert("E-mail Inválido!");
		document.form_faleconosco.email.focus();
		return false;
	} //Fim Valida E-mail	
	if (document.form_faleconosco.assunto.value == ""){
		alert ("Informe o Assunto!");
		document.form_faleconosco.assunto.focus();
		return false;
	}	 
	if (document.form_faleconosco.mensagem.value == ""){
		alert ("Informe a Mensagem!");
		document.form_faleconosco.mensagem.focus();
		return false;
	}	
	return true;
} 

// Validação do Formulário Votação
function ValidarEnquete() {
	var controle = 0;
	for (i=0; i < document.form_enquete.elements.length;i++){
		if (document.form_enquete.elements[i].type == "radio"){
		if (document.form_enquete.elements[i].checked == true){
			controle++;
			}
		}
	}	
	if (controle <= 0){
		alert("Selecione seu Voto!");
		return false;
	}
	return true;			
}

// Validação do Formulário Cadastrar e Alterar Preço
function ValidarPreco() {	   	
	if (document.form_preco.produto.value == ""){
		alert ("Informe o Produto!");
		document.form_preco.produto.focus();
		return false;
	}		
	if (document.form_preco.valor.value == ""){
		alert ("Informe o Valor!");
		document.form_preco.valor.focus();
		return false;
	}
	
	if (document.form_preco.status.value == ""){
		alert ("Informe o Status!");
		document.form_preco.status.focus();
		return false;
	}
	 return true;				
} 

// Validação do Formulário Cadastrar e Alterar Notícia
function ValidarNoticia() {	   	
	if (document.form_noticia.titulo.value == ""){
		alert ("Informe o Título!");
		document.form_noticia.titulo.focus();
		return false;
	}		
	if (document.form_noticia.texto.value == ""){
		alert ("Informe o Texto!");
		document.form_noticia.texto.focus();
		return false;
	}
	if (document.form_noticia.autor.value == ""){
		alert ("Informe o Autor!");
		document.form_noticia.autor.focus();
		return false;
	}
	if (document.form_noticia.data.value == ""){
		alert ("Informe o Data!");
		document.form_noticia.data.focus();
		return false;
	}
	 return true;				
} 

// Validação do Formulário Cadastrar e Alterar Newsletter
function ValidarNewsletter() {	   	
	if (document.form_newsletter.nome.value == ""){
		alert ("Informe o Nome!");
		document.form_newsletter.nome.focus();
		return false;
	}		
	if (document.form_newsletter.email.value == ""){
		alert ("Informe o E-mail!");
		document.form_newsletter.email.focus();
		return false;
	}
	//Valida o Campo E-mail
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.form_newsletter.email.value)){
    } else {
        alert("E-mail Inválido!");
		document.form_newsletter.email.focus();
		return false;
	}//Fim Valida E-mail	
	 
	 return true;				
} 

// Validação do Formulário Cadastrar e Alterar História
function ValidarHistoria() {	   	
	if (document.form_historia.nome.value == ""){
		alert ("Informe o Nome!");
		document.form_historia.nome.focus();
		return false;
	}		
	if (document.form_historia.email.value == ""){
		alert ("Informe o E-mail!");
		document.form_historia.email.focus();
		return false;
	}
	//Valida o Campo E-mail
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.form_historia.email.value)){
    } else {
        alert("E-mail Inválido!");
		document.form_historia.email.focus();
		return false;
	}//Fim Valida E-mail		
	if (document.form_historia.titulo.value == ""){
		alert ("Informe o Título!");
		document.form_historia.titulo.focus();
		return false;
	}	
	if (document.form_historia.historia.value == ""){
		alert ("Informe a História!");
		document.form_historia.historia.focus();
		return false;
	}
	if (document.form_historia.data.value == ""){
		alert ("Informe a Data!");
		document.form_historia.data.focus();
		return false;
	}
	if (document.form_historia.fonte.value == ""){
		alert ("Informe a Fonte!");
		document.form_historia.fonte.focus();
		return false;
	}
	 return true;				
} 

// Validação do Formulário Cadastrar e Alterar Evento
function ValidarEvento() {	   	
	if (document.form_evento.nome.value == ""){
		alert ("Informe o Nome!");
		document.form_evento.nome.focus();
		return false;
	}
	if (document.form_evento.local.value == ""){
		alert ("Informe o Local!");
		document.form_evento.local.focus();
		return false;
	}
	if (document.form_evento.informacao.value == ""){
		alert ("Informe a Informação!");
		document.form_evento.informacao.focus();
		return false;
	}
	if (document.form_evento.data.value == ""){
		alert ("Informe o Data!");
		document.form_evento.data.focus();
		return false;
	}
	 return true;				
}

// Validação do Formulário Cadastrar e Alterar Enquete
function ValidarEnquete() {
	if (document.form_enquete.pergunta.value == ""){
		alert ("Informe a Pergunta!");
		document.form_enquete.pergunta.focus();
		return false;
	}		
	var controle = 0;
	for (i=0; i < document.form_enquete.elements.length;i++){
		if (document.form_enquete.elements[i].type == "radio"){
		if (document.form_enquete.elements[i].checked == true){
			controle++;
			}
		}
	}	
	if (controle <= 0){
		alert("Selecione uma das opções");
		return false;
	}
	if (document.form_enquete.resposta1.value == ""){
		alert ("Informe a Resposta 1!");
		document.form_enquete.resposta1.focus();
		return false;
		}	
	if (document.form_enquete.resposta2.value == ""){
		alert ("Informe a Resposta 2!");
		document.form_enquete.resposta2.focus();
		return false;
		}		
	if (document.form_enquete.resposta3.value == ""){
		alert ("Informe a Resposta 3!");
		document.form_enquete.resposta3.focus();
		return false;
		}		
	if (document.form_enquete.resposta4.value == ""){
		alert ("Informe a Resposta 4!");
		document.form_enquete.resposta4.focus();
		return false;
	}			
	return true;			
}

// Validação do Formulário Cadastrar e Alterar Depoimento
function ValidarDepoimento() {	   	
	if (document.form_depoimento.nome.value == ""){
		alert ("Informe o Nome!");
		document.form_depoimento.nome.focus();
		return false;
	}		
	if (document.form_depoimento.academia.value == ""){
		alert ("Informe a Academia!");
		document.form_depoimento.academia.focus();
		return false;
	}
	if (document.form_depoimento.aula.value == ""){
		alert ("Informe as Aulas Praticadas!");
		document.form_depoimento.aula.focus();
		return false;
	}
	if (document.form_depoimento.depoimento.value == ""){
		alert ("Informe o Depoimento!");
		document.form_depoimento.depoimento.focus();
		return false;
	}
	if (document.form_depoimento.nota.value == ""){
		alert ("Informe a Nota!");
		document.form_depoimento.nota.focus();
		return false;
	}
	var controle = 0;
	for (i=0; i < document.form_depoimento.elements.length;i++){
		if (document.form_depoimento.elements[i].type == "radio"){
		if (document.form_depoimento.elements[i].checked == true){
			controle++;
			}
		}
	}	
	if (controle <= 0){
		alert("Indica a Academia?");
		return false;
	}
	if (document.form_depoimento.status.value == ""){
		alert ("Informe o Status!");
		document.form_depoimento.status.focus();
		return false;
	}
	 return true;				
} 

// Validação do Formulário Cadastrar e Alterar Banner
function ValidarBanner() {	   	
	if (document.form_banner.nome.value == ""){
		alert ("Informe o Nome!");
		document.form_banner.nome.focus();
		return false;
	}		
	if (document.form_banner.tipo.value == ""){
		alert ("Informe o Tipo!");
		document.form_banner.tipo.focus();
		return false;
	}	
	if (document.form_banner.formato.value == ""){
		alert ("Informe o Formato!");
		document.form_banner.formato.focus();
		return false;
	}	
	if (document.form_banner.url.value == ""){
		alert ("Informe a URL!");
		document.form_banner.url.focus();
		return false;
	}
	 return true;				
} 

// Validação do Formulário Cadastrar e Alterar Pagamento
function ValidarPagamento() {	   	
	if (document.form_pagamento.usuario.value == ""){
		alert ("Informe o Usuário!");
		document.form_pagamento.usuario.focus();
		return false;
	}		
	if (document.form_pagamento.mes.value == ""){
		alert ("Informe o Mês!");
		document.form_pagamento.mes.focus();
		return false;
	}	
	if (document.form_pagamento.valor.value == ""){
		alert ("Informe o valor!");
		document.form_pagamento.valor.focus();
		return false;
	}	
	if (document.form_pagamento.vencimento.value == ""){
		alert ("Informe a Data Vencimento!");
		document.form_pagamento.vencimento.focus();
		return false;
	}
	if (document.form_pagamento.status.value == ""){
		alert ("Informe a Status!");
		document.form_pagamento.status.focus();
		return false;
	}
	if (document.form_pagamento.tipo.value == ""){
		alert ("Informe o Tipo!");
		document.form_pagamento.tipo.focus();
		return false;
	}	
	 return true;				
} 

// Validação do Formulário Alterar Senha
function ValidarSenha(){
	if(document.form_altera_senha.senha.value == ""){
		alert("Informe a Senha !");
		document.form_altera_senha.senha.focus();
		return false;
	}
	if(document.form_altera_senha.confirma_senha.value == ""){
		alert("Confirme a Senha!");
		document.form_altera_senha.confirma_senha.focus();
		return false;
	}
	if(document.form_altera_senha.confirma_senha.value != document.form_altera_senha.senha.value) {
		alert("Senha Informada não Confere !");
		document.form_altera_senha.confirma_senha.focus();
		return false;
	}
	return true;
}

// Validação do Formulário Votação
function ValidarVotacao() {
	var controle = 0;
	for (i=0; i < document.form_enquete.elements.length;i++){
		if (document.form_enquete.elements[i].type == "radio"){
		if (document.form_enquete.elements[i].checked == true){
			controle++;
			}
		}
	}	
	if (controle <= 0){
		alert("Selecione seu Voto!");
		return false;
	}
	return true;			
}

// Validação do Formulário Cadastrar e Alterar Academia
function ValidarAcademia() {	   	
	if (document.form_servico.empresa.value == ""){
		alert ("Informe a Empresa!");
		document.form_servico.empresa.focus();
		return false;
	}		
	if (document.form_servico.telefone.value == ""){
		alert ("Informe o Telefone!");
		document.form_servico.telefone.focus();
		return false;
	}	
	if (document.form_servico.endereco.value == ""){
		alert ("Informe o Endereco!");
		document.form_servico.endereco.focus();
		return false;
	}	
	if (document.form_servico.cep.value == ""){
		alert ("Informe o CEP!");
		document.form_servico.cep.focus();
		return false;
	}
	if (document.form_servico.estado.value == ""){
		alert ("Informe o Estado!");
		document.form_servico.estado.focus();
		return false;
	}
	if (document.form_servico.municipio.value == ""){
		alert("Informe o Município!");
		document.form_servico.municipio.focus();
		return false;
	}	
	if (document.form_servico.modalidade.value == ""){
		alert ("Informe a Modalidade!");
		document.form_servico.modalidade.focus();
		return false;
	}		
	 return true;				
} 

// Validação do Formulário Cadastrar e Alterar Fisioterapeuta
function ValidarFisioterapeuta() {	   	
	if (document.form_servico.empresa.value == ""){
		alert ("Informe a Empresa!");
		document.form_servico.empresa.focus();
		return false;
	}		
	if (document.form_servico.telefone.value == ""){
		alert ("Informe o Telefone!");
		document.form_servico.telefone.focus();
		return false;
	}	
	if (document.form_servico.endereco.value == ""){
		alert ("Informe o Endereco!");
		document.form_servico.endereco.focus();
		return false;
	}	
	if (document.form_servico.cep.value == ""){
		alert ("Informe o CEP!");
		document.form_servico.cep.focus();
		return false;
	}
	if (document.form_servico.estado.value == ""){
		alert ("Informe o Estado!");
		document.form_servico.estado.focus();
		return false;
	}
	if (document.form_servico.municipio.value == ""){
		alert ("Informe o Município!");
		document.form_servico.municipio.focus();
		return false;
	}		
	if (document.form_servico.sexo.value == ""){
		alert ("Informe o Sexo!");
		document.form_servico.sexo.focus();
		return false;
	}		
	 return true;				
}

// Validação do Formulário Cadastrar e Alterar Loja
function ValidarLoja() {	   	
	if (document.form_servico.empresa.value == ""){
		alert ("Informe a Empresa!");
		document.form_servico.empresa.focus();
		return false;
	}		
	if (document.form_servico.telefone.value == ""){
		alert ("Informe o Telefone!");
		document.form_servico.telefone.focus();
		return false;
	}	
	if (document.form_servico.endereco.value == ""){
		alert ("Informe o Endereco!");
		document.form_servico.endereco.focus();
		return false;
	}	
	if (document.form_servico.cep.value == ""){
		alert ("Informe o CEP!");
		document.form_servico.cep.focus();
		return false;
	}
	if (document.form_servico.estado.value == ""){
		alert ("Informe o Estado!");
		document.form_servico.estado.focus();
		return false;
	}
	if (document.form_servico.municipio.value == ""){
		alert ("Informe o Município!");
		document.form_servico.municipio.focus();
		return false;
	}	
	 return true;				
} 


// Validação do Formulário Cadastrar e Alterar Nutricionista
function ValidarNutricionista() {	   	
	if (document.form_servico.empresa.value == ""){
		alert ("Informe a Empresa!");
		document.form_servico.empresa.focus();
		return false;
	}		
	if (document.form_servico.telefone.value == ""){
		alert ("Informe o Telefone!");
		document.form_servico.telefone.focus();
		return false;
	}	
	if (document.form_servico.endereco.value == ""){
		alert ("Informe o Endereco!");
		document.form_servico.endereco.focus();
		return false;
	}	
	if (document.form_servico.cep.value == ""){
		alert ("Informe o CEP!");
		document.form_servico.cep.focus();
		return false;
	}
	if (document.form_servico.estado.value == ""){
		alert ("Informe o Estado!");
		document.form_servico.estado.focus();
		return false;
	}
	if (document.form_servico.municipio.value == ""){
		alert ("Informe o Município!");
		document.form_servico.municipio.focus();
		return false;
	}		
	if (document.form_servico.sexo.value == ""){
		alert ("Informe o Sexo!");
		document.form_servico.sexo.focus();
		return false;
	}		
	 return true;				
}

// Validação do Formulário Cadastrar e Alterar Personal
function ValidarPersonal() {	   	
	if (document.form_servico.empresa.value == ""){
		alert ("Informe a Empresa!");
		document.form_servico.empresa.focus();
		return false;
	}		
	if (document.form_servico.telefone.value == ""){
		alert ("Informe o Telefone!");
		document.form_servico.telefone.focus();
		return false;
	}	
	if (document.form_servico.endereco.value == ""){
		alert ("Informe o Endereco!");
		document.form_servico.endereco.focus();
		return false;
	}	
	if (document.form_servico.cep.value == ""){
		alert ("Informe o CEP!");
		document.form_servico.cep.focus();
		return false;
	}
	if (document.form_servico.estado.value == ""){
		alert ("Informe o Estado!");
		document.form_servico.estado.focus();
		return false;
	}
	if (document.form_servico.municipio.value == ""){
		alert ("Informe o Município!");
		document.form_servico.municipio.focus();
		return false;
	}		
	if (document.form_servico.sexo.value == ""){
		alert ("Informe o Sexo!");
		document.form_servico.sexo.focus();
		return false;
	}		
	 return true;				
}

// Validação do Formulário Cadastrar e Alterar Spa
function ValidarSpa() {	   	
	if (document.form_servico.empresa.value == ""){
		alert ("Informe a Empresa!");
		document.form_servico.empresa.focus();
		return false;
	}		
	if (document.form_servico.telefone.value == ""){
		alert ("Informe o Telefone!");
		document.form_servico.telefone.focus();
		return false;
	}	
	if (document.form_servico.endereco.value == ""){
		alert ("Informe o Endereco!");
		document.form_servico.endereco.focus();
		return false;
	}	
	if (document.form_servico.cep.value == ""){
		alert ("Informe o CEP!");
		document.form_servico.cep.focus();
		return false;
	}
	if (document.form_servico.estado.value == ""){
		alert ("Informe o Estado!");
		document.form_servico.estado.focus();
		return false;
	}
	if (document.form_servico.municipio.value == ""){
		alert ("Informe o Município!");
		document.form_servico.municipio.focus();
		return false;
	}	
	 return true;				
} 