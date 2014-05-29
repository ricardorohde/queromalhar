<?php
require_once('Conexao.class.php');

class Enquete extends Conexao{
#Atributos da Classe Enquete
	private $chave;
	private $registro;
	private $pergunta;
	private $resp1;
	private $resp2;
	private $resp3;
	private $resp4;
	private $tipo;
	private $data;
	private $status;
    private $quant1;
	private $quant2;
	private $quant3;
	private $quant4;
	private $total;
	private $nusuario;
	private $ip;
	private $resposta;
	private $qresposta;
	
#Método Construtor Enquete
	function __construct(){
	}

#Método Destrutor Enquete
	function __desctruct(){
	}

#Métodos Acessores Enquete - SET
	function setRegistro($registro){
		$registro = base64_decode($registro);
		$this->registro = $registro;
	}
	
	function setIp($ip){
		$this->ip = $ip;
	}
	
	function setUsuario($nusuario){
		$this->nusuario = $nusuario;
	}

	function setPergunta($pergunta){
		$this->pergunta = $pergunta;
	}
	
	function setResp1($resp1){
		$this->resp1 = $resp1;
	}
	
	function setResp2($resp2){
		$this->resp2 = $resp2;
	}
	
	function setResp3($resp3){
		$this->resp3 = $resp3;
	}
	
	function setResp4($resp4){
		$this->resp4 = $resp4;
	}
	
	function setTipo($tipo){
		$this->tipo = $tipo;
	}
	
	function setData($data){
		$this->data = $data;
	}
	
	function setStatus($status){
		$this->status = $status;
	}
		
	function setQuant1($quant1){
		$this->quant1 = $quant1;
	}
	
	function setQuant2($quant2){
		$this->quant2 = $quant2;
	}
	
	function setQuant3($quant3){
		$this->quant3 = $quant3;
	}
	
	function setQuant4($quant4){
		$this->quant4 = $quant4;
	}

	function setTotal($total){
		$this->total = $total;
	}
	
	function setResposta($resposta){
		$this->resposta = $resposta;
	}
	
	function setQResposta($qresposta){
		$this->qresposta = $qresposta;
	}

#Métodos Acessores Enquete - GET
	function getChave(){
		return $this->chave;
	}
	
	function getRegistro(){
		return $this->registro;
	}

	function getIp(){
		return $this->ip;
	}

	function getUsuario(){
		return $this->nusuario;
	}

	function getPergunta(){
		return $this->pergunta;
	}

	function getResp1(){
		return $this->resp1;
	}

	function getResp2(){
		return $this->resp2;
	}

	function getResp3(){
		return $this->resp3;
	}

	function getResp4(){
		return $this->resp4;
	}

	function getTipo(){
		return $this->tipo;
	}

	function getData(){
		return $this->data;
	}

	function getStatus(){
		return $this->status;
	}

	function getQuant1(){
		return $this->quant1;
	}

	function getQuant2(){
		return $this->quant2;
	}
	
	function getQuant3(){
		return $this->quant3;
	}

	function getQuant4(){
		return $this->quant4;
	}

	function getTotal(){
		return $this->total;
	}
	
	function getResposta(){
		return $this->resposta;
	}
	
	function getQResposta(){
		return $this->qresposta;
	}

#Função Cadastrar Enquete
	function cadastrar($enquete){
  	$this->conectar();
	$sql = "INSERT INTO enquete
				(
					usu_nu,
					enq_pergunta,
					enq_tipo,
					enq_resp1,
					enq_resp2,
					enq_resp3,
					enq_resp4,
					enq_data
					)
			VALUES
				(
					 ".$enquete->getUsuario().",
					 '".$enquete->getPergunta()."',
					 '".$enquete->getTipo()."',
					 '".$enquete->getResp1()."',
					 '".$enquete->getResp2()."',
					 '".$enquete->getResp3()."',
					 '".$enquete->getResp4()."',
					 '".$enquete->getData()."'
				)";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=1";
  }

#Função Cadastrar Votação
function cadastrarVotacao($enquete){
  	$this->conectar();
	$sql = "INSERT INTO votacao_enquete
				(
						enq_nu,
						vot_ip
					)
			VALUES
				(
					 ".$enquete->getRegistro().",
					 '".$enquete->getIp()."'
				)";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=1";
}

#Função Alterar Enquete
  function alterar($enquete){
  	$this->conectar();
	$sql = "UPDATE
					enquete
			SET
					enq_pergunta = '".$enquete->getPergunta()."',
					enq_tipo = '".$enquete->getTipo()."',
					enq_resp1 = '".$enquete->getResp1()."',
					enq_resp2 = '".$enquete->getResp2()."',
					enq_resp3 = '".$enquete->getResp3()."',
					enq_resp4 = '".$enquete->getResp4()."'
			WHERE
					enq_nu = ".$enquete->getRegistro()."";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=2";
}

#Função Atualizar Enquete
function atualizarEnquete($enquete){
  	$this->conectar();
	$sql = "UPDATE
					enquete
			SET
					".$enquete->getResposta()." = ".$enquete->getQResposta().",
					enq_total = ".$enquete->getTotal()."
			WHERE
					enq_nu = ".$enquete->getRegistro()."";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=2";
}

#Função Excluir Enquete
 function excluir($enquete){
  	$this->conectar();
	$sql = "DELETE
			FROM
					enquete
			WHERE
			     	enq_nu = ".$enquete->getRegistro()."";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=3";
  }

#Função Listar Enquete
 function listarEnquete(){
  	$this->conectar();
	$sql = "SELECT
					enq_nu,
					enq_pergunta
		   FROM
					enquete
		   ORDER BY
		   			enq_pergunta";
	$rsEnquete = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsEnquete;
 }

#Função Listar Enquete 10 Registros
 function listarEnquete10(){
  	$this->conectar();
	$sql = "SELECT
					enq_nu,
					enq_pergunta
		   FROM
					enquete
		   ORDER BY
		   			enq_pergunta
		   LIMIT 	10";
	$rsEnquete = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsEnquete;
 }
 
#Função Listar Última Enquete
 function listarUltimaEnquete(){
  	$this->conectar();
	$sql = "SELECT
					enq_nu,
					enq_pergunta,
					enq_tipo,
					enq_resp1,
					enq_resp2,
					enq_resp3,
					enq_resp4
		   FROM
					enquete
		   ORDER BY
		   			enq_nu
		   LIMIT 	1";
	$rsEnquete = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsEnquete;
}

#Função Visualizar Enquete
function visualizar($enquete){
  	$this->conectar();
	$sql = "SELECT
					enq_nu,
					enq_pergunta,
					enq_tipo,
					enq_resp1,
					enq_resp2,
					enq_resp3,
					enq_resp4,
					date_format(enq_data,'%d/%m/%y')as data
			FROM
					enquete
			WHERE
			     	enq_nu = ".$enquete->getRegistro()."";
	$rsEnquete = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsEnquete;
 }

#Função Visualizar Resultados Enquete
function resultadosEnquete($enquete){
  	$this->conectar();
	$sql = "SELECT
					enq_pergunta,
					enq_tipo,
					enq_resp1,
					enq_resp2,
					enq_resp3,
					enq_resp4,
					enq_quant1,
					enq_quant2,
					enq_quant3,
					enq_quant4,
					enq_total
			FROM
					enquete
			WHERE
			     	enq_nu = ".$enquete->getRegistro()."";
	$rsEnquete = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsEnquete;
 }
 
#Função Pesquisar Enquete
function pesquisar($enquete){
  	$this->conectar();
	$sql = "SELECT
						enq_nu,
						enq_pergunta
			FROM
						enquete
			WHERE
						enq_pergunta LIKE '%".$enquete->getPergunta()."%'";
	$rsEnquete = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsEnquete;
}

#Função Buscar Enquete
function buscarEnquete($enquete){
  	$this->conectar();
	$sql = "SELECT
						".$enquete->getResposta()." as enq,
						enq_total
			FROM
						enquete
			WHERE
						enq_nu = ".$enquete->getRegistro()."";
	$rsEnquete = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsEnquete;
}

#Função Buscar IP
function buscarIP($enquete){
  	$this->conectar();
	$sql = "SELECT
						vot_ip,
						enq_nu
			FROM
						votacao_enquete
			WHERE
						vot_ip = '".$enquete->getIP()."'
								AND
						enq_nu = ".$enquete->getRegistro()."";
	$rsEnquete = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsEnquete;
}
} #Final da Classe
?>
