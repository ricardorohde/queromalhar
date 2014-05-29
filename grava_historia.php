<?php 
	ob_start(); 
	include("public/class/Historia.class.php");
	include("public/class/Upload.class.php");
	include("public/class/class.phpmailer.php");
	#Criar Objeto Historia
	$objHistoria = new Historia();
	$objUpload = new Upload();
	$imagem = $objUpload->efetuarUpload($_FILES["imagem"],1);
	if(!$imagem){
		$erro = $objUpload->Erro();
		header("Location:".$erro);
	} else {
		$data = date('Y-m-d',strtotime("now")); 
		$objHistoria->setUsuario(1);
		$objHistoria->setTitulo($_POST['titulo']);
		$objHistoria->setTexto($_POST['texto']);
		$objHistoria->setData($_POST['data']);
		$objHistoria->setNome($_POST['nome']);
		$objHistoria->setEmail($_POST['email']);
		$objHistoria->setStatus($_POST['status']);
		$objHistoria->setFonte($_POST['fonte']);
		$objHistoria->setImagem($imagem);	
		$msg = $objHistoria->cadastrar($objHistoria);
		#Criar Objeto Email
		$objEmail = new PHPMailer();
		$objEmail->IsSMTP(); 
		$objEmail->SMTPAuth = false; 
		$objEmail->From = "faleconosco@queromalhar.com.br";  
		$objEmail->AddAddress('faleconosco@queromalhar.com.br', 'QUEROMALHAR - SITE');
		$objEmail->FromName = "Fale Conosco";
		$objEmail->Subject = "História Cadastrada";
		$objEmail->Body = $_POST['titulo'];
		$objEmail->IsHTML(true);
		$objEmail->AddReplyTo($_POST['email'], $_POST['nome']);
		$objEmail->Send();
		header("Location:mensagem/14/");
	}
?>
