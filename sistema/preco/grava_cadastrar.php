<?php 
	ob_start(); 
	include("../../public/class/Preco.class.php");
	#Criar Objeto Preco
	$objPreco = new Preco();
	$objPreco->setUsuario($_POST['usuario']);
	$objPreco->setProduto($_POST['produto']);
	$objPreco->setValor($_POST['valor']);
	$objPreco->setStatus($_POST['status']);
	$msg = $objPreco->cadastrar($objPreco);
	header("Location:".$msg);
?>

