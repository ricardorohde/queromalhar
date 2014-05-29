<?php 
require_once('Conexao.class.php');

class Sessao extends Conexao {
#Atributos da Classe Usu�rio
	private $registro;
	private $nome;
	private $cpf;
	private $nsenha;

#M�todo Construtor Usu�rio
	function __construct(){
	}

#M�todo Destrutor Usu�rio
	function __desctruct(){
	}
	
	
#M�todos Acessores Usu�rio - SET
	function setRegistro($registro){
		$registro = base64_decode($registro);
		$this->registro = $registro;
	}

	function setNome($nome){
		$this->nome = $nome;
	}

	function setCpf($cpf){
		$this->cpf = $cpf;
	}

	function setLogin($login){
		$this->login = $login;
	}
	
	function setSenha($nsenha){
		$nsenha = md5($nsenha);
		$this->nsenha = $nsenha;
	}
	
#M�todos Acessores Usu�rio - GET
	function getRegistro(){
		return $this->registro;
	}

	function getNome(){
		return $this->nome;
	}

	function getCpf(){
		return $this->cpf;
	}

	function getLogin(){
		return $this->login;
	}
	
	function getSenha(){
		return $this->nsenha;
	}

#Fun��o Efetuar Login Usu�rio
function login($sessao){
  	$this->conectar();
	$sql = "SELECT 
					 usu_nu,
					 usu_nome,
				 	 usu_cpf,
					 usu_permissao
			FROM 
				 	 usuario 
			WHERE 
		 		 	 usu_cpf = '".$sessao->getCpf()."'
				 		and
				 	 usu_senha = '".$sessao->getSenha()."'";
	$rsUsuario = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsUsuario;
}

#Fun��o Iniciar Sess�o
function iniciarSessao() {
   session_start();
	//Registra os dados do usu�rio na sess�o
}

#Fun��o Verificar Sess�o
function verificarSessao() {
//Verifica se h� dados ativos na sess�o
	if(!isset($_SESSION['usuario']) && empty($_SESSION['usuario']) || !isset($_SESSION['nome']) && empty($_SESSION['nome']) || empty($_SESSION['login']) && !isset($_SESSION['login']) ) {
		return "../index.php";
	} else {
		return 1;
	}
}

#Fun��o Efetuar Logoff Usu�rio
public function logout($sessao){
	session_unregister($sessao->getLogin());
	session_unregister($sessao->getNome());
	session_unregister($sessao->getRegistro());
	session_destroy();
	return "index.php";
}

} #Final da Classe
?>
