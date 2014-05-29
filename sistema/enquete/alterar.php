<?php 
ob_start(); 
include("../../public/inc/estrutura_admin.php"); 
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] != "adm") { 
	header("Location: ../acesso_negado.php");
}
ob_end_flush(); 
include("../../public/class/Enquete.class.php");
#Criar Objeto Enquete
if(isset($_GET['registro'])) {
	$registro = $_GET['registro'];
} else {
	$registro = $_POST['registro'];
}
$objEnquete = new Enquete();
$objEnquete->setRegistro($registro);
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
                                <legend class="cadastro_titulo">Alterar Enquete</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                <form action="grava_alterar.php" name="form_enquete" method="post" onsubmit="return ValidarEnquete();">
								<?php  while($array = $objEnquete->mostraRegistros($query)) { ?>
                                <input type="Hidden" name="registro" value="<?php echo base64_encode($array[enq_nu]); ?>">
                                    <tr>
                                        <td align="right" class="formulario" width="30%">Pergunta:</td>
                                        <td> 
                                        <?php 	if(!isset($_POST['pergunta'])){ ?>
                                        <input class="box" name="pergunta" type="text" size="50" maxlength="200" value="<?php echo $array['enq_pergunta']; ?>"></td>
                                        <?php	} else { ?>
                                        <input class="box" name="pergunta" type="text" size="50" maxlength="200" value="<?php echo $_POST['pergunta'];?>"></td>
                                        <?php} ?>
                                    </tr>
                                        <?php
                                        if(isset($_POST['tipo'])){ 
                                            $tipo = $_POST['tipo'];
                                         } else {
                                            $tipo = $array['enq_tipo'];
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Tipo:</td>
                                        <td class="formulario">
                                            <input name="tipo" type="radio" value="simnao" onclick="enqueteSN();" <?php if( isset($tipo) && $tipo == "simnao"){ ?> checked ><?php} else { ?> > <?php}?>Sim ou Não 
                                            <input name="tipo" type="radio" value="multipla" onclick="enqueteMultipla();" <?php if( isset($tipo) && $tipo == "multipla"){ ?>  checked ><?php } else {?> > <?php}?> Múltipla Escolha 
                                        </td>
                                    </tr>
									<tr>
										<td colspan="2">
											<?php if($tipo == "simnao"){ ?>
											<div id="multipla" style="display:none;">
											<?php } else { ?>
											<div id="multipla" style="display:'';">
											<?php } ?>
											<table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
			                                    <tr>
			                                        <td align="right" class="formulario">Reposta 1:</td>
			                                        <td><input class="box" name="resposta1" type="text" size="50" value="<?php echo $array['enq_resp1']; ?>"></td>
			                                    </tr>
			                                    <tr>
			                                        <td align="right" class="formulario">Reposta 2:</td>
			                                        <td><input class="box" name="resposta2" type="text" size="50" value="<?php echo $array['enq_resp2']; ?>"></td>
			                                    </tr>
			                                    <tr>
			                                        <td align="right" class="formulario">Reposta 3:</td>
			                                        <td><input class="box" name="resposta3" type="text" size="50" value="<?php echo $array['enq_resp3']; ?>"></td>
			                                    </tr>
			                                    <tr>
			                                        <td align="right" class="formulario">Reposta 4:</td>
			                                        <td><input class="box" name="resposta4" type="text" size="50" value="<?php echo $array['enq_resp4']; ?>"></td>
			                                    </tr>
											</table>
											</div>
										</td>
									</tr>                  
                                    <tr>
                                        <td align="center" colspan="2"><input class="botao" type="submit" value="Alterar"></td>	
                                    </tr> 
                                </form>
                                <?php } ?>
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
