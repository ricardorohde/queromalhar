<?php 
	ob_start(); 
	include("../../public/class/Newsletter.class.php");
	#Criar Objeto Newsletter
	$objNewsletter = new Newsletter();
	$objNewsletter->setRegistro($_POST['registro']);
	$objNewsletter->setNome($_POST['nome']);	
	$objNewsletter->setEmail($_POST['email']);
	$msg = $objNewsletter->alterar($objNewsletter);
	header("Location:".$msg);
?>
