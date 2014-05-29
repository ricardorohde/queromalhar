<?php 
	ob_start(); 
	include("../../public/class/Noticia.class.php");
	include("../../public/class/Upload.class.php");
	#Criar Objeto Noticia
	$objNoticia = new Noticia();
	$objUpload = new Upload();
	$imagem = $objUpload->efetuarUpload($_FILES["imagem"],0);
	if(!$imagem){
		$erro = $objUpload->Erro();
		header("Location:".$erro);
	} else {
		$objNoticia->setUsuario($_POST['usuario']);
		$objNoticia->setTitulo($_POST['titulo']);
		$objNoticia->setTexto($_POST['texto']);
		$objNoticia->setAutor($_POST['autor']);
		$objNoticia->setData($_POST['data']);	
		$objNoticia->setImagem($imagem);	
		$msg = $objNoticia->cadastrar($objNoticia);
		header("Location:".$msg);
	}
?>
