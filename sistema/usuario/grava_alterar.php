<?php 
	ob_start(); 
	include("../../public/class/Usuario.class.php");
	include("../../public/inc/dBug.php");
	#Criar Objeto Usuário
	$objUsuario = new Usuario();
	$objUsuario->setRegistro($_POST['registro']);
	$objUsuario->setNome($_POST['nome']);
	$objUsuario->setEmail($_POST['email']);	
	$objUsuario->setCpf($_POST['cpf']);	
	$objUsuario->setPermissao($_POST['permissao']);		
	$objUsuario->setTelefone($_POST['telefone']);
	$objUsuario->setPagamento($_POST['pagamento']);
	$objUsuario->setRg($_POST['rg']);
	$objUsuario->setSite($_POST['como_conheceu']);
	$msg = $objUsuario->alterar($objUsuario);
	header("Location:".$msg);
?>
