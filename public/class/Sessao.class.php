<?php 
require_once('Conexao.class.php');

class Sessao extends Conexao {
#Atributos da Classe Usuário
	private $registro;
	private $nome;
	private $cpf;
	private $nsenha;

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
	
#Métodos Acessores Usuário - GET
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

#Função Efetuar Login Usuário
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

#Função Iniciar Sessão
function iniciarSessao() {
   session_start();
	//Registra os dados do usuário na sessão
}

#Função Verificar Sessão
function verificarSessao() {
//Verifica se há dados ativos na sessão
	if(!isset($_SESSION['usuario']) && empty($_SESSION['usuario']) || !isset($_SESSION['nome']) && empty($_SESSION['nome']) || empty($_SESSION['login']) && !isset($_SESSION['login']) ) {
		return "../index.php";
	} else {
		return 1;
	}
}

#Função Efetuar Logoff Usuário
public function logout($sessao){
	session_unregister($sessao->getLogin());
	session_unregister($sessao->getNome());
	session_unregister($sessao->getRegistro());
	session_destroy();
	return "index.php";
}

} #Final da Classe
?>
