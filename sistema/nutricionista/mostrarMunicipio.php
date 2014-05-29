<?php 
	include("../../public/class/Servico.class.php");
	#Criar Objeto Munic&iacute;pio
	$objMunicipio = new Servico();
	if(isset($_POST['estado']) && (!empty($_POST['estado']))){
		$objMunicipio->setEstado($_POST['estado']);
		$qryMunicipio = $objMunicipio->listarMunicipioEstado($objMunicipio);
	}
?>
<select name="municipio" class="cadastro_box">
 	<option value="">::Selecione o Munic&iacute;pio::</option>
	<?php while($aryMunicipio = $objMunicipio->mostraRegistros($qryMunicipio)) {?> 
	<option value="<?php echo $aryMunicipio[mcp_nu]; ?>"><?php echo $aryMunicipio['mcp_descricao'];?></option>
	<?php	}  ?> 
</select>

