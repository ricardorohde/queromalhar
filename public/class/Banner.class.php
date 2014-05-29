<?php
require_once('Conexao.class.php');

class Banner extends Conexao{
#Atributos da Classe Banner
	private $chave;
	private $registro;
	private $nome;
	private $url;
	private $tipo;
	private $formato;
	private $imagem;
	private $nusuario;

#Método Construtor Banner
	function __construct(){
	}

#Método Destrutor Banner
	function __desctruct(){
	}

#Métodos Acessores Banner - SET
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
	
	function setUrl($url){
		$this->url = $url;
	}

	function setTipo($tipo){
		$this->tipo = $tipo;
	}

	function setFormato($formato){
		$this->formato = $formato;
	}

	function setImagem($imagem){
		$this->imagem = $imagem;
	}

#Métodos Acessores Banner - GET
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

	function getUrl(){
		return $this->url;
	}

	function getTipo(){
		return $this->tipo;
	}

	function getFormato(){
		return $this->formato;
	}
	
	function getImagem(){
		return $this->imagem;
	}

#Função Cadastrar Banner
	function cadastrar($banner){
  	$this->conectar();
	$sql = "INSERT INTO banner
				(
					usu_nu,
					bnr_nome,
					bnr_url,
					bnr_tipo,
					bnr_formato,
					bnr_imagem
					)
				VALUES
				(
					".$banner->getUsuario().",
					'".$banner->getNome()."',
					'".$banner->getUrl()."',
					'".$banner->getTipo()."',
					'".$banner->getFormato()."',
					'".$banner->getImagem()."'
				)";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=1";
}

#Função Alterar Banner
  function alterar($banner){
  	$this->conectar();
	$sql = "UPDATE
					banner
			SET
					bnr_nome = '".$banner->getNome()."',
					bnr_url = '".$banner->getUrl()."',
					bnr_tipo = '".$banner->getTipo()."',
					bnr_formato = '".$banner->getFormato()."',
					bnr_imagem = '".$banner->getImagem()."'
			WHERE
					bnr_nu = ".$banner->getRegistro()."";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=2";
 }

#Função Excluir Banner
 function excluir($banner){
  	$this->conectar();
	$sql = "DELETE
			FROM
					banner
			WHERE
			     	bnr_nu = ".$banner->getRegistro()."";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=3";
}

#Função Listar Banner
 function listarBanner(){
  	$this->conectar();
	$sql = "SELECT
					bnr_nu,
					bnr_nome,
					bnr_tipo
		   FROM
					banner
		   ORDER BY
		   			bnr_nome";
	$rsBanner = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsBanner;
}

#Função Listar Banner 10 Registros
function listarBanner10(){
  	$this->conectar();
	$sql = "SELECT
					bnr_nu,
					bnr_nome,
					bnr_tipo
		   FROM
					banner
		   ORDER BY
		   			bnr_nome
		   LIMIT    10";
	$rsBanner = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsBanner;
}

#Função Listar Banner HALF 4 Registros
function listarBannerHalf(){
  	$this->conectar();
	$sql = "SELECT 
					bnr_nu, 
					bnr_nome,
					bnr_imagem,
					bnr_formato,
					bnr_url,
					bnr_tipo
			FROM 
			 		banner 
			WHERE
					bnr_tipo = 'Half'
			ORDER BY	
					random()
			LIMIT  	3";
	$rsBanner = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsBanner;
 }
 
 #Função Listar Banner HALF 2 Registros
function listarBannerHalf2(){
  	$this->conectar();
	$sql = "SELECT 
					bnr_nu, 
					bnr_nome,
					bnr_imagem,
					bnr_formato,
					bnr_url,
					bnr_tipo
			FROM 
			 		banner 
			WHERE
					bnr_tipo = 'Half'
			ORDER BY	
					random()
			LIMIT  	2";
	$rsBanner = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsBanner;
 }

 #Função Listar Banner Full
function listarBannerFull(){
  	$this->conectar();
	$sql = "SELECT
					bnr_nu,
					bnr_nome,
					bnr_tipo
		   FROM
					banner
			WHERE
					bnr_tipo = 'Full'
			ORDER BY	
					random()
			LIMIT  	1";
	$rsBanner = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsBanner;
}
 
 
#Função Visualizar Banner
function visualizar($banner){
  	$this->conectar();
	$sql = "SELECT
			 		bnr_nu,
					bnr_nome,
					bnr_url,
					bnr_formato,
					bnr_tipo,
					bnr_imagem
			FROM
					banner
			WHERE
			     	bnr_nu = ".$banner->getRegistro()."";
	$rsBanner = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsBanner;
}

#Função Verificar Imagem
function verificarImagem($banner){
  	$this->conectar();
	$sql = "SELECT
					bnr_imagem
			FROM
					banner			
			WHERE
			     	bnr_nu = ".$banner->getRegistro()."";
	$rsBanner = $this->executaSql($sql);
	$this->fechaConexao();
	$array = $this->mostraRegistros($rsBanner);
	$imagem	= $array['bnr_imagem'];
	return $imagem;
}

#Função Pesquisar Banner
function pesquisar($banner){
  	$this->conectar();
	$sql = "SELECT
						bnr_nu,
						bnr_nome
			FROM
						banner
			WHERE
						bnr_nome LIKE '%".$banner->getNome()."%'";
	$rsBanner = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsBanner;
}

#Função Apagar Imagem
function apagarImagem($banner){
	chdir("../../");
	$diretorio = getcwd();
	$diretorioArquivo = $diretorio."\\".$banner->getImagem();
	$imagem = str_replace(array('\\','/'), DIRECTORY_SEPARATOR, $diretorioArquivo);
	unlink($imagem);
}
} #Final da Classe
?>
