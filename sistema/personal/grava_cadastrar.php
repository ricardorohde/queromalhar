<?php 
	ob_start(); 
	include("../../public/class/Servico.class.php");
	include("../../public/class/Upload.class.php");
	#Criar Objeto Personal
	$objPersonal = new Servico();
	$objUpload = new Upload();

	if(!empty($_FILES["imagem"])){
		$imagem = $objUpload->efetuarUpload($_FILES["imagem"],0);
	}

	$data = date('Y-m-d',strtotime("now")); 
	if(empty($_POST['usuario'])){
		$objPersonal->setUsuario($_POST['administrador']);
	} else {
		$objPersonal->setUsuario($_POST['usuario']);
	}
	$objPersonal->setTipo($_POST['tipo_servico']);
	$objPersonal->setEstado($_POST['estado']);
	$objPersonal->setEmpresa($_POST['empresa']);
	$objPersonal->setEmail($_POST['email']);
	$objPersonal->setSite($_POST['site']);
	$objPersonal->setTelefone($_POST['telefone']);
	$objPersonal->setCelular($_POST['celular']);
	$objPersonal->setFax($_POST['fax']);
	$objPersonal->setObservacao($_POST['observacao']);
	$objPersonal->setStatus($_POST['status']);
	$objPersonal->setEndereco($_POST['endereco']);
	$objPersonal->setCep($_POST['cep']);
	$objPersonal->setMunicipio($_POST['municipio']);
	$objPersonal->setSexo($_POST['sexo']);
	$objPersonal->setTipoCadastro($_POST['tipo_cadastro']);		
	$objPersonal->setMetodo($_POST['metodo']);	
	$objPersonal->setImagem($imagem);	
	$objPersonal->setData($data);	
	$msg =  $objPersonal->cadastrar($objPersonal);
	header("Location:".$msg);
?>
