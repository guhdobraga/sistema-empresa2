<?php
require_once 'C:\xampp\htdocs\sistema-empresa\app\model\gestaoFModel.php';

class GestaoFController {
    private $gestaoFModel;

    public function __construct($pdo) {
        $this->gestaoFModel = new gestaoFModel($pdo);
    }

    public function criarGestaoFinanceira($titulo_fatura, $fornecedor, $cnpj, $vencimento, $valor) {
        $this->gestaoFModel->criarGestaoFinanceira($titulo_fatura, $fornecedor, $cnpj, $vencimento, $valor);
    }
    
    public function listarGestaoFinanceira() {
        return $this->gestaoFModel->listarGestaoFinanceira();
    }

    public function exibirListaGestaoFinanceira() {
        $gestoes = $this->gestaoFModel->listarGestaoFinanceira();
        include 'C:\xampp\htdocs\sistema-empresa\app\views\gestao_financeira\lista.php';
    }
    public function exibirListaGestaoFinanceiraC() {
        $gestoesc = $this->gestaoFModel->listarGestaoFinanceira();
        include 'C:\xampp\htdocs\sistema-empresa\app\views\gestao_financeira\listac.php';
    }

   
}
?>
