<?php 
	ob_start(); 
	include("../../public/class/Servico.class.php");
	include("../../public/class/Upload.class.php");
	#Criar Objeto Serviço
	$objNutricionista = new Servico();
	$objNutricionista->setRegistro($_POST['registro']);
	$objNutricionista->setUsuario($_POST['usuario']);
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
	
	$imagem_name = $_FILES['imagem']['name'];
	$programacao_name = $_FILES['programacao']['name'];
	$horario_aula_name = $_FILES['horario_aula']['name'];
	
	#Criar Objeto Upload
	$objUpload = new Upload();
	$imagem = $objNutricionista->verificarImagem($objNutricionista);	

	if (!empty($imagem) && !empty($imagem_name)){
		$nova_imagem = $objUpload->efetuarUpload($_FILES['imagem'],0);
			if(!$nova_imagem){
				$erro = $objUpload->Erro();
				header("Location:".$erro);
			} else {
				$objNutricionista->setImagem($nova_imagem);
				header("Location:".$msg);
			}
	} 
	
	$objNutricionista->setImagem($imagem);
	$msg = $objNutricionista->alterar($objNutricionista);
	header("Location:".$msg);	
?>