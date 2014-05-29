<?php 
ob_start(); 
include("../../public/inc/estrutura_admin.php"); 
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] != "adm") { 
	header("Location: ../acesso_negado.php");
}
ob_end_flush(); 
include("../../public/class/Historia.class.php");
#Criar Objeto Historia
$objHistoria = new Historia();
$objHistoria->setRegistro($_GET['registro']);
$query = $objHistoria->visualizar($objHistoria);
?>

<br />

<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
	<tr>
		<td>
            <fieldset>
            <legend align="center" class="cadastro_titulo">História</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend class="cadastro_titulo">Visualizar História</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
									<?php 	while($array = $objHistoria->mostraRegistros($query)) { ?>
									<tr>
										<td align="right" class="formulario" width="25%">Título:</td>
										<td class="mtexto">&nbsp;<?php echo $array['hit_titulo']; ?></td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Nome:</td>
										<td class="mtexto">&nbsp;<?php echo $array['hit_nome']; ?></td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">E-mail:</td>
										<td class="mtexto">&nbsp;<?php echo $array['hit_email']; ?></td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Texto:</td>
										<td class="mtexto">&nbsp;<?php echo $array['hit_texto'] ?></td>
									</tr>
									<tr>
										<td align="right" class="formulario" width="25%">Data:</td>
										<td class="mtexto">&nbsp;<?php echo $array['data']; ?></td>
									</tr>	
									<tr>
								        <td align="right" class="formulario" width="25%">Fonte:</td>
										<td class="mtexto">&nbsp;<?php echo $array['hit_fonte'] ?></td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Status:</td>
										<td class="mtexto">&nbsp;<?php echo $array['hit_status'] ?></td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Imagem:</td>
										<td class="mtexto">&nbsp;
										<?php 
										if ($array['hit_imagem'] == "Sem Arquivo"){
											echo "História sem Imagem!"; 
										} else {?>
											<img src="<?php echo $pathImg.$array['hit_imagem']; ?>" border="0">		
										<?php  } ?> 
										</td>
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
