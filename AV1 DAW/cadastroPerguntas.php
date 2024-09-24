<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pergunta = $_POST['pergunta'];
    $respostas = implode('|', $_POST['respostas']);
    $linha = "$pergunta|$respostas\n";
    fopen('perguntas.txt', $linha, "a");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Criar Pergunta</title>
</head>
<body>
    <h1>Criar Pergunta de Múltipla Escolha</h1>
    <form method="POST">
        Pergunta: <input type="text" name="pergunta" required><br>
        Respostas:<br>
        <input type="text" name="respostas[]" required><br>
        <input type="text" name="respostas[]" required><br>
        <input type="text" name="respostas[]" required><br>
        <input type="text" name="respostas[]" required><br>
        <button type="submit">Salvar Pergunta</button>
    </form>
</body>
</html>
