<?php 
	ob_start(); 
	include("../../public/class/Preco.class.php");
	#Criar Objeto Preço
	$objPreco = new Preco();
	$objPreco->setRegistro($_POST['registro']);
	$objPreco->setProduto($_POST['produto']);
	$objPreco->setValor($_POST['valor']);
	$objPreco->setStatus($_POST['status']);
	$msg = $objPreco->alterar($objPreco);
	header("Location:".$msg);
?>
