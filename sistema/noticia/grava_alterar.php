<?php 
	ob_start(); 
	include("../../public/class/Noticia.class.php");
	include("../../public/class/Upload.class.php");
	#Criar Objeto Noticia
	$objNoticia = new Noticia();
	$objNoticia->setRegistro($_POST['registro']);
	$objNoticia->setTitulo($_POST['titulo']);
	$objNoticia->setTexto($_POST['texto']);
	$objNoticia->setAutor($_POST['autor']);
	$objNoticia->setData($_POST['data']);
	$arquivo = $_FILES['imagem']['name'];
	#Criar Objeto Upload
	$objUpload = new Upload();
	$imagem = $objNoticia->verificarImagem($objNoticia);
	if (!empty($imagem) && !empty($arquivo)){
		$nova_imagem = $objUpload->efetuarUpload($_FILES['imagem'],0);
			if(!$nova_imagem){
				$erro = $objUpload->Erro();
				header("Location:".$erro);
			} else {
				$objNoticia->setImagem($nova_imagem);
				$msg = $objNoticia->alterar($objNoticia);
				header("Location:".$msg);
			}
	} else {
	 	$objNoticia->setImagem($imagem);
		$msg = $objNoticia->alterar($objNoticia);
		header("Location:".$msg);	
	 }
?>
