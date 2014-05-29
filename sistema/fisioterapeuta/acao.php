<?php
	$mensagem  = $_GET[msg];
	
	switch ($mensagem) { 
	/** Cadastrar Fisioterapeuta **/
	case 1 : 
				$msg1 = "Fisioterapeuta Cadastrado com Sucesso!";
				break;
	/** Alterar Fisioterapeuta **/
	case 2 : 
				$msg1 = "Fisioterapeuta Alterado com Sucesso!";
				break;
	/** Excluir Fisioterapeuta **/
	case 3 :  
				$msg1 = "Fisioterapeuta Excluído com Sucesso!";
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
