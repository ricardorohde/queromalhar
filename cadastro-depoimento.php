<?php include("public/inc/estrutura.php");?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td><img name="painel_depoimento" src="public/img/painel_depoimento.jpg" width="290" height="25" border="0" id="painel_depoimento" alt="" ></td>
	</tr>
</table>

<form action="grava_depoimento.php" name="form_depoimento" method="post">
<table align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td>
		<fieldset>
		<legend class="cadastro_titulo">Novo Depoimento</legend>
			<table align="center" border="0" cellspacing="1" cellpadding="2">
				<tr>
					<td width="25%" align="right" class="cadastro_formulario">Nome:</td>
					<td><input id="nome" class="cadastro_box" type="text" size="50" maxlength="100" name="nome"></td>
				</tr>            
				<tr>
					<td align="right" class="cadastro_formulario">Academia:</td>
					<td><input id="academia" class="cadastro_box" type="text" size="50" maxlength="100" name="academia"></td>
				</tr>
				<tr>
					<td align="right" class="cadastro_formulario">Aulas Praticadas:</td>
					<td><input id="aula" class="cadastro_box" type="text" size="50" maxlength="100" name="aula"></td>
				</tr>			
				<tr>
					<td align="right" class="cadastro_formulario">Depoimento:</td>
					<td><textarea id="dep" class="cadastro_box" cols="48" rows="7" name="depoimento"></textarea></td>
				</tr>			
				<tr>
					<td align="right" class="cadastro_formulario">Nota:</td>
					<td>
						
						<select name="nota" id="nota" class="cadastro_box">
							<option value="">:: Selecione ::</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
						</select>						
					</td>		
				</tr>	
				<tr>
					<td align="right" class="cadastro_formulario">Indico minha Academia:</td>
					<td class="cadastro_box"><input type="Radio" value="sim" name="indicar">Sim &nbsp;&nbsp;<input type="Radio" value="sim" name="indicar">Não</td>
				</tr>		
				<tr>
					<td height="5" colspan="2"></td>
				</tr>
				<tr>
					<td colspan="2" align="center" valign="middle">
						<input src="public/img/bt_enviar.jpg" type="Image" value="Enviar" onclick="Depoimento(); return false;" width="55" height="20">
						&nbsp;&nbsp;	
						<input src="public/img/bt_limpar.jpg" type="Image" value="Limpar" onclick="document.form_depoimento.reset(); return false;" width="55" height="20">
					</td>
				</tr>
			</table>
		</fieldset>
		</td>
	</tr>
</table>        
</form>

<?php include("public/inc/rodape.php");?>