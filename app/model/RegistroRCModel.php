<?php

class RegistroRCModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para criar um registro de compra
    public function criarRegistroCompra($nome, $cpf, $endereco, $email, $telefone, $modelo, $ano, $placa, $inform, $estoque, $pagamento, $nomtitular, $numcartao, $mes, $anoc, $codigo, $parcelas, $depositar, $valortotal, $imagem, $cor, $quilometragem, $combustivel) {

        $sql = "INSERT INTO registro_compras (nome, cpf, endereco, email, telefone, modelo, ano, placa, inform, estoque, pagamento, nomtitular, numcartao, mes, anoc, codigo, parcelas, depositar, valortotal, imagem, cor, quilometragem, combustivel) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $cpf, $endereco, $email, $telefone, $modelo, $ano, $placa, $inform, $estoque, $pagamento, $nomtitular, $numcartao, $mes, $anoc, $codigo, $parcelas, $depositar, $valortotal, $imagem, $cor, $quilometragem, $combustivel]);

    }
    
    // Método para listar registros de compras
    public function listarCompra() {
        $sql = "SELECT * FROM registro_compras";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}