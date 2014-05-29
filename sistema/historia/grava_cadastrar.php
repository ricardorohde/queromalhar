<?php 
	ob_start(); 
	include("../../public/class/Historia.class.php");
	include("../../public/class/Upload.class.php");
	#Criar Objeto Historia
	$objHistoria = new Historia();
	$objUpload = new Upload();
	$imagem = $objUpload->efetuarUpload($_FILES["imagem"],0);
	if(!$imagem){
		$erro = $objUpload->Erro();
		header("Location:".$erro);
	} else {
		$data = date('Y-m-d',strtotime("now")); 
		$objHistoria->setUsuario($_POST['usuario']);
		$objHistoria->setTitulo($_POST['titulo']);
		$objHistoria->setTexto($_POST['texto']);
		$objHistoria->setData($_POST['data']);
		$objHistoria->setNome($_POST['nome']);
		$objHistoria->setEmail($_POST['email']);
		$objHistoria->setStatus($_POST['status']);
		$objHistoria->setFonte($_POST['fonte']);
		$objHistoria->setImagem($imagem);	
		$msg = $objHistoria->cadastrar($objHistoria);
		header("Location:".$msg);
	}
?>