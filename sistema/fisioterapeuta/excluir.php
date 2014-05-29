<?php 
	ob_start(); 
	include("../../public/class/Servico.class.php");
	#Criar Objeto Servico
	$objFisioterapeuta = new Servico();
	$objFisioterapeuta->setRegistro($_GET['registro']);
	$imagem = $objFisioterapeuta->verificarImagem($objFisioterapeuta);
	$objFisioterapeuta->setImagem($imagem);
	$objFisioterapeuta->apagarImagem($objFisioterapeuta);
	$msg = $objFisioterapeuta->excluir($objFisioterapeuta);
	header("Location:".$msg);
?>