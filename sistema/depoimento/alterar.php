<?php 
ob_start(); 
include("../../public/inc/estrutura_admin.php"); 
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] != "adm") { 
	header("Location: ../acesso_negado.php");
}
ob_end_flush(); 
include("../../public/class/Depoimento.class.php");
#Criar Objeto Depoimento
$objDepoimento = new Depoimento();
$objDepoimento->setRegistro($_GET['registro']);
$query = $objDepoimento->visualizar($objDepoimento);
?>


<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
	<tr>
		<td>
            <fieldset>
            <legend align="center" class="cadastro_titulo">Depoimento</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend class="cadastro_titulo">Alterar Depoimento</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                <form action="grava_alterar.php" name="form_depoimento" method="post" onsubmit="return ValidarDepoimento();">
								<?php 	while($array = $objDepoimento->mostraRegistros($query)) { ?>
                                <input type="Hidden" name="registro" value="<?php echo base64_encode($array[dep_nu]); ?>">
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Nome:</td>
                                        <td><input type="text" class="box" name="nome" size="50" maxlength="100" value="<?php echo $array['dep_nome']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Academia:</td>
                                        <td><input id="academia" class="box" type="text" size="50" maxlength="100" name="academia" value="<?php echo $array['dep_academia']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Aulas Praticadas:</td>
                                        <td><input id="aula" class="box" type="text" size="50" maxlength="100" name="aula" value="<?php echo $array['dep_aula']; ?>"></td>
                                    </tr>	
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Depoimento:</td>
                                        <td><textarea cols="40" class="box" rows="10" name="depoimento"><?php echo $array['dep_depoimento']; ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Nota:</td>
                                        <td>
                                            
                                            <select name="nota" id="nota" class="box"><br />
                                                <option value=""></option>
                                                <option value="1" <?php if($array['dep_nota'] == "1"){ ?> selected <?php } ?>>1</option>
                                                <option value="2" <?php if($array['dep_nota'] == "2"){ ?> selected <?php } ?>>2</option>
                                                <option value="3" <?php if($array['dep_nota'] == "3"){ ?> selected <?php } ?>>3</option>
                                                <option value="4" <?php if($array['dep_nota'] == "4"){ ?> selected <?php } ?>>4</option>
                                                <option value="5" <?php if($array['dep_nota'] == "5"){ ?> selected <?php } ?>>5</option>
                                                <option value="6" <?php if($array['dep_nota'] == "6"){ ?> selected <?php } ?>>6</option>
                                                <option value="7" <?php if($array['dep_nota'] == "7"){ ?> selected <?php } ?>>7</option>
                                                <option value="8" <?php if($array['dep_nota'] == "8"){ ?> selected <?php } ?>>8</option>
                                                <option value="9" <?php if($array['dep_nota'] == "9"){ ?> selected <?php } ?>>9</option>
                                                <option value="10" <?php if($array['dep_nota'] == "10"){ ?> selected <?php } ?>>10</option>
                                            </select>
                                            
                                        </td>		
                                    </tr>		
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Status:</td>
                                        <td>
                                            <select name="status" class="txtForm">
                                                <option value=""></option>
                                                <option value="Ativado" <?php if($array['dep_status'] == "Ativado"){ ?> selected <?php } ?>>Ativado</option>
                                                <option value="Desativado" <?php if($array['dep_status'] == "Desativado"){ ?> selected <?php } ?>>Desativado</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Indica Academia:</td>
                                        <td class="box"><input type="Radio" value="Sim" name="indicar" <?php if($array['dep_indicar'] == "Sim"){ ?> checked <?php } ?>>Sim &nbsp;&nbsp;<input type="Radio" value="Não" name="indicar" <?php if($array['dep_indicar'] == "Não"){ ?> checked <?php } ?>>Não</td>
                                    </tr>		
                                    <?php } ?>
                                    <tr>
                                        <td align="center" colspan="2"><input class="botao" type="submit" value="Alterar"></td>	
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




