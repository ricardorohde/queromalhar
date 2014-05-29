<?php
require_once('Conexao.class.php');

class Depoimento extends Conexao{
#Atributos da Classe Depoimento
	private $chave;
	private $registro;
	private $nusuario;
	private $nota;
	private $nome;
	private $depoimento;
	private $status;
	private $academia;
	private $aula;
	private $indicar;
#Método Construtor Depoimento
	function __construct(){
	}

#Método Destrutor Depoimento
	function __desctruct(){
	}

#Métodos Acessores Depoimento - SET
	function setRegistro($registro){
		$registro = base64_decode($registro);
		$this->registro = $registro;
	}

	function setUsuario($nusuario){
		$this->nusuario = $nusuario;
	}

	function setNota($nota){
		$this->nota = $nota;
	}

	function setNome($nome){
		$this->nome = $nome;
	}

	function setDepoimento($depoimento){
		$this->depoimento = $depoimento;
	}

	function setStatus($status){
		$this->status = $status;
	}
	
	function setAcademia($academia){
		$this->academia = $academia;
	}
	
	function setAula($aula){
		$this->aula = $aula;
	}
	
	function setIndicar($indicar){
		$this->indicar = $indicar;
	}

#Métodos Acessores Depoimento - GET
	function getChave(){
		return $this->chave;
	}
	
	function getRegistro(){
		return $this->registro;
	}

	function getUsuario(){
		return $this->nusuario;
	}

	
	function getNota(){
		return $this->nota;
	}

	function getNome(){
		return $this->nome;
	}

	function getDepoimento(){
		return $this->depoimento;
	}

	function getStatus(){
		return $this->status;
	}
	
	function getAcademia(){
		return $this->academia;
	}
	
	function getAula(){
		return $this->aula;
	}
	
	function getIndicar(){
		return $this->indicar;
	}

#Função Cadastrar Depoimento
	function cadastrar($depoimento){
  	$this->conectar();
	$sql = "INSERT INTO depoimento
				(
					usu_nu,
					dep_nota,
					dep_nome,
					dep_depoimento,
					dep_status,
					dep_academia,
					dep_aula,
					dep_indicar
					)
			VALUES
				(
					 ".$depoimento->getUsuario().",
					 '".$depoimento->getNota()."',
					 '".$depoimento->getNome()."',
					 '".$depoimento->getDepoimento()."',
					 '".$depoimento->getStatus()."',
					 '".$depoimento->getAcademia()."',
					 '".$depoimento->getAula()."',
					 '".$depoimento->getIndicar()."'
				)";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=1";
}

#Função Alterar Depoimento
function alterar($depoimento){
  	$this->conectar();
	$sql = "UPDATE
					depoimento
			SET
					dep_nota = '".$depoimento->getNota()."',
					dep_nome = '".$depoimento->getNome()."',
					dep_depoimento = '".$depoimento->getDepoimento()."',
					dep_status = '".$depoimento->getStatus()."',
					dep_academia =  '".$depoimento->getAcademia()."',
					dep_aula = '".$depoimento->getAula()."',
					dep_indicar = '".$depoimento->getIndicar()."'
			WHERE
					dep_nu = ".$depoimento->getRegistro()."";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=2";
}

#Função Excluir Depoimento
function excluir($depoimento){
  	$this->conectar();
	$sql = "DELETE
			FROM
					depoimento
			WHERE
			     	dep_nu = ".$depoimento->getRegistro()."";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=3";
}

#Função Listar Depoimento
function listarDepoimento(){
  	$this->conectar();
	$sql = "SELECT
					dep_nu,
					dep_nome,
					dep_status
		   FROM
					depoimento
		   ORDER BY
		   			dep_nome,
					dep_status";
	$rsDepoimento = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsDepoimento;
}
 
 #Função Listar Depoimento 10 Registros
 function listarDepoimento10(){
  	$this->conectar();
	$sql = "SELECT
					dep_nu,
					dep_nome,
					dep_status
		   FROM
					depoimento
		   ORDER BY
		   			dep_nome,
					dep_status
		   LIMIT    10";
	$rsDepoimento = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsDepoimento;
}

#Função Visualizar Depoimento
function visualizar($depoimento){
  	$this->conectar();
	$sql = "SELECT
			 		dep_nu,
					dep_nu,
					dep_nota,
					dep_nome,
					dep_depoimento,
					dep_status,
					dep_academia,
					dep_aula,
					dep_indicar
			FROM
					depoimento
			WHERE
			     	dep_nu = ".$depoimento->getRegistro()."";
	$rsDepoimento = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsDepoimento;
}

#Função Pesquisar Depoimento
function pesquisar($depoimento){
  	$this->conectar();
	$sql = "SELECT
						dep_nu,
						dep_nome
			FROM
						depoimento
			WHERE
						dep_nome LIKE '%".$depoimento->getNome()."%'";
	$rsDepoimento = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsDepoimento;
}

} #Final da Classe
?>
