<?php 
	ob_start(); 
	include("../../public/class/Servico.class.php");
	include("../../public/class/Upload.class.php");
	#Criar Objeto Serviço
	$objNutricionista = new Servico();
	$objUpload = new Upload();

	if(!empty($_FILES["imagem"])){
		$imagem = $objUpload->efetuarUpload($_FILES["imagem"],0);
	}

	$data = date('Y-m-d',strtotime("now")); 
	if(empty($_POST['usuario'])){
		$objNutricionista->setUsuario($_POST['administrador']);
	} else {
		$objNutricionista->setUsuario($_POST['usuario']);
	}
	$objNutricionista->setTipo($_POST['tipo_servico']);
	$objNutricionista->setEstado($_POST['estado']);
	$objNutricionista->setEmpresa($_POST['empresa']);
	$objNutricionista->setEmail($_POST['email']);
	$objNutricionista->setSite($_POST['site']);
	$objNutricionista->setTelefone($_POST['telefone']);
	$objNutricionista->setCelular($_POST['celular']);
	$objNutricionista->setFax($_POST['fax']);
	$objNutricionista->setObservacao($_POST['observacao']);
	$objNutricionista->setStatus($_POST['status']);
	$objNutricionista->setEndereco($_POST['endereco']);
	$objNutricionista->setCep($_POST['cep']);
	$objNutricionista->setMunicipio($_POST['municipio']);
	$objNutricionista->setSexo($_POST['sexo']);
	$objNutricionista->setTipoCadastro($_POST['tipo_cadastro']);		
	$objNutricionista->setConvenio($_POST['convenio']);	
	$objNutricionista->setImagem($imagem);	
	$objNutricionista->setData($data);	
	$msg =  $objNutricionista->cadastrar($objNutricionista);
	header("Location:".$msg);
?>
