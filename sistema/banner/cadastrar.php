<?php 
ob_start(); 
include("../../public/inc/estrutura_admin.php"); 
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] != "adm") { 
	header("Location: ../acesso_negado.php");
}
ob_end_flush(); 
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
                                <legend class="cadastro_titulo">Cadastrar Novo Banner</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                <form action="grava_cadastrar.php" name="form_banner" method="post" onsubmit="return ValidarBanner();" enctype="multipart/form-data">
                                <input type="Hidden" name="usuario" value="<?php echo $_SESSION["usuario"]; ?>">
                                    <tr>
                                        <td align="right" class="formulario">Nome:</td>
                                        <td><input type="text" class="box" maxlength="100" name="nome" size="50"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Tipo:</td>
                                        <td align="left">
                                            <select name="tipo" class="box">
                                                <option value=""></option>
                                                <option value="Full">Full</option>
                                                <option value="Half">Half</option>
                                            </select>		
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Formato:</td>
                                        <td align="left">
                                            <select name="formato" class="box">
                                                <option value=""></option>
                                                <option value="GIF/JPG">GIF/JPG</option>
                                                <option value="SWF">SWF</option>
                                            </select>		
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">URL:</td>
                                        <td><input type="text" class="box" name="url" size="50" maxlength="200"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Imagem:</td>
                                        <td><input type="File" name="imagem"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center"><input class="botao" type="submit" value="Cadastrar" name="cadastrar"></td>	
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