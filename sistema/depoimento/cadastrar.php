<?php  
	ob_start(); 
	include("../../public/inc/estrutura_admin.php"); 
	if (isset($_SESSION['permissao']) AND $_SESSION['permissao'] != "adm") { 
		header("Location: ../acesso_negado.php");
	}
	ob_end_flush(); 
?>


<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
	<tr>
		<td>
            <fieldset>
            <legend align="center" class="cadastro_titulo">Depoimento</legend>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend class="cadastro_titulo">Cadastrar Novo Depoimento</legend>
                                <table align="center" border="0" cellspacing="0" cellpadding="2" width="500">
                                <form action="grava_cadastrar.php" name="form_depoimento" method="post" onsubmit="return ValidarDepoimento();">
                                <input type="Hidden" name="usuario" value="<?php echo $_SESSION["usuario"]; ?>">
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Nome:</td>
                                        <td><input type="text" class="box" name="nome" size="50" maxlength="100"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Academia:</td>
                                        <td><input id="academia" class="box" type="text" size="50" maxlength="100" name="academia"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Aulas Praticadas:</td>
                                        <td><input id="aula" class="box" type="text" size="50" maxlength="100" name="aula"></td>
                                    </tr>	
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Depoimento:</td>
                                        <td><textarea cols="40" class="box" rows="10" name="depoimento"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td align="right" class="formulario">Nota:</td>
                                        <td>
                                            
                                            <select name="nota" id="nota" class="box"><br />
                                                <option value=""></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                            
                                        </td>		
                                    </tr>		
                                    <tr>
                                        <td align="right" class="formulario">Indica Academia:</td>
                                        <td class="box"><input type="Radio" value="Sim" name="indicar">Sim &nbsp;&nbsp;<input type="Radio" value="Não" name="indicar">Não</td>
                                    </tr>		
                                    <tr>
                                        <td align="right" class="formulario" width="25%">Status:</td>
                                        <td>
                                            <select name="status" class="txtForm">
                                                <option value=""></option>
                                                <option value="Ativado">Ativado</option>
                                                <option value="Desativado">Desativado</option>
                                            </select>		
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center"><input class="botao" type="submit" value="Cadastrar"></td>	
                                    </tr> 
                                </form>
                                </table>
                            </fieldset>
                        </td>
                    </tr>
                </table>
				<br />
            </fieldset>
		</td>
	</tr>
</table>

<br />

<?php include("../../public/inc/rodape_admin.php"); ?>