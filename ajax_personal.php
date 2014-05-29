<?php 
header("Content-Type: text/html; charset=iso-8859-1");
include("public/class/Servico.class.php");
include("public/class/UrlManage.class.php");
#Criar Objeto Servico
$objServico = new Servico();
$objServico->setEmpresa(utf8_decode($_POST['personal']));
$objServico->setMunicipio(utf8_decode($_POST['personal']));
$objServico->setSexo(utf8_decode($_POST['personal']));
$query = $objServico->pesquisarPersonal($objServico);
?>

<br />
<table align="center" border="0" cellspacing="0" cellpadding="2" width="560">
	<?php $linhas = $objServico->totalRegistros($query);
	if ($linhas != 0) { 		
	while($array = $objServico->mostraRegistros($query)) {
	$conteudo = "conteudo".$array['srv_nu']; 
	$linkPersonal = UrlManage::getUrl($array['srv_nu'],"personal-trainers",$array['srv_empresa']); ?>
	<tr>
		<td width="80%" class="titulo_servico" height="20">.:&nbsp;<a href="<?php echo $linkPersonal; ?>" class="pesquisa"><?php echo $array['srv_empresa']; ?></a></td>
	</tr>
	<?php } } else { ?>
	</tr> 
		<td align="center" colspan="4" class="mensagem" height="20">Nenhum Registro Encontrado!</td>
	 </tr>		
	<?php } ?> 
</table>
<br />