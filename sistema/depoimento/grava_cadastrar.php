<?php 
	ob_start(); 
	include("../../public/class/Depoimento.class.php");
	#Criar Objeto Depoimento
	$objDepoimento = new Depoimento();
	$objDepoimento->setUsuario($_POST['usuario']);
	$objDepoimento->setNota($_POST[nota]);
	$objDepoimento->setNome($_POST['nome']);
	$objDepoimento->setAcademia($_POST['academia']);
	$objDepoimento->setAula($_POST['aula']);
	$objDepoimento->setIndicar($_POST['indicar']);	
	$objDepoimento->setDepoimento($_POST['depoimento']);
	$objDepoimento->setStatus('Desativado');	
	$msg = $objDepoimento->cadastrar($objDepoimento);
	header("Location:".$msg);
?>