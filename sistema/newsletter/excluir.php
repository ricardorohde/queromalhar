<?php 
	ob_start(); 
	include("../../public/class/Newsletter.class.php");
	#Criar Objeto Newsletter
	$objNewsletter = new Newsletter();
	$objNewsletter->setRegistro($_GET['registro']);
	$msg = $objNewsletter->excluir($objNewsletter);	
	header("Location:".$msg);
?>
	
