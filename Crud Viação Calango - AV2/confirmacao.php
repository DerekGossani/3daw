<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_gerenciamento";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$nome_titular = $_POST['nome'] ?? null;
$numero_cartao = $_POST['numero-cartao'] ?? null;
$data_validade = $_POST['data-validade'] ?? null;
$cvv = $_POST['cvv'] ?? null;
$endereco_cobranca = $_POST['endereco'] ?? null;
$partida = $_POST['partida'] ?? null;
$destino = $_POST['destino'] ?? null;
$data_ida = $_POST['data_ida'] ?? null;
$preco = $_POST['preco'] ?? null;
$tipo_assento = $_POST['tipo_assento'] ?? null;

$status_pagamento = "CONCLUIDO";

$sql = $conn->prepare("INSERT INTO passagens (nome_titular, numero_cartao, data_validade, cvv, endereco_cobranca, partida, destino, data_ida, preco, tipo_assento, status_pagamento)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sql->bind_param("sssssssssds", $nome_titular, $numero_cartao, $data_validade, $cvv, $endereco_cobranca, $partida, $destino, $data_ida, $preco, $tipo_assento, $status_pagamento);

if ($sql->execute()) {
   
    $_SESSION['nome_titular'] = $nome_titular;
    $_SESSION['partida'] = $partida;
    $_SESSION['destino'] = $destino;
    $_SESSION['data_ida'] = $data_ida;
    $_SESSION['tipo_assento'] = $tipo_assento;
    $_SESSION['preco'] = $preco;
} else {
    die("Erro ao processar pagamento: " . $sql->error);
}


$sql->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Pagamento</title>
    <link rel="stylesheet" href="confirmacao.css"> 
</head>
<body>
    <header>
        <div class="logo">
            <img src="imagens.png/calango.png" alt="Logo da Viação Calango">
        </div>
        <button class="back-button" onclick="window.location.href='clienteHome.html'">
            <i class="fas fa-arrow-left"></i> Voltar ao Início
        </button>
    </header>

    <main>
        <div class="container">
            <h1>Pagamento Confirmado!</h1>
            <p>Obrigado por escolher a Viação Calango. Aqui estão os detalhes da sua passagem:</p>

            <div class="card">
                <h2>Detalhes da Viagem</h2>
                <p><strong>Nome do Titular:</strong> <?= $_SESSION['nome_titular'] ?></p>
                <p><strong>Ponto de Partida:</strong> <?= $_SESSION['partida'] ?></p>
                <p><strong>Destino:</strong> <?= $_SESSION['destino'] ?></p>
                <p><strong>Data de Ida:</strong> <?= $_SESSION['data_ida'] ?></p>
                <p><strong>Tipo de Assento:</strong> <?= $_SESSION['tipo_assento'] ?></p>
                <p><strong>Preço:</strong> R$ <?= $_SESSION['preco'] ?></p>
                <p><strong>Status:</strong> Confirmado</p>
            </div>

            <button onclick="window.location.href='clienteHome.html'" class="back-button">Voltar ao Início</button>
        </div>
    </main>

    <footer>
        <div class="container-footer">
            <div class="logo">
                <img src="imagens.png/calango.png" alt="Logo da Viação Calango">
            </div>
            <div class="payment">
                <img src="imagens.png/bandeira-cartoes.png" alt="PayMee">
                <img src="imagens.png/pix.png" alt="PIX">
            </div>
            <div class="contact">
                <h2>Fale Conosco</h2>
                <p>Atendimento virtual no WhatsApp: (21) 95673-2001</p>
                <p>Cancelamento ou mais informações: (21) 0800-312-7593</p>
                <a href="https://www.instagram.com/viacaocalango/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://www.facebook.com/viacaocalango/" target="_blank"><i class="fab fa-facebook-f"></i></a>
            </div>
            <div class="copyright">
                <p>&copy; 2023 Viação Calango. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>
