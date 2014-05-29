<?php
require_once('Conexao.class.php');

class Usuario extends Conexao {
#Atributos da Classe Usuário
	private $chave;
	private $registro;
	private $nome;
	private $email;
	private $cpf;
	private $nsenha;
	private $permissao;
	private $telefone;
	private $pagamento;
	private $rg;
	private $site;

#Método Construtor Usuário
	function __construct(){
	}

#Método Destrutor Usuário
	function __desctruct(){
	}

#Métodos Acessores Usuário - SET
	function setRegistro($registro){
		$registro = base64_decode($registro);
		$this->registro = $registro;
	}

	function setNome($nome){
		$this->nome = $nome;
	}

	function setEmail($email){
		$this->email = $email;
	}

	function setCpf($cpf){
		$this->cpf = $cpf;
	}

	function setSenha($nsenha){
		$nsenha = md5($nsenha);
		$this->nsenha = $nsenha;
	}

	function setPermissao($permissao){
		$this->permissao = $permissao;
	}

	function setTelefone($telefone){
		$this->telefone = $telefone;
	}

	function setPagamento($pagamento){
		$this->pagamento = $pagamento;
	}
	
		function setRg($rg){
		$this->rg = $rg;
	}
	
		function setSite($site){
		$this->site = $site;
	}
	
#Métodos Acessores Usuário - GET
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
		return $this->email;
	}

	function getCpf(){
		return $this->cpf;
	}

	function getSenha(){
		return $this->nsenha;
	}

	function getPermissao(){
		return $this->permissao;
	}

	function getTelefone(){
		return $this->telefone;
	}

	function getPagamento(){
		return $this->pagamento;
	}

	function getRg(){
		return $this->rg;
	}

	function getSite(){
		return $this->site;
	}

#Função Cadastrar Usuário
function cadastrar($usuario){
  	$this->conectar();
	$sql = "INSERT INTO usuario
				(
					usu_nome,
					usu_email,
					usu_cpf,
					usu_senha,
					usu_permissao,
					usu_telefone,
					usu_pagamento,
					usu_rg,
					usu_site
				   )
			VALUES
				(
					'".$usuario->getNome()."',
					'".$usuario->getEmail()."',
					'".$usuario->getCpf()."',
					'".$usuario->getSenha()."',
					'".$usuario->getPermissao()."',
					'".$usuario->getTelefone()."',
					'".$usuario->getPagamento()."',
					'".$usuario->getRg()."',
					'".$usuario->getSite()."'
				)";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=1";
}

#Função Alterar Usuário
  function alterar($usuario){
  	$this->conectar();
	$sql = "UPDATE
					usuario
			SET
			 		usu_nome = '".$usuario->getNome()."',
					usu_email = '".$usuario->getEmail()."',
					usu_cpf = '".$usuario->getCpf()."',
					usu_permissao = '".$usuario->getPermissao()."',
					usu_telefone = '".$usuario->getTelefone()."',
					usu_pagamento = '".$usuario->getPagamento()."',
					usu_rg = '".$usuario->getRg()."',
					usu_site = '".$usuario->getSite()."'
			WHERE
					usu_nu = ".$usuario->getRegistro()."";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=2";
}

#Função Excluir Usuário
function excluir($usuario){
  	$this->conectar();
	$sql = "DELETE
			FROM
					usuario
			WHERE
			     	usu_nu = ".$usuario->getRegistro()."";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=3";
}

#Função Listar Usuário
function listarUsuario(){
  	$this->conectar();
	$sql = "SELECT
					usu_nu,
					usu_nome
		    FROM
					usuario
		    ORDER BY
		   			usu_nome";
	$rsUsuario = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsUsuario;
}

#Função Listar Usuário Dados
function listarUsuarioDados(){
  	$this->conectar();
	$sql = "SELECT
					usu_nu,
					usu_nome
		    FROM
					usuario
			WHERE
					usu_nu = ".$_SESSION[usuario]."";
	$rsUsuario = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsUsuario;
}

#Função Listar Usuário 10 Registros
function listarUsuario10(){
  	$this->conectar();
	$sql = "SELECT
					usu_nu,
					usu_nome
		    FROM
					usuario
		    ORDER BY
		   			usu_nome
		    LIMIT 	10";
	$rsUsuario = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsUsuario;
}

#Função Visualizar Usuário
function visualizar($usuario){
  	$this->conectar();
	$sql = "SELECT
			 		usu_nu,
					usu_nome,
					usu_email,
					usu_cpf,
					usu_permissao,
					usu_telefone,
					usu_pagamento,
					usu_rg,
					usu_site
			FROM
					usuario
			WHERE
			     	usu_nu = ".$usuario->getRegistro()."";
	$rsUsuario = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsUsuario;
}

#Função Pesquisar Usuário
function pesquisar($usuario){
  	$this->conectar();
	$sql = "SELECT
						usu_nu,
						usu_nome
			FROM
						usuario
			WHERE
						usu_nome LIKE '%".$usuario->getNome()."%'";
	$rsModalidade = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsModalidade;
}

#Função Alterar Senha Usuário
function alterarSenha($usuario){
	$this->conectar();
	$sql = "UPDATE
					usuario
			SET
					usu_senha = '".$usuario->getSenha()."'
			WHERE
			     	usu_nu = ".$usuario->getRegistro()."";
	echo $sql;
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=1";
}

} #Final da Classe
?>
