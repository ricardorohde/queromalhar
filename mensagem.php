<?php
	switch ($_GET[msg]) { 
	/** Academia  **/
	case 1 : 
				$msg = "Academia Cadastrada com Sucesso!";
				break;
	/** Fisioterapeuta  **/
	case 2 : 
				$msg = "Fisioterapeuta Cadastrado com Sucesso!";
				break;
	/** Loja Esportiva  **/
	case 3 : 
				$msg = "Loja Esportiva Cadastrada com Sucesso!";
				break;
	/** Nutricionista  **/
	case 4 : 
				$msg = "Nutricionista Cadastrado com Sucesso!";
				break;
	/** Personal Trainer **/
	case 5 : 
				$msg = "Personal Trainer Cadastrado com Sucesso!";
				break;
	/** Spa **/
	case 6 : 
				$msg = "Spa Cadastrado com Sucesso!";
				break;
	/** Newsletter Cadastrado **/
	case 7 : 
				$msg = "E-mail Cadastrado com Sucesso!";
				break;
	/** Newsletter Já Cadastrado **/
	case 8 : 
				$msg = "E-mail Cadastrado Já Cadastrado!";
				break;
	/** Fale Conosco Enviado **/
	case 9 : 
				$msg = "Os dados foram enviados com sucesso!<br /><br />Em no máximo 24 horas sua mensagem será respondida.";
				break;
				
	/** Fale Conosco Não Enviado **/
	case 10 : 
				$msg = "Não foi possível enviar os dados! Tente novamente!";
				break;
	/** Enquete Voto cadastrado **/
	case 11 : 
				$msg = "Agradecemos o seu Voto!";
				break;
	/** Enquete Voto já computado **/
	case 12 : 
				$msg = "Voto já Computado!";
				break;
	/** Depoimento Cadastrado **/
	case 13 : 
				$msg = "Depoimento cadastrado com Sucesso!";
				break;
	/** Depoimento Cadastrado **/
	case 14 : 
				$msg = "História cadastrada com Sucesso!";
				break;
	default :
				$msg = "Erro";
	}	
			
include("public/inc/estrutura.php");
?>

<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td><img name="cadastro_academia" src="public/img/mensagem.jpg" width="220" height="25" border="0" id="cadastro_academia" alt="" ></td>
	</tr>
</table>

<br />

<table align="center" border="0" width="97%">
	<tr>
		<td height="100"></td>
	</tr>
	<tr>
		<td align="center" class="mensagem"><?php echo $msg; ?></td>
	</tr>
	<tr>
		<td height="100"></td>
	</tr>
</table>
<?php 	include("public/inc/rodape.php"); ?>


