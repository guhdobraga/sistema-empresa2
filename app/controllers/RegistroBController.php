<?php
require_once 'C:\xampp\htdocs\sistema-empresa\app\model\RegistroBModel.php';

class RegistroBController {
    private $registroBModel;

    public function __construct($pdo) {
        $this->registroBModel = new RegistroBModel($pdo);
    }

    public function criarRegistroBeneficio($id_funcionario, $fundog, $vale_transporte, $ferias, $licença, $terceiro, $vale_alimento, $plano) {
        $this->registroBModel->criarRegistroBeneficio($id_funcionario, $fundog, $vale_transporte, $ferias, $licença, $terceiro, $vale_alimento, $plano);
    }
    
    public function listarBeneficio() {
        return $this->registroBModel->listarBeneficio();
    }

    public function exibirListaBeneficio() {
        $beneficios = $this->registroBModel->listarBeneficio();
        include 'C:\xampp\htdocs\sistema-empresa\app\views\func\lista.php';
    }

   
}
?>
