<?php include("public/inc/estrutura.php");?>

<table border="0" cellspacing="2" cellpadding="2" width="100%">	
	<tr>
		<td colspan="3"><img name="painel_spa" src="public/img/painel_spa.jpg" width="290" height="25" border="0" id="painel_spa" alt="" ></td>
	</tr>
	<tr>
		<td colspan="3" height="5"></td>
	</tr>
	<tr>
		<td class="cadastro_titulop" colspan="3">Para pesquisar digite <span class="cadastro_subtitulo">NOME ou CIDADE</span></td>
	</tr>
	<tr>
		<td colspan="3" height="15"></td>
	</tr>
	<form name="form_spa" method="post">
	<tr>
		<td><img name="seta1" src="public/img/seta1.jpg" width="14" height="9" border="0" id="seta1" alt="" ></td>
		<td align="left" class="cadastro_subtitulo">&nbsp;Pesquisar:</td>
		<td align="left"><input type="text" class="box" maxlength="100" name="spa" size="40" onkeyup="pesquisarSpa()"></td>
	</tr>
	</form>
</table>

<div id="divSpa"></div>

<table border="0" cellspacing="2" cellpadding="2" width="100%">	
	<tr>
		<td colspan="2" align="center"><input src="public/img/bt_voltar.jpg" type="Image" value="Voltar" style="cursor: hand;" onclick="voltarPagina('index.php');"></td>	
	</tr>	
</table>

<?php include("public/inc/rodape.php");?>