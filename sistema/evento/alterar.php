<?php 
ob_start(); 
include("../../public/inc/estrutura_admin.php"); 
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] != "adm") { 
	header("Location: ../acesso_negado.php");
}
ob_end_flush();  
include("../../public/class/Evento.class.php");
include("../../public/FCKeditor/fckeditor.php");
#Criar Objeto Evento
$objEvento = new Evento();
$objEvento->setRegistro($_GET['registro']);
$query = $objEvento->visualizar($objEvento);
?>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
	<tr>
		<td>
            <fieldset>
            <legend align="center" class="cadastro_titulo">Evento</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend class="cadastro_titulo">Alterar Evento</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                <form action="grava_alterar.php" name="form_evento" method="post" onsubmit="return ValidarEvento();" enctype="multipart/form-data">
                                    <?php 	while($array = $objEvento->mostraRegistros($query)) { ?>
                                    <input type="Hidden" name="registro" value="<?php echo base64_encode($array[eve_nu]); ?>">
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Nome:</td>
                                        <td><input type="text" class="box" name="nome" size="50" maxlength="100" value="<?php echo $array['eve_nome']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Local:</td>
                                        <td><input type="text" class="box" name="local" size="50" maxlength="100" value="<?php echo $array['eve_local']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="center" class="formulario" colspan="2">Informação</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" height="300">
                                        <?php
                                        $texto = $array['eve_informacao'];		
                                        $editor = new FCKeditor("informacao");
                                        $editor-> BasePath = "/queromalhar/public/FCKeditor/";
                                        $editor-> Value = "$texto";
                                        $editor-> Width = "100%";
                                        $editor-> Height = "300";
                                        $editor-> Create();
                                        ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Período:</td>
                                        <td><input type="text" class="box" name="periodo" size="50" maxlength="100" value="<?php echo $array['eve_periodo']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Data:</td>
                                        <td><input id="data" type="text" class="box" name="data" size="12" maxlength="10" onblur="ValidaData(this);" value="<?php echo $array['data']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Caminho Imagem:</td>
                                        <td class="mtexto"><?php echo $array['eve_imagem'];?></td>
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



