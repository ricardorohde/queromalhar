<?php include("public/inc/estrutura.php");?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td><img name="fale_conosco" src="public/img/fale_conosco.jpg" width="290" height="25" border="0" id="fale_conosco" alt="" ></td>
	</tr>
</table>

<form method="post" action="envia_faleconosco.php" name="form_faleconosco">
<table align="center" width="85%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>
		<fieldset>
			<legend class="cadastro_titulo">Seus Dados</legend>
					<table align="center" border="0" cellspacing="1" cellpadding="2">
						<tr>
							<td width="10%" align="right" class="formulario">Nome:</td>
							<td><input id="nome" class="cadastro_box" type="text" size="50" maxlength="100" name="nome"></td>
						</tr>
						<tr>
							<td align="right" class="formulario">E-mail:</td>
							<td><input id="email" class="cadastro_box" type="text" size="50" maxlength="100" name="email"></td>
						</tr>
						<tr>
							<td align="right" class="formulario">Telefone:</td>
							<td><input id="telefone" class="cadastro_box" type="text" size="15" maxlength="13" name="telefone"></td>
						</tr>
						<tr>
							<td align="right" class="formulario" width="25%">Assunto:</td>
							<td align="left">
								<select name="assunto" class="cadastro_box">
									<option value="">:: Selecione ::</option>
									<option value="Anúncio">Anúncio</option>
									<option value="Criação de Sites">Criação de Sites</option>
									<option value="Eventos">Eventos</option>
									<option value="Sugestões">Sugestões</option>
									<option value="Reclamações">Reclamações</option>
									<option value="Outros">Outros</option>
								</select>		
							</td>
						</tr>
						<tr>
							<td align="right" class="formulario">Mensagem:</td>
							<td><textarea id="mensagem" class="cadastro_box" cols="38" rows="10" name="mensagem"></textarea></td>
						</tr>
						<tr>
							<td height="5" colspan="2"></td>
						</tr>
					</table>
					<table align="center" border="0" bordercolor="white"  cellspacing="1" cellpadding="1" width="97%">
						<tr>
							<td align="right"><input src="public/img/bt_enviar.jpg" type="Image" value="Enviar" onclick="FaleConosco(); return false;" width="55" height="20"></td>	
							<td align="left"><input src="public/img/bt_limpar.jpg" type="Image" value="Limpar" onclick="document.form_faleconosco.reset(); return false;" width="55" height="20"></td>
						</tr>
					</table>
					<table align="center" border="0" bordercolor="white"  cellspacing="1" cellpadding="1" width="97%">
						<tr>
							<td height="3" colspan="2"></td>
						</tr>
						<tr>
							<td class="texto">
							Entre em contato com a equipe comercial:
							</td>
						</tr>
						<tr>
							<td height="3" colspan="2"></td>
						</tr>
						<tr>
							<td class="cadastro_box" height="25">e-mail:&nbsp;<a href="mailto:faleconosco@queromalhar.com.br" class="cadastro_email">faleconosco@queromalhar.com.br</a></td>
						</tr>
						<tr>
							<td height="3" colspan="2"></td>
						</tr>
					</table>
				</fieldset>
			</td>
		</tr>
</table>
</form>
<br />

<?php include("public/inc/rodape.php");?>