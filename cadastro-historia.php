<?php include("public/inc/estrutura.php");?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td><img name="cadastro_historia" src="public/img/cadastro_historia.jpg" width="290" height="25" border="0" id="cadastro_historia" alt="" ></td>
	</tr>
</table>




<form method="post" action="grava_historia.php" name="form_historia" enctype="multipart/form-data">
<input type="Hidden" name="status" value="Desativado"/>
<input type="Hidden" name="assunto" value="História Cadastrada">
<table align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td>
		<fieldset>
		<legend class="cadastro_titulo">Nova História</legend>
			<table align="center" border="0" cellspacing="1" cellpadding="2">
				<tr>
					<td width="20%" align="right" class="cadastro_formulario">Nome:</td>
					<td><input id="nome" class="cadastro_box" type="text" size="50" maxlength="100" name="nome"></td>
				</tr>
				<tr>
					<td align="right" class="cadastro_formulario">E-mail:</td>
					<td><input id="email" class="cadastro_box" type="text" size="50" maxlength="100" name="email"></td>
				</tr>			
				<tr>
					<td width="20%" align="right" class="cadastro_formulario">Título:</td>
					<td><input id="titulo" class="cadastro_box" type="text" size="50" maxlength="100" name="titulo"></td>
				</tr>
				<tr>
					<td align="right" class="cadastro_formulario">História:</td>
					<td><textarea id="historia" class="cadastro_box" cols="48" rows="10" name="texto"></textarea></td>
				</tr>
				<tr>
					<td align="right" class="cadastro_formulario" width="25%">Data:</td>
					<td><input id="data" type="text" class="cadastro_box" name="data" size="12" maxlength="10" onblur="ValidaData(this);"></td>
				</tr>
				<tr>
					<td align="right" class="cadastro_formulario" width="25%">Fonte:</td>
					<td><input type="text" class="cadastro_box" name="fonte" size="50" maxlength="100"></td>
				</tr>			
				<tr>
					<td align="right" class="cadastro_formulario">Imagem:</td>
					<td><input id="imagem" type="File" name="imagem"></td>
				</tr>
				<tr>
					<td height="5" colspan="2"></td>
				</tr>
				<tr>
					<td colspan="2" align="center" valign="middle">
						<input src="public/img/bt_enviar.jpg" type="Image" value="Enviar" onclick="Historia(); return false;" width="55" height="20">
						&nbsp;&nbsp;	
						<input src="public/img/bt_limpar.jpg" type="Image" value="Limpar" onclick="document.form_historia.reset(); return false;" width="55" height="20">
					</td>
				</tr>
			</table>
		</fieldset>
		</td>
	</tr>
</table>
</form>

<?php include("public/inc/rodape.php");?>