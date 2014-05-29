<?php 
ob_start(); 
include("../../public/inc/estrutura_admin.php"); 
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] != "adm") { 
	header("Location: ../acesso_negado.php");
}
ob_end_flush(); 
include("../../public/class/Enquete.class.php");
#Criar Objeto Enquete
$objEnquete = new Enquete();
$objEnquete->setRegistro($_GET['registro']);
$query = $objEnquete->visualizar($objEnquete);
?>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
	<tr>
		<td>
            <fieldset>
            <legend align="center" class="cadastro_titulo">Enquete</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend class="cadastro_titulo">Visualizar Enquete</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
									<?php 	while($array = $objEnquete->mostraRegistros($query)) { ?>
									<tr>
								        <td align="right" class="formulario" width="25%">Data:</td>
										<td class="mtexto">&nbsp;<?php echo $array['data']; ?> </td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Pergunta:</td>
										<td class="mtexto">&nbsp;<?php echo $array['enq_pergunta']; ?> </td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Tipo:</td>
										<td class="mtexto">&nbsp;<?php if($array['enq_tipo'] == "multipla") {?>Múltipla Escolha <?php } else { ?>Sim ou Não <?php }?></td>
									</tr>
									<?php if($array['enq_tipo'] == "multipla") { ?>
									<tr>
								        <td align="right" class="formulario" width="25%">Reposta 1:</td>
										<td class="mtexto">&nbsp;<?php echo $array['enq_resp1']; ?> </td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Reposta 1:</td>
										<td class="mtexto">&nbsp;<?php echo $array['enq_resp2']; ?> </td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Reposta 1:</td>
										<td class="mtexto">&nbsp;<?php echo $array['enq_resp3']; ?> </td>
									</tr>
										<tr>
								        <td align="right" class="formulario" width="25%">Reposta 1:</td>
										<td class="mtexto">&nbsp;<?php echo $array['enq_resp4']; ?> </td>
									</tr>
									<?php } else { ?>
									</tr>
										<tr>
								        <td align="right" class="formulario" width="25%">Reposta 1:</td>
										<td class="mtexto">&nbsp;Sim</td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Reposta 2:</td>
										<td class="mtexto">&nbsp;Não</td>
									</tr>
									<?php } }?>
									<tr>
										<td colspan="2" align="center"><input class="botao" type="submit" value="Voltar" onclick="voltarPagina('index.php');"></td>	
									</tr> 
                                </table>
                            </fieldset>
                        </td>
                    </tr>
                </table>
				<br />
            </fieldset>
		</td>
	</tr>
</table>

<br />

<?php include("../../public/inc/rodape_admin.php"); ?>


