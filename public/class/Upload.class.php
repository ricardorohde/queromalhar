<?php
class Upload {
#Atributos da Classe Upload
	private $tamanho;
	private $tmp;
	private $nome;
	private $pathImagem;
	private $path;
	private $pathToSave;
	private $arquivo;

#M�todo Construtor Upload
	function __construct(){
	}

#M�todo Destrutor Upload
	function __desctruct(){
	}

#M�todos Acessores Upload - SET
	function setImagem($imagem){
		$this->imagem = $imagem;
	}

#M�todos Acessores Upload - GET
	function getImagem(){
		return $this->imagem;
	}

#Fun��o Efetuar Upload
function efetuarUpload($imagem,$site) {
	$this->tamanho = $imagem["size"];
	$this->tmp = $imagem["tmp_name"];
	$this->nome = $imagem["name"];
	
	if($site == 1){
	chdir("public/Image/");
	} else {
	chdir("../../public/Image/");
	}
	$this->path = getcwd();
	$this->pathToSave = $this->path."/";
	$this->arquivo = $this->pathToSave.$this->nome;
	// Verifica Tamanho do Arquivo M�ximo 1MB
	if($this->tamanho > 1000000) {
		$this->erro = "acao.php?msg=4";
	} else {
		if($this->nome != ""){
			$this->pathImagem = "public/Image/".$this->nome;
			// Copia o arquivo para o sistema
	        if(!move_uploaded_file($this->tmp,$this->arquivo)) {
	            $this->erro = "acao.php?msg=5";
	        } 
			return $this->pathImagem;
		} else {
			$this->pathImagem = "Sem Arquivo";
	        return $this->pathImagem;
	   } 
	}
 }
	//Retorna erro
	function Erro(){
		return $this->erro;
	}
} #Final da Classe
?>