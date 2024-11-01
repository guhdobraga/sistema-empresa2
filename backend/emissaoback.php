<?php
require_once '../config/config.php';
require_once '../app/controllers/RegistroNFController.php';

$controller = new RegistroNFController($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos obrigatórios estão preenchidos
    if (!empty($_POST['nome']) && !empty($_POST['numero'])){
        $nome = $_POST['nome'];
        $numero = $_POST['numero'];

            $controller->criarRegistroNF($nome, $numero); 
            
    } else {
        echo "Todos os campos obrigatórios devem ser preenchidos.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emissão de Documentos Fiscais</title>
</head>
<body>
    <h1>Emissão de Notas Fiscais</h1>
    <form method="post">
    <label for="nome">Selecione</label>
    <select name="nome" required>
            <option value="" selected disabled></option>
            <option value="NF-e">NF-e (Nota Fiscal Eletrônica)</option>
            <option value="NFS-e">NFS-e (Nota Fiscal de Serviços Eletrônicos)</option>
            <option value="CF-e">CF-e (Cupom Fiscal Eletrônico)</option>
            </select><br>

            <label for="numero">Número do Documento:</label>
            <input type="number" name="numero" required><br>

            <input type="submit" value="Emitir"></input>
</form>

            Todas as Notas:<a href="listaemissao.php">Acessar</a>
</body>
</html>