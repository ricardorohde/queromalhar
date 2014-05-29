<?php 
   	include("../../public/inc/estrutura_admin.php"); 
	include("../../public/class/Pagamento.class.php");
	include("../../public/class/Usuario.class.php"); 
	include("../../public/FCKeditor/fckeditor.php");
	#Criar Objeto Usuário
	$objUsuario = new Usuario();
	$qryUsuario = $objUsuario->listarUsuario();
	#Criar Objeto Pagamento
	$objPagamento = new Pagamento();
	$objPagamento->setRegistro($_GET['registro']);
	$query = $objPagamento->visualizar($objPagamento);
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
                                <legend class="cadastro_titulo">Alterar Pagamento</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                <form action="grava_alterar.php" name="form_pagamento" method="post" onsubmit="return ValidarPagamento();" enctype="multipart/form-data">
                                    <?php 	while($array = $objPagamento->mostraRegistros($query)) { ?>
                                    <input type="hidden" name="registro" value="<?php echo base64_encode($array[pag_nu]); ?>">
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Usuário:</td>
                                        <td>
                                            <select name="usuario" class="txtForm">
                                                 <option value="0"></option>
                                                <?php	while($arrayUsuario = $objUsuario->mostraRegistros($qryUsuario)) {
                                                if( $array[usu_nu] == $arrayUsuario[usu_nu]){ ?>
                                                <option value="<?php echo $arrayUsuario[usu_nu]; ?>" selected><?php echo $arrayUsuario['usu_nome']; ?></option>			
                                                <?php	} else { ?>
                                                <option value="<?php echo $arrayUsuario[usu_nu]; ?>"><?php echo $arrayUsuario['usu_nome']; ?></option>				
                                                <?php 	} } ?>
                                            </select>
                                        </td>
                                    </tr>	
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Mês:</td>
                                        <td>
                                            <select name="mes" class="txtForm">
                                                <option value=""></option>
                                                <?php	foreach($mes as $nome_mes) { 
                                                    if( $array['pag_mes'] == $nome_mes) { ?>
                                                <option value="<?php echo $nome_mes;?>" selected><?php echo $nome_mes;?></option>
                                                <?php	} else { ?>
                                                <option value="<?php echo $nome_mes;?>"><?php echo $nome_mes;?></option>				
                                                <?php 	} } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Valor:</td>
                                        <td><input id="valor" type="text" class="box" name="valor" size="20" maxlength="10" value="<?php echo $array['pag_valor']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Data Vencimento:</td>
                                        <td><input id="data" type="text" class="box" name="vencimento" size="12" maxlength="10" onblur="ValidaData(this);" value="<?php echo $array['vencimento']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Data Pagamento:</td>
                                        <td><input id="data" type="text" class="box" name="pagamento" size="12" maxlength="10" onblur="ValidaData(this);" value="<?php echo $array['pagamento']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Status:</td>
                                        <td>
                                            <select name="status" class="txtForm">
                                                <option value=""></option>
                                                <option value="Ativado" <?php if($array['pag_status'] == "Ativado"){ ?> selected <?php } ?>>Ativado</option>
                                                <option value="Desativado" <?php if($array['pag_status'] == "Desativado"){ ?> selected <?php } ?>>Desativado</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Tipo:</td>
                                        <td>
                                            <select name="tipo" class="txtForm">
                                                <option value=""></option>
                                                <option value="Boleto" <?php if($array['pag_tipo'] == "Boleto"){ ?> selected <?php } ?>>Boleto</option>
                                                <option value="Transferência" <?php if($array['pag_tipo'] == "Transferência"){ ?> selected <?php } ?>>Transferência</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Boleto:</td>
                                        <td><input type="File" name="imagem"></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="2" align="center"><input class="botao" type="submit" value="Alterar" name="alterar"></td>	
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



