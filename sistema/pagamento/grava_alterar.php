<?php 
	ob_start(); 
	include("../../public/class/Pagamento.class.php");
	include("../../public/class/Upload.class.php");
	#Criar Objeto Pagamento
	$objPagamento = new Pagamento();
	$objPagamento->setRegistro($_POST['registro']);
	$objPagamento->setUsuario($_POST['usuario']);
	$objPagamento->setMes($_POST['mes']);
	$objPagamento->setValor($_POST['valor']);
	$objPagamento->setStatus($_POST['status']);
	$objPagamento->setPagamento($_POST['pagamento']);
	$objPagamento->setVencimento($_POST['vencimento']);
	$objPagamento->setTipo($_POST['tipo']);
	$arquivo = $_FILES['imagem']['name'];
	#Criar Objeto Upload
	$objUpload = new Upload();
	$imagem = $objPagamento->verificarImagem($objPagamento);
	if (!empty($imagem) && !empty($arquivo)){
		$nova_imagem = $objUpload->efetuarUpload($_FILES['imagem'],0);
			if(!$nova_imagem){
				$erro = $objUpload->Erro();
				header("Location:".$erro);
			} else {
				$objPagamento->setBoleto($nova_imagem);
				$msg = $objPagamento->alterar($objPagamento);
				header("Location:".$msg);
			}
	} else {
	 	$objPagamento->setBoleto($imagem);
		$msg = $objPagamento->alterar($objPagamento);
		header("Location:".$msg);
	 }
?>