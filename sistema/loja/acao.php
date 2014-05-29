<?php
	$mensagem  = $_GET[msg];
	
	switch ($mensagem) { 
	/** Cadastrar Loja Esportiva **/
	case 1 : 
				$msg1 = "Loja Esportiva Cadastrada com Sucesso!";
				break;
	/** Alterar Loja Esportiva **/
	case 2 : 
				$msg1 = "Loja Esportiva Alterada com Sucesso!";
				break;
	/** Excluir Loja Esportiva **/
	case 3 :  
				$msg1 = "Loja Esportiva Excluída com Sucesso!";
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
