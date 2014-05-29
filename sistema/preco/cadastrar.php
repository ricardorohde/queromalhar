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
            <legend align="center" class="cadastro_titulo">Preço</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend class="cadastro_titulo">Cadastrar Novo Preço</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                <form action="grava_cadastrar.php" name="form_preco" method="post" onsubmit="return ValidarPreco();">
                                <input type="hidden" name="usuario" value="<?php echo $_SESSION["usuario"]; ?>">
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Produto:</td>
                                        <td><input type="text" class="box" name="produto" size="50" maxlength="100"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Valor:</td>
                                        <td><input id="valor" type="text" class="box" name="valor" size="20" maxlength="10"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Status:</td>
                                        <td>
                                            <select name="status" class="box">
                                                <option value=""></option>
                                                <option value="Ativado">Ativado</option>
                                                <option value="Desativado">Desativado</option>
                                            </select>		
                                        </td>
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