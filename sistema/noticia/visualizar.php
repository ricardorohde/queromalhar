<?php 
ob_start(); 
include("../../public/inc/estrutura_admin.php"); 
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] != "adm") { 
	header("Location: ../acesso_negado.php");
}
ob_end_flush();  
include("../../public/class/Noticia.class.php");
#Criar Objeto Noticia
$objNoticia = new Noticia();
$objNoticia->setRegistro($_GET['registro']);
$query = $objNoticia->visualizar($objNoticia);
?>

<br />

<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
	<tr>
		<td>
            <fieldset>
            <legend align="center" class="cadastro_titulo">Notícia</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend class="cadastro_titulo">Visualizar Notícia</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
									<?php 	while($array = $objNoticia->mostraRegistros($query)) { ?>
									<tr>
								        <td align="right" class="formulario" width="25%">Título:</td>
										<td class="mtexto">&nbsp;<?php echo $array['not_titulo'] ?></td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Texto:</td>
										<td class="mtexto">&nbsp;<?php echo $array['not_texto'] ?></td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Autor/Fonte:</td>
										<td class="mtexto">&nbsp;<?php echo $array['not_autor'] ?></td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Data:</td>
										<td class="mtexto">&nbsp;<?php echo $array['data']; ?></td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Imagem:</td>
										<td class="mtexto">&nbsp;
										<?php 
										if ($array['not_imagem'] == "Sem Imagem"){  
											echo "Notícia sem Imagem!"; 
										} else {?>
											<img src="<?php echo $pathImg.$array['not_imagem']; ?>" border="0">		
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