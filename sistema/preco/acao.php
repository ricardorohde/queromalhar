<?php
	$mensagem  = $_GET[msg];
	
	switch ($mensagem) { 
	/** Cadastrar Pre�o **/
	case 1 : 
				$msg1 = "Pre�o Cadastrado com Sucesso!";
				break;
	/** Alterar Pre�o **/
	case 2 : 
				$msg1 = "Pre�o Alterado com Sucesso!";
				break;
	/** Excluir Pre�o **/
	case 3 :  
				$msg1 = "Pre�o Exclu�do com Sucesso!";
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
