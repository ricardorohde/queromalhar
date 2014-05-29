<?php 
	ob_start(); 
	include("configuracao.php"); 
	include($pathImg."public/class/Sessao.class.php");
	$objSessao = new Sessao();
	$objSessao->iniciarSessao();
	$msg = $objSessao->verificarSessao();
	if($msg != 1) {
		header("Location:".$msg);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>.: Quero Malhar - Usuários</title>
    <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1">
	<link href="<?php echo $pathImg."public/css/estilos.css"; ?>" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="<?php echo $pathImg."public/img/icon.ico"; ?>" type="text/css">
	<script language="javascript" src="<?php echo $pathImg."public/js/ajax.js"; ?>" type="text/javascript"></script>
    <script language="javascript" src="<?php echo $pathImg."public/js/jquery.js"; ?>" type="text/javascript"></script>
	<script language="javascript" src="<?php echo $pathImg."public/js/jquery.maskedinput.js"; ?>" type="text/javascript"></script>
	<script language="javascript" src="<?php echo $pathImg."public/js/jquery.price_format.js"; ?>" type="text/javascript"></script>    
	<script language="javascript" src="<?php echo $pathImg."public/js/geral.js"; ?>" type="text/javascript"></script>
</head>

<body bgcolor="#ffffff" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<table width="1280" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="2"><img name="bg_topo" src="<?php echo $pathImg."public/img/bg_topo.jpg"; ?>" width="1280" height="35" border="0" id="bg_topo" alt="" ></td>
	</tr>
	<tr>
		<td valign="bottom" background="<?php echo $pathImg."public/img/bg_conteudo.jpg"; ?>">	
			<table align="center" border="0" cellpadding="0" cellspacing="0" width="750">
				<tr>
					<td align="center" colspan="2"><img name="painel_r1_c1" src="<?php echo $pathImg."public/img/painel_r1_c1.jpg"; ?>" width="750" height="100" border="0" id="painel_r1_c1" alt="" ></td>
				</tr>
				<tr>
					<td align="left" colspan="2" class="perfil" height="25">
						&nbsp;Seja Bem-Vindo, <?php echo $_SESSION['nome']; ?>.
						<?php $data = date('d/m/Y',strtotime("now")); ?>
					</td>
				</tr>
				<tr>
				   <td colspan="2"><img name="painel_r3_c1" src="<?php echo $pathImg."public/img/linha.jpg"; ?>" width="750" height="11" border="0" id="painel_r3_c1" alt="" ></td>
				</tr>
				<tr>
					<td align="center" valign="top" width="20%" height="450"><?php include($pathImg."public/inc/menu_admin.php"); ?></td>
					<td valign="top"> &nbsp;<span class="perfil">Data:&nbsp;<?php echo $data; ?>&nbsp;&nbsp;</span>

