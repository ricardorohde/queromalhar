<?php 
	ob_start(); 
	include("../../public/class/Servico.class.php");
	#Criar Objeto Servico
	$objPersonal = new Servico();
	$objPersonal->setRegistro($_GET['registro']);
	$imagem = $objPersonal->verificarImagem($objPersonal);
	$objPersonal->setImagem($imagem);
	$objPersonal->apagarImagem($objPersonal);
	$msg = $objPersonal->excluir($objPersonal);
	header("Location:".$msg);
?>