<?php 
include("public/inc/estrutura.php");
$objLDica = new Dica();
$objPDica = new Dica();
?>

<table border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr>
		<td><img name="painel_dica" src="public/img/painel_dica.jpg" width="290" height="25" border="0" id="painel_dica" alt="" ></td>
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

$objPDica->setInicio($inicio);
$objPDica->setTotal($totalRegistros);
$qryPDica = $objPDica->paginarRegistros($objPDica);
$linhas = $objPDica->totalRegistros($qryPDica);

// Verifica o número total de registros
$qrytodosRegistros = $objLDica->listarRegistros();
$linhas = $objLDica->totalRegistros($qrytodosRegistros); 

$tp = $linhas / $totalRegistros; // verifica o número total de páginas

// Botões "Anterior e próximo"
$anterior = $pc - 1;
$proximo = $pc + 1;
?>

<table align="center" border="0" cellspacing="2" cellpadding="2" width="97%">
	<tr>
		<td align="right" class="pagina" height="15" colspan="2">
		<?php if($linhas != 0 ){ ?>
		Página: <?php echo $pc; ?> / <?php echo ceil($tp); ?>
		<?php }?><br />
		<?php echo $linhas;?> registros encontrados 
		</td>
	</tr>	
	<tr>
		<td colspan="2" height="15"></td>
	</tr>
	<?php	
	if ($linhas != 0) { 
    while($mostrarDica = $objPDica->mostraRegistros($qryPDica)) { 
	$textoMDica = $mostrarDica['dic_texto'];
	$limiteMDica = 90;
	$linkDica = UrlManage::getUrl($mostrarDica['dic_nu'],"dicas",$mostrarDica['dic_titulo']);
	?>
	 <tr>
	 	 <td align="right" width="15" height="20"><img name="seta" src="public/img/seta.jpg" width="12" height="8" border="0" id="seta" alt="" ></td>
	  	 <td class="data" height="20"><a href="<?php echo $linkDica; ?>" class="dica_link"><?php echo $mostrarDica['dic_titulo']; ?></a></td>
	 </tr>
	 <tr>
		<td colspan="2" height="5"></td>
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

