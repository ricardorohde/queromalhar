<?php 
include("../../public/class/Newsletter.class.php");
#Criar Objeto Newsletter
$objNewsletter = new Newsletter();
$objNewsletter->setNome(utf8_decode($_POST['nome']));
$query = $objNewsletter->pesquisar($objNewsletter);
?>

<br />

<fieldset>
    <legend class="cadastro_titulo">Resultados</legend>
    <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
        <?php $linhas = $objNewsletter->totalRegistros($query);
        if ($linhas != 0) { 		
        while($array = $objNewsletter->mostraRegistros($query)) { ?>
         <tr>
            <td width="80%" class="mtexto"><?php echo $array['new_nome']; ?></td>
            <td align="center"><a href="excluir.php?registro=<?php echo base64_encode($array[new_nu]);?>" class="excluir"><img src="../../public/img/btn_excluir.gif" border="0" title="  EXCLUIR  "></a></td>
            <td align="center"><a href="alterar.php?registro=<?php echo base64_encode($array[new_nu]); ?>"><img src="../../public/img/btn_alterar.gif" border="0" title="  ALTERAR  "></a></td>
            <td align="center"><a href="visualizar.php?registro=<?php echo base64_encode($array[new_nu]); ?>"><img src="../../public/img/btn_consultar.gif" border="0" title="  CONSULTAR  "></a></td>
        </tr>
        <?php } } else { ?>
        <tr> 
                                        <td align="center" colspan="4" class="mensagem">Nenhum Registro Encontrado!</td>
                                     </tr>		
<?php } ?> 
    </table>
</fieldset>

<br />