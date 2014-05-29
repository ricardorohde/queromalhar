<?php 
	ob_start(); 
	include("../../public/class/Servico.class.php");
	#Criar Objeto Servico
	$objNutricionista = new Servico();
	$objNutricionista->setRegistro($_GET['registro']);
	$imagem = $objNutricionista->verificarImagem($objNutricionista);
	$objNutricionista->setImagem($imagem);
	$objNutricionista->apagarImagem($objNutricionista);
	$msg = $objNutricionista->excluir($objNutricionista);
	header("Location:".$msg);
?>