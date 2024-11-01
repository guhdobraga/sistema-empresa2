<?php
// Inclua o arquivo de configuração que contém a conexão com o banco de dados
require_once '../config/config.php';

// Verifique se a requisição foi feita através do método GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Obtenha o ID do funcionário da requisição GET
    $funcionarioId = isset($_GET['id']) ? $_GET['id'] : null;

    if (!$funcionarioId) {
        // Se o ID do funcionário não foi fornecido, retorne um erro
        header('HTTP/1.1 400 Bad Request');
        echo json_encode(array('error' => 'ID do funcionário não fornecido'));
        exit;
    }

    try {
        // Prepara e executa a query para obter os benefícios do funcionário do banco de dados
        $stmt = $pdo->prepare("SELECT fundog, vale_transporte, ferias, licença, terceiro, vale_alimento, plano FROM beneficios_empresa WHERE id_funcionario = :funcionarioId");
        $stmt->bindParam(':funcionarioId', $funcionarioId, PDO::PARAM_INT);
        $stmt->execute();

        // Obtém os resultados da consulta como um array associativo
        $beneficios = $stmt->fetch(PDO::FETCH_ASSOC);

        // Retorna os benefícios como resposta JSON
        header('Content-Type: application/json');
        echo json_encode($beneficios);
    } catch (PDOException $e) {
        // Se ocorrer um erro na consulta, retorne um erro
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(array('error' => 'Erro ao obter os benefícios: ' . $e->getMessage()));
    }

    // Fecha a conexão com o banco de dados (se necessário)
    $pdo = null; // Você pode optar por fechar a conexão, dependendo da sua configuração
} else {
    // Se a requisição não for via GET, retorne um erro
    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode(array('error' => 'Método não permitido'));
    exit;
}
?>
