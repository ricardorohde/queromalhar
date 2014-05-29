<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>.: QueroMalhar - Um site para quem se cuida</title>	
	<base href="http://localhost/queromalhar/" />
    <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="robots" content="all" />
	<meta name="content-language" content="pt-br" />
	<meta name="author" content="Fernando Aires" />
	<meta name="description" content="Academias Brasil" />
	<meta name="keywords" content="acadmias, dicas, nutricionistas, fisioterapeutas, spas, personal trainer, lojas esportivas, notícias, eventos" />
	<meta http-equiv="cache-control" content="no-cache" />		
	<link href="public/css/estilos.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="public/img/icon.ico" />
   	<script language="javascript" src="public/js/ajax.js" type="text/javascript"></script>
    <script language="javascript" src="public/js/jquery.js" type="text/javascript"></script>
	<script language="javascript" src="public/js/jquery.maskedinput.js" type="text/javascript"></script>
    <script language="javascript" src="public/js/jquery.validate.js" type="text/javascript"></script>
    <script language="javascript" src="public/js/jquery.price_format.js" type="text/javascript"></script>    
	<script language="javascript" src="public/js/geral.js" type="text/javascript"></script>
	<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
		try {
		var pageTracker = _gat._getTracker("UA-3911948-1");
		pageTracker._trackPageview();
		} catch(err) {}
	</script>
</head>
<?php   
include("public/class/Banner.class.php");
include("public/class/Dica.class.php");
include("public/class/Noticia.class.php");
include("public/class/Evento.class.php");
include("public/class/Enquete.class.php");
include("public/class/Historia.class.php");
include("public/class/Servico.class.php");
include("public/class/UrlManage.class.php");
include("public/inc/abreviar.php");
$objBannerHalf = new Banner();
$qryBannerHalf = $objBannerHalf->listarBannerHalf();
$objBannerFull = new Banner();
$qryBannerFull = $objBannerFull->listarBannerFull();
$objDica = new Dica();
$qryDica = $objDica->listarDica03();
$objNoticia = new Noticia();
$qryNoticia = $objNoticia->listarNoticia04();
$objEvento = new Evento();
$qryEvento = $objEvento->listarEvento01();
$objEvento1 = new Evento();
$qryEvento1 = $objEvento1->listarEvento02();
?>

<body bgcolor="#FF8C21" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">

<!--- Logo e Menu --->
<table width="1280" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td><img name="bg_topo" src="/public/img/bg_topo.jpg" width="1280" height="35" border="0" id="bg_topo" alt="" ></td>
	</tr>
	<tr>
		<td valign="bottom" background="public/img/bg_conteudo.jpg">			
			<table align="center" border="0" cellpadding="0" cellspacing="0" width="750">
				<tr>
			    	<td align="center" colspan="3"><img name="logo" src="public/img/logo.jpg" width="750" height="102" border="0" id="logo" alt="" ></td>
				</tr>
				<tr>
					<td align="left" height="35"><img name="preciso" src="public/img/preciso.jpg" width="102" height="20" border="0" id="preciso" alt="" ></td>
					<td align="left" height="35">
						<table align="center" border="0" background="public/img/menu.jpg" width="534" height="18">
							<tr>
								<td><a href="pesquisa-academia" class="link">&nbsp;Academias&nbsp;</a></td>
								<td><a href="pesquisa-fisioterapeuta" class="link">Fisioterapeutas&nbsp;</a></td>
								<td><a href="pesquisa-loja-esportiva" class="link">&nbsp;Lojas Esportivas&nbsp;</a></td>
								<td><a href="pesquisa-nutricionista" class="link">Nutricionistas&nbsp;&nbsp;</a></td>
								<td><a href="pesquisa-personal-trainer" class="link">Personal Trainers&nbsp;&nbsp;</a></td>
								<td><a href="pesquisa-spa" class="link">&nbsp;Spas&nbsp;&nbsp;</a></td>
								<td><a href="fale-conosco" class="link">&nbsp;Fale Conosco&nbsp;</a></td>								
							</tr>
						</table>
					</td>		
					<td align="right" height="35"><a href="index.php"><img name="home" src="public/img/home.jpg" width="49" height="20" border="0" id="home" alt="" ></a></td>
				</tr>
			</table>
			
			<br />
			
			<table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="750">
				<tr>
					<td align="center">
						<table cellpadding="0" cellspacing="0" width="100%">
							<?php $linhasBannerFull = $objBannerFull->totalRegistros($qryBannerFull);
							if ($linhasBannerFull != 0) { 		
							while($aryBannerFull = $objBannerFull->mostraRegistros($qryBannerFull)) { 
							if($aryBannerFull['bnr_formato'] == "SWF"){ ?>
							<tr>
								<td align="center" >
									<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="605" height="100">
										<param name="movie" value="<?php echo $aryBannerFull['bnr_imagem']; ?>">
										<param name="quality" value="high">
										<embed src="<?php echo $aryBannerFull['bnr_imagem']; ?>" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="160" height="80"></embed>
									</object>
								</td>
							</tr>
							<?php } else { ?>
							<tr>
								<td align="center"><a href="<?php echo $aryBannerFull['bnr_url']; ?>" target="_blank"><img src="<?php echo $aryBannerFull['bnr_imagem']; ?>" border="0" width="605" height="100"></a></td>
							</tr>
							<?php } } } else { ?>
							<tr>
								<td align="center" class="mensagem" colspan="2" height="25" valign="middle">Nenhum Registro Encontrado!</td>
							</tr>		
							<?php } ?>							
						</table>
					</td>
				</tr>
			</table>
			
			<br />
			
			<!--- Notícias e Dicas --->
			
			<?php if ($_SERVER['SCRIPT_NAME'] == "/queromalhar/index.php"){ ?>
			<table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="750">
				<tr>
					<td height="21" width="290"><img name="noticias" src="public/img/noticias.jpg" width="289" height="21" border="0" id="noticias" alt="" ></td>
					<td align="right" height="21" width="460"><img name="dicas" src="public/img/dicas.jpg" width="449" height="21" border="0" id="dicas" alt="" ></td>
				</tr>
				<tr>
					<td height="162" width="290" valign="top">
						<table border="0" cellpadding="1" cellspacing="0" height="162" width="100%">
							<?php $linhasNoticia = $objNoticia->totalRegistros($qryNoticia);
							if ($linhasNoticia != 0) { 		
							while($exibirNoticia = $objNoticia->mostraRegistros($qryNoticia)){ 
							$linkNoticia = UrlManage::getUrl($exibirNoticia['not_nu'],"noticias",$exibirNoticia['not_titulo']); ?>
							<tr>
								<td class="data" height="45" valign="top">[<?php echo $exibirNoticia['data']; ?>]&nbsp;<a href="<?php echo $linkNoticia; ?>" class="noticia_link"><?php echo $exibirNoticia['not_titulo']; ?></a></td>
							</tr>
							<?php }  ?>
							<tr>
								<td colspan="2" align="right" valign="top"><a href="noticias"><img name="bt_outras_noticias" src="public/img/bt_outras_noticias.jpg" width="87" height="13" border="0" id="bt_outras_noticias" alt="" ></a>&nbsp;&nbsp;</td>
							</tr>		
							<?php } else { ?>
							<tr>
								<td align="center" class="mensagem">Nenhum Registro Encontrado!</td>
							</tr>				
							<?php } ?>	
						</table>		
					</td>
					<td height="162" width="460">
						<table border="0" cellpadding="0" cellspacing="0" height="162" width="100%">
							<?php $linhasDica = $objDica->totalRegistros($qryDica);
							if ($linhasDica != 0) { 		
							while($exibirDica = $objDica->mostraRegistros($qryDica)) { 
							$linkDica = UrlManage::getUrl($exibirDica['dic_nu'],"dicas",$exibirDica['dic_titulo']); ?>
							<tr>
								<td align="right" width="15"></td>
								<td valign="top" class="texto" width="415"><img name="seta" src="public/img/seta.jpg" width="12" height="8" border="0" id="seta" alt="" > &nbsp;<a href="<?php echo $linkDica; ?>" class="dica_link"><?php echo $exibirDica['dic_titulo']; ?></a></td>
							</tr>
							<?php }  ?>
							<tr>
								<td colspan="2" align="right"><a href="dicas"><img name="bt_outras_dicas" src="public/img/bt_outras_dicas.jpg" width="76" height="13" border="0" id="bt_outras_dicas" alt="" ></a>&nbsp;&nbsp;</td>
							</tr>		
							<?php } else { ?>
							<tr>
								<td align="center" class="mensagem">Nenhum Registro Encontrado!</td>
							</tr>				
							<?php } ?>	
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="2" height="2"></td>
				</tr>
			</table>
			<?php } ?>			
			<!--- Conteúdo do Site --->
			<table align="center" border="0" cellpadding="0" cellspacing="0" width="750">
				<tr>
					<td height="400" width="560" valign="top">
