
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_gerenciamento";

$conn = new mysqli( $servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action === 'create') {
        $numero = $_POST['numero'];
        $estado = $_POST['estado'];
        $sql = $conn->prepare("INSERT INTO onibus (numero, estado) VALUES (?, ?)");
        $sql->bind_param("ss", $numero, $estado);

if ($sql->execute()) {
    echo json_encode(["status" => "success", "message" => "Ônibus adicionado com sucesso!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Erro ao adicionar ônibus."]);
}
exit;
} elseif ($action === 'update') {
$id = $_POST['id'];
$numero = $_POST['numero'];
$estado = $_POST['estado'];

$sql = $conn->prepare("UPDATE onibus SET numero = ?, estado = ? WHERE id = ?");
$sql->bind_param("ssi", $numero, $estado, $id);

if ($sql->execute()) {
    echo json_encode(["status" => "success", "message" => "Ônibus atualizado com sucesso!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Erro ao atualizar ônibus."]);
}
exit;
} elseif ($action === 'delete') {
$id = $_POST['id'];

$sql = $conn->prepare("DELETE FROM onibus WHERE id = ?");
$sql->bind_param("i", $id);

if ($sql->execute()) {
    echo json_encode(["status" => "success", "message" => "Ônibus excluído com sucesso!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Erro ao excluir ônibus."]);
}
exit;
}
}

// Buscar todos os ônibus
$result = $conn->query("SELECT * FROM onibus");
?>       

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Ônibus</title>
    <link rel="stylesheet" href="crud.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Gerenciar Ônibus</h2>
    <form id="create-form">
        <input type="text" id="numero" placeholder="Número do ônibus" required>
        <input type="text" id="estado" placeholder="Estado atual" required>
        <button type="submit">Adicionar</button>
    </form>
    <ul id="onibus-list">
        <?php while ($row = $result->fetch_assoc()): ?>
            <li data-id="<?php echo $row['id']; ?>">
                <span ><?php echo $row['numero']; ?></span>
                <span ><?php echo $row['estado']; ?></span>
                <button class="edit-btn">Editar</button>
                <button class="delete-btn">Excluir</button>
            </li>
        <?php endwhile; ?>
    </ul>

    <script>
        $(document).ready(function() {
            // Criar novo ônibus
            $("#create-form").submit(function(event) {
                event.preventDefault();
                const numero = $("#numero").val();
                const estado = $("#estado").val();

                $.post("crudOnibus.php", {
                    action: "create",
                    numero: numero,
                    estado: estado
                }, function(response) {
                    const data = JSON.parse(response);
                    alert(data.message);
                    if (data.status === "success") {
                        location.reload();
                    }
                });
            });

            // Editar ônibus
            $(".edit-btn").click(function() {
                const li = $(this).closest("li");
                const id = li.data("id");
                const numero = prompt("Número do ônibus:", li.find(".numero").text());
                const estado = prompt("Estado atual:", li.find(".estado").text());

                if (numero && estado) {
                    $.post("crudOnibus.php", {
                        action: "update",
                        id: id,
                        numero: numero,
                        estado: estado
                    }, function(response) {
                        const data = JSON.parse(response);
                        alert(data.message);
                        if (data.status === "success") {
                            location.reload();
                        }
                    });
                }
            });

            // Excluir ônibus
            $(".delete-btn").click(function() {
                if (confirm("Tem certeza que deseja excluir este ônibus?")) {
                    const li = $(this).closest("li");
                    const id = li.data("id");

                    $.post("crudOnibus.php", {
                        action: "delete",
                        id: id
                    }, function(response) {
                        const data = JSON.parse(response);
                        alert(data.message);
                        if (data.status === "success") {
                            location.reload();
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
