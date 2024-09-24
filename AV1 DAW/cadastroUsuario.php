<?php
    
if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
    echo "nome: " . $nome . "email: " . $email . "senha: " . $senha;


//cadastrando usuario
if (!file_exists("usuario.txt")) {
       $arquivoUsuar = fopen("usuario.txt","w") or die("erro ao criar arquivo");
    $linha = "nome;email;senha\n";
       fwrite($arquivoUsuar,$linha);
       fclose($arquivoUsuar);
    
   }
    $arquivoUsuar = fopen("usuario.txt","a") or die("erro ao criar arquivo");

    $linha = $nome . ";" . $email . ";" . $senha . "\n";
    fwrite($arquivoUsuar,$linha);
    fclose($arquivoUsuar);
        $msg = "Tudo certo!";
}


?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Cadastro de Usuario</h1>
<form action="cadastroUsuario.php" method="POST">
    Nome: <input type="text" name="nome">
    <br><br>
    Email: <input type="text" name="email">
    <br><br>
    Senha: <input type="text" name="senha">
    <br><br>
    <input type="submit" value="Cadastro de Usuario">
</form>

<p><?php echo $msg ?></p>
<br>
</body>
</html>