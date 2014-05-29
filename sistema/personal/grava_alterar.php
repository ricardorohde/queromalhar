<?php 
	ob_start(); 
	include("../../public/class/Servico.class.php");
	include("../../public/class/Upload.class.php");
	#Criar Objeto Personal
	$objPersonal = new Servico();
	$objPersonal->setRegistro($_POST['registro']);
	$objPersonal->setUsuario($_POST['usuario']);
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
	
	$imagem_name = $_FILES['imagem']['name'];
	
	#Criar Objeto Upload
	$objUpload = new Upload();
	$imagem = $objPersonal->verificarImagem($objPersonal);	

	if (!empty($imagem) && !empty($imagem_name)){
		$nova_imagem = $objUpload->efetuarUpload($_FILES['imagem'],0);
			if(!$nova_imagem){
				$erro = $objUpload->Erro();
				header("Location:".$erro);
			} else {
				$objPersonal->setImagem($nova_imagem);
				header("Location:".$msg);
			}
	} 
	
	$objPersonal->setImagem($imagem);
	$msg = $objPersonal->alterar($objPersonal);
	header("Location:".$msg);	
?>