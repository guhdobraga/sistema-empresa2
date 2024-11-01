<?php
session_start();
include_once '../../config/config.php';

if (!isset($_GET['id'])) {
    header('Location: ../../gf/listafaturas.php');
    exit;
}

$id = $_GET['id'];
if (isset($_SESSION['usuarioNiveisAcessoId'])) {
    // Use uma estrutura condicional para redirecionar com base no nível de acesso do usuário
    switch ($_SESSION['usuarioNiveisAcessoId']) {
        case "1":
            $stmt = $pdo->prepare('DELETE FROM gestao_financeira WHERE id = ?');
            $stmt->execute([$id]);
            header('Location: ../../adm/listafaturas.php');
            break;
        case "5":
            $stmt = $pdo->prepare('DELETE FROM gestao_financeira WHERE id = ?');
            $stmt->execute([$id]);
            header('Location: ../../adm/gf/listafaturas.php');
            break;
        }
    };
?>
