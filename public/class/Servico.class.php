<?php
require_once('Conexao.class.php');

class Servico extends Conexao{
#Atributos da Classe Servico
	private $chave;
	private $nusuario;
	private $registro;
	private $tipo;
	private $municipio;
	private $empresa;
	private $email;
	private $site;	
    private $telefone;
	private $celular;
	private $fax;
	private $observacao;
	private $status;
	private $endereco;
	private $cidade;
	private $imagem;
	private $data;
	private $servico;
	private $modalidade;
	private $tipo_cadastro;
	private $horario_aula;
	private $convenio;
	private $programacao;
	private $descricao;
	private $metodo;
	private $estado;
	private $cep;
	private $sexo;

#Mщtodo Construtor Servico
	function __construct(){
	}

#Mщtodo Destrutor Servico
	function __desctruct(){
	}

#Mщtodos Acessores Servico - SET
	function setChaveSM($chavesm){
		$this->chavesm = $chavesm;
	}
	
	function setUsuario($nusuario){
		$this->nusuario = $nusuario;
	}

	function setRegistro($registro){
		$registro = base64_decode($registro);
		$this->registro = $registro;
	}

	function setModalidade($modalidade){
		$this->modalidade = $modalidade;
	}

	function setTipo($tipo){
		$this->tipo = $tipo;
	}
	
	function setEstado($estado){
		$this->estado = $estado;
	}

	function setMunicipio($municipio){
		$this->municipio = $municipio;
	}

	function setEmpresa($empresa){
		$this->empresa = $empresa;
	}

	function setEmail($email){
		$this->email = $email;
	}

	function setSite($site){
		$this->site = $site;
	}

	function setTelefone($telefone){
		$this->telefone = $telefone;
	}

	function setCelular($celular){
		$this->celular = $celular;
	}

	function setFax($fax){
		$this->fax = $fax;
	}

	function setObservacao($observacao){
		$this->observacao = $observacao;
	}

	function setStatus($status){
		$this->status = $status;
	}

	function setEndereco($endereco){
		$this->endereco = $endereco;
	}

	function setCep($cep){
		$this->cep = $cep;
	}

	function setCidade($cidade){
		$this->cidade = $cidade;
	}

	function setImagem($imagem){
		$this->imagem = $imagem;
	}

	function setData($data){
		$this->data = $data;
	}
	
	function setSexo($sexo){
		$this->sexo = $sexo;
	}

	function setTipoCadastro($tipo_cadastro){
		$this->tipo_cadastro = $tipo_cadastro;
	}
	
	function setHorarioAula($horario_aula){
		$this->horario_aula = $horario_aula;
	}
	
	function setConvenio($convenio){
		$this->convenio = $convenio;
	}
	
	function setProgramacao($programacao){
		$this->programacao = $programacao;
	}
		
	function setDescricao($descricao){
		$this->descricao = $descricao;
	}
	
	function setMetodo($metodo){
		$this->metodo = $metodo;
	}
		
#Mщtodos Acessores Servico - GET

	function getChave(){
		return $this->chave;
	}
	
	function getChaveSM(){
		return $this->chavesm;
	}
	
	function getUsuario(){
		return $this->nusuario;
	}
	
	function getRegistro(){
		return $this->registro;
	}

	function getModalidade(){
		return $this->modalidade;
	}

	function getTipo(){
		return $this->tipo;
	}	
	
	function getEstado(){
		return $this->estado;
	}
	
	function getMunicipio(){
		return $this->municipio;
	}
	
	function getEmpresa(){
		return $this->empresa;
	}
	
	function getEmail(){
		return $this->email;
	}
	
	function getSite(){
		return $this->site;
	}
	
	function getTelefone(){
		return $this->telefone;
	}
	
	function getCelular(){
		return $this->celular;
	}
	
	function getFax(){
		return $this->fax;
	}
	
	function getObservacao(){
		return $this->observacao;
	}

	function getStatus(){
		return $this->status;
	}

	function getEndereco(){
		return $this->endereco;
	}
	
	function getCep(){
		return $this->cep;
	}

	function getImagem(){
		return $this->imagem;
	} 

	function getData(){
		return $this->data;
	}
	
	function getSexo(){
		return $this->sexo;
	}
	
	function getTipoCadastro(){
		return $this->tipo_cadastro;
	}
		
	function getHorarioAula(){
		return $this->horario_aula;
	}
	
	function getConvenio(){
		return $this->convenio;
	}

	function getProgramacao(){
		return $this->programacao;
	}
		
	function getDescricao(){
		return $this->descricao;
	}
	
	function getMetodo(){
		return $this->metodo;
	}

/// ACADEMIA

#Funчуo Pesquisar Serviчo Academia
function pesquisarAcademia($servico){
  	$this->conectar();
	$sql = "SELECT
						m.mcp_nu,
						m.mcp_descricao,
						e.est_sigla,
						s.srv_nu,
						s.srv_empresa,
						s.srv_email,
						s.srv_site,
						s.srv_telefone,
						s.srv_fax,
						s.srv_endereco,
						s.srv_cep,
						s.srv_imagem,
						s.srv_modalidade,
						s.srv_horario_aula,
						s.srv_tipo_cadastro
			FROM
						servico s
							INNER JOIN 
						municipio m
							ON s.mcp_nu = m.mcp_nu
							INNER JOIN 
						estado e
							ON m.est_nu = e.est_nu
			WHERE
						s.srv_tipo = 'Academia'
							AND
						s.srv_status = 'Ativado'	
							AND
						(
						lower(s.srv_empresa) LIKE lower('%".$servico->getEmpresa()."%')
							OR
						lower(m.mcp_descricao) LIKE lower('%".$servico->getMunicipio()."%')
							OR
						lower(s.srv_modalidade) LIKE lower('%".$servico->getModalidade()."%'))
			 ORDER BY
			 			s.srv_empresa";
	$rsServico = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsServico;
}

#Funчуo Listar Academia
 function listarAcademia(){
  	$this->conectar();
	$sql = "SELECT
					srv_nu,
					srv_empresa,
					srv_status
		   FROM
					servico
		   WHERE
					srv_tipo = 'Academia'
		   ORDER BY
		   			srv_empresa,
					srv_status";
	$rsServico = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsServico;
}

/// FISIOTERAPEUTA

#Funчуo Pesquisar Serviчo Fisioterapeuta
function pesquisarFisioterapeuta($servico){
  	$this->conectar();
	$sql = "SELECT
						m.mcp_nu,
						m.mcp_descricao,
						e.est_sigla,
						s.srv_nu,
						s.srv_empresa,
						s.srv_email,
						s.srv_site,
						s.srv_telefone,
						s.srv_celular,
						s.srv_endereco,
						s.srv_cep,
						s.srv_sexo,
						s.srv_imagem,
						s.srv_convenio,
						s.srv_tipo_cadastro
			FROM
						servico s
							INNER JOIN 
						municipio m
							ON s.mcp_nu = m.mcp_nu
							INNER JOIN 
						estado e
							ON m.est_nu = e.est_nu
			WHERE
						s.srv_tipo = 'Fisioterapeuta'
							AND
						s.srv_status = 'Ativado'	
							AND
						(lower(s.srv_empresa) LIKE lower('%".$servico->getEmpresa()."%')
							OR
						lower(m.mcp_descricao) LIKE lower('%".$servico->getMunicipio()."%')
							OR
						lower(s.srv_sexo) LIKE lower('%".$servico->getSexo()."%'))
			ORDER BY
			 			s.srv_empresa";
	$rsServico = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsServico;
}

#Funчуo Listar Fisioterapeuta
 function listarFisioterapeuta(){
  	$this->conectar();
	$sql = "SELECT
					srv_nu,
					srv_empresa,
					srv_status
		   FROM
					servico
		   WHERE
					srv_tipo = 'Fisioterapeuta'
		   ORDER BY
		   			srv_empresa,
					srv_status";
	$rsServico = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsServico;
}

///LOJA

#Funчуo Pesquisar Serviчo Loja
function pesquisarLoja($servico){
  	$this->conectar();
	$sql = "SELECT
						m.mcp_nu,
						m.mcp_descricao,
						e.est_sigla,
						s.srv_nu,
						s.srv_empresa,
						s.srv_email,
						s.srv_site,
						s.srv_telefone,
						s.srv_fax,
						s.srv_endereco,
						s.srv_cep,
						s.srv_imagem,
						s.srv_descricao,
						s.srv_tipo_cadastro
			FROM
						servico s
							INNER JOIN 
						municipio m
							ON s.mcp_nu = m.mcp_nu
							INNER JOIN 
						estado e
							ON m.est_nu = e.est_nu
			WHERE
						s.srv_tipo = 'Loja Esportiva'
							AND
						s.srv_status = 'Ativado'	
							AND
						(lower(s.srv_empresa) LIKE lower('%".$servico->getEmpresa()."%')
							OR
						lower(m.mcp_descricao) LIKE lower('%".$servico->getMunicipio()."%'))
			ORDER BY
			 			s.srv_empresa";	 
	$rsServico = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsServico;
}

#Funчуo Listar Loja
 function listarLoja(){
  	$this->conectar();
	$sql = "SELECT
					srv_nu,
					srv_empresa,
					srv_status
		   FROM
					servico
		   WHERE
					srv_tipo = 'Loja Esportiva'
		   ORDER BY
		   			srv_empresa,
					srv_status";
	$rsServico = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsServico;
}

/// NUTRICIONISTA

#Funчуo Pesquisar Serviчo Nutricionista
function pesquisarNutricionista($servico){
  	$this->conectar();
	$sql = "SELECT
						m.mcp_nu,
						m.mcp_descricao,
						e.est_sigla,
						s.srv_nu,
						s.srv_empresa,
						s.srv_email,
						s.srv_site,
						s.srv_telefone,
						s.srv_celular,
						s.srv_endereco,
						s.srv_cep,
						s.srv_sexo,
						s.srv_imagem,
						s.srv_convenio,
						s.srv_tipo_cadastro
			FROM
						servico s
							INNER JOIN 
						municipio m
							ON s.mcp_nu = m.mcp_nu
							INNER JOIN 
						estado e
							ON m.est_nu = e.est_nu
			WHERE
						s.srv_tipo = 'Nutricionista'
							AND
						s.srv_status = 'Ativado'	
							AND
						(lower(s.srv_empresa) LIKE lower('%".$servico->getEmpresa()."%')
							OR
						lower(m.mcp_descricao) LIKE lower('%".$servico->getMunicipio()."%')
							OR
						lower(s.srv_sexo) LIKE lower('%".$servico->getSexo()."%'))
			ORDER BY
			 			s.srv_empresa";
	$rsServico = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsServico;
}

#Funчуo Listar Nutricionista
 function listarNutricionista(){
  	$this->conectar();
	$sql = "SELECT
					srv_nu,
					srv_empresa,
					srv_status
		   FROM
					servico
		   WHERE
					srv_tipo = 'Nutricionista'
		   ORDER BY
		   			srv_empresa,
					srv_status";
	$rsServico = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsServico;
}

/// PERSONAL

#Funчуo Pesquisar Serviчo Personal
function pesquisarPersonal($servico){
  	$this->conectar();
	$sql = "SELECT
						m.mcp_nu,
						m.mcp_descricao,
						e.est_sigla,
						s.srv_nu,
						s.srv_empresa,
						s.srv_email,
						s.srv_site,
						s.srv_telefone,
						s.srv_celular,
						s.srv_endereco,
						s.srv_cep,
						s.srv_sexo,
						s.srv_imagem,
						s.srv_metodo,
						s.srv_tipo_cadastro
			FROM
						servico s
							INNER JOIN 
						municipio m
							ON s.mcp_nu = m.mcp_nu
							INNER JOIN 
						estado e
							ON m.est_nu = e.est_nu
			WHERE
						s.srv_tipo = 'Personal Trainer'
							AND
						s.srv_status = 'Ativado'	
							AND
						(lower(s.srv_empresa) LIKE lower('%".$servico->getEmpresa()."%')
							OR
						lower(m.mcp_descricao) LIKE lower('%".$servico->getMunicipio()."%')
							OR
						lower(s.srv_sexo) LIKE lower('%".$servico->getSexo()."%'))
			ORDER BY
			 			s.srv_empresa";
	$rsServico = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsServico;
}

#Funчуo Listar Personal
 function listarPersonal(){
  	$this->conectar();
	$sql = "SELECT
					srv_nu,
					srv_empresa,
					srv_status
		   FROM
					servico
		   WHERE
					srv_tipo = 'Personal Trainer'
		   ORDER BY
		   			srv_empresa,
					srv_status";
	$rsServico = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsServico;
}

/// SPA

#Funчуo Pesquisar Serviчo Spa
function pesquisarSpa($servico){
  	$this->conectar();
	$sql = "SELECT
						m.mcp_nu,
						m.mcp_descricao,
						e.est_sigla,
						s.srv_nu,
						s.srv_empresa,
						s.srv_email,
						s.srv_site,
						s.srv_telefone,
						s.srv_fax,
						s.srv_endereco,
						s.srv_cep,
						s.srv_imagem,
						s.srv_programacao,
						s.srv_tipo_cadastro
			FROM
						servico s
							INNER JOIN 
						municipio m
							ON s.mcp_nu = m.mcp_nu
							INNER JOIN 
						estado e
							ON m.est_nu = e.est_nu
			WHERE
						s.srv_tipo = 'Spa'
							AND
						s.srv_status = 'Ativado'	
							AND
						(lower(s.srv_empresa) LIKE lower('%".$servico->getEmpresa()."%')
							OR
						lower(m.mcp_descricao) LIKE lower('%".$servico->getMunicipio()."%'))
			ORDER BY
			 			s.srv_empresa";
	$rsServico = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsServico;
}

#Funчуo Listar Academia
 function listarSpa(){
  	$this->conectar();
	$sql = "SELECT
					srv_nu,
					srv_empresa,
					srv_status
		   FROM
					servico
		   WHERE
					srv_tipo = 'Spa'
		   ORDER BY
		   			srv_empresa,
					srv_status";
	$rsServico = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsServico;
}

/// GERAL

#Funчуo Cadastrar Servico
function cadastrar($servico){
  	$this->conectar();
	$sql = "INSERT INTO servico
				(
					usu_nu,
					srv_tipo,
					mcp_nu,
					srv_empresa,
					srv_email,
					srv_site,
					srv_telefone,
					srv_fax,
					srv_celular,
					srv_observacao,
					srv_status,
					srv_endereco,
					srv_cep,
					srv_imagem,
					srv_modalidade,
					srv_sexo,
					srv_data_cadastro,
					srv_tipo_cadastro,
					srv_convenio,
					srv_programacao,
					srv_horario_aula,
					srv_descricao,
					srv_metodo
					)
			VALUES
				(
					 ".$servico->getUsuario().",
					 '".$servico->getTipo()."',
					 ".$servico->getMunicipio().",
					 '".$servico->getEmpresa()."',
					 '".$servico->getEmail()."',
					 '".$servico->getSite()."',
					 '".$servico->getTelefone()."',
					 '".$servico->getFax()."',
					 '".$servico->getCelular()."',
					 '".$servico->getObservacao()."',
					 '".$servico->getStatus()."',
					 '".$servico->getEndereco()."',
					 '".$servico->getCep()."',
					 '".$servico->getImagem()."',
					 '".$servico->getModalidade()."',
					 '".$servico->getSexo()."',
					 '".$servico->getData()."',
					 '".$servico->getTipoCadastro()."',
					 '".$servico->getConvenio()."',
					 '".$servico->getProgramacao()."',
					 '".$servico->getHorarioAula()."',
					 '".$servico->getDescricao()."',
					 '".$servico->getMetodo()."'
				)";
	echo $sql;
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=1";
}

#Funчуo Alterar Servico
  function alterar($servico){
  	$this->conectar();
	$sql = "UPDATE
					servico
			SET
					usu_nu = ".$servico->getUsuario().",
					mcp_nu = ".$servico->getMunicipio().",
					srv_empresa = '".$servico->getEmpresa()."',
					srv_email = '".$servico->getEmail()."',
					srv_site = '".$servico->getSite()."',
					srv_telefone = '".$servico->getTelefone()."',
					srv_fax = '".$servico->getFax()."',
					srv_celular = '".$servico->getCelular()."',
					srv_observacao = '".$servico->getObservacao()."',
					srv_status = '".$servico->getStatus()."',
					srv_endereco = '".$servico->getEndereco()."',
					srv_cep = '".$servico->getCep()."',
					srv_modalidade = '".$servico->getModalidade()."',
					srv_sexo = '".$servico->getSexo()."',
					srv_tipo_cadastro = '".$servico->getTipoCadastro()."',
					srv_imagem = '".$servico->getImagem()."',
					srv_convenio = '".$servico->getConvenio()."',
					srv_programacao = '".$servico->getProgramacao()."',
					srv_horario_aula = '".$servico->getHorarioAula()."',
					srv_descricao = '".$servico->getDescricao()."',
					srv_metodo = '".$servico->getMetodo()."'
			WHERE
					srv_nu = ".$servico->getRegistro()."";	
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=2";
 }

#Funчуo Excluir Servico
 function excluir($servico){
  	$this->conectar();
	$sql = "DELETE
			FROM
					servico
			WHERE
			     	srv_nu = ".$servico->getRegistro()."";
	$this->executaSql($sql);
	$this->fechaConexao();
	return "acao.php?msg=3";
}

#Funчуo Listar Estado
function listarEstado(){
	$this->conectar();
	$sql = "SELECT
					est_nu,
					est_sigla
			FROM
					estado
			ORDER BY
					est_sigla";
	$rsServico = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsServico;
}

#Funчуo Listar Municipio ao escolher Estado
function listarMunicipioEstado($servico){
$this->conectar();
$sql = "SELECT
				mcp_nu,
				mcp_descricao				
	   FROM
				municipio
	   WHERE
				est_nu = ".$servico->getEstado()."
	   ORDER BY
				mcp_descricao ASC";
	$rsServico = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsServico;
}

#Funчуo Visualizar Servico
function visualizar($servico){
  	$this->conectar();
	$sql = "SELECT
			 		u.usu_nu,
					u.usu_nome,
					s.srv_tipo,
					m.mcp_nu,
					m.mcp_descricao,
					e.est_sigla,
					e.est_nu,
					s.srv_nu,
					s.srv_empresa,
					s.srv_email,
					s.srv_site,
					s.srv_telefone,
					s.srv_fax,
					s.srv_celular,
					s.srv_observacao,
					s.srv_status,
					s.srv_endereco,
					s.srv_cep,
					s.srv_imagem,
					s.srv_data_cadastro,
					s.srv_modalidade,
					s.srv_sexo,
					s.srv_tipo_cadastro,
					s.srv_convenio,
					s.srv_programacao,
					s.srv_horario_aula,
					s.srv_descricao,
					s.srv_metodo
			FROM
					servico s
						LEFT JOIN 
					usuario u 
						ON s.usu_nu = u.usu_nu
						LEFT JOIN
					municipio m
						ON s.mcp_nu = m.mcp_nu
						INNER JOIN 
					estado e
						ON m.est_nu = e.est_nu
			WHERE
			     	srv_nu = ".$servico->getRegistro()."";
	$rsServico = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsServico;
}

#Funчуo Listar Servico Usuсrio
function listarServicoUsuario(){
  	$this->conectar();
	$sql = "SELECT
					u.usu_nome,
					s.srv_nu,
					s.srv_empresa
		   FROM
					usuario u
						INNER JOIN
					servico s 
						ON u.usu_nu = s.usu_nu
		   WHERE
					u.usu_nu = ".$_SESSION[usuario]."
		   ORDER BY
		   			u.usu_nome";
	$rsServico = $this->executaSql($sql);
	$this->fechaConexao();
	return $rsServico;
}

#Funчуo Verificar Imagem
function verificarImagem($servico){
  	$this->conectar();
	$sql = "SELECT
					srv_imagem
			FROM
					servico
			WHERE
			     	srv_nu = ".$servico->getRegistro()."";
	$rsServico = $this->executaSql($sql);
	$this->fechaConexao();
	$array = $this->mostraRegistros($rsServico);
	$imagem	= $array['srv_imagem'];
	return $imagem;
}


#Funчуo Verificar Programaчуo
function verificarProgramacao($servico){
  	$this->conectar();
	$sql = "SELECT
					srv_programacao
			FROM
					servico
			WHERE
			     	srv_nu = ".$servico->getRegistro()."";
	$rsServico = $this->executaSql($sql);
	$this->fechaConexao();
	$array = $this->mostraRegistros($rsServico);
	$programacao = $array['srv_programacao'];
	return $programacao;
}

#Funчуo Verificar Horсrio Aulas
function verificarHorarioAula($servico){
  	$this->conectar();
	$sql = "SELECT
					srv_horario_aula
			FROM
					servico
			WHERE
			     	srv_nu = ".$servico->getRegistro()."";
	$rsServico = $this->executaSql($sql);
	$this->fechaConexao();
	$array = $this->mostraRegistros($rsServico);
	$horario_aula	= $array['srv_horario_aula'];
	return $horario_aula;
}

#Funчуo Apagar Imagem
function apagarImagem($servico){
	chdir("../../");
	$diretorio = getcwd();
	$diretorioArquivo = $diretorio."\\".$servico->getImagem();
	$imagem = str_replace(array('\\','/'), DIRECTORY_SEPARATOR, $diretorioArquivo);
	unlink($imagem);
}

} #Final da Classe
?>