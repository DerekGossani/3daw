<?php

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$matricula = $_POST["matricula"];
    $nome = $_POST["nome"];    
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
	    	
	//  Vou escrever os dados do formulário no banco de dados
    // Estabelecendo conexão com BD
    // credenciais de acesso
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "faeterj3dawmanha2";
	
	// executando a conexão
    $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
	
    // Mensagem de erro se a conexão falhar
    if ($conn->connect_error){
        die("Conexão com erro: " . $conn->connect_error);
    } else {
		// echo "Conexão estabelecida!<br>";
		// }

	// Fazer validação para ver se o usuário existe ou não no banco de dados
	$sql = "select count(*) as total from alunos where matricula = '$matricula'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if($row['total'] == 1) {
		$mensagem = "Matrícula já cadastrada! <br>";
		
		} else {
		//echo "Matrícula não encontrada... Preparando para cadastrar!<br>";
		//}
		// Fim da Validação

		// Faz a inserção na tabela usuario passando os campos que o usuário digitar
		$insert = "INSERT INTO alunos (nome, matricula, email, cpf) VALUES ('$nome','$matricula','$email','$cpf')";

		//	echo "$nome - $matricula - $email - $cpf <br>";
		//	echo "$insert <br>";
		// Validação se a inclusao foi efetuada com sucesso
		mysqli_query($conn, $insert) or die (mysqli_error($conn));
		
		$mensagem = "Aluno cadstrado com sucesso!";
		
		}
		//Fechando a conexão com o banco de dados
		mysqli_close($conn);
		
		// Finaliza a operação
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Atividade CRUD alunos com JS">
	<meta name="keywords" content="HTML, CSS, PHP">
	<meta name="author" content="Derek Gossani">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>FAETERJ - 3DAW</title>
	
	<link rel="stylesheet" href="estilo.css">
</head>
<body>

<header>
	<section id="menu">
		<h1>3DAW - CRUD</h1>
		<br>
		<a href="home.php">Início</a> |
		<a href="inserirAluno.php">Inserir Aluno</a> |
		<a href="listarAlunos.php">Listar Alunos</a>		
	</section>
</header>

<section id="informativo">
	<p>
	Vamos aproveitar o formulário já utilizado no exercício 13 para facilitar, retirando os campos que não iremos utilizar...
	</p>
	
	<form action="inserirAluno.php" method=POST>
		<p>Matricula: <input type=text name="matricula"></p>
		<p>Nome: <input type=text name="nome"> </p>
		<p>E-mail: <input type=text name="email"> </p>
		<p>C.P.F.: <input type=text name="cpf"> </p>
		
		<br><br>
		<input type="submit" value=" Inserir...">
	</form>
</section>

	<section>
		<?php echo "<h1>$mensagem</h1> <br>" ?>
	</section>
	
<br>
<br>

</body>
</html>
