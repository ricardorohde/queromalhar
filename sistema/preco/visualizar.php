<?php 
ob_start(); 
include("../../public/inc/estrutura_admin.php"); 
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] != "adm") { 
	header("Location: ../acesso_negado.php");
}
ob_end_flush(); 
include("../../public/class/Preco.class.php");
#Criar Objeto Preco
$objPreco = new Preco();
$objPreco->setRegistro($_GET['registro']);
$query = $objPreco->visualizar($objPreco);
?>

<br />

<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
	<tr>
		<td>
            <fieldset>
            <legend align="center" class="cadastro_titulo">Preço</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend class="cadastro_titulo">Visualizar Preço</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
									<?php 	while($array = $objPreco->mostraRegistros($query)) { ?>
									<tr>
								        <td align="right" class="formulario" width="25%">Produto:</td>
										<td class="mtexto">&nbsp;<?php echo $array['pre_produto'] ?> </td>
									</tr>
										<tr>
								        <td align="right" class="formulario" width="25%">Valor:</td>
										<td class="mtexto">&nbsp;<?php echo $array['pre_valor'] ?> </td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Status:</td>
										<td class="mtexto">&nbsp; <?php echo $array['pre_status'] ?> </td>
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
