<?php
require_once '../config/config.php';
require_once '../app/controllers/RegistroEController.php';

$controller = new RegistroEController($pdo); // Substitua $pdo pela sua conexão PDO

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos obrigatórios estão preenchidos
    if (!empty($_POST['cnpj']) && !empty($_POST['optante']) && !empty($_POST['empregados']) && !empty($_POST['sistema']) && !empty($_POST['ponte']) && !empty($_POST['ativ']) && !empty($_POST['site']) && !empty($_POST['cep']) && !empty($_POST['ender']) && !empty($_POST['num']) && !empty($_POST['bairro']) && !empty($_POST['municipio']) && !empty($_POST['usuario']) && !empty($_POST['nome']) && !empty($_POST['zap']) && !empty($_POST['email']) && !empty($_POST['confemail'])) {
        $cnpj = $_POST['cnpj'];
        $optante = $_POST['optante'];
        $empregados = $_POST['empregados'];
        $sistema = $_POST['sistema'];
        $ponte = $_POST['ponte'];
        $ativ = $_POST['ativ'];
        $site = $_POST['site'];
        $cep = $_POST['cep'];
        $ender = $_POST['ender'];
        $num = $_POST['num'];
        $comp = $_POST['comp'];
        $bairro = $_POST['bairro'];
        $municipio = $_POST['municipio'];
        $usuario = $_POST['usuario'];
        $nome = $_POST['nome'];
        $zap = $_POST['zap'];
        $email = $_POST['email'];
        $confemail = $_POST['confemail'];

        // Verifica se os emails são iguais
        if ($email !== $confemail) {
            echo "Os emails não correspondem. Por favor, verifique.";
        } else {
            $controller->criarRegistro($cnpj, $optante, $empregados, $sistema, $ponte, $ativ, $site, $cep, $ender, $num, $comp, $bairro, $municipio, $usuario, $nome, $zap, $email); 
            
            header("Location: login.php");
            exit();
        }
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
    <title>Document</title>
</head>
<body>
    <form method="post">

    <label for="cnpj">CNPJ:</label>
        <input type="text" name="cnpj" required><br>

        <label for="optante">Optante pelo simples?</label>
        <select name="optante" required>
            <option value="" selected disabled></option>
            <option value="s">Sim</option>
            <option value="n">Não</option>
        </select><br>

        <label for="empregados">Empregados:</label>
        <input type="text" name="empregados"><br>

        <label for="sistema">O sistema será empregado por quantas pessoas?</label>
        <input type="text" name="sistema"><br>

        <label for="ponte">Ponte Fiscal:</label>
        <input type="text" name="ponte"><br>

        <label for="ativ">Principal Atividade:</label>
        <input type="text" name="ativ"><br>

        <label for="site">Site:</label>
        <input type="text" name="site"><br>

        <label for="cep">CEP:</label>
        <input type="text" name="cep"><br>

        <label for="ender">Endereço:</label>
        <input type="text" name="ender"><br>

        <label for="num">Número:</label>
        <input type="number" name="num"><br>

        <label for="comp">Complemento:</label>
        <input type="text" name="comp"><br>

        <label for="bairro">Bairro:</label>
        <input type="text" name="bairro"><br>

        <label for="municipio">Município:</label>
        <input type="text" name="municipio"><br>

        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario"><br>

        <label for="nome">Seu Nome:</label>
        <input type="text" name="nome"><br>
        
        <label for="zap">Whatsapp:</label>
        <input type="text" name="zap"><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email"><br>

        <label for="confemail">Confirme seu E-mail:</label>
        <input type="email" name="confemail"><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>