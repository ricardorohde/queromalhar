<?php
	$mensagem  = $_GET[msg];

			switch ($mensagem) { 
			/** Alterar Senha **/
			case 1 : 
						$msg1 = "Senha Alterada com Sucesso!";
						break;
			default :
						$msg1 = "Erro";
			}	

	include("../../public/inc/estrutura_admin.php"); 
?>

<table align="center" border="0" width="500">
	<tr>
		<td height="60"></td>
	</tr>
	<tr>
		<td align="center" class="mensagem"><?php echo $msg1;?></td>
	</tr>
	<tr>
		<td height="60"></td>
	</tr>
</table>
<?php include("../../public/inc/rodape_admin.php"); ?>
