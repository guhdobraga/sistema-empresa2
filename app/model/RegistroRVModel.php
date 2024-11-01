<?php

class RegistroRVModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para criar um registro de compra
    public function criarRegistroVendas($placa, $inform, $numfiscal, $data, $valor, $nomev, $comissao, $duracao, $cobertura, $termos, $seguro, $texto_seguro, $planomenu, $texto_plano, $nenhum, $status, $datav, $pagamento, $nomtitular, $numcartao, $mes, $anoc, $codigo, $parcelas, $depositar, $valortotal, $imagem) {
        $sql = "INSERT INTO registro_vendas (placa, inform, numfiscal, data, valor, nomev, comissao, duracao, cobertura, termos, seguro, texto_seguro, planomenu, texto_plano, nenhum, status, datav, pagamento, nomtitular, numcartao, mes, anoc, codigo, parcelas, depositar, valortotal, imagem) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$placa, $inform, $numfiscal, $data, $valor, $nomev, $comissao, $duracao, $cobertura, $termos, $seguro, $texto_seguro, $planomenu, $texto_plano, $nenhum, $status, $datav, $pagamento, $nomtitular, $numcartao, $mes, $anoc, $codigo, $parcelas, $depositar, $valortotal, $imagem]);
    }
    
    // Método para listar registros de compras
    public function listarVendas() {
        $sql = "SELECT * FROM registro_vendas";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}