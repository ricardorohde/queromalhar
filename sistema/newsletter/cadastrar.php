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
            <legend align="center" class="cadastro_titulo">Newsletter</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend class="cadastro_titulo">Cadastrar Nova Newsletter</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                    <form action="grava_cadastrar.php" name="form_newsletter" method="post" onsubmit="return ValidarNewsletter();">
                                        <tr>
                                            <td align="right" class="formulario" width="25%">Nome:</td>
                                            <td><input id="nome" type="text" class="box" name="nome" size="50" maxlength="100"></td>
                                        </tr>
                                        <tr>
                                            <td align="right" class="formulario" width="25%">E-mail:</td>
                                            <td><input id="email" type="text" class="box" name="email" size="50" maxlength="100"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center"><input class="botao" type="submit" value="Cadastrar" id="btn_cadastrar_newsletter"></td>	
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