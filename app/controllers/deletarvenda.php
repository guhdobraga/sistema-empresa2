<?php
include_once '../../config/config.php';
session_start();
if (!isset($_GET['id'])) {
    header('Location: ../../cf/listavendas.php');
    exit;
}

$id = $_GET['id'];
if (isset($_SESSION['usuarioNiveisAcessoId'])) {
    // Use uma estrutura condicional para redirecionar com base no nível de acesso do usuário
    switch ($_SESSION['usuarioNiveisAcessoId']) {
        case "1":
            $stmt = $pdo->prepare('DELETE FROM registro_vendas WHERE id = ?');
            $stmt->execute([$id]);
            header('Location: ../../adm/listavendas.php');
            break;
        case "3":
            $stmt = $pdo->prepare('DELETE FROM registro_vendas WHERE id = ?');
            $stmt->execute([$id]);
            header('Location: ../../adm/cf/listavendas.php');
            break;
        }
    };
// Prepare and execute the delete statement

?>
