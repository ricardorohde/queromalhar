<?php
	$mensagem  = $_GET[msg];
	
	switch ($mensagem) { 
	/** Cadastrar Not�cia **/
	case 1 : 
				$msg1 = "Not�cia Cadastrada com Sucesso!";
				break;
	/** Alterar Not�cia **/
	case 2 : 
				$msg1 = "Not�cia Alterada com Sucesso!";
				break;
	/** Excluir Not�cia **/
	case 3 :  
				$msg1 = "Not�cia Exclu�da com Sucesso!";
				break;
	/** Limite Permitido **/
	case 4 :  
				$msg1 = "N�o foi possivel enviar o arquivo, excede o limite permitido!";
				break;			
	case 5 :  
				$msg1 = "Erro no upload! Verifique as permissoes do diretorio!";
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
