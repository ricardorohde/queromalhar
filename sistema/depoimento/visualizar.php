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
                                <legend class="cadastro_titulo">Visualizar Depoimento</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
									<?php 	while($array = $objDepoimento->mostraRegistros($query)) { ?>
									<tr>
										<td align="right" class="formulario" width="25%">Nome:</td>
										<td class="mtexto">&nbsp;<?php echo $array['dep_nome']; ?></td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Academia:</td>
										<td class="mtexto">&nbsp;<?php echo $array['dep_academia']; ?></td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Aulas Praticadas:</td>
										<td class="mtexto">&nbsp;<?php echo $array['dep_aula']; ?></td>
									</tr>	
									
									<tr>
										<td align="right" class="formulario" width="25%">Nota:</td>
										<td class="mtexto">&nbsp;<?php echo $array['dep_nota']; ?></td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Depoimento:</td>
										<td class="mtexto">&nbsp;<?php echo $array['dep_depoimento']; ?></td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Indico minha Academia:</td>
										<td class="mtexto">&nbsp;<?php echo $array['dep_indicar']; ?></td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Status:</td>
										<td class="mtexto">&nbsp;<?php echo $array['dep_status']; ?></td>
									</tr>
									<?php 	} ?>
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
