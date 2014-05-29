<?php  
ob_start(); 
include("../../public/inc/estrutura_admin.php"); 
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] != "adm") { 
	header("Location: ../acesso_negado.php");
}
ob_end_flush(); 
include("../../public/FCKeditor/fckeditor.php");
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
                                <legend class="cadastro_titulo">Cadastrar Nova História</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                <form action="grava_cadastrar.php" name="form_historia" method="post" onsubmit="return ValidarHistoria();" enctype="multipart/form-data">
                                <input type="Hidden" name="usuario" value="<?php echo $_SESSION['usuario']; ?>">
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Título:</td>
                                        <td><input type="text" class="box" name="titulo" size="50" maxlength="100"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Nome:</td>
                                        <td><input type="text" class="box" name="nome" size="50" maxlength="100"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">E-mail:</td>
                                        <td><input type="text" class="box" name="email" size="50" maxlength="100"></td>
                                    </tr>
                                    <tr>
                                        <td align="center" class="formulario" colspan="2">Texto</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" height="300">
                                        <?php
                                        $editor = new FCKeditor("texto");
                                        $editor-> BasePath = "/queromalhar/public/FCKeditor/";
                                        $editor-> Value = "";
                                        $editor-> Width = "100%";
                                        $editor-> Height = "300";
                                        $editor-> Create();
                                        ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Data:</td>
                                        <td><input id="data" type="text" class="box" name="data" size="12" maxlength="10" onblur="ValidaData(this);"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Fonte:</td>
                                        <td><input type="text" class="box" name="fonte" size="50" maxlength="100"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Status:</td>
                                        <td>
                                            <select name="status" class="txtForm">
                                                <option value=""></option>
                                                <option value="Ativado">Ativado</option>
                                                <option value="Desativado">Desativado</option>
                                            </select>		
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Imagem:</td>
                                        <td><input type="File" name="imagem"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center"><input class="botao" type="submit" value="Cadastrar"></td>	
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

