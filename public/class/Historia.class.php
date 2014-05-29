<?php
require_once('Conexao.class.php');

class Historia extends Conexao{
#Atributos da Classe Historia
	private $chave;
	private $registro;
	private $titulo;
	private $texto;
	private $data;
	private $nusuario;
	private $nome;
	private $email;
	private $imagem;
	private $fonte;
	private $inicio;	
	private $total;	
	private $status;

#Método Construtor Historia
	function __construct(){
	}

#Método Destrutor Historia
	function __desctruct(){
	}

#Métodos Acessores Historia - SET
	function setRegistro($registro){
		$registro = base64_decode($registro);
		$this->registro = $registro;
	}
	
	function setUsuario($nusuario){
		$this->nusuario = $nusuario;
	}

	function setTitulo($titulo){
		$this->titulo = $titulo;
	}
	
	function setNome($nome){
		$this->nome = $nome;
	}
	
	function setEmail($email){
		$this->email = $email;
	}
	
	function setTexto($texto){
		$this->texto = $texto;
	}

	function setData($data){
		$data = preg_replace("'^([0-9]{2})/([0-9]{2})/([0-9]{4})$'",'$3-$2-$1',$data);
		$this->data = $data;
	}
	
	function setImagem($imagem){
		$this->imagem = $imagem;
	}
	
	function setFonte($fonte){
		$this->fonte = $fonte;
	}
	
	function setInicio($inicio){
		$this->inicio = $inicio;
	}

	function setTotal($total){
		$this->total = $total;
	}
	
	function setStatus($status){
		$this->status = $status;
	}

#Métodos Acessores Historia - GET
	function getChave(){
		return $this->chave;
	}
	
	function getRegistro(){
		return $this->registro;
	}

	function getUsuario(){
		return $this->nusuario;
	}
	
	function getTitulo(){
		return $this->titulo;
	}
	
	function getNome(){
		return $this->nome;
	}
	
	function getEmail(){
		return $this->email;
	}

	function getTexto(){
		return $this->texto;
	}

	function getData(){
		return $this->data;
	}
	
	function getImagem(){
		return $this->imagem;
	}

	function getFonte(){
		return $this->fonte;
	}
	
	function getInicio(){
		return $this->inicio;
	}
	
	function getTotal(){
		return $this->total;
	}
	
	function getStatus(){
		return $this->status;
	}

#Função Cadastrar Historia
	function cadastrar($historia){
  	$this->conectar();
	$sql = "INSERT INTO historia
				(
					usu_nu,
					hit_titulo,
					hit_texto,
					hit_data,
					hit_nome,
					hit_email,
					hit_fonte,
					hit_status,
					hit_imagem
				 )
			VALUES
				(
					 ".$historia->getUsuario().",
					 '".$historia->getTitulo()."',
					 '".$historia->getTexto()."',
					 '".$historia->getData()."',
					 '".$historia->getNome()."',
					 '".$historia->getEmail()."',
					 '".$historia->getFonte()."',
					 '".$historia->getStatus()."',
					 '".$historia->getImagem()."'
				)";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=1";
  }

#Função Alterar Historia
  function alterar($historia){
  	$this->conectar();
	$sql = "UPDATE
					historia
			SET
					hit_titulo = '".$historia->getTitulo()."',
					hit_texto = '".$historia->getTexto()."',
					hit_data = '".$historia->getData()."',
					hit_nome = '".$historia->getNome()."',
					hit_email = '".$historia->getEmail()."',
					hit_fonte = '".$historia->getFonte()."',
					hit_status = '".$historia->getStatus()."',
					hit_imagem = '".$historia->getImagem()."'
			WHERE
					hit_nu = ".$historia->getRegistro()."";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=2";
 }

#Função Excluir Historia
 function excluir($historia){
  	$this->conectar();
	$sql = "DELETE
			FROM
					historia
			WHERE
			     	hit_nu = ".$historia->getRegistro()."";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=3";
  }

#Função Listar Historia
 function listarHistoria(){
  	$this->conectar();
	$sql = "SELECT
					hit_nu,
					hit_titulo,
					hit_status
		   FROM
					historia
		   ORDER BY
		   			hit_titulo,
					hit_status";
	$rsHistoria = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsHistoria;
 }

 #Função Listar Historia
 function listarUltimaHistoria(){
  	$this->conectar();
	$sql = "SELECT
					hit_nu,
					hit_texto,
					hit_titulo
		   FROM
					historia
		   ORDER BY
		   			hit_nu
	       LIMIT 1";
	$rsHistoria = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsHistoria;
 }
 
#Função Listar Historia 10 Registros
 function listarHistoria10(){
  	$this->conectar();
	$sql = "SELECT
					hit_nu,
					hit_titulo,
					hit_status
		   FROM
					historia
		   ORDER BY
		   			hit_titulo,
					hit_status
		   LIMIT 10";
	$rsHistoria = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsHistoria;
 }

#Função Visualizar Historia
function visualizar($historia){
  	$this->conectar();
	$sql = "SELECT
					hit_nu,
					hit_titulo,
					hit_texto,
					hit_nome,
					hit_email,
					hit_fonte,
					hit_imagem,
					hit_status,
					date_format(hit_data,'%d/%m/%y') as data
			FROM
					historia
			WHERE
			     	hit_nu = ".$historia->getRegistro()."";
	$rsHistoria = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsHistoria;
 }
 
#Função Pesquisar Historia
function pesquisar($historia){
  	$this->conectar();
	$sql = "SELECT
					 hit_nu,
					 hit_titulo
			FROM
					 historia
			WHERE
					 hit_titulo LIKE '%".$historia->getTitulo()."%'";
	$rsHistoria = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsHistoria;
}

 #Função Listar Registros - Paginação
 function listarRegistros(){
  	$this->conectar();
	$sql = "SELECT
					hit_nu,
					hit_titulo,
					date_format(hit_data,'%d/%m/%y')as data
		   FROM
					historia
		   WHERE 
		   			hit_status = 'Ativado'
		   ORDER BY
		   			hit_data DESC";
	$rsHistoria = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsHistoria;
 }

  #Função Paginar Registros - Paginação 
 function paginarRegistros($historia){
  	$this->conectar();
	$sql = "SELECT
					hit_nu,
					hit_titulo,
					date_format(hit_data,'%d/%m/%y')as data
		   FROM
					historia
		   WHERE 
		   			hit_status = 'Ativado'
		   ORDER BY
		   			hit_data DESC
		   LIMIT   ".$historia->getTotal()."
		   OFFSET  ".$historia->getInicio()."";
	$rsHistoria = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsHistoria;
 }

#Função Verificar Imagem
function verificarImagem($historia){
  	$this->conectar();
	$sql = "SELECT
					hit_imagem
			FROM
					historia
			WHERE
			     	hit_nu = ".$historia->getRegistro()."";
	$rsHistoria = $this->executaSql($sql);
	$this->fechaConexao();
	$array = $this->mostraRegistros($rsHistoria);
	$imagem	= $array['hit_imagem'];
	return $imagem;
}

#Função Apagar Imagem
function apagarImagem($historia){
	chdir("../../");
	$diretorio = getcwd();
	$diretorioArquivo = $diretorio."\\".$historia->getImagem();
	$imagem = str_replace(array('\\','/'), DIRECTORY_SEPARATOR, $diretorioArquivo);
	unlink($imagem);
}

} #Final da Classe
?>
