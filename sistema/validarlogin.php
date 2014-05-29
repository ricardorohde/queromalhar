<?php
	ob_start(); 
	include("../public/class/Sessao.class.php");
	$objSessao = new Sessao();
	$objSessao->setCpf($_POST['usuario']);	
	$objSessao->setSenha($_POST['senha']);
	$query = $objSessao->login($objSessao);
	$linhas = $objSessao->totalRegistros($query);
	if($linhas == 1){
		//Retorna os dados do banco
		$sessao = $objSessao->mostraRegistros($query);
		//Inicia a sessão
		$objSessao->iniciarSessao();
		//Registra os dados do usuário na sessão
		$_SESSION['usuario'] = $sessao['usu_nu'];
		$_SESSION['nome']	= $sessao['usu_nome'];
		$_SESSION['permissao']	= $sessao['usu_permissao'];
		$_SESSION['login']	= "True";

		//Redireciona para o index
		header("Location:index_adm.php");
	} else {
		//Caso nenhuma linha seja retornada emite o alerta e retorna
		header("Location: index.php?logado=1");
	 }
?>

