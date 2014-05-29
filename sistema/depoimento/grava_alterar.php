<?php 
	ob_start(); 
	include("../../public/class/Depoimento.class.php");
	#Criar Objeto Depoimento
	$objDepoimento = new Depoimento();
	$objDepoimento->setRegistro($_POST['registro']);
	$objDepoimento->setNota($_POST[nota]);
	$objDepoimento->setNome($_POST['nome']);
	$objDepoimento->setAcademia($_POST['academia']);
	$objDepoimento->setAula($_POST['aula']);
	$objDepoimento->setIndicar($_POST['indicar']);
	$objDepoimento->setDepoimento($_POST['depoimento']);
	$objDepoimento->setStatus($_POST['status']);	
	$msg = $objDepoimento->alterar($objDepoimento);
	header("Location:".$msg);
?>