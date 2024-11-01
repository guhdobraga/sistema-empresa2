<?php
require_once '../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $beneficioId = $_POST['beneficioId'];
    $isChecked = $_POST['isChecked'];
    $funcionarioId = $_POST['funcionarioId'];

    // Mapear o ID do benefício para o nome do campo correspondente no banco de dados
    $campoBeneficio = '';
    switch ($beneficioId) {
        case 'fundog':
            $campoBeneficio = 'fundog';
            break;
        case 'vale_transporte':
            $campoBeneficio = 'vale_transporte';
            break;
        case 'ferias':
            $campoBeneficio = 'ferias';
            break;
        case 'licença':
            $campoBeneficio = 'licença';
            break;
        case 'terceiro':
            $campoBeneficio = 'terceiro';
            break;
        case 'vale_alimento':
            $campoBeneficio = 'vale_alimento';
            break;
        case 'plano':
            $campoBeneficio = 'plano';
            break;
        default:
            // Benefício não reconhecido
            header('HTTP/1.1 400 Bad Request');
            echo 'Benefício inválido';
            exit;
    }

    try {
        // Preparar a query de atualização
        $stmt = $pdo->prepare("UPDATE beneficios_empresa SET $campoBeneficio = :isChecked WHERE id_funcionario = :funcionarioId");
        $stmt->bindParam(':isChecked', $isChecked, PDO::PARAM_STR);
        $stmt->bindParam(':funcionarioId', $funcionarioId, PDO::PARAM_INT);
        $stmt->execute();

        // Responder com sucesso
        $response = array('status' => 'success', 'message' => 'Benefício atualizado com sucesso!');
        echo json_encode($response);
    } catch (PDOException $e) {
        // Responder com erro
        $response = array('status' => 'error', 'message' => 'Erro ao atualizar o benefício: ' . $e->getMessage());
        echo json_encode($response);
    }

    // Fechar a conexão com o banco de dados (se necessário)
    $pdo = null;
} else {
    // Método não permitido
    header('HTTP/1.1 405 Method Not Allowed');
    echo 'Método não permitido';
    exit;
}
?>
