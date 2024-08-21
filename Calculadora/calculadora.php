<?php

$num1 = $_GET["a"];
$num2 = $_GET["b"];
$operadores = $_GET["operadores"];
$resultado = 0;

  switch($operadores)
    {
    case 'somar':
      $resultado = $num1 + $num2;
      break;

    case 'subtrair':
      $resultado = $num1 - $num2;
      break;

    case 'multiplicar':
      $resultado = $num1 * $num2;
      break;

    case 'dividir':
      $resultado = $num1 / $num2;
      break;
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php echo "<h1>Resultado: $resultado </h1>"; ?>
</body>

</html>