<?php
$perguntas = file('perguntas.txt', "w");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listar Perguntas</title>
</head>
<body>
    <h1>Lista de Perguntas</h1>
    <table border="1">
        <tr>
            <th>Pergunta</th>
            <th>Respostas</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($perguntas as $index => $linha): ?>
            <?php list($pergunta, $respostas) = explode('|', $linha); ?>
            <tr>
                <td><?php echo $pergunta; ?></td>
                <td><?php echo $respostas; ?></td>
                <td>
                    <a href="alterarPerguntas.php?index=<?php echo $index; ?>">Alterar</a>
                    <a href="excluirPergunta.php?index=<?php echo $index; ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="cadastroPerguntas.php">Adicionar Nova Pergunta</a>
</body>
</html>
