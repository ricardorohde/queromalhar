<table width="150" border="0" cellspacing="0" cellpadding="1">
	<tr>
		<td height="50"></td>
	</tr>
	<tr>
		<td align="center" style="cursor:hand;"><a href="<?php echo ($pathUrl."index_adm.php");?>" class="link_adm">Home</a>&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td align="center" style="cursor:hand;"><a href="<?php echo ($pathUrl."dica/index.php");?>" class="link_adm">Dica</a>&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td align="center" style="cursor:hand;"><a href="<?php echo ($pathUrl."fale_conosco/index.php");?>" class="link_adm">Fale Conosco</a>&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td align="center" style="cursor:hand;"><a href="<?php echo ($pathUrl."usuario/index.php");?>" class="link_adm">Usuário</a>&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td align="center" style="cursor:hand;"><a href="<?php echo ($pathUrl."senha/index.php");?>" class="link_adm">Senha</a>&nbsp;&nbsp;&nbsp;</td>
	</tr>
    <tr>
		<td align="center" style="cursor:hand;"><a href="<?php echo ($pathUrl."academia/index.php");?>" class="link_adm">Academia</a>&nbsp;&nbsp;&nbsp;</td>
	</tr> 
	<tr>
		<td align="center" style="cursor:hand;"><a href="<?php echo ($pathUrl."fisioterapeuta/index.php");?>" class="link_adm">Fisioterapeuta</a>&nbsp;&nbsp;&nbsp;</td>
	</tr> 
	<tr>
		<td align="center" style="cursor:hand;"><a href="<?php echo ($pathUrl."loja/index.php");?>" class="link_adm">Loja Esportiva</a>&nbsp;&nbsp;&nbsp;</td>
	</tr>
    <tr>
		<td align="center" style="cursor:hand;"><a href="<?php echo ($pathUrl."nutricionista/index.php");?>" class="link_adm">Nutricionista</a>&nbsp;&nbsp;&nbsp;</td>
	</tr>
    <tr>
		<td align="center" style="cursor:hand;"><a href="<?php echo ($pathUrl."personal/index.php");?>" class="link_adm">Personal Trainer</a>&nbsp;&nbsp;&nbsp;</td>
	</tr>
    <tr>
		<td align="center" style="cursor:hand;"><a href="<?php echo ($pathUrl."spa/index.php");?>" class="link_adm">Spa</a>&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td align="center" style="cursor:hand;"><a href="<?php echo ($pathUrl."pagamento/index.php");?>" class="link_adm">Pagamento</a>&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<?php if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] == "adm") { ?>
	<tr>
		<td align="center" style="cursor:hand;"><a href="<?php echo ($pathUrl."banner/index.php");?>" class="link_adm">Banner</a>&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td align="center" style="cursor:hand;"><a href="<?php echo ($pathUrl."depoimento/index.php");?>" class="link_adm">Depoimento</a>&nbsp;&nbsp;&nbsp;</td>
	</tr>	
	<tr>
		<td align="center" style="cursor:hand;"><a href="<?php echo ($pathUrl."enquete/index.php");?>" class="link_adm">Enquete</a>&nbsp;&nbsp;&nbsp;</td>
	</tr>
 	<tr>
		<td align="center" style="cursor:hand;"><a href="<?php echo ($pathUrl."evento/index.php");?>" class="link_adm">Evento</a>&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>	
		<td align="center" style="cursor:hand;"><a href="<?php echo ($pathUrl."historia/index.php");?>" class="link_adm">História</a>&nbsp;&nbsp;&nbsp;</td>
	</tr>
 	<tr>
		<td align="center" style="cursor:hand;"><a href="<?php echo ($pathUrl."newsletter/index.php");?>" class="link_adm">Newsletter</a>&nbsp;&nbsp;&nbsp;</td>
	</tr>
	 <tr>
		<td align="center" style="cursor:hand;"><a href="<?php echo ($pathUrl."noticia/index.php");?>" class="link_adm">Notícia</a>&nbsp;&nbsp;&nbsp;</td>
	</tr>
    <tr>
		<td align="center" style="cursor:hand;"><a href="<?php echo ($pathUrl."preco/index.php");?>" class="link_adm">Preço</a>&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<?php } ?>
	<tr>
		<td align="center" style="cursor:hand;"><a href="<?php echo ($pathUrl."logout.php");?>" class="link_adm">Sair</a>&nbsp;&nbsp;&nbsp;</td>
	</tr>
</table>
