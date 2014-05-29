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
	$query	= $objBanner->visualizar($objBanner);
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
                                <legend class="cadastro_titulo">Alterar Banner</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                <form action="grava_alterar.php" name="form_banner" method="post" onsubmit="return ValidarBanner();" enctype="multipart/form-data">
								<?php 	while($array = $objBanner->mostraRegistros($query)) { ?>
                                <input type="Hidden" name="registro" value="<?php echo base64_encode($array[bnr_nu]); ?>">
                                    <tr>
                                        <td align="right" class="formulario">Nome:</td>
                                        <td><input type="text" class="box" maxlength="100" name="nome" size="50" value="<?php echo $array['bnr_nome']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Tipo:</td>
                                        <td align="left">
                                            <select name="tipo" class="box">
                                                <option value="Full" <?php if($array['bnr_tipo'] == "Full"){ ?> selected <?php } ?>>Full</option>
                                                <option value="Half" <?php if($array['bnr_tipo'] == "Half"){ ?> selected <?php } ?>>Half</option>
                                            </select>		
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Formato:</td>
                                        <td align="left">
                                            <select name="formato" class="box">
                                                <option value="GIF/JPG" <?php if($array['bnr_formato'] == "GIF/JPG"){ ?> selected <?php } ?>>GIF/JPG</option>
                                                <option value="SWF" <?php if($array['bnr_formato'] == "SWF"){ ?> selected <?php } ?>>SWF</option>
                                            </select>		
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">URL:</td>
                                        <td><input type="text" class="box" name="url" size="50" maxlength="200" value="<?php echo $array['bnr_url']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Imagem:</td>
                                        <td><input type="File" name="imagem"></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td align="center" colspan="2"><input class="botao" type="submit" value="Alterar" name="alterar"></td>	
                                    </tr> 
                                </form>
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