<?php 
	include("../../public/inc/estrutura_admin.php"); 
	include("../../public/class/Dica.class.php");
	#Criar Objeto Dica
	$objDica = new Dica();
	$objDica->setRegistro($_GET['registro']);
	$query = $objDica->visualizar($objDica);
?>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
	<tr>
		<td>
            <fieldset>
            <legend align="center" class="cadastro_titulo">Dica</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend class="cadastro_titulo">Visualizar Dica</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
								  	<?php 	while($array = $objDica->mostraRegistros($query)) { ?>
									<tr>
										<td align="right" class="formulario" width="25%">Fonte:</td>
										<td class="mtexto">&nbsp; <?php echo $array['dic_fonte'] ?> </td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Texto:</td>
										<td class="mtexto">&nbsp; <?php echo $array['dic_texto'] ?> </td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Status:</td>
										<td class="mtexto">&nbsp;<?php echo $array['dic_status'] ?></td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Data:</td>
										<td class="mtexto">&nbsp;<?php echo $array['data']; ?></td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Imagem:</td>
										<td class="mtexto">&nbsp;
										<?php 
										if ($array['dic_imagem'] == "Sem Imagem"){  
											echo "Dica sem Imagem!"; 
										} else {?>
											<img src="<?php echo $pathImg.$array['dic_imagem']; ?>" border="0">		
										<?php  } ?> 
										</td>
									</tr>
									<?php } ?>
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
