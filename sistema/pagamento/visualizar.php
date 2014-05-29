<?php 
	include("../../public/inc/estrutura_admin.php"); 
	include("../../public/class/Pagamento.class.php");
	#Criar Objeto Pagamento
	$objPagamento = new Pagamento();
	$objPagamento->setRegistro($_GET['registro']);
	$query = $objPagamento->visualizar($objPagamento);
?>

<br />

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
                                <legend class="cadastro_titulo">Visualizar Pagamento</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
									<?php 	while($array = $objPagamento->mostraRegistros($query)) { ?>
									<tr>
								        <td align="right" class="formulario" width="25%">Usuário:</td>
										<td class="mtexto">&nbsp; <?php echo $array['usu_nome'] ?> </td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Mês:</td>
										<td class="mtexto">&nbsp; <?php echo $array['pag_mes'] ?></td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Valor:</td>
										<td class="mtexto">&nbsp; <?php echo $array['pag_valor'] ?></td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Data Vencimento:</td>
										<td class="mtexto">&nbsp; <?php echo $array['vencimento'] ?></td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Data Pagamento:</td>
										<td class="mtexto">&nbsp; <?php echo $array['pagamento'] ?></td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Status:</td>
										<td class="mtexto">&nbsp; <?php echo $array['pag_status'] ?></td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Tipo:</td>
										<td class="mtexto">&nbsp; <?php echo $array['pag_tipo'] ?></td>
									</tr>
									<tr>
										<td align="right" class="formulario">Boleto:</td>
										<td class="mtexto">&nbsp;<a href="<?php echo $pathImg.$array['pag_boleto'] ?>" class="link_adm" target="_blank"><?php echo substr($array['pag_boleto'],13); ?></a></td>
									</tr>	
									<?php 	} ?>
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
