<?php 
include("../../public/inc/estrutura_admin.php"); 
include("../../public/class/Dica.class.php");
#Criar Objeto Dica
$objDica = new Dica();
#Verificar se Administrador ou Usuário
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] == "adm") { ?>

<br /><br />

<table align="center" border="0" width="90%">
	<tr>
    	<td>
            <fieldset>
            <legend class="cadastro_titulo" align="center">Dica</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td align="left"><a href="cadastrar.php" class="link_adm">Nova Dica</a></td>
                        <td align="right"><a href="listar.php" class="link_adm">Listar Dica</a></td>		
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
                                        <legend class="cadastro_titulo">Pesquisar Dica</legend>
                                            <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                                <form name="form_dica" method="post">
                                                <tr>
                                                    <td align="right" class="formulario" width="25%" >Fonte:</td>
                                                    <td><input type="text" class="box" maxlength="100" name="fonte" size="40" onkeyup="pesquisarDica();"></td>
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
				<div id="divDica"></div>
            </fieldset>
		</td>
    </tr>
</table>

<br />

<?php } else { 
$query = $objDica->listarDicaUsuario();
?>

<br /><br />

<table align="center" border="0" width="90%">
	<tr>
    	<td>
            <fieldset>
            <legend class="cadastro_titulo" align="center">Dica</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td align="left"><a href="cadastrar.php" class="link_adm">Nova Dica</a></td>
                    </tr>
                    <tr>
                        <td height="10" colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <fieldset>
                            <legend class="cadastro_titulo">Dicas Cadastradas</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="80%">
									<?php $linhas = $objDica->totalRegistros($query);
                                    if ($linhas != 0) {
                                    while($array = $objDica->mostraRegistros($query)) { ?>
                                     <tr>
                                        <td width="80%" class="mtexto"><?php echo $array['dic_fonte']; ?> - <span class="status"><?php echo $array['dic_status']; ?></td>
                                        <td align="center"><a href="excluir.php?registro=<?php echo base64_encode($array[dic_nu]);?>" class="excluir"><img src="../../public/img/btn_excluir.gif" border="0" title="  EXCLUIR  "></a></td>
                                        <td align="center"><a href="alterar.php?registro=<?php echo base64_encode($array[dic_nu]); ?>"><img src="../../public/img/btn_alterar.gif" border="0" title="  ALTERAR  "></a></td>
                                        <td align="center"><a href="visualizar.php?registro=<?php echo base64_encode($array[dic_nu]); ?>"><img src="../../public/img/btn_consultar.gif" border="0" title="  CONSULTAR  "></a></td>
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

<br />

<?php } ?>

<?php  include("../../public/inc/rodape_admin.php"); ?>