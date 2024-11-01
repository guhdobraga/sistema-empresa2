<?php
include_once '../config/config.php';
if (!isset($_GET['id'])) {
    header('Location: listaestoqueinterno.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM estoque_interno WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: listaestoqueinterno.php');
    exit;   
}
$nome = $appointment['nome'];
$qntd = $appointment['quantidade'];
$fornecedor = $appointment['fornecedor'];
$lote = $appointment['lote'];
$marca = $appointment['marca'];
$validade = $appointment['validade'];

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
    <script type="text/javascript">
        function confirmDelete(event, id) {
            event.preventDefault();
            var modal = document.getElementById('confirmModal');
            var confirmBtn = document.getElementById('confirmBtn');
            confirmBtn.setAttribute('data-id', id); // Set the ID on the button as a data attribute
            modal.style.display = 'block';
            confirmBtn.onclick = function() {
                window.location.href = '../app/controllers/deletarestoqueinterno.php?id=' + id;
            }
        }

        function closeModal() {
            var modal = document.getElementById('confirmModal');
            modal.style.display = 'none';
        }

        window.onclick = function(event) {
            var modal = document.getElementById('confirmModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</head>
<body>
<form method="post">
<label for="nome">Nome:</label>
    <input type="text" name="nome" value="<?php echo $nome; ?>" required></br>

    <label for="qntd">Quantidade:</label>
    <input type="text" name="qntd" value="<?php echo $qntd; ?>" required></br>

    <label for="fornecedor">fornecedor:</label>
    <input type="text" name="fornecedor" value="<?php echo $fornecedor; ?>" required></br>

    <label for="lote">Lote:</label>
    <input type="text" name="lote" value="<?php echo $lote; ?>" required></br>

    <label for="marca">marca:</label>
    <input type="text" name="marca" value="<?php echo $marca; ?>" required></br>

    <label for="validade">Validade:</label>
    <input type="text" name="validade" value="<?php echo $validade; ?>" required></br>

    <button type="submit">Atualizar</button>

    <a class= "lixo" id= "delete" href="#" onclick="confirmDelete(event, '<?php echo htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'); ?>')"><img src="<?php echo '../public/resources/assets/img/lixeira.png' ?>" width="30px" height= "30px"></a>
</form>
<!-- Modal de confirmação -->
<div id="confirmModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">DriveX</div>
        <p>Você tem certeza que deseja deletar este item?</p>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeModal()">Cancelar</button>
            <button class="btn-confirm" id="confirmBtn">Confirmar</button>
        </div>
    </div>
</div>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    

    //Validação dos dados do formulário aqui
    $stmt = $pdo->prepare('UPDATE estoque_interno SET nome = ?, numero = ? WHERE id = ?');
    $stmt->execute([$id, $nome, $qntd, $fornecedor, $lote, $marca, $validade]);
    header('Location: listaestoqueinterno.php');
    exit;
}