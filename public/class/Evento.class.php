<?php
require_once('Conexao.class.php');

class Evento extends Conexao {
	#Atributos da Classe Evento
	private $nome;
	private $chave;
	private $registro;
	private $data;
	private $local;
	private $informacao;
	private $imagem;
	private $nusuario;
	private $inicio;	
	private $total;	
	private $periodo;	
	
	#Método Construtor Evento
	function __construct(){
	}

	#Método Destrutor Evento
	function __desctruct(){
	}

	#Métodos Acessores Evento - SET
	function setRegistro($registro){
		$registro = base64_decode($registro);
		$this->registro = $registro;
	}

	function setUsuario($nusuario){
		$this->nusuario = $nusuario;
	}

	function setNome($nome){
		$this->nome = $nome;
	}
	
	function setData($data){
		$data = preg_replace("'^([0-9]{2})/([0-9]{2})/([0-9]{4})$'",'$3-$2-$1',$data);
		$this->data = $data;
	}

	function setLocal($local){
		$this->local = $local;
	}

	function setInformacao($informacao){
		$this->informacao = $informacao;
	}
	
	function setImagem($imagem){
		$this->imagem = $imagem;
	}
	
	function setInicio($inicio){
		$this->inicio = $inicio;
	}

	function setTotal($total){
		$this->total = $total;
	}
	
	
	function setPeriodo($periodo){
		$this->periodo = $periodo;
	}
	
	#Métodos Acessores Evento - GET
	function getChave(){
		return $this->chave;
	}
	
	function getRegistro(){
		return $this->registro;
	}

	function getUsuario(){
		return $this->nusuario;
	}
	
	function getNome(){
		return $this->nome;
	}
	
	function getData(){
		return $this->data;
	}
	
	function getLocal(){
		return $this->local;
	}
	
	function getInformacao(){
		return $this->informacao;
	}

	function getImagem(){
		return $this->imagem;
	}

	function getInicio(){
		return $this->inicio;
	}
	
	function getTotal(){
		return $this->total;
	}
	
	function getPeriodo(){
		return $this->periodo;
	}
	
	#Função Cadastrar Evento
	function cadastrar($evento){
  	$this->conectar();
	$sql = "INSERT INTO evento
				(
					usu_nu,
					eve_nome,
					eve_data,
					eve_local,
					eve_informacao,
					eve_periodo,
					eve_imagem
					)
			VALUES
				(
					 ".$evento->getUsuario().",
					 '".$evento->getNome()."',
					 '".$evento->getData()."',
					 '".$evento->getLocal()."',
					 '".$evento->getInformacao()."',
					 '".$evento->getPeriodo()."',
					 '".$evento->getImagem()."'
				)";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=1";
  }

#Função Alterar Evento
function alterar($evento){
  	$this->conectar();
	$sql = "UPDATE
					evento
			SET
					eve_nome = '".$evento->getNome()."',
					eve_data = '".$evento->getData()."',
					eve_local = '".$evento->getLocal()."',
					eve_informacao = '".$evento->getInformacao()."',
					eve_periodo = '".$evento->getPeriodo()."',
					eve_imagem = '".$evento->getImagem()."'
			WHERE
					eve_nu = ".$evento->getRegistro()."";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=2";
}

#Função Excluir Evento
function excluir($evento){
  	$this->conectar();
	$sql = "DELETE
			FROM
					evento
			WHERE
			     	eve_nu = ".$evento->getRegistro()."";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=3";
}

#Função Listar Evento
function listarEvento(){
  	$this->conectar();
	$sql = "SELECT
					eve_nu,
					eve_nome
		   FROM
					evento
		   ORDER BY
		   			eve_nome";
	$rsEvento = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsEvento;
}

#Função Listar Evento 10 Registros
function listarEvento10(){
  	$this->conectar();
	$sql = "SELECT
					eve_nu,
					eve_nome
		    FROM
					evento
		    ORDER BY
		   			eve_nome
		    LIMIT 	10";
	$rsEvento = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsEvento;
}

#Função Listar Evento Registro - Primeiro Registros
function listarEvento01(){
  	$this->conectar();
	$sql = "SELECT
					eve_nu,
					eve_nome,
					eve_local,
					eve_informacao,
					date_format(eve_data,'%d/%m/%y')as data,
					eve_imagem
		    FROM
					evento
		    ORDER BY
		   			eve_nu DESC
		    LIMIT 	1";
	$rsEvento = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsEvento;
}

#Função Listar Evento Registro - Primeiro Registros
function listarEvento02(){
  	$this->conectar();
	$sql = "SELECT
					eve_nu,
					eve_nome,
					eve_local,
					eve_informacao,
					date_format(eve_data,'%d/%m/%y')as data,
					eve_imagem
		    FROM
					evento
		    ORDER BY
		   			eve_nu DESC
		    LIMIT  2
			OFFSET 1";
	$rsEvento = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsEvento;
}

#Função Visualizar Evento
function visualizar($evento){
  	$this->conectar();
	$sql = "SELECT
					eve_nu,
					eve_nome,
					date_format(eve_data,'%d/%m/%y')as data,
					eve_local,
					eve_informacao,
					eve_periodo,
					eve_imagem
			FROM
					evento
			WHERE
			     	eve_nu = ".$evento->getRegistro()."";
	$rsEvento = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsEvento;
}

#Função Pesquisar Evento
function pesquisar($evento){
  	$this->conectar();
	$sql = "SELECT
						eve_nu,
						eve_nome
			FROM
						evento
			WHERE
						eve_nome LIKE '%".$evento->getNome()."%'";
	$rsEvento = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsEvento;
}

#Função Verificar Imagem
function verificarImagem($evento){
  	$this->conectar();
	$sql = "SELECT
					eve_imagem
			FROM
					evento			
			WHERE
			     	eve_nu = ".$evento->getRegistro()."";
	$rsEvento = $this->executaSql($sql);
	$this->fechaConexao();
	$array = $this->mostraRegistros($rsEvento);
	$imagem	= $array['eve_imagem'];
	return $imagem;
}

 #Função Listar Registros - Paginação
 function listarRegistros(){
  	$this->conectar();
	$sql = "SELECT
					eve_nu,
					eve_nome,
					date_format(eve_data,'%d/%m/%y')as data
		   FROM
					evento
		   ORDER BY
		   			eve_data DESC";
	$rsEvento = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsEvento;
 }

  #Função Paginar Registros - Paginação 
 function paginarRegistros($evento){
  	$this->conectar();
	$sql = "SELECT
					eve_nu,
					eve_nome,
					date_format(eve_data,'%d/%m/%y')as data					
		   FROM
					evento
		   ORDER BY
		   			eve_data DESC
		   LIMIT   ".$evento->getTotal()."
		   OFFSET  ".$evento->getInicio()."";
	$rsEvento = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsEvento;
 }

#Função Apagar Imagem
function apagarImagem($evento){
	chdir("../../");
	$diretorio = getcwd();
	$diretorioArquivo = $diretorio."\\".$evento->getImagem();
	$imagem = str_replace(array('\\','/'), DIRECTORY_SEPARATOR, $diretorioArquivo);
	unlink($imagem);
}

} #Final da Classe
?>
