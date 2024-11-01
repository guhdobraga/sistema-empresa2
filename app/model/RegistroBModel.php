<?php
class RegistroBModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarRegistroBeneficio($id_funcionario, $fundog, $vale_transporte, $ferias, $licença, $terceiro, $vale_alimento, $plano) {
        $sql = "INSERT INTO beneficios_empresa (id_funcionario, fundog, vale_transporte, ferias, licença, terceiro, vale_alimento, plano) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_funcionario, $fundog, $vale_transporte, $ferias, $licença, $terceiro, $vale_alimento, $plano]);
    }
    
    // Model para listar Users
    public function listarBeneficio() {
        $sql = "SELECT * FROM beneficios_empresa";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
}
?>

