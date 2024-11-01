<?php
require_once '../config/config.php';
require_once '../app/controllers/RegistroFController.php';
require_once '../app/controllers/RegistroBController.php';

$controller = new RegistroFController($pdo); // Substitua $pdo pela sua conexão PDO
$controllerb = new RegistroBController($pdo); // Substitua $pdo pela sua conexão PDO

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos obrigatórios estão preenchidos
    if (!empty($_POST['titulo']) && !empty($_POST['pnome']) && !empty($_POST['sobrenome']) && !empty($_POST['genero']) && !empty($_POST['senha']) && !empty($_POST['endereco']) && !empty($_POST['cep']) && !empty($_POST['cpf']) && !empty($_POST['municipio']) && !empty($_POST['pais']) && !empty($_POST['estado']) && !empty($_POST['celular']) && !empty($_POST['email']) && !empty($_POST['cargo']) && !empty($_POST['datanascimento'])) {
        $titulo = $_POST['titulo'];
        $pnome = $_POST['pnome'];
        $sobrenome = $_POST['sobrenome'];
        $genero = $_POST['genero'];
        $senha = $_POST['senha'];
        $endereco = $_POST['endereco'];
        $cep = $_POST['cep'];
        $cpf = $_POST['cpf'];
        $municipio = $_POST['municipio'];
        $pais = $_POST['pais'];
        $estado = $_POST['estado'];
        $telefone = $_POST['telefone'];
        $celular = $_POST['celular'];
        $email = $_POST['email'];
        $cargo = $_POST['cargo'];
        $datanascimento = $_POST['datanascimento'];
        $fundog = 0;
        $vale_transporte = 0;
        $ferias = 0;
        $licença = 0;
        $terceiro = 0;
        $vale_alimento = 0;
        $plano = 0;


        $controller->criarRegistroFuncionario($titulo, $pnome, $sobrenome, $genero, $senha, $endereco, $cep, $cpf, $municipio, $pais, $estado, $telefone, $celular, $email, $cargo, $datanascimento); 
       
        $idNovoFuncionario = $pdo->lastInsertId();
        
        $controllerb->criarRegistroBeneficio($idNovoFuncionario, $fundog, $vale_transporte, $ferias, $licença, $terceiro, $vale_alimento, $plano);
        // Inserir os mesmos dados na tabela login_empresa
        $sqlLoginEmpresa = "INSERT INTO login_empresa (cargo, id, email, senha) VALUES (?, ?, ?, ?)";
        $stmtLoginEmpresa = $pdo->prepare($sqlLoginEmpresa);
        $stmtLoginEmpresa->execute([$cargo, $idNovoFuncionario, $email, $senha]);
    } else {
        echo "Todos os campos obrigatórios devem ser preenchidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Novos Funcionários</title>
</head>
<body>
<form method="post">

<label for="titulo">Título:</label>
<select name="titulo" required>
            <option value="" selected disabled></option>
            <option value="sr">Sr.</option>
            <option value="sra">Sra.</option>
            <option value="srta">Srta.</option>
            <option value="me">Me.</option>
            <option value="dr">Dr.</option>
        </select><br>

        <label for="pnome">Primeiro Nome:</label>
        <input type="text" name="pnome"><br>

        <label for="sobrenome">Sobrenome:</label>
        <input type="text" name="sobrenome"><br>

        <label for="genero">Gênero:</label>
<select name="genero" required>
    <option value="" selected disabled></option>
    <option value="masculino">Masculino</option>
    <option value="feminino">Feminino</option>
    <option value="outro">Outro</option>
</select><br>

<label for="senha">Senha de Acesso:</label>
<input type="password" name="senha" required><br>

<label for="endereco">Endereço:</label>
<input type="text" name="endereco"><br>

<label for="cep">CEP:</label>
<input type="number" name="cep"><br>

<label for="cpf">CPF:</label>
<input type="number" name="cpf"><br>

<label for="municipio">Município:</label>
<input type="text" name="municipio"><br>

<label for="pais">País:</label>
<input type="text" name="pais"><br>

<label for="estado">Estado:</label>
<input type="text" name="estado"><br>

<label for="telefone">Telefone:</label>
<input type="number" name="telefone"><br>

<label for="celular">Celular:</label>
<input type="number" name="celular"><br>

<label for="email">E-mail:</label>
<input type="email" name="email"><br>

<label for="assinatura">Assinatura(Tirar Foto no papel):</label>
<input type="file" id="assinatura" name="assinatura" class="input-file"><br>

<label for="cargo">Cargo:</label>
<select name="cargo" required><br>
<option value="" selected disabled></option>
            <option value="1">Administrador</option>
            <option value="2">Gestor de RH</option>
            <option value="3">Gestor de Controle Fiscal</option>
            <option value="4">Gestor de Estoque</option>
            <option value="5">Gestor de Finanças</option>
            <option value="6">Colaborador</option>
        </select><br>

<label for="datanasc">Data de Nascimento:</label>
<input type="date" name="datanascimento"><br>

<input type="submit" value="Enviar">
</form>

</body>
</html>