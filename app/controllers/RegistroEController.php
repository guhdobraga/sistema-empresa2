<?php
require_once 'C:\xampp\htdocs\sistema-empresa\app\model\RegistroEModel.php';

class RegistroEController {
    private $registroEModel;

    public function __construct($pdo) {
        $this->registroEModel = new RegistroEModel($pdo);
    }

    public function criarRegistro($cnpj, $optante, $empregados, $sistema, $ponte, $ativ, $site, $cep, $ender, $num, $comp, $bairro, $municipio, $usuario, $nome, $zap, $email, $nome_imagem) {
        $this->registroEModel->criarRegistro(null, $cnpj, $optante, $empregados, $sistema, $ponte, $ativ, $site, $cep, $ender, $num, $comp, $bairro, $municipio, $usuario, $nome, $zap, $email, $nome_imagem);
    }
}
?>
