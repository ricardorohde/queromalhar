<?php 
	ob_start(); 
	include("../../public/class/Dica.class.php");
	#Criar Objeto Dica
	$objDica = new Dica();
	$objDica->setRegistro($_GET['registro']);
	$imagem = $objDica->verificarImagem($objDica);
	$objDica->setImagem($imagem);
	$objDica->apagarImagem($objDica);
	$msg = $objDica->excluir($objDica);
	header("Location:".$msg);
?>
	
