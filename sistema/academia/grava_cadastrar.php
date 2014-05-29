<?php 
	ob_start(); 
	include("../../public/class/Servico.class.php");
	include("../../public/class/Upload.class.php");
	
	print_r($_POST);
	#Criar Objeto Academia
	$objAcademia = new Servico();
	$objUpload = new Upload();
	if(!empty($_FILES["imagem"])){
		$imagem = $objUpload->efetuarUpload($_FILES["imagem"],0);
	}

	if(!empty($_FILES["horario_aula"])){
		$horario_aula =	$objUpload->efetuarUpload($_FILES['horario_aula'],0);	
	}

	$data = date('Y-m-d',strtotime("now")); 
	if(empty($_POST['usuario'])){
		$objAcademia->setUsuario($_POST['administrador']);
	} else {
		$objAcademia->setUsuario($_POST['usuario']);
	}
	$objAcademia->setTipo($_POST['tipo_servico']);
	$objAcademia->setEstado($_POST['estado']);
	$objAcademia->setEmpresa($_POST['empresa']);
	$objAcademia->setEmail($_POST['email']);
	$objAcademia->setSite($_POST['site']);
	$objAcademia->setTelefone($_POST['telefone']);
	$objAcademia->setCelular($_POST['celular']);
	$objAcademia->setFax($_POST['fax']);
	$objAcademia->setObservacao($_POST['observacao']);
	$objAcademia->setStatus($_POST['status']);
	$objAcademia->setEndereco($_POST['endereco']);
	$objAcademia->setCep($_POST['cep']);
	$objAcademia->setMunicipio($_POST['municipio']);
	$objAcademia->setSexo($_POST['sexo']);
	$objAcademia->setModalidade($_POST['modalidade']);
	$objAcademia->setTipoCadastro($_POST['tipo_cadastro']);		
	$objAcademia->setHorarioAula($horario_aula);	
	$objAcademia->setImagem($imagem);	
	$objAcademia->setData($data);	
	$msg =  $objAcademia->cadastrar($objAcademia);
	header("Location:".$msg);
?>