<?php
require_once 'C:\xampp\htdocs\sistema-empresa\app\model\RegistroFrotaModel.php';

class RegistroFrotaController {
    private $registroFrotaModel;

    public function __construct($pdo) {
        $this->registroFrotaModel = new RegistroFrotaModel($pdo);
    }

    public function criarRegistroFrota($marca, $placa, $ano, $tipo) {
        $this->registroFrotaModel->criarRegistroFrota($marca, $placa, $ano, $tipo);
    }
    
    public function listarFrota() {
        return $this->registroFrotaModel->listarFrota();
    }

    public function exibirListaFrota() {
        $veiculos = $this->registroFrotaModel->listarFrota();
        include 'C:\xampp\htdocs\sistema-empresa\app\views\frota\lista.php';
    }

    public function exibirListaFrotaC() {
        $veiculosC = $this->registroFrotaModel->listarFrota();
        include 'C:\xampp\htdocs\sistema-empresa\app\views\frota\listac.php';
    }
   
}
?>
