<?php 
include("../../public/inc/estrutura_admin.php"); 
include("../../public/class/Pagamento.class.php");
#Criar Objeto Pagamento
$objPagamento = new Pagamento();
#Verificar se Administrador ou Usuário
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] == "adm") {  ?>

<br /><br />

<table align="center" border="0" width="90%">
	<tr>
    	<td>
            <fieldset>
            <legend class="cadastro_titulo" align="center">Pagamento</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td align="left"><a href="cadastrar.php" class="link_adm">Novo Pagamento</a></td>
                        <td align="right"><a href="listar.php" class="link_adm">Listar Pagamento</a></td>	
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
                                        <legend class="cadastro_titulo">Pesquisar Pagamento</legend>
                                            <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                                <form name="form_pagamento" method="post">
                                                <tr>
                                                    <td align="right" class="formulario" width="25%">Usuário:</td>
                                                    <td><input type="text" class="box" maxlength="100" name="usuario" size="40" onkeyup="pesquisarPagamento();"></td>
                                                </tr></form>
                                            </table>
                                        </fieldset>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
				<div id="divPagamento"></div>
            </fieldset>
		</td>
    </tr>
</table>

<br />

<?php } else { 
$query = $objPagamento->listarPagamentoUsuario();
?>

<br /><br />

<table align="center" border="0" width="90%">
	<tr>
    	<td>
            <fieldset>
            <legend class="cadastro_titulo" align="center">Pagamento</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td align="left"><a href="cadastrar.php" class="link_adm">Novo Pagamento</a></td>
                        <td align="right"><a href="listar.php" class="link_adm">Listar Pagamento</a></td>	
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
                                        <legend class="cadastro_titulo">Pesquisar Pagamento</legend>
                                            <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                                <form  name="form_pagamento" method="post" onsubmit="return ValidarPagamento();">
                                                <tr>
                                                    <td align="right" class="formulario" width="25%">Usuário:</td>
                                                    <td><input type="text" class="box" maxlength="100" name="usuario" size="40"></td>
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
                            <legend class="cadastro_titulo">Pagamentos Cadastrados</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="80%">
									<?php 
                                    $linhas = $objPagamento->totalRegistros($query);
                                    if ($linhas != 0) { 		
                                    while($array = $objPagamento->mostraRegistros($query)) { ?>
                                     <tr>
                                        <td width="80%" class="mtexto"><?php echo $array['usu_nome']; ?> - <?php echo $array['pag_mes']; ?></td>
                                        <td align="center"><a href="visualizar.php?registro=<?php echo base64_encode($array[pag_nu]); ?>"><img src="../../public/img/btn_consultar.gif" border="0" title="  CONSULTAR  "></a></td>
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