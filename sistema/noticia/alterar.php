<?php 
ob_start(); 
include("../../public/inc/estrutura_admin.php"); 
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] != "adm") { 
	header("Location: ../acesso_negado.php");
}
ob_end_flush(); 
include("../../public/class/Noticia.class.php");
include("../../public/FCKeditor/fckeditor.php");
#Criar Objeto Noticia
$objNoticia = new Noticia();
$objNoticia->setRegistro($_GET['registro']);
$query = $objNoticia->visualizar($objNoticia);
?>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
	<tr>
		<td>
            <fieldset>
            <legend align="center" class="cadastro_titulo">Notícia</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend class="cadastro_titulo">Alterar Notícia</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                <form action="grava_alterar.php" name="form_noticia" method="post" onsubmit="return ValidarNoticia();" enctype="multipart/form-data">
								<?php 	while($array = $objNoticia->mostraRegistros($query)) { ?>
                                <input type="Hidden" name="registro" value="<?php echo base64_encode($array['not_nu']); ?>">
                                    <tr>
                                        <td align="right" class="formulario">Título:</td>
                                        <td><input type="text" class="box" maxlength="100" name="titulo" size="50" value="<?php echo $array['not_titulo']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="center" class="formulario" colspan="2">Texto</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" height="300">
                                        <?php
                                        $texto = $array['not_texto'];		
                                        $editor = new FCKeditor("texto");
                                        $editor-> BasePath = "/queromalhar/public/FCKeditor/";
                                        $editor-> Value = "$texto";
                                        $editor-> Width = "100%";
                                        $editor-> Height = "300";
                                        $editor-> Create();
                                        ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Autor/Fonte:</td>
                                        <td><input type="text" class="box" maxlength="100" name="autor" size="40" value="<?php echo $array['not_autor']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Data:</td>
                                        <td><input id="data" type="text" class="box" name="data" size="12" maxlength="10" onblur="ValidaData(this);" value="<?php echo $array['data']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Caminho Imagem:</td>
                                        <td class="mtexto"><?php echo $array['not_imagem'];?></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Imagem:</td>
                                        <td><input type="File" name="imagem"></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td align="center" colspan="2"><input class="botao" type="submit" value="Alterar"></td>	
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
