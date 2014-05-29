<?php 
include("public/inc/estrutura.php");
$objLEvento = new Evento();
$objPEvento = new Evento();
?>

<table border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr>
		<td><img name="painel_evento" src="public/img/painel_evento.jpg" width="290" height="25" border="0" id="painel_evento" alt="" ></td>
	</tr>
</table>

<?php
// Registros por Página
$totalRegistros = "15"; 


// Verificar URL
$pagina = base64_decode($_GET['pagina']); 
if (!$pagina){
        $pc = "1";
    } else {
		$pc = $pagina;
	}

$inicio = $pc - 1;
$inicio = $inicio * $totalRegistros;

$objPEvento->setInicio($inicio);
$objPEvento->setTotal($totalRegistros);
$qryPEvento = $objPEvento->paginarRegistros($objPEvento);
$linhas = $objPEvento->totalRegistros($qryPEvento);

// Verifica o número total de registros
$qrytodosRegistros = $objLEvento->listarRegistros();
$linhas = $objLEvento->totalRegistros($qrytodosRegistros); 

$tp = $linhas / $totalRegistros; // verifica o número total de páginas

// Botões "Anterior e próximo"
$anterior = $pc - 1;
$proximo = $pc + 1;

?>

<table align="center" border="0" cellspacing="0" cellpadding="0" width="97%">
	<tr>
		<td align="right" class="pagina" height="15">
		<?php if($linhas != 0 ){ ?>
		Página: <?php echo $pc; ?> / <?php echo ceil($tp); ?>
		<?php }?><br />
		<?php echo $linhas;?> registros encontrados 
		</td>
	</tr>	
	<tr>
		<td height="15"></td>
	 </tr>
	<?php	
	if ($linhas != 0) { 
    while($mostrarEvento = $objPEvento->mostraRegistros($qryPEvento)) { 
	$linkEvento = UrlManage::getUrl($mostrarEvento['eve_nu'],"eventos",$mostrarEvento['eve_nome']); ?>
	 <tr>
	  	 <td class="data">[<?php echo $mostrarEvento['data']; ?>]&nbsp;<a href="<?php echo $linkEvento; ?>" class="evento_informacao"><?php echo $mostrarEvento['eve_nome']; ?></a></td>
	 </tr>
	 <tr>
		<td height="5"></td>
	 </tr>
	<?php } }	else { ?>
	</tr> 
	<tr>		
		<td align="center" class="mensagem">Nenhum Registro Encontrado!</td>
	</tr>
	<tr>
		<td height="20"></td>
	</tr>
	<?php	} 	?> 
</table>

<?php if ($linhas != 0) { ?> 
<table align="center" border="0" cellspacing="0" cellpadding="0" width="97%">
	<tr>
	    <td height="10" colspan="2"></td>
	</tr>
	<tr>
		<?php if ($pc > 1) {?>
		<td align="right" width="47%"><a href="?pagina=<?php echo base64_encode($anterior); ?>" class="paginacao"><< Anterior</a></td>
		<?php } else {?> 
		<td align="right" class="mlink" width="47%"></td>
		<?php } ?>
		<?php if($linhas > 14) {?>
		<td align="center" class="pagina" width="6%">|</td>
		<?php } ?>
		<?php if ($pc < $tp) {?>
		<td align="left" width="47%"><a href="?pagina=<?php echo base64_encode($proximo); ?>" class="paginacao">Próximo >></a></td>
		<?php } else {?> 
		<td align="left" class="mlink" width="47%"></td>
		<?php } ?>
	</tr>
	<tr>
	    <td height="8" colspan="2"></td>
	</tr>
</table>
<?php }?>
	
<table align="center" border="0" cellspacing="0" cellpadding="0" width="97%">
	<tr>
		<td colspan="2" align="center"><input src="public/img/bt_voltar.jpg" type="Image" value="Voltar" style="cursor: hand;" onclick="voltarPagina('index.php');"></td>	
	</tr>	
</table>
<?php include("public/inc/rodape.php")?>

