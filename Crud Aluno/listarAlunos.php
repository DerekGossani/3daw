<?php

//  Vou escrever os dados do formulário em um arquivo de dados
    $linhas = array();
    $colunas = array();
    $arquivoAluno = fopen("alunoNovo.txt", "r") or die("Erro na abertura do arquivo");
    $x = 0;
    $cabecalho =  fgets($arquivoAluno);
    $colunas = explode(";", $cabecalho);

//    echo $colunas[0] . ";" . $colunas[1] . ";" . $colunas[2] . ";" . $colunas[3];
//    echo "<br>imprimi parte do cabecalho<br>";

    while (!feof($arquivoAluno)) {
        $linhas[] = fgets($arquivoAluno);
//        echo $linhas[$x] . "<br>";
//        $x++;
    }

    fclose($arquivoAluno);
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Listar Alunos Cadastrados</h1>

<br><br>

<table style="border: 1px solid;">
    <tr >
        <th><?php echo "Linha" ?></th>
        <th><?php echo $colunas[0] ?></th>
        <th><?php echo $colunas[1] ?></th>
        <th><?php echo $colunas[2] ?></th>
        <th><?php echo $colunas[3] ?></th>
        <th><?php echo $colunas[4] ?></th>
        <th><?php echo $colunas[5] ?></th>
        <th><?php echo $colunas[6] ?></th>
        <th><?php echo $colunas[7] ?></th>
        <th><?php echo $colunas[8] ?></th>
        <th><?php echo $colunas[9] ?></th>
    </tr>

        <?php
        foreach ($linhas as $linha) {

            if ($linha==null) {
                break;
            } else {

            echo "<tr>";
            echo "<td style='border: 1px solid;'> $x </td>";
            $colunas1 = array();
            $colunas1 = explode(";", $linha);

            foreach ($colunas1 as $coluna){
                echo "<td style='border: 1px solid;'>$coluna</td>";
            }
            echo "</tr>";

                $x++;
            }

        }
        ?>
</table>

<br><br>
<section style="text-align: center;">
    <a href="inserirAluno.php">Inserir Aluno</a> |
    <a href="alterarAluno.php">Alterar Aluno</a> |
    <a href="listarAlunos.php">Listar Alunos</a> |
    <a href="excluirAluno.php">Excluir Aluno</a> |
    <a href="detalheAluno.php">Detalhe de Aluno</a>
</section>
<br><br>

<body>
</body>
</html>
