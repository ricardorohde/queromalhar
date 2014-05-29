<?php 
	ob_start(); 
	include("../../public/class/Servico.class.php");
	#Criar Objeto academia
	$objAcademia = new Servico();
	$objAcademia->setRegistro($_GET['registro']);
	$imagem = $objAcademia->verificarImagem($objAcademia);
	$objAcademia->setImagem($imagem);
	$objAcademia->apagarImagem($objAcademia);
	$msg = $objAcademia->excluir($objAcademia);
	header("Location:".$msg);
?>