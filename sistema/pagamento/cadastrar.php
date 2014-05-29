<?php  
ob_start(); 
include("../../public/inc/estrutura_admin.php"); 
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] != "adm") { 
	header("Location: ../acesso_negado.php");
}
ob_end_flush();  
include("../../public/class/Usuario.class.php"); 
#Criar Objeto Usuário
$objUsuario = new Usuario();
$qryUsuario = $objUsuario->listarUsuario();
$mes = array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");
?>


<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
	<tr>
		<td>
            <fieldset>
            <legend align="center" class="cadastro_titulo">Pagamento</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend class="cadastro_titulo">Cadastrar Novo Pagamento</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                    <form action="grava_cadastrar.php" name="form_pagamento" method="post" onsubmit="return ValidarPagamento();" enctype="multipart/form-data">
                                        <tr>
                                            <td align="right" class="formulario" width="25%">Usuário:</td>
                                            <td>
                                                <select name="usuario" class="txtForm">
                                                    <option value=""></option>
                                                    <?php	while($arrayUsuario = $objUsuario->mostraRegistros($qryUsuario)) { ?>
                                                    <option value="<?php echo $arrayUsuario[usu_nu];?>"><?php echo $arrayUsuario['usu_nome'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" class="formulario" width="25%">Mês:</td>
                                            <td>
                                                <select name="mes" class="txtForm">
                                                    <option value=""></option>
                                                    <?php	foreach($mes as $nome_mes) { ?>
                                                    <option value="<?php echo $nome_mes;?>"><?php echo $nome_mes;?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" class="formulario" width="25%">Valor:</td>
                                            <td><input id="valor" type="text" class="box" name="valor" size="20" maxlength="10"></td>
                                        </tr>
                                        <tr>
                                            <td align="right" class="formulario" width="25%">Data Vencimento:</td>
                                            <td><input id="data" type="text" class="box" name="vencimento" size="12" maxlength="10" onblur="ValidaData(this);"></td>
                                        </tr>
                                        <tr>
                                            <td align="right" class="formulario" width="25%">Status:</td>
                                            <td>
                                                <select name="status" class="txtForm">
                                                    <option value=""></option>
                                                    <option value="Ativado">Ativado</option>
                                                    <option value="Desativado">Desativado</option>
                                                </select>		
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" class="formulario" width="25%">Tipo:</td>
                                            <td>
                                                <select name="tipo" class="txtForm">
                                                    <option value=""></option>
                                                    <option value="Boleto">Boleto</option>
                                                    <option value="Transferência">Transferência</option>
                                                </select>		
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" class="formulario">Boleto:</td>
                                            <td><input type="File" name="imagem"></td>
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