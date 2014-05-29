<?php 
	ob_start(); 
	include("../../public/class/Pagamento.class.php");
	include("../../public/class/Upload.class.php");
	#Criar Objeto Pagamento
	$objPagamento = new Pagamento();
	$objUpload = new Upload();
	$imagem = $objUpload->efetuarUpload($_FILES['imagem'],0);
	if(!$imagem){
		$erro = $objUpload->Erro();
		header("Location:".$erro);
	} else {
		$objPagamento->setUsuario($_POST['usuario']);
		$objPagamento->setMes($_POST['mes']);
		$objPagamento->setValor($_POST['valor']);
		$objPagamento->setVencimento($_POST['vencimento']);
		$objPagamento->setStatus($_POST['status']);
		$objPagamento->setTipo($_POST['tipo']);
		$objPagamento->setBoleto($imagem);
		$msg = $objPagamento->cadastrar($objPagamento);
		header("Location:".$msg);
	}
?>
