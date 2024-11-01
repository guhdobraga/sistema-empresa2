<?php
class EstoqueIModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarEstoqueInterno( $nome, $qntd, $fornecedor, $lote, $lugar, $validade) {
        $sql = "INSERT INTO estoque_interno ( nome, qntd, fornecedor, lote, lugar, validade) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([ $nome, $qntd, $fornecedor, $lote, $lugar, $validade]);
    }
    
    // Model para listar Estoque Interno
    public function listarEstoque() {
        $sql = "SELECT * FROM estoque_interno";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
}
?>

