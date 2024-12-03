<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento - Viação Calango</title>
    <link rel="stylesheet" href="clienteHome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <div class="logo" onclick="window.location.href='clienteHome.html'">
            <img src="imagens.png/calango.png" alt="Logo da Viação Calango">
        </div>
        <button class="back-button" onclick="window.location.href='comprarPassagem.html'">
            <i class="fas fa-arrow-left"></i> Voltar
        </button>
    </header>

    <main>
        <div class="container">
            <h1>Pagamento</h1>

            <?php
            $partida = $_POST['partida'] ?? 'N/A';
            $destino = $_POST['destino'] ?? 'N/A';
            $data_ida = $_POST['data_ida'] ?? 'N/A';
            $preco = $_POST['preco'] ?? 'N/A';
            $tipo_assento = $_POST['tipo_assento'] ?? 'N/A';
            ?>

            <section class="passagem-info">
                <h2>Detalhes da Passagem</h2>
                <p><strong>Partida:</strong> <?= htmlspecialchars($partida) ?></p>
                <p><strong>Destino:</strong> <?= htmlspecialchars($destino) ?></p>
                <p><strong>Data de Ida:</strong> <?= htmlspecialchars($data_ida) ?></p>
                <p><strong>Tipo de Assento:</strong> <?= htmlspecialchars($tipo_assento) ?></p>
                <p><strong>Preço:</strong> R$ <?= htmlspecialchars($preco) ?></p>
            </section>

            <form method="post" action="confirmacao.php">
                <section class="payment-info">
                    <h2>Informações de Pagamento</h2>

                    <label for="nome">Nome do titular:</label>
                    <input type="text" id="nome" name="nome" required>

                    <label for="numero-cartao">Número do cartão:</label>
                    <input type="text" id="numero-cartao" name="numero-cartao" required placeholder="XXXX XXXX XXXX XXXX">

                    <label for="data-validade">Data de validade:</label>
                    <input type="month" id="data-validade" name="data-validade" required>

                    <label for="cvv">CVV:</label>
                    <input type="text" id="cvv" name="cvv" required placeholder="XXX">

                    <label for="endereco">Endereço de cobrança:</label>
                    <input type="text" id="endereco" name="endereco" required>

                    <input type="hidden" name="partida" value="<?= htmlspecialchars($partida) ?>">
                    <input type="hidden" name="destino" value="<?= htmlspecialchars($destino) ?>">
                    <input type="hidden" name="data_ida" value="<?= htmlspecialchars($data_ida) ?>">
                    <input type="hidden" name="preco" value="<?= htmlspecialchars($preco) ?>">
                    <input type="hidden" name="tipo_assento" value="<?= htmlspecialchars($tipo_assento) ?>">

                    <button onclick="window.location.href='confirmacao.php'" type="submit">Confirmar Pagamento</button>
                </section>
            </form>
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
