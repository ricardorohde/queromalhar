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
                                <legend class="cadastro_titulo">Alterar Preço</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                <form action="grava_alterar.php" name="form_preco" method="post" onsubmit="return ValidarPreco();">
                                    <?php 	while($array = $objPreco->mostraRegistros($query)) { ?>
                                    <input type="Hidden" name="registro" value="<?php echo base64_encode($array[pre_nu]); ?>">
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Produto:</td>
                                        <td><input type="text" class="box" name="produto" size="50" maxlength="100" value="<?php echo $array['pre_produto']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Valor:</td>
                                        <td><input id="valor" type="text" class="box" name="valor" size="20" maxlength="10" value="<?php echo $array['pre_valor']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Status:</td>
                                        <td>
                                            <select name="status" class="box">
                                                <option value=""></option>
                                                <option value="Ativado" <?php if($array['pre_status'] == "Ativado"){ ?> selected <?php } ?>>Ativado</option>
                                                <option value="Desativado" <?php if($array['pre_status'] == "Desativado"){ ?> selected <?php } ?>>Desativado</option>
                                            </select>
                                        </td>
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



