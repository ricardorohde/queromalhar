<?php
require_once('Conexao.class.php');

class Preco extends Conexao{
#Atributos da Classe Preço
	private $chave;
	private $registro;
	private $produto;
	private $valor;
	private $status;
	private $nusuario;

#Método Construtor Preço
	function __construct(){
	}

#Método Destrutor Preço
	function __desctruct(){
	}

#Métodos Acessores Preço - SET
	function setRegistro($registro){
		$registro = base64_decode($registro);
		$this->registro = $registro;
	}

	function setUsuario($nusuario){
		$this->nusuario = $nusuario;
	}
	
	function setProduto($produto){
		$this->produto = $produto;
	}
	
	function setValor($valor){
		$this->valor = $valor;
	}
	
	function setStatus($status){
		$this->status = $status;
	}

#Métodos Acessores Preço - GET
	function getChave(){
		return $this->chave;
	}

	function getRegistro(){
		return $this->registro;
	}

	function getUsuario(){
		return $this->nusuario;
	}

	function getProduto(){
		return $this->produto;
	}

	function getValor(){
		return $this->valor;
	}

	function getStatus(){
		return $this->status;
	}

#Função Cadastrar Preço
function cadastrar($preco){
  	$this->conectar();
	$sql = "INSERT INTO preco
				(
					usu_nu,
					pre_produto,
					pre_valor,
					pre_status
				  )
			VALUES
				(
					 ".$preco->getUsuario().",
					 '".$preco->getProduto()."',
					 '".$preco->getValor()."',
					 '".$preco->getStatus()."'
				)";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=1";
}

#Função Alterar Preço
function alterar($preco){
  	$this->conectar();
	$sql = "UPDATE
					preco
			SET
					pre_produto = '".$preco->getProduto()."',
					pre_valor = '".$preco->getValor()."',
					pre_status = '".$preco->getStatus()."'
			WHERE
					pre_nu = ".$preco->getRegistro()."";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=2";
}

#Função Excluir Preço
function excluir($preco){
  	$this->conectar();
	$sql = "DELETE
			FROM
					preco
			WHERE
			     	pre_nu = ".$preco->getRegistro()."";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=3";
}

#Função Listar Preço
function listarPreco(){
  	$this->conectar();
	$sql = "SELECT
					pre_nu,
					pre_produto,
					pre_status
		   FROM
					preco
		   ORDER BY
		   			pre_produto,
					pre_status";
	$rspreco = $this->executaSql($sql);
	$this->fechaConexao();
	return $rspreco;
}

#Função Listar Preço 10 Registros
function listarPreco10(){
  	$this->conectar();
	$sql = "SELECT
					pre_nu,
					pre_produto,
					pre_status
		   FROM
					preco
		   ORDER BY
		   			pre_produto,
					pre_status
		   LIMIT   10";
	$rspreco = $this->executaSql($sql);
	$this->fechaConexao();
	return $rspreco;
}

#Função Visualizar Preço
function visualizar($preco){
  	$this->conectar();
	$sql = "SELECT
			 		pre_nu,
					pre_produto,
					pre_valor,
					pre_status
			FROM
					preco
			WHERE
			     	pre_nu = ".$preco->getRegistro()."";
	$rspreco = $this->executaSql($sql);
	$this->fechaConexao();
	return $rspreco;
}

#Função Pesquisar Preço
function pesquisar($preco){
  	$this->conectar();
	$sql = "SELECT
						pre_nu,
						pre_produto
			FROM
						preco
			WHERE
						pre_produto LIKE '%".$preco->getProduto()."%'";
	$rsModalidade = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsModalidade;
}

} #Final da Classe
?>
