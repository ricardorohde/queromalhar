		</td>
		<?php if( ($_SERVER['SCRIPT_NAME'] != "/queromalhar/noticia_detalhes.php") && ($_SERVER['SCRIPT_NAME'] != "/queromalhar/noticia_detalhes.php") { ?>
		<td align="center" valign="top" width="190">
			<table align="center" border="0" width="190" cellpadding="0" cellspacing="0">
				<tr>
					<td><img name="moldura01" src="public/img/moldura01.jpg" width="190" height="36" border="0" id="moldura01" alt="" ></td>
				</tr>
				<tr>
					<td background="public/img/moldura02.jpg">
						<table cellpadding="0" cellspacing="0" width="100%">
							<?php	$linhasBannerHalf = $objBannerHalf->totalRegistros($qryBannerHalf);
							if ($linhasBannerHalf != 0) { 		
							while($aryBannerHalf = $objBannerHalf->mostraRegistros($qryBannerHalf)) { 
							if($aryBannerHalf['bnr_formato'] == "SWF"){ ?>
							<tr>
								<td align="center" >
									<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="140" height="100">
										<param name="movie" value="<?php echo $aryBannerHalf['bnr_imagem']; ?>">
										<param name="quality" value="high">
										<embed src="<?php echo $aryBannerHalf['bnr_imagem']; ?>" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="160" height="80"></embed>
									</object>
								</td>
							</tr>
							<?php } else { ?>
							<tr>
								<td align="center"><a href="<?php echo $aryBannerHalf['bnr_url']; ?>" target="_blank"><img src="<?php echo $aryBannerHalf['bnr_imagem']; ?>" border="0" width="140" height="100"></a></td>
							</tr>
							<?php } } } else { ?>
							<tr>
								<td align="center" class="box" colspan="2" height="280" valign="middle">Nenhum Registro<br />Encontrado!</td>
							</tr>		
							<?php } ?>							
						</table>
					</td>
				</tr>
				<tr>
					<td><img name="moldura03" src="public/img/moldura03.jpg" width="190" height="35" border="0" id="moldura03" alt="" ></td>
				</tr>
			</table>			
		</td>
		<?php } ?>
	</tr>
</table>

<!--- Eventos --->

<?php if($_SERVER['SCRIPT_NAME'] == "/queromalhar/index.php"){ ?>
<table align="center" border="0" cellpadding="0" cellspacing="0" height="150" width="750">
	<tr>
		<td colspan="2"><img name="evento_painel" src="public/img/evento_painel.jpg" width="750" height="48" border="0" id="evento_painel" alt="" ></td>
	</tr>
	<tr>
		<td width="50%" valign="top">
			<table align="center" border="0" cellpadding="2" cellspacing="1" width="100%">
				<?php $linhasEvento = $objEvento->totalRegistros($qryEvento);
				if ($linhasEvento != 0) { 		
				while($exibirEvento = $objEvento->mostraRegistros($qryEvento)) { 
				$textoEvento = $exibirEvento['eve_informacao'];
				$limiteEvento = 150;
				$linkEvento = UrlManage::getUrl($exibirEvento['eve_nu'],"eventos",$exibirEvento['eve_nome']); ?>
				<tr>
					<td align="center" class="evento_titulo" colspan="2" height="20"><img name="seta1" src="public/img/seta1.jpg" width="14" height="9" border="0" id="seta1" alt="" >&nbsp;<?php echo $exibirEvento['eve_nome']; ?></td>
				</tr>	
				<tr>
					<td align="center" class="evento_local" colspan="2"><?php echo $exibirEvento['eve_local']; ?></td>
				</tr>
                <?php if ($exibirEvento['eve_imagem'] != "Sem Arquivo"){ ?>
				<tr>
                    <td align="center" rowspan="3" width="90" height="110"><img src="<?php echo $pathImg.$exibirEvento['eve_imagem']; ?>" border="0" width="80" height="90" /></td>	
					<td align="center" class="evento_data" height="10">Data:&nbsp;<?php echo $exibirEvento['data']; ?></td>
				</tr>		
				<?php  } else { ?>
				<tr>
					<td align="center" class="evento_data"  colspan="2" height="10">Data:&nbsp;<?php echo $exibirEvento['data']; ?></td>
				</tr>		
                <?php } ?>
                <tr>
					<td class="evento_informacao" valign="top" height="100"><a href="<?php echo $linkEvento; ?>" class="evento_link"><?php echo abreviar($textoEvento,$limiteEvento); ?></a></td>
				</tr>
				<tr>
					<td align="right" height="15"><a href="fale-conosco"><img name="cadastrar_evento" src="public/img/cadastrar_evento.jpg" width="103" height="13" border="0" id="cadastrar_evento" alt="" ></a>&nbsp;&nbsp;</td>
				</tr>
				<?php } } ?>
			</table>
		</td>
		<td width="50%" valign="top">
			<table align="center" border="0" cellpadding="2" cellspacing="1" width="97%">
				<?php $linhasEvento1 = $objEvento1->totalRegistros($qryEvento1);
				if ($linhasEvento1 != 0) { 		
				while($exibirEvento1 = $objEvento1->mostraRegistros($qryEvento1)) { 
				$textoEvento1 = $exibirEvento1['eve_informacao'];
				$limiteEvento1 = 150; 
				$linkEvento1 = UrlManage::getUrl($exibirEvento1['eve_nu'],"eventos",$exibirEvento1['eve_nome']); ?>
				<tr>
					<td align="center" class="evento_titulo" colspan="2" height="20"><img name="seta1" src="public/img/seta1.jpg" width="14" height="9" border="0" id="seta1" alt="" >&nbsp;<?php echo $exibirEvento1['eve_nome']; ?></td>
				</tr>	
				<tr>
					<td align="center" class="evento_local" colspan="2"><?php echo $exibirEvento1['eve_local']; ?></td>
				</tr>
                <?php if ($exibirEvento1['eve_imagem'] != "Sem Arquivo"){ ?>
				<tr>
                    <td align="center" rowspan="3" width="90" height="110"><img src="<?php echo $pathImg.$exibirEvento1['eve_imagem']; ?>" border="0" width="80" height="90" /></td>	
					<td align="center" class="evento_data" height="10">Data:&nbsp;<?php echo $exibirEvento1['data']; ?></td>
				</tr>		
				<?php  } else { ?>
				<tr>
					<td align="center" class="evento_data"  colspan="2" height="10">Data:&nbsp;<?php echo $exibirEvento['data']; ?></td>
				</tr>		
                <?php } ?>
				<tr>
					<td class="evento_informacao" valign="top" height="100"><a href="<?php echo $linkEvento1; ?>" class="evento_link"><?php echo abreviar($textoEvento1,$limiteEvento1); ?></a></td>
				</tr>
				<tr>
					<td align="right" height="15"><a href="eventos"><img name="bt_outros_eventos" src="public/img/bt_outros_eventos.jpg" width="91" height="13" border="0" id="bt_outros_eventos" alt="" ></a>&nbsp;&nbsp;</td>
				</tr>
				<?php } } ?>
			</table>		
		</td>
	</tr>	
</table>
<?php } ?>
<br />
<table width="1280" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td>
		<div align="center">
		<script type="text/javascript">
			<!--
			google_ad_client = "pub-1542076928035901";
			/* 728x90, criado 10/11/09 */
			google_ad_slot = "5248275554";
			google_ad_width = 728;
			google_ad_height = 90;
			//-->
		</script>
		<script type="text/javascript"src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>
		</div>
		</td>
	</tr>
</table>
<br />
<!--- Rodapé Site --->
<table align="center" border="0" cellpadding="0" cellspacing="0" width="750">
	<tr>
		<td align="right" background="public/img/rodape_r1_c2.jpg" height="20" width="602" valign="middle">
			<a href="pesquisa-academia" class="link">&nbsp;Academia&nbsp; | </a>
			<a href="pesquisa-fisioterapeuta" class="link">&nbsp;Fisioterapeuta&nbsp; | </a>
			<a href="pesquisa-loja-esportiva" class="link">&nbsp;Lojas Esportivas&nbsp;| </a>					
			<a href="pesquisa-nutricionista" class="link">&nbsp;Nutricionista&nbsp; | </a>			
			<a href="pesquisa-personal-trainer" class="link">&nbsp;Personal Trainer&nbsp;| </a>					
			<a href="pesquisa-spa" class="link">&nbsp;Spa&nbsp; |</a>			
			<a href="fale-conosco" class="link">&nbsp;Fale Conosco&nbsp;</a>			
		</td>
		<td rowspan="2"><img name="rodape_r1_c1" src="public/img/rodape_r1_c1.jpg" width="150" height="65" border="0" id="rodape_r1_c1" alt="" ></td>
	</tr>
	<tr>
		<td><img name="rodape_r2_c2" src="public/img/rodape_r2_c2.jpg" width="600" height="45" border="0" id="rodape_r2_c2" alt="" ></td>
	</tr>
</table>
<table width="1280" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td><img name="bg_site_r4_c1" src="public/img/bg_rodape.jpg" width="1280" height="40" border="0" id="bg_site_r4_c1" alt="" ></td>
	</tr>
</table>
</body>
</html>
