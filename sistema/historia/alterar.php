<?php 
ob_start(); 
include("../../public/inc/estrutura_admin.php"); 
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] != "adm") { 
	header("Location: ../acesso_negado.php");
}
ob_end_flush(); 
include("../../public/FCKeditor/fckeditor.php");
include("../../public/class/Historia.class.php");
#Criar Objeto Historia
$objHistoria = new Historia();
$objHistoria->setRegistro($_GET['registro']);
$query = $objHistoria->visualizar($objHistoria);
?>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
	<tr>
		<td>
            <fieldset>
            <legend align="center" class="cadastro_titulo">História</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend class="cadastro_titulo">Alterar História</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                <form action="grava_alterar.php" name="form_historia" method="post" onsubmit="return ValidarHistoria();" enctype="multipart/form-data">
                                    <?php 	while($array = $objHistoria->mostraRegistros($query)) { ?>
                                    <input type="Hidden" name="registro" value="<?php echo base64_encode($array[hit_nu]); ?>">
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Título:</td>
                                        <td><input type="text" class="box" name="titulo" size="50" maxlength="100" value="<?php echo $array['hit_titulo']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Nome:</td>
                                        <td><input type="text" class="box" name="nome" size="50" maxlength="100" value="<?php echo $array['hit_nome']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">E-mail:</td>
                                        <td><input type="text" class="box" name="email" size="50" maxlength="100" value="<?php echo $array['hit_email']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="center" class="formulario" colspan="2">Texto</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" height="300">
                                        <?php
                                        $texto = $array['hit_texto'];		
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
                                        <td align="right" class="formulario" width="25%">Data:</td>
                                        <td><input id="data" type="text" class="box" name="data" size="12" maxlength="10" onblur="ValidaData(this);" value="<?php echo $array['data']; ?>"></td>
                                    </tr>	
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Fonte:</td>
                                        <td><input type="text" class="box" name="fonte" size="50" maxlength="100" value="<?php echo $array['hit_fonte']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Status:</td>
                                        <td>
                                            <select name="status" class="txtForm">
                                                <option value=""></option>
                                                <option value="Ativado" <?php if($array['hit_status'] == "Ativado"){ ?> selected <?php } ?>>Ativado</option>
                                                <option value="Desativado" <?php if($array['hit_status'] == "Desativado"){ ?> selected <?php } ?>>Desativado</option>
                                            </select>
                                        </td>
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



