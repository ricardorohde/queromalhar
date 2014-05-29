<?php 
include("public/inc/estrutura.php");
$objEnquete = new Enquete();
$objEnquete->setRegistro($_GET['registro']);
$qryEnquete = $objEnquete->resultadosEnquete($objEnquete);
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td><img name="painel_enquete" src="public/img/painel_enquete.jpg" width="290" height="25" border="0" id="painel_enquete" alt="" ></td>
	</tr>
</table>
<br />

<table align="center" border="0" cellspacing="0" cellpadding="0" width="97%">
	 <tr>
		<td height="50"></td>
	 </tr>
	 <?php 	while($mostrar = $objEnquete->mostraRegistros($qryEnquete)) { ?>
	 <tr>
	 	<td align="center" class="enquete_pergunta" colspan="4" height="20" width="12%"><?php echo $mostrar['enq_pergunta']; ?></td>
	 </tr>
	 <?php 
		$total_votos = $mostrar['enq_total']; 
		if ($total_votos >= 1) {
		    $porc1 = ((100 *  $mostrar['enq_quant1'])/$total_votos);
		    $porc1 = (int) $porc1;
		    $porc2 = ((100 *  $mostrar['enq_quant2'])/$total_votos);
		    $porc2 = (int) $porc2;
		    $porc3 = ((100 *  $mostrar['enq_quant3'])/$total_votos);
		    $porc3 = (int) $porc3;
		    $porc4 = ((100 *  $mostrar['enq_quant4'])/$total_votos);
		    $porc4 = (int) $porc4;
		} else {
		    $porc1 = 0;
			$porc2 = 0;
			$porc3 = 0;
			$porc4 = 0;
		}
	?>
	 <tr>
		<td height="25"></td>
	 </tr>
	 <?php if($mostrar['enq_tipo'] == "multipla") {?>
	 <tr>
	 	<td width="3%">&nbsp;</td>
	 	<td class="enquete_resposta" width="38%">.:&nbsp;<?php echo $mostrar['enq_resp1']; ?></td>
		<td align="left" class="enquete_resultado"><img src="public/img/barra1.jpg" width="<?php echo $porc1;?>" height="13">&nbsp;<?php echo $porc1;?>%</td>
	 	<td align="left" class="enquete_resultado" width="12%"><?php echo $mostrar['enq_quant1'];?> votos</td>
	 </tr>
	 <tr>
	 	<td width="3%">&nbsp;</td>
	 	<td class="enquete_resposta" width="38%">.:&nbsp;<?php echo $mostrar['enq_resp2']; ?></td>
		<td align="left" class="enquete_resultado"><img src="public/img/barra2.jpg" width="<?php echo $porc2;?>" height="13">&nbsp;<?php echo $porc2;?>%</td>
		<td align="left" class="enquete_resultado" width="12%"><?php echo $mostrar['enq_quant2'];?> votos</td>
	 </tr>
	 <tr>
	 	<td width="3%">&nbsp;</td>
	 	<td class="enquete_resposta" width="38%">.:&nbsp;<?php echo $mostrar['enq_resp3']; ?></td>
		<td align="left" class="enquete_resultado"><img src="public/img/barra3.jpg" width="<?php echo $porc3;?>" height="13">&nbsp;<?php echo $porc3;?>%</td>
		<td align="left" class="enquete_resultado" width="12%"><?php echo $mostrar['enq_quant3'];?> votos</td>
	 </tr>
	 <tr>
	 	<td width="3%">&nbsp;</td>
	 	<td class="enquete_resposta" width="38%">.:&nbsp;<?php echo $mostrar['enq_resp4']; ?></td>
		<td align="left" class="enquete_resultado"><img src="public/img/barra4.jpg" width="<?php echo $porc4; ?>" height="13">&nbsp;<?php echo $porc4;?>%</td>
		<td align="left" class="enquete_resultado" width="12%"><?php echo $mostrar['enq_quant4'];?> votos</td>
	 </tr>
	 <?php } else { ?>
	 <tr>
	 	<td width="3%">&nbsp;</td>
	 	<td class="enquete_resposta" width="38%">.:&nbsp;<?php echo $mostrar['enq_resp1']; ?></td>
		<td align="left" class="enquete_resultado"><img src="public/img/barra1.jpg" width="<?php echo $porc1; ?>" height="13">&nbsp;<?php echo $porc1;?>%</td>
		<td align="left" class="enquete_resultado" width="12%"><?php echo $mostrar['enq_quant1'];?> votos</td>
	 </tr>
	 <tr>
	 	<td width="3%">&nbsp;</td>
	 	<td class="enquete_resposta" width="38%">.:&nbsp;<?php echo $mostrar['enq_resp2']; ?></td>
		<td align="left" class="enquete_resultado"><img src="public/img/barra2.jpg" width="<?php echo $porc2; ?>" height="13">&nbsp;<?php echo $porc2;?>%</td>
		<td align="left" class="enquete_resultado" width="12%"><?php echo $mostrar['enq_quant2'];?> votos</td>
	 </tr>	 
	 <?php } ?>
	 <tr>
		<td height="25"></td>
	 </tr>
	 <tr>
	 	<td align="right" colspan="3" class="enquete_pergunta">Total de Votos:</td>
	 	<td class="enquete_resultado">&nbsp;&nbsp; <?php	echo $total_votos; ?></td>
	 </tr>	 
	 <?php } ?>
</table>
<br />
<table align="center" border="0" bordercolor="white"  cellspacing="0" cellpadding="0" width="100%">
	<tr>
		<td colspan="2" align="center"><input src="public/img/bt_voltar.jpg" type="Image" value="Voltar" style="cursor: hand;" onclick="voltarPagina('index.php');"></td>	
	</tr>	
</table>
<br />
<?php	include("public/inc/rodape.php"); ?>

