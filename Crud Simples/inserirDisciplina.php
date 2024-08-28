<?php
    $msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $nome = $_POST["nome"];
    $sigla = $_POST["sigla"];
    $carga = $_POST["carga"];
   
    // Validação simples dos campos
    if (empty($nome) || empty($sigla) || empty($carga)) {
        $msg = "Todos os campos são obrigatórios!";
    } else {
        echo "nome: " . $nome . " sigla: " . $sigla . " carga: " . $carga;

        $arqDisc = fopen("disciplinas.txt", "a") or die("Erro ao criar arquivo");

        // Verificar se o arquivo está vazio antes de adicionar o cabeçalho
        if (filesize("disciplinas.txt") == 0) {
            $linha = "nome;sigla;carga\n";
            fwrite($arqDisc, $linha);
        }

        // Escrever os dados da disciplina no arquivo
        $linha = $nome . ";" . $sigla . ";" . $carga . "\n";
        fwrite($arqDisc, $linha);

        fclose($arqDisc);

        $msg = "Disciplina criada com sucesso!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Criar Nova Disciplina</h1>
<form action="ex07_incluirDisciplina.php" method="POST">
    Nome: <input type="text" name="nome">
    <br><br>
    Sigla: <input type="text" name="sigla">
    <br><br>
    Carga Horaria: <input type="text" name="carga">
    <br><br>
    <input type="submit" value="Criar Nova Disciplina">
</form>
<p><?php echo $msg ?></p>
<br>
</body>
</html>