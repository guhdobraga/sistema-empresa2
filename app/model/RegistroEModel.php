<?php
class RegistroEModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarRegistro($id, $cnpj, $optante, $empregados, $sistema, $ponte, $ativ, $site, $cep, $ender, $num, $comp, $bairro, $municipio, $usuario, $nome, $zap, $email, $nome_imagem) {
        $sql = "INSERT INTO registro_empresa (id, cnpj, optante, empregados, sistema, ponte, atividade, site, cep, endereco, numero, complemento, bairro, municipio, usuario, nome, whatsapp, email, nome_imagem) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id, $cnpj, $optante, $empregados, $sistema, $ponte, $ativ, $site, $cep, $ender, $num, $comp, $bairro, $municipio, $usuario, $nome, $zap, $email, $nome_imagem]);
    }
}
?>