<?php
	include("public/class/class.phpmailer.php");
	$objEmail = new PHPMailer();
	$objEmail->IsSMTP(); 
	$objEmail->SMTPAuth = false; 
	$objEmail->From = $_POST['email']; 
	$objEmail->AddAddress('faleconosco@queromalhar.com.br', 'QUEROMALHAR - SITE');
	$objEmail->FromName = $_POST['nome'];
	$objEmail->Subject = "Contato - Site: www.queromalhar.com.br - ".$_POST['assunto'];
	$objEmail->IsHTML(true);
	$mensagem = " 
	<html>
	<body>
	<strong>Nome:</strong>  ". $_POST['nome']." <br />
	<strong>Email:</strong>  ". $_POST['email']." <br />
	<strong>Assunto:</strong>  ". $_POST['assunto']." <br />
	<strong>Telefone:</strong>  ". $_POST['telefone']." <br />
	<strong>Mensagem:</strong>  ". $_POST['mensagem']. "<br />
	</body>
	</html>";
	$objEmail->Body = $mensagem;
	$enviado = $objEmail->Send();
	if($enviado) {
		header("Location:mensagem/9/");
	} else {
		header("Location:mensagem/10/");
	}
?>