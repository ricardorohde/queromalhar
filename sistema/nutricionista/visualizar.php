<?php 
	include("../../public/inc/estrutura_admin.php"); 
	include("../../public/class/Servico.class.php");
	#Criar Objeto Servico
	$objNutricionista = new Servico();
	$objNutricionista->setRegistro($_GET['registro']);
	$query = $objNutricionista->visualizar($objNutricionista);
?>

<br />

<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
	<tr>
		<td>
            <fieldset>
            <legend align="center" class="cadastro_titulo">Servi�o</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend class="cadastro_titulo">Visualizar Servi�o</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
									<?php 	while($array = $objNutricionista->mostraRegistros($query)) { ?>
									<tr>
										<td align="right" class="formulario" width="25%">Tipo de Cadastro:</td>
										<td class="mtexto">&nbsp;
										<?php if($array['srv_tipo_cadastro'] == "B"){?>
											Bronze
										<?php } elseif($array['srv_tipo_cadastro'] == "P") { ?>
											Prata
										<?php } else { ?>
                                        	Ouro
                                        <?php } ?>
										</td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Usu�rio:</td>
										<td class="mtexto">&nbsp;<?php echo $array['usu_nome'] ?></td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Nome:</td>
										<td class="mtexto">&nbsp;<?php echo $array['srv_empresa'] ?></td>
									</tr>									
                                    <tr>
										<td align="right" class="formulario" width="25%">Telefone:</td>
										<td class="mtexto">&nbsp;<?php echo $array['srv_telefone'] ?></td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Fax:</td>
										<td class="mtexto">&nbsp;<?php echo $array['srv_fax'] ?></td>
									</tr>
                                    <tr>
										<td align="right" class="formulario" width="25%">Endere�o:</td>
										<td class="mtexto">&nbsp;<?php echo $array['srv_endereco'] ?></td>
									</tr>
                                    <tr>
										<td align="right" class="formulario" width="25%">CEP:</td>
										<td class="mtexto">&nbsp;<?php echo $array['srv_cep'] ?></td>
									</tr>
                                    <tr>
										<td align="right" class="formulario" width="25%">Estado:</td>
										<td class="mtexto">&nbsp;<?php echo $array['est_sigla'] ?></td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Mun�cipio:</td>
										<td class="mtexto">&nbsp;<?php echo $array['mcp_descricao'] ?></td>
									</tr>
                                    <tr>
										<td align="right" class="formulario" width="25%">Sexo:</td>
										<td class="mtexto">&nbsp;<?php echo $array['srv_sexo'] ?></td>
									</tr>
                                    <tr>
										<td align="right" class="formulario" width="25%">Observa��o:</td>
										<td class="mtexto">&nbsp;<?php echo $array['srv_observacao'] ?></td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">E-mail:</td>
										<td class="mtexto">&nbsp;<?php echo $array['srv_email'] ?></td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Site:</td>
										<td class="mtexto">&nbsp;<?php echo $array['srv_site'] ?></td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Imagem:</td>
										<td class="mtexto">
										<?php if ($array['srv_imagem'] == "Sem Arquivo"){  
											echo "Sem Imagem!"; 
										} else {?>
											<img src="<?php echo $pathImg.$array['srv_imagem']; ?>" border="0">		
										<?php } ?> 
										</td>
									</tr>	
                                    <tr>
								        <td align="right" class="formulario" width="25%">Conv�nios:</td>
										<td class="mtexto">&nbsp;<?php echo $array['srv_convenio'] ?></td>
									</tr>	
                                    <?php if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] == "adm") { ?>
									<tr>
										<td align="right" class="formulario" width="25%">Status:</td>
										<td class="mtexto">&nbsp;<?php echo $array['srv_status'] ?></td>
									</tr>
									<?php } } ?>
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
