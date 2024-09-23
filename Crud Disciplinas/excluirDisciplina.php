<!DOCTYPE html>

<?php

    //  Vou escrever os dados do formulário em um arquivo de dados
    $linhas = array();
    $colunas = array();
    $arquivoDisc = fopen("arquivoDisc.txt", "r") or die("Erro na abertura do arquivo");
    $x = 0;
    $cabecalho =  fgets($arquivoDisc);
    $colunas = explode(";", $cabecalho);
    //    echo $colunas[0] . ";" . $colunas[1] . ";" . $colunas[2] . ";" . $colunas[3];
    //    echo "<br>imprimi parte do cabecalho<br>";

    while (!feof($arquivoDisc)) {
        $linhas[] = fgets($arquivoDisc);
    //       echo $linhas[$x] . "<br>";
    //        $x++;

    }
    fclose($arquivoDisc);
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<h1>Excluir Aluno</h1>
<br>
<form action="excluirDisciplina.php" method="POST">
    Nome: <input type="text" name="nome" 
                value='<?php echo $nome ?>'>
    <br><br>
    <input type="submit" value="Excluir Disciplina">
</form>
<br><br>

<h1>Disciplinas Cadastradas</h1>
<br>

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

        if ($linha == null) {
            break;
        } else {
            echo "<tr>";
            echo "<td style='border: 1px solid;'> $x </td>";
            $colunas1 = array();
            $colunas1 = explode(";", $linha);

            foreach ($colunas1 as $coluna) {
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

<a href="inserirDisciplina.php">Inserir Disciplina</a><br>
<a href="alterarDisciplina.php">Alterar Disciplina</a><br>
<a href="listarDisciplinas.php">Listar Disciplina</a><br>
<a href="excluirDisciplina.php">Excluir Disciplina</a><br>
<a href="detalheDisciplina.php">Detalhes da Disciplina</a><br>

</section>
<br><br>

<body>
</body>
</html>