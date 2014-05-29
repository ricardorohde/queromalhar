<?php
	class Conexao {
		// Função para conectar o banco de dados
		public function conectar(){
		   $this->servidor = "localhost";
		   $this->banco = "queromalhar";
		   $this->usuario = "root";
		   $this->senha = "";
		   $conectar = @mysql_connect("$this->servidor","$this->usuario","$this->senha") or die("Sem Conexão");
		   $banco = @mysql_select_db("$this->banco",$conectar) or die("Selecione o Banco");
		}

		// Função para executar SELECT, DELETE, INSERT e UPDATE
		public function executaSql($sql){
			return @mysql_query($sql);
		}

		// Função para exibir quantidade de registros
		public function totalRegistros($result){
			return @mysql_num_rows($result);
		}

		// Função para mostrar registros
		public function mostraRegistros($result){
			return @mysql_fetch_array($result);
		}

		// Função para fechar conexão
		public function fechaConexao(){
			return @mysql_close();
		}
	}
?>

