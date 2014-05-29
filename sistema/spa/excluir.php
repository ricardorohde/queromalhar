<?php 
	ob_start(); 
	include("../../public/class/Servico.class.php");
	#Criar Objeto Servico
	$objSpa = new Servico();
	$objSpa->setRegistro($_GET['registro']);
	$imagem = $objSpa->verificarImagem($objSpa);
	$objSpa->setImagem($imagem);
	$objSpa->apagarImagem($objSpa);
	$msg = $objSpa->excluir($objSpa);
	header("Location:".$msg);
?>