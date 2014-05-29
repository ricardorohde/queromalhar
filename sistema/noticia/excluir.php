<?php 
	ob_start(); 
	include("../../public/class/Noticia.class.php");
	#Criar Objeto Noticia
	$objNoticia = new Noticia();
	$objNoticia->setRegistro($_GET['registro']);
	$imagem = $objNoticia->verificarImagem($objNoticia);
	$objNoticia->setImagem($imagem);
	$objNoticia->apagarImagem($objNoticia);
	$msg = $objNoticia->excluir($objNoticia);
	header("Location:".$msg);
?>
	