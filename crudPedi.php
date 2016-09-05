<?php	

	class CrudPedi {

		/* Atributo */
		private $tabela = "Pedido";

		/* Metodo que seleciona tudo sem filtro */ 
		public function selecionarTodosRegistros($conn) {
					
			$sql  = "SELECT * FROM $this->tabela";
			$stmt = $conn->prepare($sql);//Comando parecido com o query, mas tratando o problema de SQL injection
			$stmt->execute();//Executa o que vem de prepare
			
			return $stmt->fetchAll(PDO::FETCH_ASSOC);//fetch all retorna uma matriz
		}//Fim do metodo seleciona todos

		/* Metodo que seleciona o registro a partir do id do prod*/
		public function selecionarRegistrosPorIDProd($conn, $idPro) {
					
			$sql  = "SELECT * FROM $this->tabela WHERE id_prod = :id_pro";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":id_pro", $idPro, PDO::PARAM_INT);//Passando o id como parametro
			$stmt->execute();
			
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}//Fim do metodo seleciona por id do produto

		/* Metodo que seleciona o registro a partir do id do clie */ 
		public function selecionarRegistrosPorIDClie($conn, $idClie) {
					
			$sql  = "SELECT * FROM $this->tabela WHERE id_cli = :id_clie";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":id_clie", $idClie, PDO::PARAM_STR);
			$stmt->execute();
			
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}//Fim do metodo seleciona por id do clie

		/* Metodo que deleta o registro a partir do id */ 
		public function deletarRegistroPorID($conn, $idProd, $idClie) {
					
			$sql  = "DELETE FROM $this->tabela WHERE id_prod = :id_pro AND id_cli = :id_clie";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":id_pro", $idProd, PDO::PARAM_INT);
			$stmt->bindParam(":id_clie", $idClie, PDO::PARAM_INT);
			
			return $stmt->execute();				
		}//Fim do metodo deletar registro

		/* Metodo que insere o registro */ 
		public function inserirRegistros($conn, $idProd, $idClie) {
					
			$sql  = "INSERT INTO $this->tabela (id_prod, id_cli) VALUES (:id_prod, :id_clie)";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":id_prod", $idProd, PDO::PARAM_INT);
			$stmt->bindParam(":id_clie", $idClie, PDO::PARAM_INT);
			
			return $stmt->execute();		
		}//Fim do metodo inserir registros

		/* Metodo que atualiza o id do cliente */ 
		public function atualizarRegistroClie($conn, $idClie, $idProd) {
					
			$sql  = "UPDATE $this->tabela SET id_cli = :id_clie WHERE id_prod = :id_pro";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":id_clie", $idClie, PDO::PARAM_INT);
			$stmt->bindParam(":id_pro", $idProd, PDO::PARAM_INT);
			
			return $stmt->execute();
		}//Fim do metodo atualiza registro o id do cliente

		/* Metodo que atualiza o id do produto */ 
		public function atualizarRegistroProd($conn, $idProd, $idClie) {
					
			$sql  = "UPDATE $this->tabela SET id_prod = :id_pro WHERE id_cli = :id_clie";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":id_pro", $idProd, PDO::PARAM_INT);
			$stmt->bindParam(":id_clie", $idClie, PDO::PARAM_INT);
			
			return $stmt->execute();
		}//Fim do metodo atualiza registro o id do produto

	}//Fim da classe
?>
