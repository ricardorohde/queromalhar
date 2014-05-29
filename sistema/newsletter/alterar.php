<?php 
ob_start(); 
include("../../public/inc/estrutura_admin.php"); 
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] != "adm") { 
	header("Location: ../acesso_negado.php");
}
ob_end_flush(); 
include("../../public/class/Newsletter.class.php");
#Criar Objeto Newsletter
$objNewsletter = new Newsletter();
$objNewsletter->setRegistro($_GET['registro']);
$query = $objNewsletter->visualizar($objNewsletter);
?>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
	<tr>
		<td>
            <fieldset>
            <legend align="center" class="cadastro_titulo">Newsletter</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend class="cadastro_titulo">Alterar Newsletter</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                <form action="grava_alterar.php" name="form_newsletter" method="post" onsubmit="return ValidarNewsletter();">
								<?php 	while($array = $objNewsletter->mostraRegistros($query)) { ?>
                                <input type="Hidden" name="registro" value="<?php echo base64_encode($array[new_nu]); ?>">
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Nome:</td>
                                        <td><input type="text" class="box" name="nome" size="50" maxlength="100" value="<?php echo $array['new_nome']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario" width="25%">E-mail:</td>
                                        <td><input type="text" class="box" name="email" size="50" maxlength="100" value="<?php echo $array['new_email']; ?>"></td>
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



