<?php 
	ob_start(); 
	include("../../public/class/Servico.class.php");
	#Criar Objeto Servico
	$objLoja = new Servico();
	$objLoja->setRegistro($_GET['registro']);
	$imagem = $objLoja->verificarImagem($objLoja);
	$objLoja->setImagem($imagem);
	$objLoja->apagarImagem($objLoja);
	$msg = $objLoja->excluir($objLoja);
	header("Location:".$msg);
?>