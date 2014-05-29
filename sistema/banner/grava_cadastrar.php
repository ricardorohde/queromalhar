<?php 
	ob_start(); 
	include("../../public/class/Banner.class.php");
	include("../../public/class/Upload.class.php");
	#Criar Objeto Banner
	$objBanner = new Banner();
	#Criar Objeto Upload
	$objUpload = new Upload();
	$imagem = $objUpload->efetuarUpload($_FILES["imagem"],0);
	if(!$imagem){
		$erro = $objUpload->Erro();
		header("Location:".$erro);
	} else {
		$objBanner->setUsuario($_POST['usuario']);
		$objBanner->setNome($_POST['nome']);
		$objBanner->setUrl($_POST['url']);
		$objBanner->setTipo($_POST['tipo']);
		$objBanner->setFormato($_POST['formato']);
		$objBanner->setImagem($imagem);
		$msg = $objBanner->cadastrar($objBanner);
		header("Location:".$msg);
	}
?>