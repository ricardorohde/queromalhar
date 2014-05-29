<?php
	ob_start(); 
	include("public/class/Enquete.class.php");
	#Criar Objeto Enquete
	$objEnquete = new Enquete();
	$objEnquete->setRegistro($_POST['registro']);
	$objEnquete->setResposta($_POST['resposta']);
	$objEnquete->setIp($_SERVER['REMOTE_ADDR']);
	$qryIp = $objEnquete->buscarIp($objEnquete);
	$linhasIp = $objEnquete->totalRegistros($qryIp);
	if($linhasIp == 0){
		$qryEnquete = $objEnquete->buscarEnquete($objEnquete);
		$mostrar_enquete = $objEnquete->mostraRegistros($qryEnquete);
		$qtotal =  $mostrar_enquete['enq_total'] + 1;
		$qresposta = $mostrar_enquete['enq'] + 1;
		$objEnquete->setQResposta($qresposta);
		$objEnquete->setTotal($qtotal);
		$objEnquete->atualizarEnquete($objEnquete);
		$objEnquete->cadastrarVotacao($objEnquete);
		header("Location:mensagem/11/");
	} else {
		header("Location:mensagem/12/");
	}
?>

