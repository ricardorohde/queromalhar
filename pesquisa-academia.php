<?php include("public/inc/estrutura.php");?>

<table border="0" cellspacing="2" cellpadding="2" width="100%">
	<tr>
		<td colspan="3"><img name="painel_academia" src="public/img/painel_academia.jpg" width="290" height="25" border="0" id="painel_academia" alt="" ></td>
	</tr>
	<tr>
		<td colspan="3" height="5"></td>
	</tr>
	<tr>
		<td class="cadastro_titulop" colspan="3">Para pesquisar digite <span class="cadastro_subtitulo">NOME, CIDADE ou MODALIDADE</span></td>
	</tr>
	<tr>
		<td colspan="3" height="15"></td>
	</tr>
	<form name="form_academia" method="post">
	<tr>
		<td><img name="seta1" src="public/img/seta1.jpg" width="14" height="9" border="0" id="seta1" alt="" ></td>
		<td align="left" class="cadastro_subtitulo">&nbsp;Pesquisar:</td>
		<td align="left"><input type="text" class="box" maxlength="100" name="academia" size="40" onkeyup="pesquisarAcademia();"></td>
	</tr>
	</form>
</table>

<div id="divAcademia"></div>

<table border="0" cellspacing="2" cellpadding="2" width="100%">
	<tr>
		<td align="center"><input src="public/img/bt_voltar.jpg" type="Image" value="Voltar" style="cursor: hand;" onclick="voltarPagina('index.php');"></td>	
	</tr>	
</table>

<?php include("public/inc/rodape.php");?>