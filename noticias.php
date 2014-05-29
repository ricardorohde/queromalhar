<?php 
include("public/inc/estrutura.php");
$objLNoticia = new Noticia();
$objPNoticia = new Noticia();
?>

<table border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr>
		<td><img name="painel_noticias" src="public/img/painel_noticias.jpg" width="290" height="25" border="0" id="painel_noticias" alt="" ></td>
	</tr>
</table>

<?php
// Registros por P�gina
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

$objPNoticia->setInicio($inicio);
$objPNoticia->setTotal($totalRegistros);
$qryPNoticia = $objPNoticia->paginarRegistros($objPNoticia);
$linhas = $objPNoticia->totalRegistros($qryPNoticia);

// Verifica o n�mero total de registros
$qrytodosRegistros = $objLNoticia->listarRegistros();
$linhas = $objLNoticia->totalRegistros($qrytodosRegistros); 

$tp = $linhas / $totalRegistros; // verifica o n�mero total de p�ginas

// Bot�es "Anterior e pr�ximo"
$anterior = $pc - 1;
$proximo = $pc + 1;

?>

<table align="center" border="0" cellspacing="2" cellpadding="2" width="97%">
	<tr>
		<td align="right" class="pagina" height="15">
		<?php if($linhas != 0 ){ ?>
		P�gina: <?php echo $pc; ?> / <?php echo ceil($tp); ?>
		<?php }?><br />
		<?php echo $linhas;?> registros encontrados 
		</td>
	</tr>	
	<tr>
		<td height="15"></td>
	</tr>
	<?php	
	if ($linhas != 0) { 
    while($mostrarNoticia = $objPNoticia->mostraRegistros($qryPNoticia)) { 
	$linkNoticia = UrlManage::getUrl($mostrarNoticia['not_nu'],"noticias",$mostrarNoticia['not_titulo']); ?>
	 <tr>
		 <td class="data">[<?php echo $mostrarNoticia['data']; ?>]&nbsp;<a href="<?php echo $linkNoticia; ?>" class="noticia_link"><?php echo $mostrarNoticia['not_titulo']; ?></a></td>
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
		<td align="left" width="47%"><a href="?pagina=<?php echo base64_encode($proximo); ?>" class="paginacao">Pr�ximo >></a></td>
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

