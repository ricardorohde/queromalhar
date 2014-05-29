<?php 
	ob_start(); 
	include("../../public/class/Evento.class.php");
	include("../../public/class/Upload.class.php");
	#Criar Objeto Noticia
	$objEvento = new Evento();
	$objEvento->setRegistro($_POST['registro']);
	$objEvento->setNome($_POST['nome']);
	$objEvento->setLocal($_POST['local']);
	$objEvento->setInformacao($_POST['informacao']);
	$objEvento->setPeriodo($_POST['periodo']);
	$objEvento->setData($_POST['data']);
	$arquivo = $_FILES['imagem']['name'];
	#Criar Objeto Upload
	$objUpload = new Upload();
	$imagem = $objEvento->verificarImagem($objEvento);
	if (!empty($imagem) && !empty($arquivo)){
		$nova_imagem = $objUpload->efetuarUpload($_FILES['imagem'],0);
			if(!$nova_imagem){
				$erro = $objUpload->Erro();
				header("Location:".$erro);
			} else {
				$objEvento->setImagem($nova_imagem);
				$msg = $objEvento->alterar($objEvento);
				header("Location:".$msg);
			}
	} else {
	 	$objEvento->setImagem($imagem);
		$msg = $objEvento->alterar($objEvento);
		header("Location:".$msg);	
	 }
?>
