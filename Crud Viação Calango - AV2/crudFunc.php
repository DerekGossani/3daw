<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_gerenciamento";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action === 'create') {
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $funcao = $_POST['funcao'];

        $sql = $conn->prepare("INSERT INTO funcionarios (codigo, nome, funcao) VALUES (?, ?, ?)");
        $sql->bind_param("sss", $codigo, $nome, $funcao);

        if ($sql->execute()) {
            echo json_encode(["status" => "success", "message" => "Funcionário adicionado com sucesso!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Erro ao adicionar funcionário."]);
        }
        exit;

    } elseif ($action === 'update') {
        $id = $_POST['id'];
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $funcao = $_POST['funcao'];

        $sql = $conn->prepare("UPDATE funcionarios SET codigo = ?, nome = ?, funcao = ? WHERE id = ?");
        $sql->bind_param("sssi", $codigo, $nome, $funcao, $id);

        if ($sql->execute()) {
            echo json_encode(["status" => "success", "message" => "Funcionário atualizado com sucesso!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Erro ao atualizar funcionário."]);
        }
        exit;
    } elseif ($action === 'delete') {
        $id = $_POST['id'];

        $sql = $conn->prepare("DELETE FROM funcionarios WHERE id = ?");
        $sql->bind_param("i", $id);

        if ($sql->execute()) {
            echo json_encode(["status" => "success", "message" => "Funcionário excluído com sucesso!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Erro ao excluir funcionário."]);
        }
        exit;
    }
}

// Buscar todos os funcionários
$result = $conn->query("SELECT * FROM funcionarios");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Funcionários</title>
    <link rel="stylesheet" href="crudFunc.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<style>
body, h2, ul, li, input, button, form {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    min-height: 100vh;
}


h2 {
    color: #5c3728;
    margin-bottom: 20px;
    font-size: 2rem;
}

form {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 20px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    width: 100%;
}

form input {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1rem;
    outline: none;
    transition: border-color 0.3s;
}

form input:focus {
    border-color: #5c3728;
}

form button {
    background-color: #5c3728;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    transition: background-color 0.3s, transform 0.2s;
}

form button:hover {
    background-color: #703f30;
}

form button:active {
    transform: scale(0.95);
}

ul {
    list-style: none;
    max-width: 600px;
    width: 100%;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

ul li {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 20px;
    border-bottom: 1px solid #ddd;
}

ul li:last-child {
    border-bottom: none;
}

ul li span {
    flex: 1;
    font-size: 1rem;
}

ul li button {
    background-color: #5c3728;
    color: #fff;
    padding: 5px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 10px;
    font-size: 0.9rem;
    transition: background-color 0.3s, transform 0.2s;
}

ul li button:hover {
    background-color: #703f30;
}

ul li button:active {
    transform: scale(0.95);
}

.back-button {
    position: fixed;
    top: 20px;
    left: 20px;
    background-color: #5c3728;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: background-color 0.3s, transform 0.2s;
}

.back-button:hover {
    background-color: #703f30;
}

.back-button:active {
    transform: scale(0.95);
}

@media (max-width: 768px) {
    form {
        flex-direction: column;
        gap: 15px;
    }

    ul li {
        flex-direction: column;
        align-items: flex-start;
    }

    ul li span {
        margin-bottom: 10px;
    }
}
</style>

<body>
    <h2>Gerenciar Funcionários</h2>
    <form id="create-form">
        <input type="text" id="nome" placeholder="Nome do funcionário" required>
        <input type="text" id="codigo" placeholder="Código do funcionário" required>
        <input type="text" id="funcao" placeholder="Função" required>
        <button type="submit">Adicionar</button>
    </form>
    <ul id="funcionarios-list">
        <?php while ($row = $result->fetch_assoc()): ?>
            <li data-id="<?php echo $row['id']; ?>">
                <span class="nome"><?php echo $row['nome']; ?></span> -
                <span class="codigo"><?php echo $row['codigo']; ?></span> -
                <span class="funcao"><?php echo $row['funcao']; ?></span>
                <button class="edit-btn">Editar</button>
                <button class="delete-btn">Excluir</button>
            </li>
        <?php endwhile; ?>
    </ul>

    <script>
        $(document).ready(function() {
            // Criar novo funcionário
            $("#create-form").submit(function(event) {
                event.preventDefault();
                const nome = $("#nome").val();
                const codigo = $("#codigo").val();
                const funcao = $("#funcao").val();

                $.post("crudFunc.php", {
                    action: "create",
                    nome: nome,
                    codigo: codigo,
                    funcao: funcao
                }, function(response) {
                    const data = JSON.parse(response);
                    alert(data.message);
                    if (data.status === "success") {
                        location.reload();
                    }
                });
            });

            // Editar funcionário
            $(".edit-btn").click(function() {
                const li = $(this).closest("li");
                const id = li.data("id");
                const nome = prompt("Nome:", li.find(".nome").text());
                const codigo = prompt("Código:", li.find(".codigo").text());
                const funcao = prompt("Função:", li.find(".funcao").text());

                if (nome && codigo && funcao) {
                    $.post("crudFunc.php", {
                        action: "update",
                        id: id,
                        nome: nome,
                        codigo: codigo,
                        funcao: funcao
                    }, function(response) {
                        const data = JSON.parse(response);
                        alert(data.message);
                        if (data.status === "success") {
                            location.reload();
                        }
                    });
                }
            });

            // Excluir funcionário
            $(".delete-btn").click(function() {
                if (confirm("Tem certeza que deseja excluir este funcionário?")) {
                    const li = $(this).closest("li");
                    const id = li.data("id");

                    $.post("crudFunc.php", {
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
