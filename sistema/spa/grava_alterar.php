<?php 
	ob_start(); 
	include("../../public/class/Servico.class.php");
	include("../../public/class/Upload.class.php");
	#Criar Objeto Serviço
	$objSpa = new Servico();
	$objSpa->setRegistro($_POST['registro']);
	$objSpa->setUsuario($_POST['usuario']);
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
	$objSpa->setImagem($imagem);	
	
	$imagem_name = $_FILES['imagem']['name'];
	$programacao_name = $_FILES['programacao']['name'];
	
	#Criar Objeto Upload
	$objUpload = new Upload();
	$imagem = $objSpa->verificarImagem($objSpa);	
	$programacao = $objSpa->verificarProgramacao($objSpa);	

	if (!empty($imagem) && !empty($imagem_name)){
		$nova_imagem = $objUpload->efetuarUpload($_FILES['imagem'],0);
			if(!$nova_imagem){
				$erro = $objUpload->Erro();
				header("Location:".$erro);
			} else {
				$objSpa->setImagem($nova_imagem);
				header("Location:".$msg);
			}
	} 
	
	if (!empty($programacao) && !empty($programacao_name)){
		$nova_programacao = $objUpload->efetuarUpload($_FILES['programacao'],0);
			if(!$nova_programacao){
				$erro = $objUpload->Erro();
				header("Location:".$erro);
			} else {
				$objSpa->setProgramacao($nova_programacao);
				header("Location:".$msg);
			}
	} 
	
	$objSpa->setImagem($imagem);
	$msg = $objSpa->alterar($objSpa);
	header("Location:".$msg);	
?>