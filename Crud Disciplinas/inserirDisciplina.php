<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $nome = $_POST["nome"];
        $sigla = $_POST["sigla"];
        $carga = $_POST["carga"];
       
//  Vou escrever os dados do formulário em um arquivo de dados
        $arquivoDisc = fopen("arquivoDisc.txt", "w");
        $txt = "nome;sigla;carga;\n";
        
        fwrite($arquivoDisc,$txt);
        $txt = $nome . ";" . $sigla . ";" . $carga;
    
        fwrite($arquivoDisc,$txt);
        fclose($arquivoDisc);
    }
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Inserir Disciplina</h1>
<br>
<a href="inserirDisciplina.php">Inserir Disciplina</a><br>
<a href="alterarDisciplina.php">Alterar Disciplina</a><br>
<a href="listarDisciplinas.php">Listar Disciplina</a><br>
<a href="excluirDisciplina.php">Excluir Disciplina</a><br>
<a href="detalheDisciplina.php">Detalhes da Disciplina</a><br>
<br>
<form action="inserirDisciplina.php" method=POST>
    sigla: <input type=text name="sigla"> <br>
    nome: <input type=text name="nome"> <br>
    carga: <input type=text name="carga"> <br>
    <br><br>
    <input type="submit" value="Inserir">
</form>
<br>
</body>
</html>