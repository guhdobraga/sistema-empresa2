<?php
include_once '../../config/config.php';
session_start();
if (!isset($_GET['id'])) {
    header('Location: ../../ce/lista-produtos.php');
    exit;
}

$id = $_GET['id'];
if (isset($_SESSION['usuarioNiveisAcessoId'])) {
    // Use uma estrutura condicional para redirecionar com base no nível de acesso do usuário
    switch ($_SESSION['usuarioNiveisAcessoId']) {
        case "1":
            $stmt = $pdo->prepare('DELETE FROM estoque_interno WHERE id = ?');
            $stmt->execute([$id]);
            header('Location: ../../adm/lista-produtos.php');
            break;
        case "4":
            $stmt = $pdo->prepare('DELETE FROM estoque_interno WHERE id = ?');
            $stmt->execute([$id]);
            header('Location: ../../adm/ce/lista-produtos.php');
            break;
        }
    };
?>
