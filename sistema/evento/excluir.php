<?php 
	ob_start(); 
	include("../../public/class/Evento.class.php");
	#Criar Objeto Evento
	$objEvento = new Evento();
	$objEvento->setRegistro($_GET['registro']);
	$imagem = $objEvento->verificarImagem($objEvento);
	$objEvento->setImagem($imagem);
	$objEvento->apagarImagem($objEvento);
	$msg = $objEvento->excluir($objEvento);
	header("Location:".$msg);
?>
	
