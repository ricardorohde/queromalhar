<?php
	$mensagem  = $_GET[msg];
	
	switch ($mensagem) { 
	/** Cadastrar Fale Conosco **/
	case 1 : 
				$msg1 = "Os dados foram enviados com sucesso!<br /><br />Em no m�ximo 24 horas sua mensagem ser� respondida.";
				break;
	/** Alterar Fale Conosco **/
	case 2 : 
				$msg = "N�o foi poss�vel enviar os dados! Tente novamente!";
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
