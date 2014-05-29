<?php 
	ob_start(); 
	include("../../public/class/Servico.class.php");
	include("../../public/class/Upload.class.php");
	#Criar Objeto Fisoterapeuta
	$objFisioterapeuta = new Servico();
	$objFisioterapeuta->setRegistro($_POST['registro']);
	$objFisioterapeuta->setUsuario($_POST['usuario']);
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
	$imagem_name = $_FILES['imagem']['name'];
	
	#Criar Objeto Upload
	$objUpload = new Upload();
	$imagem = $objFisioterapeuta->verificarImagem($objFisioterapeuta);	
	
	if (!empty($imagem) && !empty($imagem_name)){
		$nova_imagem = $objUpload->efetuarUpload($_FILES['imagem'],0);
			if(!$nova_imagem){
				$erro = $objUpload->Erro();
				header("Location:".$erro);
			} else {
				$objFisioterapeuta->setImagem($nova_imagem);
				header("Location:".$msg);
			}
	} 
	
	$objFisioterapeuta->setImagem($imagem);
	$msg = $objFisioterapeuta->alterar($objFisioterapeuta);
	header("Location:".$msg);	
?>