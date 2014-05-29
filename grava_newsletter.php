<?php 
	ob_start(); 
	include("public/class/Newsletter.class.php");
	include("public/class/class.phpmailer.php");
	#Criar Objeto Newsletter
	$objNewsletter = new Newsletter();
	$objNewsletter->setNome($_POST['nome']);
	$objNewsletter->setEmail($_POST['email']);
	$qryNews = $objNewsletter->verificarEmail($objNewsletter);
	$linhasNews = $objNewsletter->totalRegistros($qryNews);
	#Criar Objeto Email
	$objEmail = new PHPMailer();
	$objEmail->IsSMTP(); 
	$objEmail->SMTPAuth = false; 
	$objEmail->From = "faleconosco@queromalhar.com.br";  
	$objEmail->AddAddress('faleconosco@queromalhar.com.br', 'QUEROMALHAR - SITE');
	$objEmail->FromName = "Fale Conosco";
	$objEmail->Subject = "Newsletter Cadastrada";
	$objEmail->Body = $_POST['nome'];
	$objEmail->IsHTML(true);
	$objEmail->AddReplyTo($_POST['email'], $_POST['nome']);
	$objEmail->Send();
	if($linhasNews == 0) {
	$objNewsletter->cadastrar($objNewsletter);
	header("Location:mensagem/7/");
	} else {
	header("Location:mensagem/8/");
	}
?>
