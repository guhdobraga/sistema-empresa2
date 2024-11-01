<?php
        // Inicie a sessão para acessar as variáveis de sessão
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
require_once '../app/controllers/GestaoFController.php';

$controller = new GestaoFController($pdo); // Substitua $pdo pela sua conexão PDO


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos obrigatórios estão preenchidos
    if (!empty($_POST['titulo_fatura']) && !empty($_POST['fornecedor']) && !empty($_POST['cnpj']) && !empty($_POST['vencimento']) 
    && !empty($_POST['valor'])) {


        $titulo_fatura = $_POST['titulo_fatura'];        
        $fornecedor = $_POST['fornecedor'];
        $cnpj = $_POST['cnpj'];
        $vencimento = $_POST['vencimento'];
        $valor = $_POST['valor'];


        $controller->criarGestaoFinanceira($titulo_fatura, $fornecedor, $cnpj, $vencimento, $valor); 
       

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
    <title>Drivex | RH</title>
    <link rel="stylesheet" href="../public/resources/css/index.css">
    <link rel="stylesheet" href="../public/resources/css/gf-page.css">
    <link rel="stylesheet" href="../public/resources/css/index-responsive.css">
    <link rel="stylesheet" href="../public/resources/css/aside-responsive.css">
    
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
                <img src="../public/resources/assets/img/gff1.png">
                    <h1>Faturas e Fornecedores</h1>
                </div>
                <br>
                <div class="lista"> 
                    <ul>
                        <li><a href="gf.php"><img src="../public/resources/assets/img/+.png">Nova fatura</a></li>
                        <li><a href="listafaturas.php"><img src="../public/resources/assets/img/lista.png">Lista</a></li>
                    </ul>
                </div>
            </div>
            <br><br><br>
           

        </aside>
        <div class="main-title">
            <div class="title-section">
                <div class="direction">
                <img src="../public/resources/assets/img/gff.png">

                    <h1>Cadastro de Despesas</h1>
                </div>
                    <h2>Este formulario permite que você administre as despesas de sua empresa/organização.</h2>

                
            </div>
            <div class="sub-content">
            <div class="dd">
            <div class="dd-bg">
                
                    <div class="title-cf">
                   
                    
            <div class="dd-content">
                <div class="form-content-2">
                <div class="dd-bgf">
                <form method="post">
                <div class="item">
                        <label>Título da fatura:</label>
                        <input type="text" name="titulo_fatura">
                    </div>
<div class="conteudoflex">
                    <div class="item">
                        <label>Fornecedor:</label>
                        <input type="text" name="fornecedor">
                        
                        
                    </div>
                    
                    <div class="item">
                    <p><p><label>CNPJ:</label>
                        <input type="number" name="cnpj">
                        <br><br>
                    </div>
                    

</div>

                    <div class="item">
                        <label>Vencimento:</label>
                        <input type="date" name="vencimento">
               
                    </div>
                     
                    <div class="item">
                        <label>Valor:</label>
                    
                        <input type="text" name="valor">
                        <br><br> 
                        
                    </div>
                    <div class= "botao">
                    <br>
                    <input type="submit" value="Confirmar">
                    
                    <br>    
                    </div>
                </form>
                </div>
            </div>
           



    </section>

    <script src="../public/resources/js/logout.js"></script>
</body>

</html>