<?php  
ob_start(); 
include("../../public/inc/estrutura_admin.php"); 
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] != "adm") { 
	header("Location: ../acesso_negado.php");
}
ob_end_flush();  
include("../../public/class/Usuario.class.php"); 
include("../../public/class/Servico.class.php"); 
#Criar Objeto Usu�rio
$objUsuario = new Usuario();
$qryUsuario = $objUsuario->listarUsuario();
#Criar Objeto Personal
$objPersonal = new Servico();
$qryPersonal = $objPersonal->listarEstado();
 ?>

<!--- Novo Personal Trainer --->
<form method="post" action="grava_cadastrar.php" name="form_servico" enctype="multipart/form-data">
<input type="Hidden" name="tipo_servico" value="Personal Trainer">
<input type="Hidden" name="administrador" value="<?php echo $_SESSION['usuario']; ?>">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
	<tr>
		<td height="10" colspan="2"></td>
	</tr>
	<tr>
		<td align="right" height="10" width="25%" class="formulario">Tipo de Cadastro:</td>
		<td class="formulario">
			<input type="radio" class="cadastro_box" name="tipo_cadastro" value="B" onclick="planoBronze();" checked>Bronze <span class="cadastro_titulo"><b>(Gr�tis)</b></span>
			&nbsp;&nbsp;&nbsp;
			<input type="radio" class="cadastro_box" name="tipo_cadastro" value="P" onclick="planoPrata();">Prata
			&nbsp;&nbsp;&nbsp;
			<input type="radio" class="cadastro_box" name="tipo_cadastro" value="O" onclick="planoOuro();">Ouro
		</td>
	</tr>
	<tr>
		<td colspan="2" height="5"></td>
	</tr>
	<tr>
		<td colspan="2">
			<fieldset>
			<legend class="cadastro_titulo">Novo Personal Trainer</legend>
		
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
												
				<!--- Dados Personal --->
				
				<table align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td>
							<fieldset>
								<legend class="cadastro_subtitulo">Dados do Personal Trainer</legend>
                                <table align="center" border="0" cellspacing="1" cellpadding="2">
                                    <tr>
                                        <td width="25%" align="right" class="formulario">Nome:</td>
                                        <td><input id="empresa" class="cadastro_box" type="text" size="50" maxlength="100" name="empresa"></td>
                                    </tr>                                        
                                    <tr>
                                        <td align="right" class="formulario">E-mail:</td>
                                        <td><input id="email" class="cadastro_box" type="text" size="50" maxlength="100" name="email"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Site:</td>
                                        <td><input id="site" class="cadastro_box" type="text" size="50" maxlength="100" name="site"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Telefone:</td>
                                        <td><input id="telefone" class="cadastro_box" type="text" size="25" maxlength="50" name="telefone"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Celular:</td>
                                        <td><input id="celular" class="cadastro_box" type="text" size="25" maxlength="50" name="celular"></td>
                                    </tr>		
                                    <tr>
                                        <td align="right" class="formulario">Endere�o:</td>
                                        <td><input id="endereco" class="cadastro_box" type="text" size="50" maxlength="200" name="endereco"></td>
                                    </tr>                                        
                                    <tr>
                                        <td align="right" class="formulario">CEP:</td>
                                        <td><input id="cep" class="cadastro_box" type="text" size="15" maxlength="10" name="cep"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Estado:</td>
                                        <td>
                                            <select name="estado" class="cadastro_box" onchange="RefreshEstado();">
                                                <option value=""></option>
                                                <?php
                                                while($aryEstado = $objPersonal->mostraRegistros($qryPersonal)) {
                                                if( $_POST['estado'] == $aryEstado[est_nu]) { ?>
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
                                            <select name="municipio" class="cadastro_box">
                                                <option value="">::Selecione o Munic&iacute;pio::</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Sexo:</td>
                                        <td>                                            
                                            <select id="sexo" name="sexo" class="cadastro_box">
                                                <option value="">:: Selecione ::</option>
                                                <option value="Feminino">Feminino</option>
                                                <option value="Masculino">Masculino</option>
                                            </select>                                            
                                        </td>
                                    </tr>	
                                    <tr>
                                        <td align="right" class="formulario">Observa��o:</td>
                                        <td><textarea id="observacao" class="cadastro_box" cols="50" rows="7" name="observacao"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Status:</td>
                                        <td>
                                            <select name="status" class="box">
                                                <option value=""></option>
                                                <option value="Ativado">Ativado</option>
                                                <option value="Desativado">Desativado</option>
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
										<td><input id="site" class="cadastro_box" type="text" size="50" maxlength="100" name="site"></td>
									</tr>
									<tr>
										<td align="right" class="formulario">E-mail:</td>
										<td><input id="email" class="cadastro_box" type="text" size="50" maxlength="100" name="email"></td>
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
										<td align="right" class="formulario">M�todo:</td>
										<td><textarea id="metodo" class="cadastro_box" cols="50" rows="7" name="metodo"></textarea></td>
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
                        <td colspan="2" align="center"><input class="botao" type="submit" value="Cadastrar" name="cadastrar"></td>	
                    </tr> 
				</table>	
			</fieldset>
		</td>
	</tr>
</table>
</form>

<br />

<?php include("../../public/inc/rodape_admin.php"); ?>
