<?php 
include("../../public/inc/estrutura_admin.php"); 
include("../../public/class/Usuario.class.php");
$objUsuario = new Usuario();
#Verificar se Administrador ou Usuário
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] == "adm") {  ?>

<br /><br />

<table align="center" border="0" width="90%">
	<tr>
    	<td>
            <fieldset>
            <legend class="cadastro_titulo" align="center">Usuário</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <?php if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] == "adm") { ?>
                        <td align="left"><a href="cadastrar.php" class="link_adm">Novo Usuário</a></td>		
                        <td align="right"><a href="listar.php" class="link_adm">Listar Usuário</a></td>
                        <?php } ?>		
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
                                        <legend class="cadastro_titulo">Pesquisar Usuário</legend>
                                            <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                                <form name="form_usuario" method="post">
                                                <tr>
                                                    <td align="right" class="formulario" width="25%" >Nome:</td>
                                                    <td><input type="text" class="box" maxlength="100" name="nome" size="40" onkeyup="pesquisarUsuario();"></td>
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
				<div id="divUsuario"></div>
            </fieldset>
		</td>
    </tr>
</table>

<br />

<?php 
} else { 
$query = $objUsuario->listarUsuarioDados();
?>


<br /><br />

<table align="center" border="0" width="90%">
	<tr>
    	<td>
            <fieldset>
            <legend class="cadastro_titulo" align="center">Usuário</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td align="left"><a href="cadastrar.php" class="link_adm">Novo Tipo Serviço</a></td>
                        <td align="right"><a href="listar.php" class="link_adm">Listar Tipo Serviço</a></td>		
                    </tr>
                    <tr>
                        <td height="10" colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <fieldset>
                            <legend class="cadastro_titulo">Seus Dados</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="80%">
									<?php
                                    $linhas = $objUsuario->totalRegistros($query);
                                    if ($linhas != 0) { 
                                    while($array = $objUsuario->mostraRegistros($query)) { ?>
                                     <tr>
                                        <td width="80%" class="mtexto"><?php echo $array['usu_nome']; ?></td>
                                        <td align="center"><a href="alterar.php?registro=<?php echo base64_encode($array[usu_nu]); ?>"><img src="../../public/img/btn_alterar.gif" border="0" title="  ALTERAR  "></a></td>
                                        <td align="center"><a href="visualizar.php?registro=<?php echo base64_encode($array[usu_nu]); ?>"><img src="../../public/img/btn_consultar.gif" border="0" title="  CONSULTAR  "></a></td>
                                    </tr>
                                    <?php } } else { ?>
                                    <tr> 
                                        <td align="center" colspan="4" class="mensagem">Nenhum Registro Encontrado!</td>
                                     </tr>		
<?php } ?> 
                                </table>
                            </fieldset>                   
                        </td>
                    </tr>
                </table>
            </fieldset>
		</td>
    </tr>
</table>

<?php } ?>

<br />

<?php include("../../public/inc/rodape_admin.php"); ?>	