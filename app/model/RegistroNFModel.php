<?php

class RegistroNFModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para criar um registro de compra
    public function criarRegistroNF($nome, $numero) {

        $sql = "INSERT INTO notas_fiscais (nome, numero) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $numero]);

    }
    
    // Método para listar registros de compras
    public function listarNF() {
        $sql = "SELECT * FROM notas_fiscais";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}