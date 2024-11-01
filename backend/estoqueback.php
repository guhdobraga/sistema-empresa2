<?php
include_once '../config/config.php';
if (!isset($_GET['id'])) {
    header('Location: listaestoqueback.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM registro_compras WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: listaestoqueback.php');
    exit;   
}
$modelo = $appointment['modelo'];
$ano = $appointment['ano'];
$cor = $appointment['cor'];
$quilometragem = $appointment['quilometragem'];   
$combustivel = $appointment['combustivel'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controe</title>
</head>
<body>
<form method="post">
<label for="modelo">Modelo:</label>
    <input type="text" name="modelo" value="<?php echo $modelo; ?>" required></br>

    <label for="ano">Ano:</label>
    <input type="number" name="ano" value="<?php echo $ano; ?>" required></br>

    <label for="cor">Cor:</label>
    <input type="text" name="cor" value="<?php echo $cor; ?>" required></br>

    <label for="quilometragem">Quilometragem:</label>
    <input type="text" name="quilometragem" value="<?php echo $quilometragem; ?>" required></br>

    <label for="combustivel">Combustível:</label>
    <input type="text" name="combustivel" value="<?php echo $combustivel; ?>" required></br>

    <button type="submit">Atualizar</button>
</form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];
    $quilometragem = $_POST['quilometragem'];
    $combustivel = $_POST['combustivel'];

    //Validação dos dados do formulário aqui
    $stmt = $pdo->prepare('UPDATE registro_compras SET modelo = ?, ano = ?, cor = ?, quilometragem = ?, combustivel = ? WHERE id = ?');
    $stmt->execute([$modelo, $ano, $cor, $quilometragem, $combustivel, $id]);
    header('Location: listaestoqueback.php');
    exit;
}