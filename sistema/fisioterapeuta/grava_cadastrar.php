<?php 	
	ob_start(); 
	include("../../public/class/Servico.class.php");
	include("../../public/class/Upload.class.php");
	#Criar Objeto Fisoterapeuta
	$objFisioterapeuta = new Servico();
	$objUpload = new Upload();

	if(!empty($_FILES["imagem"])){
		$imagem = $objUpload->efetuarUpload($_FILES["imagem"],0);
	}

	$data = date('Y-m-d',strtotime("now")); 
	if(empty($_POST['usuario'])){
		$objFisioterapeuta->setUsuario($_POST['administrador']);
	} else {
		$objFisioterapeuta->setUsuario($_POST['usuario']);
	}
	$objFisioterapeuta->setTipo($_POST['tipo_servico']);
	$objFisioterapeuta->setEstado($_POST['estado']);
	$objFisioterapeuta->setEmpresa($_POST['empresa']);
	$objFisioterapeuta->setEmail($_POST['email']);
	$objFisioterapeuta->setSite($_POST['site']);
	$objFisioterapeuta->setTelefone($_POST['telefone']);
	$objFisioterapeuta->setCelular($_POST['celular']);
	$objFisioterapeuta->setFax($_POST['fax']);
	$objFisioterapeuta->setObservacao($_POST['observacao']);
	$objFisioterapeuta->setStatus($_POST['status']);
	$objFisioterapeuta->setEndereco($_POST['endereco']);
	$objFisioterapeuta->setCep($_POST['cep']);
	$objFisioterapeuta->setMunicipio($_POST['municipio']);
	$objFisioterapeuta->setSexo($_POST['sexo']);
	$objFisioterapeuta->setTipoCadastro($_POST['tipo_cadastro']);		
	$objFisioterapeuta->setConvenio($_POST['convenio']);	
	$objFisioterapeuta->setImagem($imagem);	
	$objFisioterapeuta->setData($data);	
	$msg =  $objFisioterapeuta->cadastrar($objFisioterapeuta);
	header("Location:".$msg);
?>
