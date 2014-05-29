<?php 
ob_start(); 
include("../../public/inc/estrutura_admin.php"); 
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] != "adm") { 
	header("Location: ../acesso_negado.php");
}
ob_end_flush(); 
include("../../public/class/Banner.class.php");
#Criar Objeto Banner
$objBanner = new Banner();
$objBanner->setRegistro($_GET['registro']);
$query = $objBanner->visualizar($objBanner);
?>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
	<tr>
		<td>
            <fieldset>
            <legend align="center" class="cadastro_titulo">Banner</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend class="cadastro_titulo">Visualizar Banner</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
									<?php 	while($array = $objBanner->mostraRegistros($query)) { ?>
									<tr>
								        <td align="right" class="formulario" width="25%">Nome:</td>
										<td class="mtexto">&nbsp; <?php echo $array['bnr_nome']; ?></td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Tipo:</td>
										<td class="mtexto">&nbsp; <?php echo $array['bnr_tipo']; ?></td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Formato:</td>
										<td class="mtexto">&nbsp; <?php echo $array['bnr_formato']; ?></td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">URL:</td>
										<td class="mtexto">&nbsp;<?php echo $array['bnr_url']; ?></td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Imagem:</td>
										<td class="mtexto">&nbsp;
										<?php 
										if ($array['bnr_imagem'] == "Sem Arquivo"){  
											echo "Banner sem Imagem!"; 
										} else {
										if($array['bnr_formato'] == "SWF"){ ?>
										<script type="text/javascript">
								AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','160','height','80','src','<?php echo $pathImg.$array['bnr_imagem']; ?>','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','<?php echo $pathImg.$array['bnr_imagem']; ?>' ); //end AC code
								</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="160" height="80">
											<param name="movie" value="<?php echo $pathImg.$array['bnr_imagem']; ?>">
											<param name="quality" value="high">
											<embed src="<?php echo $pathImg.$array['bnr_imagem']; ?>" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="160" height="80"></embed>
										</object></noscript>
										<?php } else { ?>
										<img src="<?php echo $pathImg.$array['bnr_imagem']; ?>" border="0" width="160" height="80">
										<?php } }?>
										</td>
									</tr>
									<?php 	} ?>
									<tr>
										<td colspan="2" align="center"><input class="botao" type="submit" value="Voltar" onclick="voltarPagina('index.php');"></td>	
									</tr> 
                                </table>
                            </fieldset>
                        </td>
                    </tr>
                </table>
				<br />
            </fieldset>
		</td>
	</tr>
</table>

<br />

<?php include("../../public/inc/rodape_admin.php"); ?>