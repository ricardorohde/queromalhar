<?php 
	ob_start(); 
	include("../../public/class/Newsletter.class.php");
	#Criar Objeto Newsletter
	$objNewsletter = new Newsletter();
	$objNewsletter->setNome($_POST['nome']);
	$objNewsletter->setEmail($_POST['email']);
	$msg = $objNewsletter->cadastrar($objNewsletter);
	header("Location:".$msg);
?>