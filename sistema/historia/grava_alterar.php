<?php 
	ob_start(); 
	include("../../public/class/Historia.class.php");
	include("../../public/class/Upload.class.php");
	#Criar Objeto História
	$objHistoria = new Historia();
	$objHistoria->setRegistro($_POST['registro']);
	$objHistoria->setTitulo($_POST['titulo']);
	$objHistoria->setTexto($_POST['texto']);
	$objHistoria->setData($_POST['data']);
	$objHistoria->setNome($_POST['nome']);
	$objHistoria->setEmail($_POST['email']);
	$objHistoria->setStatus($_POST['status']);
	$objHistoria->setFonte($_POST['fonte']);
	$arquivo = $_FILES['imagem']['name'];
	#Criar Objeto Upload
	$objUpload = new Upload();
	$imagem = $objHistoria->verificarImagem($objHistoria);
	if (!empty($imagem) && !empty($arquivo)){
	   echo "Entrou";
		$nova_imagem = $objUpload->efetuarUpload($_FILES['imagem'],0);
			if(!$nova_imagem){
				$erro = $objUpload->Erro();
				header("Location:".$erro);
			} else {
				$objHistoria->setImagem($nova_imagem);
				$msg = $objHistoria->alterar($objHistoria);
				header("Location:".$msg);
			}
	} else {
	 	$objHistoria->setImagem($imagem);
		$msg = $objHistoria->alterar($objHistoria);
		header("Location:".$msg);	
	 }
?>

