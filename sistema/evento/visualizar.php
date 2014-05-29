<?php 
ob_start(); 
include("../../public/inc/estrutura_admin.php"); 
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] != "adm") { 
	header("Location: ../acesso_negado.php");
}
ob_end_flush(); 
include("../../public/class/Evento.class.php");
#Criar Objeto Evento
$objEvento = new Evento();
$objEvento->setRegistro($_GET['registro']);
$query = $objEvento->visualizar($objEvento);
?>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
	<tr>
		<td>
            <fieldset>
            <legend align="center" class="cadastro_titulo">Evento</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend class="cadastro_titulo">Visualizar Evento</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
									<?php 	while($array = $objEvento->mostraRegistros($query)) { ?>
									<tr>
								        <td align="right" class="formulario" width="25%">Nome:</td>
										<td class="mtexto">&nbsp;<?php echo $array['eve_nome'] ?></td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Local:</td>
										<td class="mtexto">&nbsp;<?php echo $array['eve_local'] ?></td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Informação:</td>
										<td class="mtexto">&nbsp;<?php echo $array['eve_informacao'] ?></td>
									</tr>
                                    <tr>
								        <td align="right" class="formulario" width="25%">Período:</td>
										<td class="mtexto">&nbsp;<?php echo $array['eve_periodo'] ?></td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Data:</td>
										<td class="mtexto">&nbsp;<?php echo $array['data'] ?></td>
									</tr>
									<tr>
								        <td align="right" class="formulario" width="25%">Imagem:</td>
										<td class="mtexto">&nbsp;
										<?php if ($array['eve_imagem'] == "Sem Arquivo"){  
											echo "Evento sem Imagem!"; 
										} else {?>
											<img src="<?php echo $pathImg.$array['eve_imagem']; ?>" border="0">		
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
