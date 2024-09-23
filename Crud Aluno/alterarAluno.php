<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = $_POST["nome"];
    $matricula = $_POST["matricula"];
    $dtNasc = $_POST["dtNasc"];
    $cpf = $_POST["cpf"];


    $arquivoAlunoIn = fopen("alunosNovos.txt", "r") or die("Erro na abertura do arquivo");
    $arquivoAlunoOut = fopen("alunosAlterados.txt", "w") or die("Erro na abertura do arquivo");
    $x = 0;
    $linha = "";
   
    while (!feof($arquivoAlunoIn)) {
        $linhas[] = fgets($arquivoAlunoIn);
        $colunaDados = explode(";", $linhas[$x]);
        if ($colunaDados[1] == $matricula) {
            $txt = "$nome;$matricula;$dtNasc;$cpf \n";
        } else {
            $txt = $linhas[$x];
        }
        fwrite($arquivoAlunoOut, $txt);
        $x++;
    }
    fclose($arquivoAlunoOut);
    fclose($arquivoAlunoIn);
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Alterar Aluno</h1>
<br>
<br>
<form action="alterarAluno.php" method=POST>
    Matricula: <input type=text name="matricula" value='<?php echo "jose da silva"; ?>'> <br>
    nome: <input type=text name="nome" value='<?php echo "jose da silva"; ?>'> <br>
    data nascimento: <input type=text name="dtNasc"> <br>
    cpf: <input type=text name="cpf"> <br>
    <br><br>
    <input type="submit" value="Inserir">
</form>
<br>
</body>
</html>