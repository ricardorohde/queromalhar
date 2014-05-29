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
            <legend align="center" class="cadastro_titulo">Usuário</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend class="cadastro_titulo">Cadastrar Novo Usuário</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                <form action="grava_cadastrar.php" name="form_usuario" method="post" onsubmit="return ValidarUsuario();">
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Nome:</td>
                                        <td><input type="text" class="box" name="nome" size="50" maxlength="100"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">E-Mail:</td>
                                        <td><input type="text" class="box" name="email" size="50" maxlength="100"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Telefone:</td>
                                        <td><input type="text" class="box" name="telefone" size="25" maxlength="50"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Pagamento:</td>
                                        <td>		
                                        <select name="pagamento" class="txtForm">
                                            <option value="">:: Selecione ::</option>
                                            <option value="Boleto Bancário">Boleto Bancário</option>
                                            <option value="Transferência Banco do Brasil">Transferência Banco do Brasil</option>
                                            <option value="Transferência Caixa">Transferência Caixa</option>								
                                        </select>		
                                        </td>		
                                    </tr>	
                                    <tr>
                                        <td align="right" class="formulario">Como Conheceu:</td>
                                        <td>			
                                            <select name="como_conheceu">
                                                <option value="">:: Selecione ::</option>
                                                <option value="Sites de Busca">Sites de Busca</option>
                                                <option value="Internet">Internet</option>
                                                <option value="Jornal">Jornal</option>
                                                <option value="Revista">Revista</option>
                                                <option value="Amigos">Amigos</option>
                                                <option value="Outros">Outros</option>
                                            </select>			
                                        </td>		
                                    </tr>	
                                    <tr>
                                        <td align="right" class="formulario">CPF:</td>
                                        <td><input id="cpf" type="text" class="box" name="cpf" maxlength="14" size="25" ></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">RG:</td>
                                        <td><input type="text" class="box" name="rg" maxlength="14" size="20"/></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Senha:</td>
                                        <td><input class="box" type="password" size="18" name="senha" maxlength="8" ></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Confirma Senha:</td>
                                        <td><input class="box"  type="Password" name="confirma_senha" size="18" maxlength="8"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Permissão:</td>
                                        <td>
                                        <select name="permissao" class="txtForm">
                                            <option value=""></option>
                                            <option value="adm">Administrador</option>
                                            <option value="usr">Usuário</option>
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