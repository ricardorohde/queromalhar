<?php 
	ob_start(); 
	include("../../public/class/Enquete.class.php");
	#Criar Objeto Enquete
	$objEnquete = new Enquete();
	$objEnquete->setRegistro($_GET['registro']);
	$msg = $objEnquete->excluir($objEnquete);	
	header("Location:".$msg);
?>
	
