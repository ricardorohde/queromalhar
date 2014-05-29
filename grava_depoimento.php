<?php 
	ob_start(); 
	include("public/class/Depoimento.class.php");
	include("public/class/class.phpmailer.php");
	#Criar Objeto Depoimento
	$objDepoimento = new Depoimento();
	$objDepoimento->setUsuario(1);
	$objDepoimento->setNota($_POST[nota]);
	$objDepoimento->setNome($_POST['nome']);
	$objDepoimento->setAcademia($_POST['academia']);
	$objDepoimento->setAula($_POST['aula']);
	$objDepoimento->setIndicar($_POST['indicar']);	
	$objDepoimento->setDepoimento($_POST['depoimento']);
	$objDepoimento->setStatus('Desativado');	
	$msg = $objDepoimento->cadastrar($objDepoimento);
	#Criar Objeto Email
	$objEmail = new PHPMailer();
	$objEmail->IsSMTP(); 
	$objEmail->SMTPAuth = false; 
	$objEmail->From = "faleconosco@queromalhar.com.br";  
	$objEmail->AddAddress('faleconosco@queromalhar.com.br', 'QUEROMALHAR - SITE');
	$objEmail->FromName = "Fale Conosco";
	$objEmail->Subject = "Depoimento Cadastrado";
	$objEmail->Body = $_POST['nome'];
	$objEmail->IsHTML(true);
	$objEmail->AddReplyTo($_POST['email'], $_POST['nome']);
	$objEmail->Send();	
	header("Location:mensagem/13/");
?>
