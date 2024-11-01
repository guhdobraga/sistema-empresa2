<?php
include_once '../../config/config.php';
session_start(); // Inicia a sessão


if (!isset($_GET['id'])) {
    header('Location: ../../cf/listaemissao.php');
    exit;
}
$id = $_GET['id'];

if (isset($_SESSION['usuarioNiveisAcessoId'])) {
    // Use uma estrutura condicional para redirecionar com base no nível de acesso do usuário
    switch ($_SESSION['usuarioNiveisAcessoId']) {
        case "1":
            $stmt = $pdo->prepare('DELETE FROM notas_fiscais WHERE id = ?');
            $stmt->execute([$id]);
            header('Location: ../../adm/listaemissao.php');
            break;
        case "3":
            $stmt = $pdo->prepare('DELETE FROM notas_fiscais WHERE id = ?');
            $stmt->execute([$id]);
            header('Location: ../../adm/cf/listaemissao.php');
            break;
        }
    };


// Prepare and execute the delete statement

?>
