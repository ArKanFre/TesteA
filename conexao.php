<?php
	/* CLASSE QUE PROVE O SERVICO DE CONEXAO COM O BANCO */
	class Conexao { 

		/* Metodo que estabelece a conexao com o banco de dados */
		public function conectar($dsn, $login, $senha) {
			
			try {
			    $conn = new PDO($dsn, $login, $senha);

			    // setando o modelo de erro do PDO para excecoes
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    echo "Sucesso na Conexão"; 

			    return $conn;
			}
			catch(PDOException $e) {
			    echo "Falha na Conexão: " . $e->getMessage();
			}

		}//Fim do metodo de conexao
		
	}//Fim da classe
?>

