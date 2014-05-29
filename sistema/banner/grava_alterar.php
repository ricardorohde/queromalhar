<?php 
	ob_start(); 
	include("../../public/class/Banner.class.php");
	include("../../public/class/Upload.class.php");
	#Criar Objeto Banner
	$objBanner = new Banner();
	$objBanner->setRegistro($_POST['registro']);
	$objBanner->setNome($_POST['nome']);
	$objBanner->setUrl($_POST['url']);
	$objBanner->setTipo($_POST['tipo']);
	$objBanner->setFormato($_POST['formato']);
	$arquivo = $_FILES['imagem']['name'];
	#Criar Objeto Upload
	$objUpload = new Upload();
	$imagem = $objBanner->verificarImagem($objBanner);
	if (!empty($imagem) && !empty($arquivo)){
		$nova_imagem = $objUpload->efetuarUpload($_FILES['imagem'],0);
			if(!$nova_imagem){
				$erro = $objUpload->Erro();
				header("Location:".$erro);
			} else {
				$objBanner->setImagem($nova_imagem);
				$msg = $objBanner->alterar($objBanner);
				header("Location:".$msg);
			}
	} else {
	 	$objBanner->setImagem($imagem);
		$msg = $objBanner->alterar($objBanner);
		header("Location:".$msg);	
	 }
?>