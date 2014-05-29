<?php 
include("public/inc/estrutura.php");
$objDHistoria = new Historia();
$objDHistoria->setRegistro(base64_encode($_GET['registro']));
$qryDHistoria = $objDHistoria->visualizar($objDHistoria);
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td><img name="painel_emforma" src="public/img/painel_emforma.jpg" width="290" height="25" border="0" id="painel_emforma" alt="" ></td>
	</tr>
</table>

<br />

<?php 	while($exibirDHistoria = $objDHistoria->mostraRegistros($qryDHistoria)) { ?>
<table align="center" border="0" cellspacing="2" cellpadding="2" width="97%">
	<tr>
		<td align="center" class="historia_data" height="20"><?php echo $exibirDHistoria['data']; ?></td>
		<td align="center" class="historia_titulo"><?php echo $exibirDHistoria['hit_titulo']; ?></td>
	</tr>
	<tr>
		<td height="5"></td>
	</tr>
	<tr>
		<?php if(!($exibirDHistoria['not_imagem'] == "Sem Imagem")) { ?> 
		<td align="center" width="30%"><img src="<?php echo $exibirDHistoria['hit_imagem']; ?>" border="0" bordercolor="white"></td>
		<?php } ?>
		<td class="texto" width="70%"><?php echo $exibirDHistoria['hit_texto']; ?></td>
	</tr>	
	<tr>
		<td align="right" class="autor" colspan="2">Fonte: &nbsp;&nbsp;<?php echo $exibirDHistoria['hit_fonte']; ?>&nbsp;&nbsp;</td>
	</tr>
</table>

<br />
	
<table align="center" border="0" bordercolor="white" cellspacing="0" cellpadding="0" width="100%">
	<tr>
		<td colspan="2" align="center"><input src="public/img/bt_voltar.jpg" type="Image" value="Voltar" style="cursor: hand;" onclick="voltarPagina('historias');"></td>	
	</tr>	
</table>
<?php } ?>

<?php include("public/inc/rodape.php");?>