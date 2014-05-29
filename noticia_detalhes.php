<?php 
include("public/inc/estrutura.php");
$objDNoticia = new Noticia();
$objDNoticia->setRegistro(base64_encode($_GET['registro']));
$qryDNoticia = $objDNoticia->visualizar($objDNoticia);
?>

<table border="0" cellspacing="0" cellpadding="0" width="750">
	<tr>
		<td><img name="painel_noticias" src="public/img/painel_noticias.jpg" width="290" height="25" border="0" id="painel_noticias" alt="" ></td>
	</tr>
</table>

<br />

<?php while($exibirDNoticia = $objDNoticia->mostraRegistros($qryDNoticia)) { ?>
<table align="center" border="0" cellspacing="2" cellpadding="2" width="750">
	<tr>
		<td align="center" class="noticia_data" height="20"><?php echo $exibirDNoticia['data']; ?></td>
		<td align="center" class="noticia_titulo"><?php echo $exibirDNoticia['not_titulo']; ?></td>
	</tr>
	<tr>
		<td height="5" colspan="2"></td>
	</tr>
	<?php if ($exibirDNoticia['not_imagem'] != "Sem Arquivo") {?> 
	<tr>
		<td align="center" colspan="2" width="30%"><img src="<?php echo $exibirDNoticia['not_imagem']; ?>" border="0" bordercolor="white"></td>
	</tr>
	<?php } ?>
	<tr>
		<td class="texto" colspan="2" width="70%"><?php echo $exibirDNoticia['not_texto']; ?></td>
	</tr>	
	<tr>
		<td align="right" class="autor" colspan="2">Fonte: &nbsp;&nbsp;<?php echo $exibirDNoticia['not_autor']; ?>&nbsp;&nbsp;</td>
	</tr>
</table>

<br />
	
<table align="center" border="0" bordercolor="white" cellspacing="0" cellpadding="0" width="750">
	<tr>
		<td align="center"><input src="public/img/bt_voltar.jpg" type="Image" value="Voltar" style="cursor: hand;" onclick="voltarPagina('noticias');"></td>	
	</tr>	
</table>
<?php 	} ?>

<?php include("public/inc/rodape.php");?>