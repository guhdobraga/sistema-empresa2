<?php
require_once 'config/config.php';
require_once 'app/controllers/RegistroEController.php';

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

        if (!empty($_FILES['imagem']['name'])) {
          $imagem_nome = $_FILES['imagem']['name'];
          $imagem_tmp = $_FILES['imagem']['tmp_name'];
          $imagem_extensao = pathinfo($imagem_nome, PATHINFO_EXTENSION);
          
          // Gera um nome único para a imagem usando o id da empresa
          $nome_imagem = $_POST['cnpj'] . '.' . $imagem_extensao; // Substitua $id_empresa pelo id da empresa
          
          // Move a imagem para a pasta de destino
          $caminho_destino = 'public/uploads/' . $nome_imagem; // Substitua pelo caminho da pasta desejada
          move_uploaded_file($imagem_tmp, $caminho_destino);
        } else {
          // Define um nome de imagem padrão caso nenhuma imagem tenha sido enviada
          $nome_imagem = 'sem_imagem.jpg'; // Substitua pelo nome padrão desejado
        }
        // Verifica se os emails são iguais
        if ($email !== $confemail) {
            echo "Os emails não correspondem. Por favor, verifique.";
        } else {
            $controller->criarRegistro($cnpj, $optante, $empregados, $sistema, $ponte, $ativ, $site, $cep, $ender, $num, $comp, $bairro, $municipio, $usuario, $nome, $zap, $email, $nome_imagem); 

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
    <link rel="stylesheet" href="public/resources/css/registro.css">
    <link rel="shortcut icon" href="public/resources/ico/icon.jpeg" type="image/png">
    <title>Drivex | Sign Up</title>
</head>
<body>
  <div class="main-logo">
    <div class="esq">
    <img src="public/resources/assets/img/logo-2.png">  
    </div>
    <div class="dir">
      <img src="public/resources/assets/img/logo.png.png">  
    </div>
  </div>

<section class="center">
<div class="empresa">
    <p>Dados da Empresa</p>
</div>

</br></br>

<div class="table">
  <div class="row">
    <form method="post" enctype="multipart/form-data" id="meu-formulario">
    <div class="cell label"><label for="cnpj">CNPJ:</label></div>
    <div class="cell input"><input type="number" id="cnpj" name="cnpj" class="input" style="width: 15vw;"></div>
  </div>
  <div class="row">
    <div class="cell label"><label for="optante">Optante pelo Simples:</label></div>
    <div class="cell input">
        <select id="optante" name="optante" class="select-input">
        <option value="" selected disabled></option>
            <option value="sim">Sim</option>
            <option value="nao">Não</option>
        </select>
    </div>
</div>
  <div class="row">
    <div class="cell label"><label for="empregados">Empregados:</label></div>
    <div class="cell input"><input type="text" id="empregados" name="empregados" class="input"></div>
  </div>
  <div class="row">
    <div class="cell label"><label for="empregados-quantidade">O sistema será empregado por quantas pessoas:</label></div>
    <div class="cell input"><input type="text" id="empregados-quantidade" name="sistema" class="input"></div>
  </div>
  <div class="row">
    <div class="cell label"><label for="ponte_fiscal">Ponte Fiscal:</label></div>
    <div class="cell input"><input type="text" id="ponte_fiscal" name="ponte" class="input"></div>
  </div>
  <div class="row">
    <div class="cell label"><label for="atividade">Principal Atividade:</label></div>
    <div class="cell input"><input type="text" id="atividade" name="ativ" class="input"></div>
  </div>
  <div class="row">
    <div class="cell label"><label for="site">Site:</label></div>
    <div class="cell input"><input type="text" id="site" name="site" class="input"></div>
  </div>
  <div class="row">
    <div class="cell label"><label for="imagem">Adicione sua imagem/logo:</label></div>
    <div class="cell input">
        <input type="file" id="imagem" name="imagem" class="input-file">
    </div>
</div>
</div>

</br></br>

<div class="empresa">
    <p>Endereço</p>
</div>

</br></br>

<div class="table">
<div class="row">
    <div class="cell label"><label for="cep">CEP:</label></div>
    <div class="cell input"><input type="text" id="cep" name="cep" class="input"></div>
  </div>
  <div class="row">
    <div class="cell label"><label for="endereço">Endereço:</label></div>
    <div class="cell input"><input type="text" id="endereço" name="ender" class="input"></div>
  </div>
  <div class="row">
    <div class="cell label"><label for="numero">Número:</label></div>
    <div class="cell input"><input type="text" id="numero" name="num" class="input"></div>
  </div>
  <div class="row">
    <div class="cell label"><label for="complemento">complemento:</label></div>
    <div class="cell input"><input type="text" id="complemeto" name="comp" class="input"></div>
  </div>
    <div class="row">
    <div class="cell label"><label for="bairro">Bairro:</label></div>
    <div class="cell input"><input type="text" id="bairro" name="bairro" class="input"></div>
  </div>
  <div class="row">
    <div class="cell label"><label for="municipio">Município:</label></div>
    <div class="cell input"><input type="text" id="municipio" name="municipio" class="input"></div>
  </div>
</div>

</br></br>

<div class="empresa">
    <p>Dados do Usuário</p>
</div>
</br></br>

<div class="table">
<div class="row">
    <div class="cell label"><label for="usuario">Usuário:</label></div>
    <div class="cell input"><input type="text" id="usuario" name="usuario" class="input"></div>
  </div>
  <div class="row">
    <div class="cell label"><label for="nome">Seu nome:</label></div>
    <div class="cell input"><input type="text" id="nome" name="nome" class="input"></div>
  </div>
</div>

</br></br>

<div class="table2">
<div class="row">
    <div class="cell label"><label for="whatsapp">Whatsapp:</label></div>
    <div class="cell input"><input type="text" id="whatsapp" name="zap" class="input"></div>
  </div>
  <div class="row">
    <div class="cell label"><label for="e-mail">E-mail:</label></div>
    <div class="cell input"><input type="text" id="e-mail" name="email" class="input"></div>
  </div>
  </div>
  <div class="row">
    <div class="cell label"><label for="confirme">Confirme o E-mail:</label></div>
    <div class="cell input"><input type="text" id="confirme" name="confemail" class="input"></div>
  </div>

  </br></br>

  <div class="checkbox-container">
    <input type="checkbox" id="termo-adesao" name="termo-adesao" class="checkbox">
    <label for="termo-adesao" class="label-checkbox">Li e concordo com o <span class="termo-adesao-link">termo de adesão</span></label>
</div>
<p>(Logo após o cadastro para fazer login basta colocar E-mail Corporativo: a@gmail.com | Senha: 123)</p>
</br></br>

  <input type="submit" value="Enviar" class="botao">
</div>

</br></br></br></br>
</section>
<script>
        document.getElementById('meu-formulario').addEventListener('submit', function(event) {
            var checkbox = document.getElementById('termo-adesao');
            if (!checkbox.checked) {
                alert('Você deve concordar com o termo de adesão antes de enviar o formulário.');
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
