<?php 
include("public/inc/estrutura.php");
$objDEvento = new Evento();
$objDEvento->setRegistro(base64_encode($_GET['registro']));
$qryDEvento = $objDEvento->visualizar($objDEvento);
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td><img name="painel_evento" src="public/img/painel_evento.jpg" width="290" height="25" border="0" id="painel_evento" alt="" ></td>
	</tr>
</table>

<br />

<?php 	while($exibirDEvento = $objDEvento->mostraRegistros($qryDEvento)) { ?>
<table align="center" border="0" cellspacing="2" cellpadding="2" width="97%">
	<tr>
		<td align="center" class="evento_titulo" height="20"><?php echo $exibirDEvento['data']; ?></td>
		<td align="center" class="evento_nome"><?php echo $exibirDEvento['eve_nome']; ?></td>
	</tr>
	<tr>
		<td height="5"></td>
	</tr>
	<tr>
		<?php if ( ! ($exibirDEvento['eve_imagem'] == "Sem Arquivo")) {?> 
		<td align="center" width="30%"><img src="<?php echo $exibirDEvento['eve_imagem']; ?>" border="0" bordercolor="white"></td>
		<?php } ?>
		<td class="evento_informacao" width="70%"><?php echo $exibirDEvento['eve_informacao']; ?></td>
	</tr>	
	<tr>
		<td align="right" class="evento_titulo" colspan="2">Local: &nbsp;&nbsp;<?php echo $exibirDEvento['eve_local']; ?>&nbsp;&nbsp;</td>
	</tr>
</table>

<br />
	
<table align="center" border="0" bordercolor="white"  cellspacing="0" cellpadding="0" width="100%">
	<tr>
		<td colspan="2" align="center"><input src="public/img/bt_voltar.jpg" type="Image" value="Voltar" style="cursor: hand;" onclick="voltarPagina('eventos');"></td>	
	</tr>	
</table>
<?php 	} ?>

<?php include("public/inc/rodape.php");?>