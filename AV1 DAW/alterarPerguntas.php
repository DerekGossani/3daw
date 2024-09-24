<?php
$perguntas = file('perguntas.txt', "w");
$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = $_POST['index'];
    $pergunta = $_POST['pergunta'];
    $respostas = implode('|', $_POST['respostas']);

    $perguntas[$index] = "$pergunta|$respostas";
    fopen('perguntas.txt', implode("\n", $perguntas));
    $mensagem = "Pergunta atualizada com sucesso!";
}

$index = isset($_GET['index']) ? $_GET['index'] : 0;
$perguntaSelecionada = explode('|', $perguntas[$index]);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Alterar Pergunta</title>
</head>
<body>
    <h1>Alterar Pergunta de Múltipla Escolha</h1>
    <?php if ($mensagem) echo "<p>$mensagem</p>"; ?>
    <form method="POST">
        <input type="hidden" name="index" value="<?php echo $index; ?>">
        Pergunta: <input type="text" name="pergunta" value="<?php echo $perguntaSelecionada[0]; ?>" required><br>
        Respostas:<br>
        <?php
        $respostas = explode('|', $perguntaSelecionada[1]);
        foreach ($respostas as $resposta) {
            echo "<input type='text' name='respostas[]' value='$resposta' required><br>";
        }
        ?>
        <button type="submit">Atualizar Pergunta</button>
    </form>
    <a href="listarPerguntas.php">Voltar</a>
</body>
</html>