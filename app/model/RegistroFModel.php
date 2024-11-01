<?php
class RegistroFModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarRegistroFuncionario($id_funcionario, $titulo, $pnome, $sobrenome, $genero, $senha, $endereco, $cep, $cpf, $municipio, $pais, $estado, $telefone, $celular, $email,  $cargo, $datanascimento) {
        $sql = "INSERT INTO novos_funcionarios (id_funcionario, titulo, pnome, sobrenome, genero, senha, endereco, cep, cpf, municipio, pais, estado, telefone, celular, email, cargo, datanascimento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_funcionario, $titulo, $pnome, $sobrenome, $genero, $senha, $endereco, $cep, $cpf, $municipio, $pais, $estado, $telefone, $celular, $email,  $cargo, $datanascimento]);
    }
    
    // Model para listar Users
    public function listarFuncionario() {
        $sql = "SELECT * FROM novos_funcionarios";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
}
?>

