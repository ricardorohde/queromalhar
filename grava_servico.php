<?php 
	ob_start(); 
	include("public/class/Servico.class.php");
	include("public/class/Usuario.class.php");
	include("public/class/Upload.class.php");
	include("public/class/class.phpmailer.php");
	#Criar Objeto Servico
	$objServico = new Servico();
	#Criar Objeto Usuário
	$objUsuario = new Usuario();
	#Criar Objeto Upload
	$objUpload = new Upload();
	#Usuário
	if($_POST['tipo_cadastro'] != "B"){
		$objUsuario->setNome($_POST['nome']);
		$objUsuario->setEmail($_POST['email_usuario']);
		$objUsuario->setCpf($_POST['cpf']);	
		$objUsuario->setRg($_POST['rg']);
		$objUsuario->setPermissao('usr');		
		$objUsuario->setTelefone($_POST['telefone_usuario']);		
		$objUsuario->setPagamento($_POST['pagamento']);
		$objUsuario->setSite($_POST['como_conheceu']);
		$objUsuario->setSenha('queromalhar');
		$objUsuario->cadastrar($objUsuario);
	}
	#Serviço
	if(!empty($_FILES["imagem"])){
		$imagem = $objUpload->efetuarUpload($_FILES["imagem"],1);
	}
	
	if(!empty($_FILES["programacao"])){
		$programacao = $objUpload->efetuarUpload($_FILES['programacao'],1);	
	}
	
	if(!empty($_FILES["horario_aula"])){
		$horario_aula =	$objUpload->efetuarUpload($_FILES['horario_aula'],1);	
	}
	
	$data = date('Y-m-d',strtotime("now")); 
	if($_POST['tipo_cadastro'] != "B"){
		$objServico->setUsuario($arrayUsuario['currval']);
	} else {
		$objServico->setUsuario("1");
	}
	$objServico->setTipo($_POST['tipo_servico']);
	$objServico->setEstado($_POST['estado']);
	$objServico->setEmpresa($_POST['empresa']);
	$objServico->setEmail($_POST['email']);
	$objServico->setSite($_POST['site']);
	$objServico->setTelefone($_POST['telefone']);
	$objServico->setCelular($_POST['celular']);
	$objServico->setFax($_POST['fax']);
	$objServico->setObservacao($_POST['observacao']);
	$objServico->setStatus('Desativado');
	$objServico->setEndereco($_POST['endereco']);
	$objServico->setCep($_POST['cep']);
	$objServico->setMunicipio($_POST['municipio']);
	$objServico->setModalidade($_POST['modalidade']);
	$objServico->setSexo($_POST['sexo']);
	$objServico->setTipoCadastro($_POST['tipo_cadastro']);		
	$objServico->setConvenio($_POST['convenio']);	
	$objServico->setProgramacao($programacao);	
	$objServico->setHorarioAula($horario_aula);	
	$objServico->setDescricao($_POST['descricao']);	
	$objServico->setMetodo($_POST['metodo']);	
	$objServico->setImagem($imagem);
	$objServico->setData($data);
	$objServico->cadastrar($objServico);
	if(!empty($_POST['email'])){
	    $email = $_POST['email'];
	} else {
		$email = $_POST['email_usuario'];
	}
	$objEmail = new PHPMailer();
	$objEmail->IsSMTP(); 
	$objEmail->SMTPAuth = false; 
	$objEmail->From = $_POST['email']; 
	$objEmail->AddAddress('faleconosco@queromalhar.com.br', 'QUEROMALHAR - SITE');
	$objEmail->FromName = "Fale Conosco";
	$objEmail->Subject = $_POST['assunto'];
	$objEmail->Body = $_POST['empresa'];
	$objEmail->IsHTML(true);
	$objEmail->AddReplyTo($_POST['email'], $_POST['nome']);
	$objEmail->Send();
	header("Location:mensagem/".$_POST['mensagem']."/");
?>