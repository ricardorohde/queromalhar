<?php 
ob_start(); 
include("../../public/inc/estrutura_admin.php"); 
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] != "adm") { 
	header("Location: ../acesso_negado.php");
}
ob_end_flush(); 
?>
<br />

<table align="center" border="0" width="90%">
	<tr>
    	<td>
            <fieldset>
            <legend class="cadastro_titulo" align="center">Banner</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td align="left"><a href="cadastrar.php" class="link_adm">Novo Banner</a></td>
                        <td align="right"><a href="listar.php" class="link_adm">Listar Banner</a></td>		
                    </tr>
                    <tr>
                        <td height="10" colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                                <tr>
                                    <td>
                                        <fieldset>
                                        <legend class="cadastro_titulo">Pesquisar Banner</legend>
                                            <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                                <form name="form_banner" method="post">
                                                <tr>
                                                    <td align="right" class="formulario" width="25%" >Nome:</td>
                                                    <td><input type="text" class="box" maxlength="100" name="nome" size="40" onkeyup="pesquisarBanner();"></td>
                                                </tr>
                                                </form>
                                            </table>
                                        </fieldset>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <div id="divBanner"></div>
            </fieldset>
		</td>
    </tr>
</table>

<br />

<?php  include("../../public/inc/rodape_admin.php"); ?>