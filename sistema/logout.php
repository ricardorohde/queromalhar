<?php
	ob_start(); 
	include("../public/class/Sessao.class.php");
	$objSessao = new Sessao();
	$objSessao->setLogin($_SESSION['login']);
	$objSessao->setNome($_SESSION['nome']);
	$objSessao->setRegistro($_SESSION['usuario']);
	$objSessao->iniciarSessao();
	$msg = $objSessao->logout($objSessao);
	header("Location:".$msg);
?>
