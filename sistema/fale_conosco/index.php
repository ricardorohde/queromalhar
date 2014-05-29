<?php include("../../public/inc/estrutura_admin.php");?>


<br /><br />

<table align="center" border="0" width="90%">
	<tr>
    	<td>
            <fieldset>
            <legend class="cadastro_titulo" align="center">Fale Conosco</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                                <tr>
                                    <td>
                                        <form method="post" action="envia_faleconosco.php" name="form_faleconosco" onSubmit="return ValidarFaleConosco();">
                                        <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                            <tr>
                                                <td>
                                                <fieldset>
                                                	<legend class="cadastro_titulo">Entre em Contato</legend>
                                                    <table align="center" border="0" cellspacing="1" cellpadding="2">
                                                        <tr>
                                                            <td width="20%" align="right" class="formulario">Nome:</td>
                                                            <td><input id="nome" class="box" type="text" size="50" maxlength="100" name="nome"></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="formulario">E-mail:</td>
                                                            <td><input id="email" class="box" type="text" size="50" maxlength="100" name="email"></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="formulario">Telefone:</td>
                                                            <td><input id="telefone" class="box" type="text" size="15" maxlength="13" name="telefone" onKeyPress="Bloqueia(this);MascaraTelefone(this);"></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%" align="right" class="formulario">Assunto:</td>
                                                            <td><input id="nome" class="box" type="text" size="50" maxlength="100" name="assunto"></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="formulario">Mensagem:</td>
                                                            <td><textarea id="mensagem" class="box" cols="38" rows="10" name="mensagem"></textarea></td>
                                                        </tr>
                                                        <tr>
                                                            <td height="5" colspan="2"></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" colspan="2">
                                                            	<input class="botao" type="submit"  value="Enviar">
                                                                &nbsp;&nbsp;
                                                            	<input class="botao" type="Reset"  value="Limpar">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </fieldset>
                                            	</td>
	                                        </tr>
                                        </table>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </fieldset>
		</td>
    </tr>
</table>

<br />

<?php include("../../public/inc/rodape_admin.php"); ?>