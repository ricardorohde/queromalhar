<?php 
	ob_start(); 
	include("../../public/class/Banner.class.php");
	#Criar Objeto Banner
	$objBanner = new Banner();
	$objBanner->setRegistro($_GET['registro']);
	$imagem = $objBanner->verificarImagem($objBanner);
	$objBanner->setImagem($imagem);
	$objBanner->apagarImagem($objBanner);
	$msg = $objBanner->excluir($objBanner);
	header("Location:".$msg);
?>	