<?php 
   	include("../../public/inc/estrutura_admin.php"); 
	include("../../public/class/Dica.class.php");
	include("../../public/FCKeditor/fckeditor.php");
	#Criar Objeto Dica
	$objDica = new Dica();
	$objDica->setRegistro($_GET['registro']);
	$query = $objDica->visualizar($objDica);
?>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
	<tr>
		<td>
            <fieldset>
            <legend align="center" class="cadastro_titulo">Dica</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend class="cadastro_titulo">Alterar Dica</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                <form action="grava_alterar.php" name="form_dica" method="post" onsubmit="return ValidarDica();"  enctype="multipart/form-data">
								<?php 	while($array = $objDica->mostraRegistros($query)) { ?>
                                <input type="Hidden" name="registro" value="<?php echo base64_encode($array[dic_nu]); ?>">
				                    <tr>
                                        <td align="right" class="formulario" width="25%">Título:</td>
                                        <td><input type="text" class="box" name="titulo" size="50" maxlength="100" value="<?php echo $array['dic_titulo']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Fonte:</td>
                                        <td><input type="text" class="box" name="fonte" size="50" maxlength="100" value="<?php echo $array['dic_fonte']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="center" class="formulario" colspan="2">Texto</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" height="300">
                                        <?php
                                        $texto = $array['dic_texto'];		
                                        $editor = new FCKeditor("texto");
                                        $editor-> BasePath = "/queromalhar/public/FCKeditor/";
                                        $editor-> Value = "$texto";
                                        $editor-> Width = "100%";
                                        $editor-> Height = "300";
                                        $editor-> Create();
                                        ?>
                                        </td>
                                    </tr>
                                    <?php if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] == "adm") { ?>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Status:</td>
                                        <td>
                                            <select name="status" class="txtForm">
                                                <option value=""></option>
                                                <option value="Ativado" <?php if($array['dic_status'] == "Ativado"){ ?> selected <?php } ?>>Ativado</option>
                                                <option value="Desativado" <?php if($array['dic_status'] == "Desativado"){ ?> selected <?php } ?>>Desativado</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <?php } else { ?>
                                    <input type="Hidden" name="status" value="<?php echo $array['dic_status']; ?>">
                                    <?php } ?>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Data:</td>
                                        <td><input id="data" type="text" class="box" name="data" size="12" maxlength="10" onblur="ValidaData(this);" value="<?php echo $array['data']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Imagem:</td>
                                        <td><input type="File" name="imagem"></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="2" align="center"><input class="botao" type="submit" value="Alterar" name="alterar"></td>	
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



