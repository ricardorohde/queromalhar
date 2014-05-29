<?php 
header("Content-Type: text/html; charset=iso-8859-1");
include("public/class/Servico.class.php");
include("public/class/UrlManage.class.php");
#Criar Objeto Servico
$objServico = new Servico();
$objServico->setEmpresa(utf8_decode($_POST['academia']));
$objServico->setMunicipio(utf8_decode($_POST['academia']));
$objServico->setModalidade(utf8_decode($_POST['academia']));
$query = $objServico->pesquisarAcademia($objServico);
?>

<br />
<table align="center" border="0" cellspacing="2" cellpadding="2" width="560">
	<?php $linhas = $objServico->totalRegistros($query);
	if ($linhas != 0) { 		
	while($array = $objServico->mostraRegistros($query)) { 
	$linkAcademia = UrlManage::getUrl($array['srv_nu'],"academias",$array['srv_empresa']); ?>
	<tr>
		<td width="80%" class="titulo_servico" height="20">.:&nbsp;<a href="<?php echo $linkAcademia; ?>" class="pesquisa"><?php echo $array['srv_empresa']; ?></a></td>
	</tr>
	<?php } } else { ?>
	</tr> 
		<td align="center" colspan="4" class="mensagem" height="20">Nenhum Registro Encontrado!</td>
	 </tr>		
	<?php } ?> 
</table>

<div id="divAcademia"></div>

<br />
