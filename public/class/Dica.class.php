<?php
require_once('Conexao.class.php');

class Dica extends Conexao{
#Atributos da Classe Dica
	private $chave;
	private $registro;
	private $nusuario;
	private $fonte;
	private $imagem;
	private $texto;
	private $status;	
	private $data;
	private $titulo;
	private $inicio;	
	private $total;	

#M�todo Construtor Dica
	function __construct(){
	}

#M�todo Destrutor Dica
	function __desctruct(){
	}

#M�todos Acessores Dica - SET
	function setRegistro($registro){
		$registro = base64_decode($registro);
		$this->registro = $registro;
	}

	function setUsuario($nusuario){
		$this->nusuario = $nusuario;
	}
	
	function setFonte($fonte){
		$this->fonte = $fonte;
	}
	
	function setImagem($imagem){
		$this->imagem = $imagem;
	}
	
	function setTexto($texto){
		$this->texto = $texto;
	}
	
	function setStatus($status){
		$this->status = $status;
	}

	function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	function setData($data){
		$data = preg_replace("'^([0-9]{2})/([0-9]{2})/([0-9]{4})$'",'$3-$2-$1',$data);
		$this->data = $data;
	}

	function setInicio($inicio){
		$this->inicio = $inicio;
	}

	function setTotal($total){
		$this->total = $total;
	}

#M�todos Acessores Dica - GET
	function getChave(){
		return $this->chave;
	}
	
	function getRegistro(){
		return $this->registro;
	}

	function getUsuario(){
		return $this->nusuario;
	}

	function getFonte(){
		return $this->fonte;
	}

	function getImagem(){
		return $this->imagem;
	}

	function getTexto(){
		return $this->texto;
	}

	function getStatus(){
		return $this->status;
	}

	function getTitulo(){
		return $this->titulo;
	}

	function getData(){
		return $this->data;
	}

	function getInicio(){
		return $this->inicio;
	}
	
	function getTotal(){
		return $this->total;
	}
	
#Fun��o Cadastrar Dica
	function cadastrar($dica){
  	$this->conectar();
	$sql = "INSERT INTO dica
				(
					usu_nu,
					dic_titulo,
					dic_fonte,
					dic_imagem,
					dic_texto,
					dic_status,
					dic_data
					)
			VALUES
				(
					 ".$dica->getUsuario().",
					 '".$dica->getTitulo()."',
					 '".$dica->getFonte()."',
					 '".$dica->getImagem()."',
					 '".$dica->getTexto()."',
					 '".$dica->getStatus()."',
					 '".$dica->getData()."'
				)";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=1";
  }

#Fun��o Alterar Dica
  function alterar($dica){
  	$this->conectar();
	$sql = "UPDATE
					dica
			SET
					dic_titulo = '".$dica->getTitulo()."',
					dic_fonte = '".$dica->getFonte()."',
					dic_imagem = '".$dica->getImagem()."',
					dic_texto = '".$dica->getTexto()."',
					dic_status = '".$dica->getStatus()."',
					dic_data = '".$dica->getData()."'
			WHERE
					dic_nu = ".$dica->getRegistro()."";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=2";
 }

#Fun��o Excluir Dica
 function excluir($dica){
  	$this->conectar();
	$sql = "DELETE
			FROM
					dica
			WHERE
			     	dic_nu = ".$dica->getRegistro()."";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=3";
  }

#Fun��o Listar Dica
 function listarDica(){
  	$this->conectar();
	$sql = "SELECT
					dic_nu,
					dic_fonte,
					dic_status
		   FROM
					dica
		   ORDER BY
		   			dic_fonte,
					dic_status";
	$rsDica = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsDica;
 }
 
#Fun��o Listar Dica 03 Registros
 function listarDica03(){
  	$this->conectar();
	$sql = "SELECT
					dic_nu,
					dic_texto,
					dic_titulo
		   FROM
					dica
		   WHERE
		   		   dic_status = 'Ativado'
		   ORDER BY
		   			dic_data
		   LIMIT    3";
	$rsDica = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsDica;
 }

#Fun��o Listar Dica 10 Registros
 function listarDica10(){
  	$this->conectar();
	$sql = "SELECT
					dic_nu,
					dic_fonte,
					dic_status
		   FROM
					dica
		   ORDER BY
		   			dic_fonte,
					dic_status
		   LIMIT    10";
	$rsDica = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsDica;
 }
 
 #Fun��o Listar Dica Usu�rio
 function listarDicaUsuario(){
  	$this->conectar();
	$sql = "SELECT
					d.dic_nu,
					d.dic_fonte,
					d.dic_status
		   FROM
					dica d
						INNER JOIN
					usuario u 
						ON d.usu_nu = u.usu_nu
		   WHERE   
		   			u.usu_nu = ".$_SESSION[usuario]."
		   ORDER BY
		   			d.dic_fonte,
					d.dic_status"; 
	$rsDica = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsDica;
}

#Fun��o Visualizar Dica
function visualizar($dica){
  	$this->conectar();
	$sql = "SELECT
				 	dic_nu,
					dic_fonte,
					dic_titulo,
					dic_imagem,
					dic_texto,
					dic_status,
					date_format(dic_data,'%d/%m/%Y') as data
			FROM
					dica
			WHERE
			     	dic_nu = ".$dica->getRegistro()."";
	$rsDica = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsDica;
}

#Fun��o Pesquisar Dica
function pesquisar($dica){
  	$this->conectar();
	$sql = "SELECT
						dic_nu,
						dic_fonte
			FROM
						dica
			WHERE
						dic_fonte LIKE '%".$dica->getFonte()."%'";
	$rsDica = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsDica;
}

#Fun��o Verificar Imagem
function verificarImagem($dica){
  	$this->conectar();
	$sql = "SELECT
					dic_imagem
			FROM
					dica			
			WHERE
			     	dic_nu = ".$dica->getRegistro()."";
	$rsDica = $this->executaSql($sql);
	$this->fechaConexao();
	$array = $this->mostraRegistros($rsDica);
	$imagem	= $array['dic_imagem'];
	return $imagem;
}

 #Fun��o Listar Registros - Pagina��o
 function listarRegistros(){
  	$this->conectar();
	$sql = "SELECT
					dic_nu,
					dic_texto
			FROM
					dica
		    ORDER BY
		   			dic_data DESC";
	$rsDica = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsDica;
 }

  #Fun��o Paginar Registros - Pagina��o 
 function paginarRegistros($dica){
  	$this->conectar();
	$sql = "SELECT
					dic_nu,
					dic_texto,
					dic_titulo
		   FROM
					dica
		   ORDER BY
		   			dic_data DESC
		   LIMIT   ".$dica->getTotal()."
		   OFFSET  ".$dica->getInicio()."";
	$rsDica = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsDica;
 }

#Fun��o Apagar Imagem
function apagarImagem($dica){
	chdir("../../");
	$diretorio = getcwd();
	$diretorioArquivo = $diretorio."\\".$dica->getImagem();
	$imagem = str_replace(array('\\','/'), DIRECTORY_SEPARATOR, $diretorioArquivo);
	unlink($imagem);
}

} #Final da Classe
?>
