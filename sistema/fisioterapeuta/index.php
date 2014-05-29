<?php 
include("../../public/inc/estrutura_admin.php"); 
include("../../public/class/Servico.class.php");

#Criar Objeto Servico
$objFisioterapeuta = new Servico();
#Verificar se Administrador ou Usuário
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] == "adm") {  ?>

<br /><br />

<table align="center" border="0" width="90%">
	<tr>
    	<td>
            <fieldset>
            <legend class="cadastro_titulo" align="center">Fisoterapeuta</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <?php if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] == "adm") { ?>
                        <td align="left"><a href="cadastrar.php" class="link_adm">Novo Fisoterapeuta</a></td>
                        <td align="right"><a href="listar.php" class="link_adm">Listar Fisoterapeuta</a></td>	
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
                                        <legend class="cadastro_titulo">Pesquisar Fisioterapeuta</legend>
                                            <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                                <form  name="form_fisioterapeuta" method="post">
                                                <tr>
                                                    <td align="right" class="formulario" width="25%">Fisioterapeuta:</td>
                                                    <td><input type="text" class="box" maxlength="100" name="fisioterapeuta" size="40" onkeyup="pesquisarFisioterapeuta()"></td>
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
				<div id="divFisioterapeuta"></div>
            </fieldset>
		</td>
    </tr>
</table>

<br />

<?php } else { 
$query = $objFisioterapeuta->listarServicoUsuario();
?>

<br /><br />

<table align="center" border="0" width="90%">
	<tr>
    	<td>
            <fieldset>
            <legend class="cadastro_titulo" align="center">Fisoterapeuta</legend>
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
                                        <legend class="cadastro_titulo">Pesquisar Fisoterapeuta</legend>
                                            <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                                <form  name="form_fisioterapeuta" method="post" onsubmit="return ValidarServico();">
                                                <tr>
                                                    <td align="right" class="formulario" width="25%">Empresa:</td>
                                                    <td><input type="text" class="box" maxlength="100" name="empresa" size="40"></td>
                                                </tr></form>
                                            </table>
                                        </fieldset>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="25" colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <fieldset>
                            <legend class="cadastro_titulo">Tipo Fisoterapeutas Cadastrados</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="80%">
									<?php 
                                    $linhas = $objFisioterapeuta->totalRegistros($query);
                                    if ($linhas != 0) { 		
                                    while($array = $objFisioterapeuta->mostraRegistros($query)) { ?>
                                     <tr>
                                        <td width="80%" class="mtexto"><?php echo $array['srv_empresa']; ?></td>
                                        <td align="center"><a href="alterar.php?registro=<?php echo base64_encode($array[srv_nu]); ?>"><img src="../../public/img/btn_alterar.gif" border="0" title="  ALTERAR  "></a></td>
                                        <td align="center"><a href="visualizar.php?registro=<?php echo base64_encode($array[srv_nu]); ?>"><img src="../../public/img/btn_consultar.gif" border="0" title="  CONSULTAR  "></a></td>
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
				<br />
            </fieldset>
		</td>
    </tr>
</table>

<?php } ?>

<?php  include("../../public/inc/rodape_admin.php"); ?>	