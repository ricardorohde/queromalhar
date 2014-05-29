<?php 
	ob_start(); 
	include("../../public/class/Depoimento.class.php");
	#Criar Objeto Depoimento
	$objDepoimento = new Depoimento();
	$objDepoimento->setRegistro($_GET['registro']);
	$msg = $objDepoimento->excluir($objDepoimento);	
	header("Location:".$msg);
?>
	
