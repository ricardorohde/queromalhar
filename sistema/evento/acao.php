<?php
	$mensagem  = $_GET[msg];

	switch ($mensagem) { 
	/** Cadastrar Evento **/
	case 1 : 
				$msg1 = "Evento Cadastrado com Sucesso!";
				break;
	/** Alterar Evento **/
	case 2 : 
				$msg1 = "Evento Alterado com Sucesso!";
				break;
	/** Excluir Evento **/
	case 3 :  
				$msg1 = "Evento Exclu�do com Sucesso!";
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
