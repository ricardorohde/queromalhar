<?php
	$mensagem  = $_GET[msg];
	
	switch ($mensagem) { 
	/** Cadastrar Dica **/
	case 1 : 
				$msg1 = "Dica Cadastrada com Sucesso!";
				break;
	/** Alterar Dica **/
	case 2 : 
				$msg1 = "Dica Alterada com Sucesso!";
				break;
	/** Excluir Dica **/
	case 3 :  
				$msg1 = "Dica Excluída com Sucesso!";
				break;
	default :
				$msg1 = "Erro";
	}	
			
	include("../../public/inc/estrutura_admin.php"); 
?>

<table align="center" border="0" width="620">
	<tr>
		<td height="100"></td>
	</tr>
	<tr>
		<td align="center" class="mensagem"><?php echo $msg1; ?></td>
	</tr>
	<tr>
		<td height="100"></td>
	</tr>
</table>

<?php include("../../public/inc/rodape_admin.php"); ?>
