<?php 
	ob_start(); 
	echo $_POST['usuario'];
	include("../../public/class/Enquete.class.php");
	#Criar Objeto Enquete
	$objEnquete = new Enquete();
	$data = date('Y-m-d',strtotime("now")); 
	$objEnquete->setUsuario($_POST['usuario']);
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
	$objEnquete->setData($data);
	$objEnquete->setStatus($_POST['status']);
	$msg = $objEnquete->cadastrar($objEnquete);
	header("Location:".$msg);
?>

