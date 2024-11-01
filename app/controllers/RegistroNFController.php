<?php
require_once 'C:\xampp\htdocs\sistema-empresa\app\model\RegistroNFModel.php';

class RegistroNFController {
    private $registroNFModel;

    public function __construct($pdo) {
        $this->registroNFModel = new RegistroNFModel($pdo);
    }

    public function criarRegistroNF($nome, $numero) {
        $this->registroNFModel->criarRegistroNF($nome, $numero);
    }
    
    public function listarNF() {
        return $this->registroNFModel->listarNF();
    }

    public function exibirListaNF() {
        $notasfiscais = $this->registroNFModel->listarNF();
        include 'C:\xampp\htdocs\sistema-empresa\app\views\notas\lista.php';
    }

   
}
?>
