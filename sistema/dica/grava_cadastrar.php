<?php 
ob_start(); 
include("../../public/class/Dica.class.php");
include("../../public/class/Upload.class.php");
include("../../public/class/class.phpmailer.php");
#Criar Objeto Dica
$objDica = new Dica();
#Criar Objeto Upload
$objUpload = new Upload();
$imagem = $objUpload->efetuarUpload($_FILES["imagem"],0);
if(!$imagem){
	$erro = $objUpload->Erro();
	header("Location:".$erro);
} else {
	$objDica->setUsuario($_POST['usuario']);
	$objDica->setTitulo($_POST['titulo']);
	$objDica->setFonte($_POST['fonte']);
	$objDica->setTexto($_POST['texto']);
	$objDica->setStatus($_POST['status']);
	$objDica->setData($_POST['data']);
	$objDica->setImagem($imagem);
	$msg = $objDica->cadastrar($objDica);
	if($_POST['usuario_dica'] == 1){
		#Criar Objeto Email
		$objEmail = new PHPMailer();
		$objEmail->IsSMTP(); 
		$objEmail->SMTPAuth = false; 
		$objEmail->From = $_POST['email']; 
		$objEmail->AddAddress('faleconosco@queromalhar.com.br', 'QUEROMALHAR - PAINEL');
		$objEmail->FromName = "Fale Conosco";
		$objEmail->Subject = "Dica Cadastrada";
		$objEmail->Body = $_POST['titulo'];
		$objEmail->IsHTML(true);
		$objEmail->Send();
	}
	header("Location:".$msg);
}
?>



