<?php

class RegistroFrotaModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para criar um registro de compra
    public function criarRegistroFrota($marca, $placa, $ano, $tipo) {

        $sql = "INSERT INTO frota_veiculos (marca, placa, ano, tipo) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$marca, $placa, $ano, $tipo]);

    }
    
    // Método para listar registros de compras
    public function listarFrota() {
        $sql = "SELECT * FROM frota_veiculos";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}