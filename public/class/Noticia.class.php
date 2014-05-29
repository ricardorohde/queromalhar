<?php
require_once('Conexao.class.php');

class Noticia extends Conexao{
#Atributos da Classe Not�cia
	private $chave;
	private $registro;
	private $titulo;
	private $texto;
	private $autor;
	private $data;
	private $imagem;	
	private $nusuario;	
	private $inicio;	
	private $total;	

#M�todo Construtor Not�cia
	function __construct(){
	}

#M�todo Destrutor Not�cia
	function __desctruct(){
	}

#M�todos Acessores Not�cia - SET
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

	function setTexto($texto){
		$this->texto = $texto;
	}

	function setAutor($autor){
		$this->autor = $autor;
	}

	function setData($data){
		$data = preg_replace("'^([0-9]{2})/([0-9]{2})/([0-9]{4})$'",'$3-$2-$1',$data);
		$this->data = $data;
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
	
#M�todos Acessores Not�cia - GET
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

	function getTexto(){
		return $this->texto;
	}

	function getAutor(){
		return $this->autor;
	}

	function getData(){
		return $this->data;
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

#Fun��o Cadastrar Not�cia
	function cadastrar($noticia){
  	$this->conectar();
	$sql = "INSERT INTO noticia
				(
					usu_nu,
					not_titulo,
					not_texto,
					not_autor,
					not_data,
					not_imagem
					)
			VALUES
				(
					 ".$noticia->getUsuario().",
					 '".$noticia->getTitulo()."',
					 '".$noticia->getTexto()."',
					 '".$noticia->getAutor()."',
					 '".$noticia->getData()."',
					 '".$noticia->getImagem()."'
				)";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=1";
  }

#Fun��o Alterar Not�cia
  function alterar($noticia){
  	$this->conectar();
	$sql = "UPDATE
					noticia
			SET
					not_titulo = '".$noticia->getTitulo()."',
					not_texto = '".$noticia->getTexto()."',
					not_autor = '".$noticia->getAutor()."',
					not_imagem = '".$noticia->getImagem()."',
					not_data = '".$noticia->getData()."'
			WHERE
					not_nu = ".$noticia->getRegistro()."";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=2";
 }

#Fun��o Excluir Not�cia
 function excluir($noticia){
  	$this->conectar();
	$sql = "DELETE
			FROM
					noticia
			WHERE
			     	not_nu = ".$noticia->getRegistro()."";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=3";
  }

#Fun��o Listar Not�cia
 function listarNoticia(){
  	$this->conectar();
	$sql = "SELECT
					not_nu,
					not_titulo
		   FROM
					noticia
		   ORDER BY
		   			not_titulo";
	$rsNoticia = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsNoticia;
 }

 #Fun��o Listar Not�cia 10 Registros
 function listarNoticia10(){
  	$this->conectar();
	$sql = "SELECT
					not_nu,
					not_titulo
		   FROM
					noticia
		   ORDER BY
		   			not_titulo
		   LIMIT 10";
	$rsNoticia = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsNoticia;
 }

 #Fun��o Listar Not�cia 4 
 function listarNoticia04(){
  	$this->conectar();
	$sql = "SELECT
					not_nu,
					not_titulo,
					date_format(not_data,'%d/%m/%y') as data
		   FROM
					noticia
		   ORDER BY
		   			not_data DESC
		   LIMIT 4";
	$rsNoticia = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsNoticia;
 }

#Fun��o Visualizar Not�cia
function visualizar($noticia){
  	$this->conectar();
	$sql = "SELECT
					not_nu,
					not_titulo,
					not_texto,
					not_autor,
					date_format(not_data,'%d/%m/%Y') as data,
					not_imagem
			FROM
					noticia			
			WHERE
			     	not_nu = ".$noticia->getRegistro()."";
	$rsNoticia = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsNoticia;
}

#Fun��o Pesquisar Not�cia
function pesquisar($noticia){
  	$this->conectar();
	$sql = "SELECT
						not_nu,
						not_titulo
			FROM
						noticia
			WHERE
						not_titulo LIKE '%".$noticia->getTitulo()."%'";
	$rsNoticia = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsNoticia;
}

#Fun��o Verificar Imagem
function verificarImagem($noticia){
  	$this->conectar();
	$sql = "SELECT
					not_imagem
			FROM
					noticia			
			WHERE
			     	not_nu = ".$noticia->getRegistro()."";
	$rsNoticia = $this->executaSql($sql);
	$this->fechaConexao();
	$array = $this->mostraRegistros($rsNoticia);
	$imagem	= $array['not_imagem'];
	return $imagem;
}

 #Fun��o Listar Registros - Pagina��o
 function listarRegistros(){
  	$this->conectar();
	$sql = "SELECT
					not_nu,
					not_titulo,
					date_format(not_data,'%d/%m/%y')as data
		   FROM
					noticia
		   ORDER BY
		   			not_data DESC";
	$rsNoticia = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsNoticia;
 }

  #Fun��o Paginar Registros - Pagina��o 
 function paginarRegistros($noticia){
  	$this->conectar();
	$sql = "SELECT
					not_nu,
					not_titulo,
					date_format(not_data,'%d/%m/%y')as data
		   FROM
					noticia
		   ORDER BY
		   			not_data DESC
		   LIMIT   ".$noticia->getTotal()."
		   OFFSET  ".$noticia->getInicio()."";
	$rsNoticia = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsNoticia;
 }
 
} #Final da Classe
?>
