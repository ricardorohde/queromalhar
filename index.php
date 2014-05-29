<?php 
include("public/inc/estrutura.php");
$objEnquete = new Enquete();
$qryEnquete = $objEnquete->listarUltimaEnquete();
$objHistoria = new Historia();
$qryHistoria = $objHistoria->listarUltimaHistoria();
?>

<!---  Em Forma e Depoimento --->
<table align="center" border="0" cellpadding="0" cellspacing="0" width="560">
	<tr>
		<td>
			<table align="left" border="0" cellpadding="2" cellspacing="1" width="341">
				<tr>
					<td colspan="2"><img name="fundo_emforma" src="public/img/fundo_emforma.jpg" width="341" height="36" border="0" id="fundo_emforma" alt="" ></td>
				</tr>				
				<tr>
					<td height="20"></td>
				</tr>	
				<?php $linhasHistoria = $objHistoria->totalRegistros($qryHistoria);
				if($linhasHistoria != 0 ) {	
				while($exibirHistoria = $objHistoria->mostraRegistros($qryHistoria)) { 
				$historia = $exibirHistoria['hit_texto'];
				$limite = 280; 
				$linkHistoria = UrlManage::getUrl($exibirHistoria['hit_nu'],"historias",$exibirHistoria['hit_titulo']); ?>
				<tr>
					<td align="center" width="28%" valign="middle"><img name="rosto" src="public/img/rosto.jpg" width="95" height="96" border="0" id="votar" alt="" ></td>
					<td class="historia_texto" height="100" valign="top" width="72%"><?php echo abreviar($historia,$limite);?></td>
				</tr>
				<tr>
					<td colspan="3" height="16">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="<?php echo $linkHistoria;?>"><img name="historia" src="public/img/bt_historia.jpg" width="82" height="34" border="0" id="historia" alt="" ></a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="cadastro-historia"><img name="escrever" src="public/img/bt_escrever.jpg" width="55" height="20" border="0" id="escrever" alt="" ></a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="historias"><img name="ler" src="public/img/bt_ler.jpg" width="65" height="20" border="0" id="ler" alt="" ></a>
					</td>
				</tr>	
				<?php } } ?>	
			</table>		
		</td>
		<td width="259"><a href="cadastro-depoimento"><img name="depoimento" src="public/img/bt_depoimento.jpg" width="223" height="160" border="0" id="depoimento" alt="" ></a></td>
	</tr>
</table>
		
<!--- Enquete e Quero me Cadastrar --->
<table align="center" border="0" cellpadding="0" cellspacing="0" width="560">
	<tr>
        <td width="260">
          <table align="center" border="0" cellpadding="0" cellspacing="0">
              <tr>
                  <td align="center" valign="middle"><a href="quero-anunciar"><img name="mao" src="public/img/mao.jpg" width="150" height="103" border="0" id="mao" alt="" ></a></td>
              </tr>	
              <tr>
                  <td>
                      <table border="0" width="100%">
                          <tr>
                              <td colspan="2" height="5"></td>
                          </tr>
                          <tr>
                              <td align="left" colspan="2"><img name="news" src="public/img/news.jpg" width="260" height="25" border="0" id="news" alt="" ></td>
                          </tr>
                          <tr>
                              <td colspan="2" height="5"></td>
                          </tr>
                          <tr>
                              <td align="center" colspan="2" class="cadastro_subtitulo">Receba nosso Informativo</td>
                          </tr>
                          <tr>
                              <td colspan="2" height="5"></td>
                          </tr>
                          <form action="grava_newsletter.php" name="form_newsletter" method="post">
                              <tr>
                                  <td align="right" valign="middle" class="formulario">Nome:</td>
                                  <td><input class="box" type="text" name="nome" size="25" maxlength="100"></td>
                              </tr>
                              <tr>
                                  <td align="right" valign="middle" class="formulario">E-mail:</td>
                                  <td><input class="box" type="text" name="email" size="25" maxlength="100"></td>
                              </tr>
                              <tr>
                                  <td colspan="2" height="5"></td>
                              </tr>
                              <tr align="center">
                                  <td colspan="2">
                                      <input src="public/img/bt_enviar_verde.jpg" type="Image" value="Enviar" onclick="Newsletter(); return false;" width="55" height="20">
                                      &nbsp;&nbsp;	
                                      <input src="public/img/bt_limpar_verde.jpg" type="Image" value="Limpar" onclick="document.form_news.reset(); return false;" width="55" height="20">
                                  </td>					
                              </tr>
                          </form>
                      </table>		
                  </td>
				</tr>		
			</table>	
		</td>		
		<td valign="top" rowspan="2" width="300">
		<form action="grava_enquete.php" name="form_enquete" method="post">
			<table align="center" border="0" cellpadding="0" cellspacing="0" height="210" width="300">
				<tr>
					<td align="center"><img name="enquete_topo" src="public/img/enquete_topo.jpg" width="300" height="50" border="0" id="enquete_topo" alt="" ></td>
				</tr>
				<?php $linhasEnquete = $objEnquete->totalRegistros($qryEnquete);
				if($linhasEnquete != 0 ) {	
				while($exibirEnquete = $objEnquete->mostraRegistros($qryEnquete)) { 
				$enquete = $exibirEnquete['enq_nu']; ?>
				<tr>
					<td class="enquete_pergunta">&nbsp;&nbsp;&nbsp;<?php echo $exibirEnquete['enq_pergunta']; ?>&nbsp;</td>
				</tr>
				<input type="Hidden" name="registro" value="<?php echo base64_encode($exibirEnquete['enq_nu']);?>">
				<?php if($exibirEnquete['enq_tipo'] == "multipla") { ?>
				<tr>
					<td align="left" class="enquete_resposta">&nbsp;&nbsp;&nbsp;<input name="resposta" type="radio" value="enq_quant1">&nbsp;<?php echo $exibirEnquete['enq_resp1'];?></td>
				</tr>
				<tr>
					<td align="left" class="enquete_resposta">&nbsp;&nbsp;&nbsp;<input name="resposta" type="radio" value="enq_quant2">&nbsp;<?php echo $exibirEnquete['enq_resp2'];?></td>
				</tr>
				<tr>
					<td align="left" class="enquete_resposta">&nbsp;&nbsp;&nbsp;<input name="resposta" type="radio" value="enq_quant3">&nbsp;<?php echo $exibirEnquete['enq_resp3'];?></td>
				</tr>
				<tr>
					<td align="left" class="enquete_resposta">&nbsp;&nbsp;&nbsp;<input name="resposta" type="radio" value="enq_quant4">&nbsp;<?php echo $exibirEnquete['enq_resp4'];?></td>
				</tr>
				<?php } else { ?>
				<tr>
					<td align="left" class="enquete_resposta">&nbsp;&nbsp;&nbsp;<input name="resposta" type="radio" value="enq_quant1">&nbsp;<?php echo $exibirEnquete['enq_resp1'];?></td>
				</tr>
				<tr>
					<td align="left" class="enquete_resposta">&nbsp;&nbsp;&nbsp;<input name="resposta" type="radio" value="enq_quant2">&nbsp;<?php echo $exibirEnquete['enq_resp2'];?></td>
				</tr>
				<?php } }?>
				<tr>
					<td align="center">
					<input src="public/img/bt_votar.jpg" type="Image" value="Votar" onclick="Enquete(); return false;" width="55" height="20">
					&nbsp;&nbsp;&nbsp;
					<a href="resultado_enquete.php?registro=<?php echo base64_encode($enquete); ?>" class="noticia"><img name="resultado" src="public/img/bt_resultado.jpg" width="65" height="20" border="0" id="resultado" alt="" ></a>
					</td>
				</tr>		
				<?php } else { ?>
				<tr>
					<td align="center" height="5" class="mensagem">Nenhum Registro encontrado</td>
				</tr>				
				<?php } ?>
				<tr>
					<td align="center"><img name="enquete_rodape" src="public/img/enquete_rodape.jpg" width="300" height="40" border="0" id="enquete_rodape" alt="" ></td>
				</tr>				
			</table>
			</form>	
		</td>
	</tr>
</table>

<?php include("public/inc/rodape.php");?>