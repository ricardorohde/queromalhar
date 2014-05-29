<?php 
ob_start(); 
include("../../public/class/Dica.class.php");
include("../../public/class/Upload.class.php");
#Criar Objeto Dica
$objDica = new Dica();
$objDica->setRegistro($_POST['registro']);
$objDica->setTitulo($_POST['titulo']);
$objDica->setFonte($_POST['fonte']);
$objDica->setTexto($_POST['texto']);
$objDica->setStatus($_POST['status']);
$objDica->setData($_POST['data']);
$arquivo = $_FILES['imagem']['name'];
echo $arquivo;
#Criar Objeto Upload
$objUpload = new Upload();
$imagem = $objDica->verificarImagem($objDica);
echo $imagem;
if (!empty($imagem) && !empty($arquivo)){
	$nova_imagem = $objUpload->efetuarUpload($_FILES['imagem'],0);
		if(!$nova_imagem){
			$erro = $objUpload->Erro();
			header("Location:".$erro);
		} else {
			$objDica->setImagem($nova_imagem);
			$msg = $objDica->alterar($objDica);
			header("Location:".$msg);
		}
} else {
	$objDica->setImagem($imagem);
	$msg = $objDica->alterar($objDica);
	header("Location:".$msg);	
 }
?>