<?php 
   	include("../../public/inc/estrutura_admin.php"); 
	include("../../public/class/Usuario.class.php");
	#Criar Objeto Usuario
	$objUsuario = new Usuario();
	$objUsuario->setRegistro($_GET['registro']);
	$query = $objUsuario->visualizar($objUsuario);
?>

<br />

<?php
#Verificar se Administrador ou Usuário
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] == "adm") { 
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
                                <legend class="cadastro_titulo">Alterar Usuário</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                <form action="grava_alterar.php" name="form_usuario" method="post" onsubmit="return ValidarUsuario();">
								<?php 	while($array = $objUsuario->mostraRegistros($query)) { ?>
                                <input type="Hidden" name="registro" value="<?php echo base64_encode($array[usu_nu]); ?>">
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Nome:</td>
                                        <td><input type="text" class="box" name="nome" size="50" maxlength="100" value="<?php echo $array['usu_nome']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">E-Mail:</td>
                                        <td><input type="text" class="box" name="email" size="50" maxlength="100" value="<?php echo $array['usu_email']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Telefone:</td>
                                        <td><input type="text" class="box" name="telefone" size="25" maxlength="50" value="<?php echo $array['usu_telefone']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Pagamento:</td>
                                        <td>
                                        <select name="pagamento" class="txtForm">
                                            <option value="">:: Selecione ::</option>
                                            <option value="Boleto Bancário" <?php if($array['usu_pagamento'] == "Boleto Bancário"){ ?> selected <?php } ?>>Boleto Bancário</option>
                                            <option value="Transferência Banco do Brasil" <?php if($array['usu_pagamento'] == "Transferência Banco do Brasil"){ ?> selected <?php } ?>>Transferência Banco do Brasil</option>
                                            <option value="Transferência Caixa" <?php if($array['usu_pagamento'] == "Transferência Caixa"){ ?> selected <?php } ?>>Transferência Caixa</option>
                                        </select>	
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Como Conheceu:</td>
                                        <td>			
                                            <select name="como_conheceu">
                                                <option value="">:: Selecione ::</option>
                                                <option value="Amigos" <?php if($array['usu_site'] == "Amigos"){ ?> selected <?php } ?>>Amigos</option>
                                                <option value="Sites de Busca" <?php if($array['usu_site'] == "Sites de Busca"){ ?> selected <?php } ?>>Sites de Busca</option>
                                                <option value="Internet" <?php if($array['usu_site'] == "Internet"){ ?> selected <?php } ?>>Internet</option>
                                                <option value="Jornal" <?php if($array['usu_site'] == "Jornal"){ ?> selected <?php } ?>>Jornal</option>
                                                <option value="Revista" <?php if($array['usu_site'] == "Revista"){ ?> selected <?php } ?>>Revista</option>
                                                <option value="Outros" <?php if($array['usu_site'] == "Outros"){ ?> selected <?php } ?>>Outros</option>
                                            </select>			
                                        </td>		
                                    </tr>	
                                    <tr>
                                        <td align="right" class="formulario">CPF:</td>
                                        <td><input id="cpf" type="text" class="box" name="cpf" maxlength="14" size="25"  value="<?php echo $array['usu_cpf']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">RG:</td>
                                        <td><input type="text" class="box" name="rg" maxlength="14" size="20" value="<?php echo $array['usu_rg']; ?>"/></td>
                                    </tr>
                                    <?php if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] == "adm") { ?>
                                    <tr>
                                        <td align="right" class="formulario">Permissão:</td>
                                        <td>
                                        <select name="permissao" class="txtForm">
                                            <option value=""></option>
                                            <option value="adm" <?php if($array['usu_permissao'] == "adm"){ ?> selected <?php } ?>>Administrador</option>
                                            <option value="usr" <?php if($array['usu_permissao'] == "usr"){ ?> selected <?php } ?>>Usuário</option>
                                        </select>
                                        </td>
                                    </tr>
                                    <?php } } ?>
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

<?php } else { ?>


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
                                <legend class="cadastro_titulo">Alterar Usuário</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                <form action="grava_alterar.php" name="form_usuario" method="post" onsubmit="return ValidarUsuario();">
								<?php 	while($array = $objUsuario->mostraRegistros($query)) { ?>
                                <input type="Hidden" name="registro" value="<?php echo base64_encode($array[usu_nu]); ?>">
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Nome:</td>
                                        <input type="Hidden" name="nome" value="<?php echo $array['usu_nome']; ?>">
                                        <td class="mtexto"><?php echo $array['usu_nome']; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">E-Mail:</td>
                                        <td><input type="text" class="box" name="email" size="50" maxlength="100" value="<?php echo $array['usu_email']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Telefone:</td>
                                        <td><input type="text" class="box" name="telefone" size="25" maxlength="50" value="<?php echo $array['usu_telefone']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Pagamento:</td>
                                        <td>
                                        <select name="pagamento" class="txtForm">
                                            <option value="">:: Selecione ::</option>
                                            <option value="Boleto Bancário" <?php if($array['usu_pagamento'] == "Boleto Bancário"){ ?> selected <?php } ?>>Boleto Bancário</option>
                                            <option value="Transferência Banco do Brasil" <?php if($array['usu_pagamento'] == "Transferência Banco do Brasil"){ ?> selected <?php } ?>>Transferência Banco do Brasil</option>
                                            <option value="Transferência Caixa" <?php if($array['usu_pagamento'] == "Transferência Caixa"){ ?> selected <?php } ?>>Transferência Caixa</option>
                                        </select>	
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Como Conheceu:</td>
                                        <input type="Hidden" name="como_conheceu" value="<?php echo $array['usu_site']; ?>">
                                        <td class="mtexto"><?php echo $array['usu_site']; ?></td>		
                                    </tr>	
                                    <tr>
                                        <td align="right" class="formulario">CPF:</td>
                                        <input type="Hidden" name="cpf" value="<?php echo $array['usu_cpf']; ?>">
                                        <td  class="mtexto"><?php echo $array['usu_cpf']; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">RG:</td>
                                        <input type="Hidden" name="rg" value="<?php echo $array['usu_rg']; ?>">
                                        <td class="mtexto"><?php echo $array['usu_rg']; ?></td>
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

<?php } ?>

<?php include("../../public/inc/rodape_admin.php"); ?>



