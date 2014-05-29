<?php 
	ob_start(); 
	include("../../public/class/Pagamento.class.php");
	#Criar Objeto Pagamento
	$objPagamento = new Pagamento();
	$objPagamento->setRegistro($_GET['registro']);
	$imagem = $objPagamento->verificarImagem($objPagamento);
	$objPagamento->setBoleto($imagem);
	$objPagamento->apagarImagem($objPagamento);
	$msg = $objPagamento->excluir($objPagamento);
	header("Location:".$msg);
?>