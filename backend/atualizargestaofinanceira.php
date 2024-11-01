<?php
include_once '../config/config.php';
if (!isset($_GET['id'])) {
    header('Location: listagestaofinanceira.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM gestao_financeira WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: listagestaofinanceira.php');
    exit;   
}
$titulo_fatura = $appointment['titulo_fatura'];
$fornecedor = $appointment['fornecedor'];
$cnpj = $appointment['cnpj'];
$vencimento = $appointment['vencimento'];
$valor = $appointment['valor'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar</title>
    <style>
        /* Estilo para o diálogo de confirmação */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 300px;
            text-align: center;
            border-radius: 10px;
        }
        .modal-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .modal-footer {
            display: flex;
            justify-content: space-between;
        }
        .modal-footer button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-cancel {
            background-color: #ccc;
        }
        .btn-cancel:hover{
            background-color: #ccb;
        }
        .btn-confirm {
            background-color: #f44336;
            color: white;
        }
        .btn-confirm:hover {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
<form method="post">
<label for="titulo_fatura">Titulo da Fatura:</label>
    <input type="text" name="titulo_fatura" value="<?php echo $titulo_fatura; ?>" required></br>

    <label for="fornecedor">Fornecedor:</label>
    <input type="text" name="fornecedor" value="<?php echo $fornecedor; ?>" required></br>

    <label for="cnpj">CNPJ:</label>
    <input type="text" name="cnpj" value="<?php echo $cnpj; ?>" required></br>

    <label for="vencimento">Vencimento:</label>
    <input type="text" name="vencimento" value="<?php echo $vencimento; ?>" required></br>

    <label for="valor">Valor:</label>
    <input type="text" name="valor" value="<?php echo $valor; ?>" required></br>

    <button type="submit">Atualizar</button>

</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo_fatura = $_POST['titulo_fatura'];
    $fornecedor = $_POST['fornecedor'];
    $cnpj = $_POST['cnpj'];
    $venciemento = $_POST['vencimento'];
    $valor = $_POST['valor'];
    

    //Validação dos dados do formulário aqui
    $stmt = $pdo->prepare('UPDATE gestao_financeira SET titulo_fatura = ?, fornecedor = ?, cnpj = ?, vencimento = ?, valor = ? WHERE id = ?');
    $stmt->execute([$titulo_fatura, $fornecedor, $cnpj, $vencimento, $valor,$id]);
    header('Location: listagestaofinanceira.php');
    exit;
}