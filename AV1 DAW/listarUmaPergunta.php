<?php
$index = $_GET['index'];
$perguntas = file('perguntas.txt', "w");
$perguntaSelecionada = explode('|', $perguntas[$index]);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listar Apenas Uma Pergunta</title>
</head>
<body>
    <h1>Pergunta</h1>
    <p><?php echo $perguntaSelecionada[0]; ?></p>
    <h2>Respostas</h2>
    <ul>
        <?php foreach (explode('|', $perguntaSelecionada[1]) as $resposta): ?>
            <li><?php echo $resposta; ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="listarPerguntas.php">Voltar</a>
</body>
</html>
