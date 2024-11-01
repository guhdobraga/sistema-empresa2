<?php
    require_once '../config/config.php';
require_once '../app/controllers/RegistroRCController.php';

$controller = new RegistroRCController($pdo);

// Chame o método para exibir a lista de funcionários
$controller->exibirListaCompra();
    ?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>