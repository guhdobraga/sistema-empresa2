<?php
class gestaoFModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarGestaoFinanceira($titulo_fatura, $fornecedor, $cnpj, $vencimento, $valor) {
        $sql = "INSERT INTO gestao_financeira (titulo_fatura, fornecedor, cnpj, vencimento, valor) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$titulo_fatura, $fornecedor, $cnpj, $vencimento, $valor]);
    }
    
    // Model para listar Users
    public function listarGestaoFinanceira() {
        $sql = "SELECT * FROM gestao_financeira";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
}
?>

