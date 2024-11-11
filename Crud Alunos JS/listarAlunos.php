<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Atividade CRUD alunos com JS">
	<meta name="keywords" content="HTML, CSS, PHP">
	<meta name="author" content="Derek Gossani">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>FAETERJ - 3DAW </title>
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

<br>
<br>

<table>
    <th colspan="5">Lista de alunos cadastrados</th>
    <tr >
        <td style='border: 1px solid #ccc; width: 25%;'>Matrícula</td>
        <td style='border: 1px solid #ccc; width: 25%;'>Nome</td>
		<td colspan="3" style='border: 1px solid #ccc; width: 50%;'>Ação</td>
    </tr>

<?php
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
    }

    // Tudo ok? passa adiante...
    // Comando SQL
    //echo "Conexão ok";
    $comandoSQL = "SELECT * FROM alunos ";

    // obtem o resultado da consulta
    $result = $conn->query($comandoSQL);
    // pega a linha da tabela e associa a um array
    // $linha = $result->fetch_assoc(); //


    // efetuando o laço //
    while($linha = $result->fetch_assoc()) {
        $nome = $linha["nome"];
        $matricula = $linha["matricula"];
        $cpf = $linha["cpf"];
        $email = $linha["email"];

        echo "
        <tr>
            <td style='border: 1px solid #ccc; width: 25%;'>$matricula</td>
            <td style='border: 1px solid #ccc; width: 25;'>$nome</td>
			
			<td style='border: 1px solid #ccc; width: 17%;'>
				<a href='alterarAluno.php?matricula=$matricula'>
					Alterar
				</a>
			</td>
			<td style='border: 1px solid #ccc; width: 17%;'>
				<a href='excluirAluno.php?matricula=$matricula'>
					Excluir
				</a>
			</td>
			<td style='border: 1px solid #ccc; width: 16%;'>
				<a href='detalheAluno.php?matricula=$matricula'>
					Detalhes
				</a>
			</td>
        </tr>
            ";
}
?>
</table>
</body>
</html>