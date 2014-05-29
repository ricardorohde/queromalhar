<?php include("../../public/inc/estrutura_admin.php"); ?>

<br /><br />

<table align="center" border="0" width="90%">
	<tr>
    	<td>
            <fieldset>
            <legend class="cadastro_titulo" align="center">Senha</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                                <tr>
                                    <td>
                                        <fieldset>
                                        <legend class="cadastro_titulo">Alterar Senha</legend>
                                            <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                                <form action="grava_alterar.php" name="form_altera_senha" method="post" onsubmit="return ValidarSenha();">
                                                <input type="hidden" name="registro" value="<?php echo $_SESSION['usuario'];?>">
                                                <tr>
                                                    <td align="right" width="45%" class="formulario">Senha:</td>
                                                    <td><input type="Password" class="box" name="senha" size="20" maxlength="8"></td>
                                                </tr>
                                                <tr>
                                                    <td align="right" class="formulario" >Confirma Senha:</td>
                                                    <td><input type="Password" class="box" name="confirma_senha" size="20" maxlength="8"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" align="center"><input class="botao" type="submit" value="Alterar"></td>	
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
				<br />
            </fieldset>
		</td>
    </tr>
</table>

<br />

<?php include("../../public/inc/rodape_admin.php"); ?>

