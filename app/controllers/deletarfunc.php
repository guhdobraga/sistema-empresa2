<?php
session_start();
include_once '../../config/config.php';

if (!isset($_GET['id'])) {
    header('Location: ../../rh/lista-funcionarios.php');
    exit;
}

$id = $_GET['id'];
if (isset($_SESSION['usuarioNiveisAcessoId'])) {
    // Use uma estrutura condicional para redirecionar com base no nível de acesso do usuário
    switch ($_SESSION['usuarioNiveisAcessoId']) {
        case "1":
            $stmt = $pdo->prepare('DELETE FROM novos_funcionarios WHERE id_funcionario = ?');
            $stmt->execute([$id]);
            $stmt2 = $pdo->prepare('DELETE FROM login_empresa WHERE id = ?');
            $stmt2->execute([$id]);
            header('Location: ../../adm/lista-funcionarios.php');
            break;
        case "2":
            $stmt = $pdo->prepare('DELETE FROM novos_funcionarios WHERE id_funcionario = ?');
            $stmt->execute([$id]);
            $stmt2 = $pdo->prepare('DELETE FROM login_empresa WHERE id = ?');
            $stmt2->execute([$id]);
            header('Location: ../../adm/rh/lista-funcionarios.php');
            break;
        }
    };

?>
