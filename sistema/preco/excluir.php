<?php 
	ob_start(); 
	include("../../public/class/Preco.class.php");
	#Criar Objeto Preço
	$objPreco = new Preco();
	$objPreco->setRegistro($_GET['registro']);
	$msg = $objPreco->excluir($objPreco);	
	header("Location:".$msg);
?>
	
