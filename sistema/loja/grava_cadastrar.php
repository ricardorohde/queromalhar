<?php 
	ob_start(); 
	include("../../public/class/Servico.class.php");
	include("../../public/class/Upload.class.php");
	#Criar Objeto Serviço
	$objLoja = new Servico();
	$objUpload = new Upload();

	if(!empty($_FILES["imagem"])){
		$imagem = $objUpload->efetuarUpload($_FILES["imagem"],0);
	}

	$data = date('Y-m-d',strtotime("now")); 
	if(empty($_POST['usuario'])){
		$objLoja->setUsuario($_POST['administrador']);
	} else {
		$objLoja->setUsuario($_POST['usuario']);
	}
	$objLoja->setTipo($_POST['tipo_servico']);
	$objLoja->setEstado($_POST['estado']);
	$objLoja->setEmpresa($_POST['empresa']);
	$objLoja->setEmail($_POST['email']);
	$objLoja->setSite($_POST['site']);
	$objLoja->setTelefone($_POST['telefone']);
	$objLoja->setCelular($_POST['celular']);
	$objLoja->setFax($_POST['fax']);
	$objLoja->setObservacao($_POST['observacao']);
	$objLoja->setStatus($_POST['status']);
	$objLoja->setEndereco($_POST['endereco']);
	$objLoja->setCep($_POST['cep']);
	$objLoja->setMunicipio($_POST['municipio']);
	$objLoja->setSexo($_POST['sexo']);
	$objLoja->setModalidade($_POST['modalidade']);
	$objLoja->setTipoCadastro($_POST['tipo_cadastro']);		
	$objLoja->setDescricao($_POST['descricao']);	
	$objLoja->setImagem($imagem);	
	$objLoja->setData($data);	
	$msg =  $objLoja->cadastrar($objLoja);
	header("Location:".$msg);
?>
