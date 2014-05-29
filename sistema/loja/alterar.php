<?php 
include("../../public/inc/estrutura_admin.php"); 
include("../../public/class/Servico.class.php");
include("../../public/class/Usuario.class.php"); 
#Criar Objeto Usu�rio
$objUsuario = new Usuario();
$qryUsuario = $objUsuario->listarUsuario();
#Criar Objeto Servi�o
$objLoja = new Servico();
$objLoja->setRegistro($_GET['registro']);
$query = $objLoja->visualizar($objLoja);
$qryLoja = $objLoja->listarEstado();
?>

<?php 	while($array = $objLoja->mostraRegistros($query)) { ?>
<form method="post" action="grava_alterar.php" name="form_loja" enctype="multipart/form-data">
<input type="hidden" name="registro" value="<?php echo base64_encode($array[srv_nu]); ?>">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
	<tr>
		<td height="10" colspan="2"></td>
	</tr>
	<tr>
		<td align="right" height="10" width="25%" class="formulario">Tipo de Cadastro:</td>
		<td class="formulario">
			<input type="radio" class="cadastro_box" name="tipo_cadastro" value="B" onclick="planoBronze();" <?php if($array['srv_tipo_cadastro'] == "B"){ ?> checked <?php } ?>>Bronze <span class="cadastro_titulo"><b>(Gr�tis)</b></span>
			&nbsp;&nbsp;&nbsp;
			<input type="radio" class="cadastro_box" name="tipo_cadastro" value="P" onclick="planoPrata();" <?php if($array['srv_tipo_cadastro'] == "P"){ ?> checked <?php } ?>>Prata
			&nbsp;&nbsp;&nbsp;
			<input type="radio" class="cadastro_box" name="tipo_cadastro" value="O" onclick="planoOuro();" <?php if($array['srv_tipo_cadastro'] == "O"){ ?> checked <?php } ?>>Ouro
		</td>
	</tr>
	<tr>
		<td colspan="2" height="5"></td>
	</tr>
	<tr>
		<td colspan="2">
			<fieldset>
			<legend class="cadastro_titulo">Alterar Loja Esportiva</legend>            
				<!--- Dados Respons�vel --->
                <div id="bronze" style="display:none">
				<table align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td height="10"></td>
					</tr>
					<tr>
                        <td>							
							<fieldset>
								<legend class="cadastro_subtitulo">Dados Respons�vel</legend>
                                <table align="center" border="0" cellspacing="1" cellpadding="2">
                                 	<tr>
                                        <td align="right" class="formulario" width="25%">Usu�rio:</td>
                                        <td>
                                            <select name="usuario" class="txtForm">
                                                 <option value=""></option>
                                                <?php	while($arrayUsuario = $objUsuario->mostraRegistros($qryUsuario)) {
                                                if( $array[usu_nu] == $arrayUsuario[usu_nu]){ ?>
                                                <option value="<?php echo $arrayUsuario[usu_nu]; ?>" selected><?php echo $arrayUsuario['usu_nome']; ?></option>			
                                                <?php	} else { ?>
                                                <option value="<?php echo $arrayUsuario[usu_nu]; ?>"><?php echo $arrayUsuario['usu_nome']; ?></option>				
                                                <?php 	} } ?>
                                            </select>
                                        </td>
                                    </tr>
								</table>
							</fieldset>
						</td>
                    </tr>
 				</table>		
                <br />
                </div>		
                <!--- Dados Loja --->				
				<table align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td>
							<fieldset>
								<legend class="cadastro_subtitulo">Dados da Loja</legend>
                                <table align="center" border="0" cellspacing="1" cellpadding="2">
                                    <tr>
                                        <td width="25%" align="right" class="formulario">Empresa:</td>
                                        <td><input id="empresa" class="cadastro_box" type="text" size="50" maxlength="100" name="empresa" value="<?php echo $array['srv_empresa']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Telefone:</td>
                                        <td><input id="telefone" class="cadastro_box" type="text" size="25" maxlength="50" name="telefone" value="<?php echo $array['srv_telefone']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Fax:</td>
                                        <td><input id="fax" class="cadastro_box" type="text" size="25" maxlength="50" name="fax" value="<?php echo $array['srv_fax']; ?>"></td>
                                    </tr>		                                  
                                    <tr>
                                        <td align="right" class="formulario">Endere�o:</td>
                                        <td><input id="endereco" class="cadastro_box" type="text" size="50" maxlength="200" name="endereco" value="<?php echo $array['srv_endereco']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">CEP:</td>
                                        <td><input id="cep" class="cadastro_box" type="text" size="15" maxlength="10" name="cep" value="<?php echo $array['srv_cep']; ?>"></td>
                                    </tr>    
									<?php $objMunicipio = new Servico();
                                    if(isset($_POST['estado']) && (!empty($_POST['estado']))){
                                        $objMunicipio->setEstado($_POST['estado']);
                                        $qryMunicipio = $objMunicipio->listarMunicipioEstado($objMunicipio);
                                    } else {
                                        $objMunicipio->setEstado($array['est_nu']);
                                        $qryMunicipio = $objMunicipio->listarMunicipioEstado($objMunicipio);                                        
                                    } ?>                                    
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Estado:</td>
                                        <td>
                                            <select name="estado" class="box" onchange="RefreshEstado();">
                                                <option value=""></option>
                                                <?php while($aryEstado = $objLoja->mostraRegistros($qryLoja)) {
                                                if( $array['est_nu'] == $aryEstado[est_nu]) { ?>
                                                <option value="<?php echo $aryEstado[est_nu]; ?>" selected><?php echo $aryEstado['est_sigla']; ?></option>
                                                <?php	} else { ?>
                                                <option value="<?php echo $aryEstado[est_nu]; ?>"><?php echo $aryEstado['est_sigla']; ?></option>
                                                <?php } } ?>
                                            </select>                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Munic&iacute;pio:</td>
                                        <td id="divMunicipio">
                                            <select name="municipio" class="box">                                            
                                                <?php while($aryMunicipio = $objLoja->mostraRegistros($qryMunicipio)) {
                                                if( $array['mcp_nu'] == $aryMunicipio[mcp_nu]) { ?>
                                                <option value="<?php echo $aryMunicipio[mcp_nu]; ?>" selected><?php echo $aryMunicipio['mcp_descricao']; ?></option>
                                                <?php	} else { ?>
                                                <option value="<?php echo $aryMunicipio[mcp_nu]; ?>"><?php echo $aryMunicipio['mcp_descricao']; ?></option>
                                                <?php } } ?>                                            
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Observa��o:</td>
                                        <td><textarea id="observacao" class="cadastro_box" cols="50" rows="7" name="observacao"><?php echo $array['srv_observacao']; ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Status:</td>
                                        <td>
                                            <select name="status" class="cadastro_box">
                                                <option value=""></option>
                                                <option value="Ativado" <?php if($array['srv_status'] == "Ativado"){ ?> selected <?php } ?>>Ativado</option>
                                                <option value="Desativado" <?php if($array['srv_status'] == "Desativado"){ ?> selected <?php } ?>>Desativado</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
							</fieldset>
						</td>
					</tr>
				</table>
                <br />				
				<!--- Cadastro Prata --->				
                <div id="prata" style="display:none;">
				<table align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td>							
							<fieldset>
							<legend class="cadastro_subtitulo">Cadastro Prata</legend>
								<table align="center" border="0" cellspacing="1" cellpadding="2">
									<tr>
										<td align="right" class="formulario" width="25%">Site:</td>
										<td><input id="site" class="cadastro_box" type="text" size="50" maxlength="100" name="site" value="<?php echo $array['srv_site']; ?>"></td>
									</tr>
									<tr>
										<td align="right" class="formulario">E-mail:</td>
										<td><input id="email" class="cadastro_box" type="text" size="50" maxlength="100" name="email" value="<?php echo $array['srv_email']; ?>"></td>
									</tr>
									<tr>
										<td align="right" class="formulario">Imagem:</td>
										<td><input id="imagem" type="File" name="imagem"></td>
									</tr>
								</table>
							</fieldset>							
						</td>
					</tr>
				</table>
                <br />
                </div>
                <!--- Cadastro Ouro --->				
                <div id="ouro" style="display:none;">
				<table align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td>							
							<fieldset>
							<legend class="cadastro_subtitulo">Cadastro Ouro</legend>
								<table align="center" border="0" cellspacing="1" cellpadding="2">
									<tr>
										<td align="right" class="formulario">Descri��o:</td>
										<td><textarea id="descricao" class="cadastro_box" cols="50" rows="7" name="descricao"><?php echo $array['srv_descricao']; ?></textarea></td>
									</tr>
								</table>
							</fieldset>							
						</td>
					</tr>
				</table>
                <br />	
                </div>                
                <!--- Bot�es Envio --->                
				<table align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td colspan="2" align="center"><input class="botao" type="submit" value="Alterar" name="alterar"></td>	
                    </tr> 
				</table>		
 			</fieldset>
		</td>
	</tr>
</table>
</form>
<?php if($array['srv_tipo_cadastro'] == "B"){ ?>
<script type="text/javascript" language="JavaScript">
	document.getElementById('bronze').style.display = 'none';
	document.getElementById('prata').style.display = 'none';
	document.getElementById('ouro').style.display = 'none';
</script>
<?php } elseif($array['srv_tipo_cadastro'] == "P") { ?>
<script type="text/javascript" language="JavaScript">
	document.getElementById('bronze').style.display = '';
	document.getElementById('prata').style.display = '';
	document.getElementById('ouro').style.display = 'none';
</script>
<?php } else { ?>
<script type="text/javascript" language="JavaScript">
	document.getElementById('bronze').style.display = '';
	document.getElementById('prata').style.display = '';
	document.getElementById('ouro').style.display = '';
</script>
<?php }  } ?>

<br />

<?php include("../../public/inc/rodape_admin.php"); ?>



