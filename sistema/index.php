<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>:: QueroMalhar - Usuários ::</title>	
	<link href="../public/css/estilos.css" rel="stylesheet" type="text/css">
   	<link rel="shortcut icon" href="../public/img/icon.ico" />
    <script language="javascript" src="../public/js/jquery.js" type="text/javascript"></script>
	<script language="javascript" src="../public/js/jquery.maskedinput.js" type="text/javascript"></script>    
    <script language="javascript" src="../public/js/jquery.price_format.js" type="text/javascript"></script>
    <script language="javascript" src="../public/js/jquery.validate.js" type="text/javascript"></script>
	<script language="javascript" src="../public/js/geral.js" type="text/javascript"></script>
</head>

<body bgcolor="#ffffff" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<table width="1280" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td><img name="bg_topo" src="../public/img/bg_topo.jpg" width="1280" height="35" border="0" id="bg_topo" alt="" ></td>
	</tr>
	<tr>
		<td valign="bottom" background="../public/img/bg_conteudo.jpg" height="450">	
			<form action="validarlogin.php" name="form_login" method="post" onSubmit="return ValidarLogin();">
			<table align="center" border="0" cellpadding="0" cellspacing="0" width="750">
				<tr>					
					<td align="center" colspan="3"><img name="painel_r1_c1" src="../public/img/painel_r1_c1.jpg" width="750" height="100" border="0" id="painel_r1_c1" alt="" ></td>
				</tr>
				<tr>					
					<td colspan="3" height="130">&nbsp;</td>					
				</tr>
				<tr>			
					<td rowspan="3" width="205">&nbsp;</td>		
					<td background="../public/img/login_queromalhar.jpg" width="340" height="200">
						<table align="center" border="0" cellpadding="1" cellspacing="1" height="80" width="340">
							<tr>
								<td align="right" valign="middle" class="formulario" width="30%">Login:</td>
								<td><input id="cpf" class="box" type="text" name="usuario" size="20" maxlength="14" ></td>
							</tr>
							<tr>
								<td align="right" class="formulario">Senha:</td>
								<td><input class="box" type="password" size="20" maxlength="8" name="senha"></td>
							</tr>
							<tr align="center">
								<td colspan="2"><input class="botao_painel" type="submit"  value="Entrar"></td>					
							</tr>
							<?php if(isset($_GET['logado'])){ ?>
							<tr>								
								<td align="center" class="mensagem" colspan="4" height="43" valign="top">Usuário e/ou Senha Inválidos!</td>
							</tr>
							<?php	} ?>
						</table>
					</td>
					<td rowspan="3" width="205">&nbsp;</td>
				</tr>
				<tr>
					<td height="140">&nbsp;</td>
				</tr>	
			</table>
			</form>
		</td>
	</tr>
	<tr>
		<td><img name="bg_rodape" src="../public/img/bg_rodape.jpg" width="1280" height="40" border="0" id="bg_rodape" alt="" ></td>
	</tr>
</table>
</body>
</html>