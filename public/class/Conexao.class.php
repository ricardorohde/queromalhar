<?php
	class Conexao {
		// Fun��o para conectar o banco de dados
		public function conectar(){
		   $this->servidor = "localhost";
		   $this->banco = "queromalhar";
		   $this->usuario = "root";
		   $this->senha = "";
		   $conectar = @mysql_connect("$this->servidor","$this->usuario","$this->senha") or die("Sem Conex�o");
		   $banco = @mysql_select_db("$this->banco",$conectar) or die("Selecione o Banco");
		}

		// Fun��o para executar SELECT, DELETE, INSERT e UPDATE
		public function executaSql($sql){
			return @mysql_query($sql);
		}

		// Fun��o para exibir quantidade de registros
		public function totalRegistros($result){
			return @mysql_num_rows($result);
		}

		// Fun��o para mostrar registros
		public function mostraRegistros($result){
			return @mysql_fetch_array($result);
		}

		// Fun��o para fechar conex�o
		public function fechaConexao(){
			return @mysql_close();
		}
	}
?>

