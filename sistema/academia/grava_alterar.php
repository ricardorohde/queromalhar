<?php 
	ob_start(); 
	include("../../public/class/Servico.class.php");
	include("../../public/class/Upload.class.php");
	#Criar Objeto Academia
	$objAcademia = new Servico();
	$objAcademia->setRegistro($_POST['registro']);
	$objAcademia->setUsuario($_POST['usuario']);
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
	$objAcademia->setImagem($imagem);	
	
	$imagem_name = $_FILES['imagem']['name'];
	$horario_aula_name = $_FILES['horario_aula']['name'];
	
	#Criar Objeto Upload
	$objUpload = new Upload();
	$imagem = $objAcademia->verificarImagem($objAcademia);	
	$horario_aula = $objAcademia->verificarHorarioAula($objAcademia);

	if (!empty($imagem) && !empty($imagem_name)){
		$nova_imagem = $objUpload->efetuarUpload($_FILES['imagem'],0);
			if(!$nova_imagem){
				$erro = $objUpload->Erro();
				header("Location:".$erro);
			} else {
				$objAcademia->setImagem($nova_imagem);
				header("Location:".$msg);
			}
	} 
	
	if (!empty($horario_aula) && !empty($horario_aula_name)){
		$nova_horario_aula = $objUpload->efetuarUpload($_FILES['horario_aula'],0);
			if(!$nova_horario_aula){
				$erro = $objUpload->Erro();
				header("Location:".$erro);
			} else {
				$objAcademia->setHorarioAula($nova_horario_aula);
				header("Location:".$msg);
			}
	} 

	$objAcademia->setImagem($imagem);
	$msg = $objAcademia->alterar($objAcademia);
	header("Location:".$msg);	
?>