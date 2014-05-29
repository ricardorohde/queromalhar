<?php 
	ob_start(); 
	include("../../public/class/Enquete.class.php");
	#Criar Objeto Enquete
	$objEnquete = new Enquete();
	$objEnquete->setRegistro($_POST['registro']);
	$objEnquete->setPergunta($_POST['pergunta']);
	$objEnquete->setTipo($_POST['tipo']);
	if($_POST['tipo'] == "multipla"){
	$objEnquete->setResp1($_POST['resposta1']);
	$objEnquete->setResp2($_POST['resposta2']);
	$objEnquete->setResp3($_POST['resposta3']);
	$objEnquete->setResp4($_POST['resposta4']);
	} else {
	$objEnquete->setResp1("Sim");
	$objEnquete->setResp2("Não");
	}
	$objEnquete->setStatus($_POST['status']);
	$msg = $objEnquete->alterar($objEnquete);
	header("Location:".$msg);
?>
