<?php 
include("public/inc/estrutura.php");
#Criar Objeto Serviço
$objServico = new Servico();
$qryServico = $objServico->listarEstado();
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td><img name="cadastro_lojas" src="public/img/cadastro_lojas.jpg" width="290" height="25" border="0" id="cadastro_lojas" alt="" ></td>
	</tr>
</table>

<!--- Nova Loja --->
<form method="post" action="grava_servico.php" name="form_servico" enctype="multipart/form-data">
<input type="Hidden" name="mensagem" value="3">
<input type="Hidden" name="tipo_servico" value="Loja Esportiva">
<input type="Hidden" name="assunto" value="Loja Cadastrada">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
	<tr>
		<td height="10" colspan="2"></td>
	</tr>
	<tr>
		<td align="right" height="10" width="25%" class="cadastro_formulario">Tipo de Cadastro: </td>
		<td class="cadastro_formulario">
			<input type="radio" class="cadastro_box" name="tipo_cadastro" value="B" onclick="planoBronze();" checked>Bronze <span class="cadastro_titulo"><b>(Grátis)</b></span>
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
			<legend class="cadastro_titulo">Nova Loja Esportiva</legend>
            
				<!--- Dados Responsável --->
                <div id="bronze" style="display:none">
				<table align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td height="10"></td>
					</tr>
					<tr>
                        <td>							
							<fieldset>
							<legend class="cadastro_subtitulo">Dados Responsável</legend>
								<table align="center" border="0" cellspacing="1" cellpadding="2">
									<tr>
										<td width="25%" align="right" class="cadastro_formulario">Nome:</td>
										<td><input id="nome" class="cadastro_box" type="text" size="50" maxlength="100" name="nome"></td>
									</tr>
									<tr>
										<td align="right" class="cadastro_formulario">E-mail:</td>
										<td><input id="email_usuario" class="cadastro_box" type="text" size="50" maxlength="100" name="email_usuario"></td>
									</tr>			
									<tr>
										<td align="right" class="cadastro_formulario">CPF:</td>
										<td><input id="cpf" type="text" class="cadastro_box" name="cpf" maxlength="14" size="20" ></td>
									</tr>
									<tr>
										<td align="right" class="cadastro_formulario">RG:</td>
										<td><input type="text" class="cadastro_box" name="rg" maxlength="14" size="20"></td>
									</tr>
									<tr>
										<td align="right" class="cadastro_formulario">Telefone:</td>
										<td><input id="telefone_usuario" class="cadastro_box" type="text" size="25" maxlength="50" name="telefone_usuario"></td>
									</tr>
									<tr>
										<td align="right" class="cadastro_formulario">Pagamento:</td>
										<td>										
                                          <select id="pagamento" name="pagamento" class="cadastro_box">
                                              <option value="">:: Selecione ::</option>
                                              <option value="boleto">Boleto Bancário</option>
                                              <option value="transferencia_bb">Transferência Banco do Brasil</option>
                                              <option value="transferencia_caixa">Transferência Caixa</option>								
                                          </select>										
										</td>		
									</tr>	
									<tr>
										<td align="right" class="cadastro_formulario">Como Conheceu:</td>
										<td>											
											<select name="como_conheceu" id="como_conheceu" class="cadastro_box">
												<option value="">:: Selecione ::</option>
												<option value="Sites de Busca">Sites de Busca</option>
												<option value="Internet">Internet</option>
												<option value="Jornal">Jornal</option>
												<option value="Revista">Revista</option>
												<option value="Amigos">Amigos</option>
												<option value="Outros">Outros</option>
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
								<form method="post" action="grava_loja.php" name="form_loja">
									<table align="center" border="0" cellspacing="1" cellpadding="2">
										<tr>
											<td width="25%" align="right" class="cadastro_formulario">Empresa:</td>
											<td><input id="empresa" class="cadastro_box" type="text" size="50" maxlength="100" name="empresa"></td>
										</tr>
										<tr>
											<td align="right" class="cadastro_formulario">Telefone:</td>
											<td><input id="telefone" class="cadastro_box" type="text" size="25" maxlength="50" name="telefone"></td>
										</tr>
										<tr>
											<td align="right" class="cadastro_formulario">Fax:</td>
											<td><input id="fax" class="cadastro_box" type="text" size="25" maxlength="50" name="fax"></td>
										</tr>		                                  
										<tr>
											<td align="right" class="cadastro_formulario">Endereço:</td>
											<td><input id="endereco" class="cadastro_box" type="text" size="50" maxlength="200" name="endereco"></td>
										</tr>
                                        <tr>
                                            <td align="right" class="cadastro_formulario">CEP:</td>
                                            <td><input id="cep" class="cadastro_box" type="text" size="15" maxlength="10" name="cep"></td>
                                        </tr>    
                                        <tr>
                                            <td align="right" class="cadastro_formulario" width="25%">Estado:</td>
                                            <td>
                                                <select name="estado" class="cadastro_box" onchange="RefreshEstado();">
                                                    <option value=""></option>
                                                    <?php while($aryEstado = $objServico->mostraRegistros($qryServico)) {
                                                    if( $_POST['estado'] == $aryEstado[est_nu]) { ?>
                                                        <option value="<?php echo $aryEstado[est_nu]; ?>" selected><?php echo $aryEstado['est_sigla']; ?></option>
                                                    <?php	} else { ?>
                                                        <option value="<?php echo $aryEstado[est_nu]; ?>"><?php echo $aryEstado['est_sigla']; ?></option>
                                                    <?php } } ?>
                                                </select>                                        
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" class="cadastro_formulario">Munic&iacute;pio:</td>
                                            <td id="divMunicipio">
                                                <select name="municipio" class="cadastro_box">
                                                    <option value="">::Selecione o Munic&iacute;pio::</option>
                                                </select>
                                            </td>
                                        </tr>
										<tr>
											<td align="right" class="cadastro_formulario">Observação:</td>
											<td><textarea id="observacao" class="cadastro_box" cols="50" rows="7" name="observacao"></textarea></td>
										</tr>
									</table>
								</form>
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
										<td align="right" class="cadastro_formulario" width="25%">Site:</td>
										<td><input id="site" class="cadastro_box" type="text" size="50" maxlength="100" name="site"></td>
									</tr>
									<tr>
										<td align="right" class="cadastro_formulario">E-mail:</td>
										<td><input id="email" class="cadastro_box" type="text" size="50" maxlength="100" name="email"></td>
									</tr>
									<tr>
										<td align="right" class="cadastro_formulario">Imagem:</td>
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
										<td align="right" class="cadastro_formulario">Descrição:</td>
										<td><textarea id="descricao" class="cadastro_box" cols="50" rows="7" name="descricao"></textarea></td>
									</tr>
								</table>
							</fieldset>							
						</td>
					</tr>
				</table>
                <br />	
                </div>
                
                <!--- Botões Envio --->
                
				<table align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td align="center" valign="middle">
							<input src="public/img/bt_enviar.jpg" type="Image" value="Enviar" onclick="Loja(); return false;" width="55" height="20">
							&nbsp;&nbsp;	
							<input src="public/img/bt_limpar.jpg" type="Image" value="Limpar" onclick="document.form_servico.reset(); return false;" width="55" height="20">
						</td>
					</tr>
				</table>		
 			</fieldset>
		</td>
	</tr>
</table>

<?php include("public/inc/rodape.php");?>