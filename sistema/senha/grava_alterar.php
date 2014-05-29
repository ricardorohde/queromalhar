<?php 
	ob_start(); 
	include("../../public/class/Usuario.class.php");
	#Criar Objeto Usuário
	$objUsuario = new Usuario();
	$objUsuario->setRegistro(base64_encode($_POST['registro']));
	$objUsuario->setSenha($_POST['senha']);	
	$msg = $objUsuario->alterarSenha($objUsuario);
	header("Location:".$msg);
?>


