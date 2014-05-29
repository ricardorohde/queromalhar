<?php 
ob_start(); 
include("../../public/inc/estrutura_admin.php"); 
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] != "adm") { 
	header("Location: ../acesso_negado.php");
}
ob_end_flush(); 
?>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
	<tr>
		<td>
            <fieldset>
            <legend align="center" class="cadastro_titulo">Enquete</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%" >
                    <tr>
                        <td height="10" colspan="2"></td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend class="cadastro_titulo">Cadastrar Nova Enquete</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                <form action="grava_cadastrar.php" name="form_enquete" onsubmit="return ValidarEnquete();" method="post">
                                <input type="Hidden" name="usuario" value="<?php echo $_SESSION["usuario"]; ?>">
                                    <tr>
                                        <td align="right" class="formulario" width="30%">Pergunta:</td>
                                        <td> 
                                        <?php 	if(!isset($_POST['pergunta'])){ ?>
                                        <input class="box" name="pergunta" type="text" size="50" maxlength="200"></td>
                                        <?php	} else { ?>
                                        <input class="box" name="pergunta" type="text" size="50" maxlength="200" value="<?php echo $_POST['pergunta']?>"></td>
                                        <?php} ?>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Tipo:</td>
                                        <td class="formulario">
                                            <input name="tipo" type="radio" value="simnao" onclick="enqueteSN();"  <?php if($_POST['tipo'] == "simnao"){ ?> checked ><?php} else { ?> > <?php}?>Sim ou Não 
                                            <input name="tipo" type="radio" value="multipla" onclick="enqueteMultipla();" <?php if($_POST['tipo'] == "multipla"){ ?>  checked ><?php } else {?> > <?php}?> Múltipla Escolha 
                                        </td>
                                    </tr>									
									<tr>
										<td colspan="2">
											<div id="multipla" style="display:none;">
											<table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
												<tr>
			                                        <td align="right" class="formulario">Reposta 1:</td>
			                                        <td><input class="box" name="resposta1" type="text" size="50"></td>
			                                    </tr>
			                                    <tr>
			                                        <td align="right" class="formulario">Reposta 2:</td>
			                                        <td><input class="box" name="resposta2" type="text" size="50"></td>
			                                    </tr>
			                                    <tr>
			                                        <td align="right" class="formulario">Reposta 3:</td>
			                                        <td><input class="box" name="resposta3" type="text" size="50"></td>
			                                    </tr>
			                                    <tr>
			                                        <td align="right" class="formulario">Reposta 4:</td>
			                                        <td><input class="box" name="resposta4" type="text" size="50"></td>
			                                    </tr>
											</table>
											</div>
										</td>									
									</tr> 									
                                    <tr>
                                        <td colspan="2" align="center"><input type="submit" class="botao" value="Cadastrar"></td>	
                                    </tr> 
                                </form>
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

