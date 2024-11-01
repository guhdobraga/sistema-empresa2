<?php
session_start();
include_once '../../config/config.php';

if (!isset($_GET['id'])) {
    header('Location: ../../ce/listafrota.php');
    exit;
}

$id = $_GET['id'];
if (isset($_SESSION['usuarioNiveisAcessoId'])) {
    // Use uma estrutura condicional para redirecionar com base no nível de acesso do usuário
    switch ($_SESSION['usuarioNiveisAcessoId']) {
        case "1":
            $stmt = $pdo->prepare('DELETE FROM frota_veiculos WHERE id = ?');
            $stmt->execute([$id]);
            header('Location: ../../adm/listafrota.php');
            break;
        case "4":
            $stmt = $pdo->prepare('DELETE FROM frota_veiculos WHERE id = ?');
            $stmt->execute([$id]);
            header('Location: ../../adm/ce/listafrota.php');
            break;
        }
    };

?>
