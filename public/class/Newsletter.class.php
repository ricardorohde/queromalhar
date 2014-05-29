<?php
require_once('Conexao.class.php');

class Newsletter extends Conexao{
	#Atributos da Classe Newsletter
	private $nome;
	private $email;
	private $chave;
	private $registro;
	private $nemail;

	#Método Construtor Newsletter
	function __construct(){
	}

	#Método Destrutor Newsletter
	function __desctruct(){
	}

	#Métodos Acessores Newsletter - SET
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

	#Métodos Acessores Newsletter - GET
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
	
	#Função Cadastrar Newsletter
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

#Função Alterar Newsletter
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

#Função Excluir Newsletter
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

#Função Listar Newsletter
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

#Função Listar Newsletter 10 Registros
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

#Função Visualizar Newsletter
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

#Função Pesquisar Newsletter
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

#Função Verificar Email
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
