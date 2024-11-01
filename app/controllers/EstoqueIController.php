<?php
require_once 'C:\xampp\htdocs\sistema-empresa\app\model\EstoqueIModel.php';

class EstoqueIController {
    private $estoqueIModel;

    public function __construct($pdo) {
        $this->estoqueIModel = new EstoqueIModel($pdo);
    }

    public function criarEstoqueInterno( $nome, $qntd, $fornecedor, $lote, $lugar, $validade) {
        $this->estoqueIModel->criarEstoqueInterno( $nome, $qntd, $fornecedor, $lote, $lugar, $validade);
    }
    
    public function listarEstoque() {
        return $this->estoqueIModel->listarEstoque();
    }

    public function exibirListaEstoque() {
        $estoques = $this->estoqueIModel->listarEstoque();
        include 'C:\xampp\htdocs\sistema-empresa\app\views\estoque_int\lista.php';
    }
    public function exibirListaEstoqueC() {
        $estoquesc= $this->estoqueIModel->listarEstoque();
        include 'C:\xampp\htdocs\sistema-empresa\app\views\estoque_int\listac.php';
    }

   
}
?>
