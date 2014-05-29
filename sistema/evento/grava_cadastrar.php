<?php 
	ob_start(); 
	include("../../public/class/Evento.class.php");
	include("../../public/class/Upload.class.php");
	#Criar Objeto Evento
	$objEvento = new Evento();
	$objUpload = new Upload();
	$imagem = $objUpload->efetuarUpload($_FILES["imagem"],0);
	if(!$imagem){
		$erro = $objUpload->Erro();
		header("Location:".$erro);
	} else {
		$objEvento->setUsuario($_POST['usuario']);
		$objEvento->setNome($_POST['nome']);
		$objEvento->setLocal($_POST['local']);
		$objEvento->setInformacao($_POST['informacao']);
		$objEvento->setPeriodo($_POST['periodo']);
		$objEvento->setData($_POST['data']);
		$objEvento->setImagem($imagem);
		$msg = $objEvento->cadastrar($objEvento);
		header("Location:".$msg);
	}
?>

