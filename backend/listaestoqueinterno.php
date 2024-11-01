<?php
    require_once '../config/config.php';
require_once '../app/controllers/EstoqueIController.php';

$controller = new EstoqueIController($pdo);

// Chame o método para exibir a lista de funcionários
$controller->exibirListaEstoque();
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