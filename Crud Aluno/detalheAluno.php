<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $matricula = $_POST["searchMat"];
//  $x = $_POST["x"];
//  echo $matricula . "<br>";
}
// Declarando os array
$linhas = array();
$colunas = array();

// abrindo o arquivo
$arquivoAluno = fopen("alunoNovo.txt", "r") or die("Erro na abertura do arquivo");

// declarando a variável para a leitura da linha
$x = 0;

//pegando o cabeçalho das colunas
$cabecalho = fgets($arquivoAluno);

//separando as colunas
$colunas = explode(";", $cabecalho);

while (!feof($arquivoAluno)) {
    $linhas[] = fgets($arquivoAluno);
}

fclose($arquivoAluno);

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Dados do Aluno</h1>

<?php

foreach ($linhas as $linha) {

    $colunas1 = array();
    $colunas1 = explode(";", $linha);

    foreach ($colunas1 as $coluna){

        if ($coluna == $matricula ){

            $nome       = $colunas1[0];
            $matricula  = $colunas1[1];
            $dtNasc     = $colunas1[2];
            $cpf        = $colunas1[3];
        }
    }
}
?>

    Matricula: <input type=text name="matricula" value="<?php echo $matricula ?>"> <br><br>
    nome: <input type=text name="nome" value="<?php echo $nome ?>"> <br><br>
    data nascimento: <input type=text name="dtNasc" value="<?php echo $dtNasc ?>"> <br><br>
    cpf: <input type=text name="cpf" value="<?php echo $cpf ?>"> <br><br>
    
    <?php
    $linha_old = $nome . ";" . $matricula . ";" . $dtNasc .";" . $cpf;
    ?>

</form>

<br><br>
<section style="text-align: center;">
    <a href="inserirAluno.php">Inserir Aluno</a> |
    <a href="alterarAluno.php">Alterar Aluno</a> |
    <a href="listarAlunos.php">Listar Alunos</a> |
    <a href="excluirAluno.php">Excluir Aluno</a> |
    <a href="detalheAluno.php">Detalhe de Aluno</a>
</section>
<br><br>

</body>
</html>
