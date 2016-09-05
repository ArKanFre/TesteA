<?php
	/* Inclusao dos arquivos php e html */
	require_once"conexao.php";
	require_once"crudProd.php";
        require_once"crudClie.php";
        require_once"crudPedi.php";
	require_once"index.html";
	require_once"clieS.html";
	require_once"clieI.html";
        require_once"clieA.html";
        require_once"clieD.html";
	require_once"prodS.html";
	require_once"prodI.html";
	require_once"prodA.html";
	require_once"prodD.html";
        require_once"pediS.html";
        require_once"pediI.html";
	require_once"pediA.html";
	require_once"pediD.html";

	$cod = $_POST['cod'];
	
	$servidor = "localhost";
	$login    = "root";
	$senha    = "";		
	$banco    = "PSA";
	$tipo     = "mysql";

	$dsn      = "$tipo:host=$servidor;dbname=$banco"; 

	$cn = new Conexao();
	$conn = $cn->conectar($dsn, $login, $senha);
	
	if($cod == 1) {
		
		$crudClie = new CrudClie();
		$result = $crudClie->selecionarTodosRegistros($conn);

		foreach($result as $value) 
			echo "<br>"."Id: ".$value['cli_cod']." "."Nome: ".$value['cli_nome']." "."Endereço: ".$value['cli_endereco']." ";

        }
	else if ($cod == 2) {

		$id = $_POST['id'];

		$crudClie = new CrudClie();
		$result = $crudClie->selecionarRegistrosPorID($conn, $id);

		foreach($esult as $value)
			echo "<br>".$value;

        }
	else if ($cod == 3) {

		$nome = $_POST['nome'];

		$crudClie = new CrudClie();
		$result = $crudClie->selecionarRegistrosPorNome($conn, $nome);

		foreach($esult as $value)
			echo "<br>".$value;

        }
	else if ($cod == 4) {

		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];

		$crudClie = new CrudClie();
		$result = $crudClie->inserirRegistros($conn, $nome, $email, $telefone);

		echo "Registro inserido com sucesso";

        }
	else if ($cod == 5) {

		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];

		$crudClie = new CrudClie();
		$result = $crudClie->atualizarRegistro($conn, $id, $nome, $email, $telefone);

		echo "Registro atulizado com sucesso";

        }
	else if ($cod == 6) {

		$id = $_POST['id'];

		$crudClie = new CrudClie();
		$result = $crudClie->deletarRegistroPorID($conn, $id);

		echo "Registro deletado com sucesso";

        }
	else if ($cod == 7) {

		$crudProd = new CrudProd();
		$result = $crudProd->selecionarTodosRegistros($conn);

		foreach($result as $value) 
			echo "<br>"."Id: ".$value['cli_cod']." "."Nome: ".$value['cli_nome']." "."Endereço: ".$value['cli_endereco']." ";

        }
	else if ($cod == 8) {

		$id = $_POST['id'];

		$crudProd = new CrudProd();
		$result = $crudProd->selecionarPorID($conn, $id);

		foreach($esult as $value)
			echo "<br>".$value;

        }
	else if ($cod == 9) {

		$nome = $_POST['nome'];

		$crudProd = new CrudProd();
		$result = $crudProd->selecionarPorNome($conn, $nome);

		foreach($esult as $value)
			echo "<br>".$value;

        }
	else if ($cod == 10) {

		$nome = $_POST['nome'];
		$descricao = $_POST['descricao'];
		$preco = $_POST['preco'];

		$crudProd = new CrudProd();
		$result = $crudProd->inserirRegistros($conn, $nome, $descricao, $preco);

		echo "Registro inserido com sucesso";

        }
	else if ($cod == 11) {

		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$descricao = $_POST['descricao'];
		$preco = $_POST['preco'];

		$crudProd = new CrudProd();
		$result = $crudProd->atualizarRegistro($conn, $id, $nome, $descricao, $preco);

		echo "Registro atulizado com sucesso";

        }
	else if ($cod == 12) {

		$id = $_POST['id'];

		$crudProd = new CrudProd();
		$result = $crudProd->deletarRegistroPorID($conn, $id);

		echo "Registro deletado com sucesso";

        }
	else if ($cod == 13) {

		$crudPedi = new CrudPedi();
		$result = $crudPedi->selecionarTodosRegistros($conn);

		foreach($result as $value) 
			echo "<br>"."Id: ".$value['cli_cod']." "."Nome: ".$value['cli_nome']." "."Endereço: ".$value['cli_endereco']." ";

        }
	else if ($cod == 14) {

		$idProd = $_POST['idProd'];

		$crudPedi = new CrudPedi();
		$result = $crudPedi->selecionarPorIDProd($conn, $idProd);

		foreach($esult as $value)
			echo "<br>".$value;

        }
	else if ($cod == 15) {

		$idClie = $_POST['idClie'];

		$crudPedi = new CrudPedi();
		$result = $crudPedi->selecionarPorIDClie($conn, $idClie);

		foreach($esult as $value)
			echo "<br>".$value;

        }
	else if ($cod == 16) {

		$idProd = $_POST['idProd'];
		$idClie = $_POST['idClie'];

		$crudPedi = new CrudPedi();
		$result = $crudPedi->inserirRegistros($conn, $idProd, $idClie);

		echo "Registro inserido com sucesso";

        }
	else if ($cod == 17) {

		$idProd = $_POST['idProd'];
		$idClie = $_POST['idClie'];

		$crudPedi = new CrudPedi();
		$result = $crudPedi->atualizarRegistroClie($conn, $idClie, $idProd);

		echo "Registro atualizado com sucesso";

        }
	else if ($cod == 18) {

		$idProd = $_POST['idProd'];
		$idClie = $_POST['idClie'];

		$crudPedi = new CrudPedi();
		$result = $crudPedi->atualizarRegistroProd($conn, $idProd, $idClie);

		echo "Registro atulizado com sucesso";

        }
	else if ($cod == 19) {

		$idProd = $_POST['idProd'];
		$idClie = $_POST['idClie'];

		$crudPedi = new CrudPedi();
		$result = $crudPedi->deletarRegistroPorID($conn, $idProd, $idClie);

		echo "Registro deletado com sucesso";

        }
	else {
		echo "Nenhuma das tabelas foram requisitadas";
	}

?>
