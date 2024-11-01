<?php
session_start();
include_once '../../config/config.php';

if (!isset($_GET['id'])) {
    header('Location: ../../cf/listacompras.php');
    exit;
}

$id = $_GET['id'];
if (isset($_SESSION['usuarioNiveisAcessoId'])) {
    // Use uma estrutura condicional para redirecionar com base no nível de acesso do usuário
    switch ($_SESSION['usuarioNiveisAcessoId']) {
        case "1":
            $stmt = $pdo->prepare('DELETE FROM registro_compras WHERE id = ?');
            $stmt->execute([$id]);
            header('Location: ../../adm/listacompras.php');
            break;
        case "3":
            $stmt = $pdo->prepare('DELETE FROM registro_compras WHERE id = ?');
            $stmt->execute([$id]);
            header('Location: ../../adm/cf/listacompras.php');
            break;
        }
    };

?>
