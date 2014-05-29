<?php
include("public/inc/estrutura.php");
$objServico = new Servico();
$objServico->setRegistro(base64_encode($_GET['registro']));
$query = $objServico->visualizar($objServico);
?>

<table border="0" cellspacing="2" cellpadding="2" width="100%">
	<tr>
		<td><img name="painel_nutricionista" src="public/img/painel_nutricionista.jpg" width="290" height="25" border="0" id="painel_nutricionista" alt="" /></td>
	</tr>
	<tr>
		<td height="5"></td>
	</tr>	
	<?php while($array = $objServico->mostraRegistros($query)) { ?>
	<tr>
		<td align="center" class="empresa" width="25%"><?php echo $array['srv_empresa']; ?></td>
	</tr>
	<?php if ($array['srv_imagem'] != "Sem Arquivo" and $array['srv_tipo_cadastro'] != "B") {?> 
	<tr>
		<td align="center" rowspan="10" width="25%"><img src="<?php echo $array['srv_imagem']; ?>" border="0" bordercolor="white"></td>
	</tr>
	<?php } ?>
	<tr>
		<td align="left" class="texto_servico">Endere&ccedil;o: &nbsp;<?php echo $array['srv_endereco'] ?></td>
	</tr>
	<tr>
		<td align="left" class="texto_servico">CEP:&nbsp;<?php echo $array['srv_cep'] ?></td>
	</tr>
	<tr>
		<td align="left" class="texto_servico"><?php echo $array['mcp_descricao'] ?> - <?php echo $array['est_sigla'] ?></td>
	</tr>      
	<tr>
		<td align="left" class="texto_servico">Telefone:&nbsp;<?php echo $array['srv_telefone']; ?></td>
	</tr>
	<?php if(!empty($array['srv_celular'])){ ?>
	<tr>
		<td align="left" class="texto_servico">Celular:&nbsp;<?php echo $array['srv_celular']; ?></td>
	</tr>
	<?php } ?>
	<tr>
		<td align="left" class="texto_servico">Sexo:&nbsp;<?php echo $array['srv_sexo']; ?></td>
	</tr>
	<?php if($array['srv_tipo_cadastro'] == "P" or $array['srv_tipo_cadastro'] == "O") {?>
	<tr>
		<td align="left" class="texto_servico">Site:&nbsp;<a href="<?php echo $array['srv_site']; ?>" target="_blank" class="servico"><?php echo $array['srv_site']; ?></a></td>
	</tr>
	<tr>
		<td align="left" class="texto_servico">E-mail:&nbsp;<a href="mailto:<?php echo $array['srv_email']; ?>" target="_blank" class="servico"><?php echo $array['srv_email']; ?></a></td>
	</tr>
	<?php } if($array['srv_tipo_cadastro'] == "O"){ ?>
	<tr
		<td align="left" class="texto_servico">Convênios:&nbsp;<?php echo $array['srv_horario_aula']; ?></td>
	</tr>
	<?php } } ?>
	<tr>
		<td align="center"><input src="public/img/bt_voltar.jpg" type="Image" value="Voltar" style="cursor: hand;" onclick="voltarPagina('pesquisa-nutricionista')"></td>	
	</tr>	
</table>

</br>

<?php include("public/inc/rodape.php");?>