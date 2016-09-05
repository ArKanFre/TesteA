<?php	

	class CrudClie {

		/* Atributo */
		private $tabela = "Cliente";

		/* Metodo que seleciona tudo sem filtro */ 
		public function selecionarTodosRegistros($conn) {
					
			$sql  = "SELECT * FROM $this->tabela";
			$stmt = $conn->prepare($sql);//Comando parecido com o query, mas tratando o problema de SQL injection
			$stmt->execute();//Executa o que vem de prepare
			
			return $stmt->fetchAll(PDO::FETCH_ASSOC);//fetch all retorna uma matriz
		}//Fim do metodo seleciona todos

		/* Metodo que seleciona o registro a partir do id */
		public function selecionarRegistrosPorID($conn, $id) {
					
			$sql  = "SELECT * FROM $this->tabela WHERE id_cli = :id";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);//Passando o id como parametro
			$stmt->execute();
			
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}//Fim do metodo seleciona por id

		/* Metodo que seleciona o registro a partir do nome */ 
		public function selecionarRegistrosPorNome($conn, $nome) {
					
			$sql  = "SELECT * FROM $this->tabela WHERE nome_cli = :nome";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->execute();
			
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}//Fim do metodo seleciona por nome

		/* Metodo que deleta o registro a partir do id */ 
		public function deletarRegistroPorID($conn, $id) {
					
			$sql  = "DELETE FROM $this->tabela WHERE id_cli = :id";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			
			return $stmt->execute();				
		}//Fim do metodo deletar registro

		/* Metodo que insere o registro */ 
		public function inserirRegistros($conn, $nome, $email, $telefone) {
					
			$sql  = "INSERT INTO $this->tabela (nome_cli, email_cli, telefone_cli) VALUES (:nome, :email, :telefone)";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":telefone", $telefone, PDO::PARAM_STR);
			
			return $stmt->execute();		
		}//Fim do metodo inserir registros

		/* Metodo que atualiza todo registro */ 
		public function atualizarRegistro($conn, $id, $nome, $email, $telefone) {
					
			$sql  = "UPDATE $this->tabela SET nome_cli = :nome, email_cli = :email, telefone_cli = :telefone WHERE id_cli = :id";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":telefone", $telefone, PDO::PARAM_STR);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			
			return $stmt->execute();
		}//Fim do metodo atualiza registro

	}//Fim da classe
?>
