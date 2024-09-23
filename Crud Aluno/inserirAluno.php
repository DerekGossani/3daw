<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $matricula = $_POST["matricula"];
        $dtNasc = $_POST["dtNasc"];
        $cpf = $_POST["cpf"];

//  Vou escrever os dados do formulário em um arquivo de dados
        $arquivoAluno = fopen("alunoNovo.txt", "w");
        $txt = "nome;matricula;data Nascimento;email;cpf;telefone;endereco;cidade;estado;cep\n";
        
        fwrite($arquivoAluno,$txt);
        $txt = $nome . ";" . $matricula . ";" . $dtNasc . ";"  . $cpf "\n";
        
        fwrite($arquivoAluno,$txt);
        fclose($arquivoAluno);
    }
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Inserir Aluno</h1>
<br>
<a href="inserirAluno.php">Inserir Aluno</a><br>
<a href="inserirAluno.php">Alterar Aluno</a><br>
<a href="inserirAluno.php">Listar Alunos</a><br>
<a href="inserirAluno.php">Excluir Aluno</a><br>
<a href="inserirAluno.php">Detalhe de Aluno</a><br>
<br>
<form action="inserirAluno.php" method=POST>
    Matricula: <input type=text name="matricula"> <br>
    nome: <input type=text name="nome"> <br>
    data nascimento: <input type=text name="dtNasc"> <br>
    cpf: <input type=text name="cpf"> <br>
    <br><br>
    <input type="submit" value="Inserir">
</form>
<br>
</body>
</html>