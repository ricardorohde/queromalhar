<?php 
	ob_start(); 
	include("../../public/class/Usuario.class.php");
	#Criar Objeto Usu�rio
	$objUsuario = new Usuario();
	$objUsuario->setRegistro($_GET['registro']);
	$msg = $objUsuario->excluir($objUsuario);	
	header("Location:".$msg);
?>
	
