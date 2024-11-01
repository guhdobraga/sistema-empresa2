<?php
require_once '../config/config.php';

session_start();

// Verifique se a variável de sessão 'usuarioNiveisAcessoId' está definida

if (isset($_SESSION['usuarioNiveisAcessoId'])) {
    // Use uma estrutura condicional para redirecionar com base no nível de acesso do usuário
    switch ($_SESSION['usuarioNiveisAcessoId']) {
        case "1":
            $homeLink = "index.php"; // Link de home para administrador
            $nomelogin = "Admin";
            break;
        case "2":
            $homeLink = "index.php"; // Link de home para RH
            $nomelogin = "G.Pessoas";
            break;
        case "3":
            $homeLink = "../cf/index.php"; // Link de home para CF
            $nomelogin = "G.Fiscal";
            break;
        case "4":
            $homeLink = "../ce/index.php"; // Link de home para CE
            $nomelogin = "G.Estoque";
            break;
        case "5":
            $homeLink = "../gf/index.php"; // Link de home para GF
            $nomelogin = "G.Financeiro";
            break;
        case "6":
            $homeLink = "../colaborador/index.php"; // Link de home para Colaborador
            $nomelogin = "Colaborador";
            break;
    }
} else {
    $homeLink = "../login.php"; // Link de home para página de login
}

require_once '../config/config.php';
require_once '../app/controllers/EstoqueIController.php';

$controller = new EstoqueIController($pdo); // Substitua $pdo pela sua conexão PDO

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Verifica se todos os campos obrigatórios estão preenchidos
if ( !empty($_POST['nome']) && !empty($_POST['qntd']) && !empty($_POST['fornecedor']) && !empty($_POST['lote'])  && !empty($_POST['lugar']) && !empty($_POST['validade'])) {
      
$nome = $_POST['nome'];
$qntd = $_POST['qntd'];
$fornecedor = $_POST['fornecedor'];
$lote = $_POST['lote'];
$lugar = $_POST['lugar'];
$validade = $_POST['validade'];

$controller->criarEstoqueInterno($nome, $qntd, $fornecedor, $lote, $lugar, $validade); 

} else {
echo "Todos os campos obrigatórios devem ser preenchidos.";
}
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../public/resources/ico/icon.jpeg" type="image/png">
    <title>Drivex | Estoque Interno</title>
    <link rel="stylesheet" href="../public/resources/css/index.css">
    <link rel="stylesheet" href="../public/resources/css/rh-page.css">
    <link rel="stylesheet" href="../public/resources/css/rh-page.css">
    <link rel="stylesheet" href="../public/resources/css/rh-page-lista1.css">
    <link rel="stylesheet" href="../public/resources/css/aside-responsive.css">
    <link rel="stylesheet" href="../public/resources/css/index-responsive.css">
    <link rel="stylesheet" href="../public/resources/css/novoprod.css">
</head>

<body>
    <header>
        <div class="esq">
            <div class="logo-section">
                <div class="home-ico">
                    <a href="<?php echo $homeLink; ?>"><img src="../public/resources/assets/img/home.png"></a>
                    <h1>Home</h1>
                </div>

                <div class="rh-ico">
                <a href="rh.php"><img src="../public/resources/assets/img/RH.png"></a>
                <h1>RH</h1>
            </div>

            <div class="rh-ico">
                <a href="cf.php"><img src="../public/resources/assets/img/cf.png"></a>
                <h1>CF</h1>
            </div>

            <div class="rh-ico">
                <a href="novoproduto.php"><img src="../public/resources/assets/img/ce.png"></a>
                <h1>CE</h1>
            </div>

            <div class="rh-ico">
            <a href="gf.php"><img src="../public/resources/assets/img/gf.png"></a>
                <h1>GF</h1>
            </div>

            </div>
        </div>

        <div class="dir">
            <div class="adm-ico" id="adm-ico">
                <img src="../public/resources/assets/img/user.png">
                <h1><?php echo $nomelogin; ?></h1>
                <div class="seta">
                    <img id="seta" src="../public/resources/assets/img/seta.png">
                </div>
            </div>
            <div class="logout-menu" id="logout-menu">
                <button class="exitbutton" onclick="logout()">
                    <div class="login-button">
                        <h6 class="exit-button position-header">Sair</h6><img src="../public/resources/assets/img/exit.png">
                    </div>
                </button>
            </div>
        </div>


    </header>
    <section class="content">
        <aside>
            <br>
            

            <div class="funcionarios-section">

                <div class="funcionarios-title">
                <img src="../public/resources/assets/img/estoque.png">
                    <h1>Estoque Interno</h1>
                    
                </div>
                <br>
                <div class="lista">
                    <ul>
                        <li><a href="novoproduto.php"><img src="../public/resources/assets/img/produto.png">Novo produto</a></li>
                        <li><a href="lista-produtos.php"><img src="../public/resources/assets/img/lista.png">Lista de produtos</a></li>
                    </ul>
                </div>
            </div>
            <br><br><br>
            
                


        </aside>
        <div class="main-title">
            <div class="title-section">
                <div class="direction">
                    <img src="../public/resources/assets/img/estoque.png">

                    <h1>Estoque Interno </h1>
                </div>
                <h2>Este formulario permite que você registre um produto em sua empresa/organização.</h2>
            </div>
            <div class="sub-content">
            <fieldset>
   
   

    
        <div class="container">
         <h1 class="form-title">NOVO PRODUTO</h1>
        <form method="post">
        
      <div class="form-group">
      <label for="productName">Nome do produto:</label>
      <input type="text" id="productName" name="nome" required>
      </div>
        
         <div class="form-group half-width">
         <label for="quantity">Quantidade:</label>  
         <input type="number" id="quantity" name="qntd" required>
        <label for="brand">‎ ‎ ‎ ‎ ‎ Lugar:</label>
        <select name="lugar" required>
                            <option value="" selected disabled>
                            </option>
                            <option value="Cozinha">Cozinha</option>
            <option value="Banheiro">Banheiro</option>
            <option value="Almoxarifado">Almoxarifado</option>
            <option value="Secretaria">Secretaria</option>
            <option value="Salas">Salas</option>
                        </select>
        </div>

         <div class="form-group">
         <label for="supplier">Fornecedor:</label>
         <input type="text" id="supplier" name="fornecedor" required>
         </div>

        <div class="form-group half-width">
         <label for="batch">Lote:</label>
         <input type="text" id="batch" name="lote" required>
         <label for="expiryDate">‎ ‎ ‎ ‎ Validade:</label>
         <input type="date" id="expiryDate" name="validade" required>
        </div>

         <button type="submit">Adicionar</button>
         </form>
         </div>
    


   

</fieldset>
    </section>

    <script src="../public/resources/js/logout.js"></script>
</body>

</html>