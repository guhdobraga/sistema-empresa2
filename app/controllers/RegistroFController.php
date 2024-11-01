<?php
require_once 'C:\xampp\htdocs\sistema-empresa\app\model\RegistroFModel.php';

class RegistroFController {
    private $registroFModel;

    public function __construct($pdo) {
        $this->registroFModel = new RegistroFModel($pdo);
    }

    public function criarRegistroFuncionario($titulo, $pnome, $sobrenome, $genero, $senha, $endereco, $cep, $cpf, $municipio, $pais, $estado, $telefone, $celular, $email, $cargo, $datanascimento) {
        $this->registroFModel->criarRegistroFuncionario(null, $titulo, $pnome, $sobrenome, $genero, $senha, $endereco, $cep, $cpf, $municipio, $pais, $estado, $telefone, $celular, $email, $cargo, $datanascimento);
    }
    
    public function listarFuncionario() {
        return $this->registroFModel->listarFuncionario();
    }

    public function exibirListaFuncionario() {
        $funcionarios = $this->registroFModel->listarFuncionario();
        include 'C:\xampp\htdocs\sistema-empresa\app\views\func\lista.php';
    }

   
}
?>
