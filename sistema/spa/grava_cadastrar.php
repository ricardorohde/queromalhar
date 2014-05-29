<?php 
	ob_start(); 
	include("../../public/class/Servico.class.php");
	include("../../public/class/Upload.class.php");
	#Criar Objeto Serviço
	$objSpa = new Servico();
	$objUpload = new Upload();

	if(!empty($_FILES["imagem"])){
		$imagem = $objUpload->efetuarUpload($_FILES["imagem"],0);
	}

	if(!empty($_FILES["programacao"])){
		$programacao = $objUpload->efetuarUpload($_FILES['programacao'],0);	
	}

	$data = date('Y-m-d',strtotime("now")); 
	if(empty($_POST['usuario'])){
		$objSpa->setUsuario($_POST['administrador']);
	} else {
		$objSpa->setUsuario($_POST['usuario']);
	}
	$objSpa->setTipo($_POST['tipo_servico']);
	$objSpa->setEstado($_POST['estado']);
	$objSpa->setEmpresa($_POST['empresa']);
	$objSpa->setEmail($_POST['email']);
	$objSpa->setSite($_POST['site']);
	$objSpa->setTelefone($_POST['telefone']);
	$objSpa->setCelular($_POST['celular']);
	$objSpa->setFax($_POST['fax']);
	$objSpa->setObservacao($_POST['observacao']);
	$objSpa->setStatus($_POST['status']);
	$objSpa->setEndereco($_POST['endereco']);
	$objSpa->setCep($_POST['cep']);
	$objSpa->setMunicipio($_POST['municipio']);
	$objSpa->setSexo($_POST['sexo']);
	$objSpa->setTipoCadastro($_POST['tipo_cadastro']);		
	$objSpa->setConvenio($_POST['convenio']);	
	$objSpa->setProgramacao($programacao);	
	$objSpa->setImagem($imagem);	
	$objSpa->setData($data);	
	$msg =  $objSpa->cadastrar($objSpa);
	header("Location:".$msg);
?>
