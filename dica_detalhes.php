<?php 
include("public/inc/estrutura.php");
$objDDica = new Dica();
$objDDica->setRegistro(base64_encode($_GET['registro']));
$qryDDica = $objDDica->visualizar($objDDica);
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td><img name="painel_dica" src="public/img/painel_dica.jpg" width="290" height="25" border="0" id="painel_dica" alt="" ></td>
	</tr>
</table>

<br />
<?php while($exibirDDica = $objDica->mostraRegistros($qryDDica)) { ?>
<table align="center" border="0" cellspacing="2" cellpadding="2" width="97%">
	<tr>
		<td align="center" class="dica_data" height="20"><?php echo $exibirDDica['data']; ?></td>
		<td align="center" class="dica_titulo"><?php echo $exibirDDica['dic_titulo']; ?></td>
	</tr>
	<tr>
		<td height="5" colspan="2"></td>
	</tr>
	<?php if ($exibirDDica['dic_imagem'] != "Sem Imagem") {?> 
	<tr>
		<td align="center" colspan="2" width="30%"><img src="<?php echo $exibirDDica['dic_imagem']; ?>" border="0" bordercolor="white"></td>
	</tr>
	<?php } ?>
	<tr>
	<tr>
		<td class="texto" colspan="2" width="70%"><?php echo $exibirDDica['dic_texto']; ?></td>
	</tr>	
	<tr>
		<td align="right" class="autor" colspan="2">Fonte: &nbsp;&nbsp;<?php echo $exibirDDica['dic_fonte']; ?>&nbsp;&nbsp;</td>
	</tr>
</table>
<br />
<table align="center" border="0" bordercolor="white"  cellspacing="0" cellpadding="0" width="100%">
	<tr>
		<td colspan="2" align="center"><input src="public/img/bt_voltar.jpg" type="Image" value="Voltar" style="cursor: hand;" onclick="voltarPagina('dicas');"></td>	
	</tr>	
</table>
<?php } ?>

<?php include("public/inc/rodape.php");?>