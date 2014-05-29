<?php
require_once('Conexao.class.php');

class Newsletter extends Conexao{
	#Atributos da Classe Newsletter
	private $nome;
	private $email;
	private $chave;
	private $registro;
	private $nemail;

	#M�todo Construtor Newsletter
	function __construct(){
	}

	#M�todo Destrutor Newsletter
	function __desctruct(){
	}

	#M�todos Acessores Newsletter - SET
	function setRegistro($registro){
		$registro = base64_decode($registro);
		$this->registro = $registro;
	}

	function setNome($nome){
		$this->nome = $nome;
	}
	
	function setEmail($nemail){
		$this->nemail = $nemail;
	}

	#M�todos Acessores Newsletter - GET
	function getChave(){
		return $this->chave;
	}
	
	function getRegistro(){
		return $this->registro;
	}

	function getNome(){
		return $this->nome;
	}

	function getEmail(){
		return $this->nemail;
	}
	
	#Fun��o Cadastrar Newsletter
	function cadastrar($newsletter){
  	$this->conectar();
	$sql = "INSERT INTO newsletter
				(
					new_nome,
					new_email
					)
			VALUES
				(
					 '".$newsletter->getNome()."',
					 '".$newsletter->getEmail()."'
				)";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=1";
  }

#Fun��o Alterar Newsletter
function alterar($newsletter){
  	$this->conectar();
	$sql = "UPDATE
					newsletter
			SET
			 		new_nome = '".$newsletter->getNome()."',
					new_email = '".$newsletter->getEmail()."'
			WHERE
					new_nu = ".$newsletter->getRegistro()."";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=2";
}

#Fun��o Excluir Newsletter
function excluir($newsletter){
  	$this->conectar();
	$sql = "DELETE
			FROM
					newsletter
			WHERE
			     	new_nu = ".$newsletter->getRegistro()."";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=3";
}

#Fun��o Listar Newsletter
function listarNewsletter(){
  	$this->conectar();
	$sql = "SELECT
					new_nu,
					new_nome
		   FROM
					newsletter
		   ORDER BY
		   			new_nome";
	$rsNewsletter = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsNewsletter;
}

#Fun��o Listar Newsletter 10 Registros
function listarNewsletter10(){
  	$this->conectar();
	$sql = "SELECT
					new_nu,
					new_nome
		    FROM
					newsletter
		    ORDER BY
		   			new_nome
		    LIMIT 	10";
	$rsNewsletter = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsNewsletter;
}

#Fun��o Visualizar Newsletter
function visualizar($newsletter){
  	$this->conectar();
	$sql = "SELECT
					new_nu,
					new_nome,
					new_email
			FROM
					newsletter
			WHERE
			     	new_nu = ".$newsletter->getRegistro()."";
	$rsNewsletter = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsNewsletter;
}

#Fun��o Pesquisar Newsletter
function pesquisar($newsletter){
  	$this->conectar();
	$sql = "Select
						new_nu,
						new_nome
			FROM
						newsletter
			Where
						new_nome LIKE '%".$newsletter->getNome()."%'";
	$rsNewsletter = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsNewsletter;
}

#Fun��o Verificar Email
function verificarEmail($newsletter){
  	$this->conectar();
	$sql = "SELECT
					new_email
			FROM
					newsletter			
			WHERE
			     	new_email LIKE '".$newsletter->getEmail()."'";
	$rsNewsletter = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsNewsletter;
}

} #Final da Classe
?>
