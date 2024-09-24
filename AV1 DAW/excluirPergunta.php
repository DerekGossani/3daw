<?php
$perguntas = file('perguntas.txt', "w");

if (isset($_GET['index'])) {
    $index = $_GET['index'];
    unset($perguntas[$index]);
    file_put_contents('perguntas.txt', implode("\n", $perguntas));
    header('Location: listar.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Excluir Pergunta</title>
</head>
<body>
    <h1>Excluir Pergunta</h1>
    <p>Quer mesmo excluir esta pergunta?</p>
    <a href="listarPerguntas.php">Cancelar</a>
</body>
</html>
