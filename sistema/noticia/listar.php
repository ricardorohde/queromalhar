<?php 
ob_start(); 
include("../../public/inc/estrutura_admin.php"); 
if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] != "adm") { 
	header("Location: ../acesso_negado.php");
}
ob_end_flush(); 
include("../../public/class/Noticia.class.php");
#Criar Objeto Not�cia
$objNoticia = new Noticia();
$query = $objNoticia->listarNoticia();
?>
<br />


<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
	<tr>
		<td>
            <fieldset>
            <legend align="center" class="cadastro_titulo">Not�cia</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend class="cadastro_titulo">Listar Not�cia</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
									<?php $linhas = $objNoticia->totalRegistros($query);
									if ($linhas != 0) { 		
									while($array = $objNoticia->mostraRegistros($query)) { ?>
									 <tr>
										<td width="80%" class="mtexto"><?php echo $array['not_titulo']; ?></td>
										<td align="center"><a href="excluir.php?registro=<?php echo base64_encode($array['not_nu']);?>" class="excluir"><img src="../../public/img/btn_excluir.gif" border="0" title="  EXCLUIR  "></a></td>
										<td align="center"><a href="alterar.php?registro=<?php echo base64_encode($array['not_nu']); ?>"><img src="../../public/img/btn_alterar.gif" border="0" title="  ALTERAR  "></a></td>
										<td align="center"><a href="visualizar.php?registro=<?php echo base64_encode($array['not_nu']); ?>"><img src="../../public/img/btn_consultar.gif" border="0" title="  CONSULTAR  "></a></td>
									</tr>
									<?php } } else { ?>
									<tr> 
                                        <td align="center" colspan="4" class="mensagem">Nenhum Registro Encontrado!</td>
                                     </tr>		
<?php } ?> 
									<tr>
										<td colspan="4" align="center"><input class="botao" type="submit" value="Voltar" onclick="voltarPagina('index.php');"></td>	
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

<?php  include("../../public/inc/rodape_admin.php"); ?>	