<?php 
	include("../../public/inc/estrutura_admin.php"); 
	include("../../public/class/Usuario.class.php");
	#Criar Objeto Usuario
	$objUsuario = new Usuario();
	$objUsuario->setRegistro($_GET['registro']);
	$query = $objUsuario->visualizar($objUsuario);
?>

<br />

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
                                <legend class="cadastro_titulo">Visualizar Usuário</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
									<?php 	while($array = $objUsuario->mostraRegistros($query)) { ?>
									<tr>
								        <td align="right" class="formulario" width="25%">Nome:</td>
										<td class="mtexto">&nbsp; <?php echo $array['usu_nome'] ?> </td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">E-Mail:</td>
										<td class="mtexto">&nbsp; <?php echo $array['usu_email'] ?> </td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Telefone:</td>
										<td class="mtexto">&nbsp; <?php echo $array['usu_telefone'] ?> </td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Pagmento:</td>
										<td class="mtexto">&nbsp; <?php echo $array['usu_pagamento'] ?> </td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Como Conheceu:</td>
										<td class="mtexto">&nbsp; <?php echo $array['usu_site'] ?> </td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">CPF:</td>
										<td class="mtexto">&nbsp; <?php echo $array['usu_cpf'] ?> </td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">RG:</td>
										<td class="mtexto">&nbsp; <?php echo $array['usu_rg'] ?> </td>
									</tr>
									<?php if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] == "adm") { ?>
									<tr>
										<td align="right" class="formulario">Permissão:</td>
										<td class="mtexto">&nbsp; <?php echo $array['usu_permissao'] ?> </td>
									</tr>
									<?php 	} } ?>
									<tr>
										<td colspan="2" align="center"><input class="botao" type="submit" value="Voltar" onclick="voltarPagina('index.php');"></td>	
									</tr>
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
