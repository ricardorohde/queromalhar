<?php 
	
	include("../../public/inc/dBug.php");
	new dBug($_POST);
	ob_start(); 
	include("../../public/class/Servico.class.php");
	include("../../public/class/Upload.class.php");
	#Criar Objeto Serviço
	$objLoja = new Servico();
	$objLoja->setRegistro($_POST['registro']);
	$objLoja->setUsuario($_POST['usuario']);
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
	$imagem_name = $_FILES['imagem']['name'];
	
	#Criar Objeto Upload
	$objUpload = new Upload();
	$imagem = $objLoja->verificarImagem($objLoja);	
	$programacao = $objLoja->verificarProgramacao($objLoja);	
	$horario_aula = $objLoja->verificarHorarioAula($objLoja);

	if (!empty($imagem) && !empty($imagem_name)){
		$nova_imagem = $objUpload->efetuarUpload($_FILES['imagem'],0);
			if(!$nova_imagem){
				$erro = $objUpload->Erro();
				header("Location:".$erro);
			} else {
				$objLoja->setImagem($nova_imagem);
				header("Location:".$msg);
			}
	} 

	$objLoja->setImagem($imagem);
	$msg = $objLoja->alterar($objLoja);
	header("Location:".$msg);	
?>