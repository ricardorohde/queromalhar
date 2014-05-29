<?php 
	ob_start(); 
	include("../../public/class/Historia.class.php");
	#Criar Objeto Tipo Anunciante
	$objHistoria = new Historia();
	$objHistoria->setRegistro($_GET['registro']);
	$imagem = $objHistoria->verificarImagem($objHistoria);
	$objHistoria->setImagem($imagem);
	$objHistoria->apagarImagem($objHistoria);
	$msg = $objHistoria->excluir($objHistoria);
	header("Location:".$msg);
?>
	
