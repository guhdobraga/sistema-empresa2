<?php
require_once '../../config/config.php';

session_start();

        // Verifique se a variável de sessão 'usuarioNiveisAcessoId' está definida
        if (isset($_SESSION['usuarioNiveisAcessoId'])) {
            // Use uma estrutura condicional para redirecionar com base no nível de acesso do usuário
            switch ($_SESSION['usuarioNiveisAcessoId']) {
                case "1":
                    $homeLink = "../index.php"; // Link de home para administrador
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
            $homeLink = "../../login.php"; // Link de home para página de login
        }

require_once '../../app/controllers/RegistroFrotaController.php';

$controller = new RegistroFrotaController($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos obrigatórios estão preenchidos
    if (!empty($_POST['marca']) && !empty($_POST['placa']) && !empty($_POST['ano']) && !empty($_POST['tipo'])){
        $marca = $_POST['marca'];
        $placa = $_POST['placa'];
        $ano = $_POST['ano'];
        $tipo = $_POST['tipo'];

            $controller->criarRegistroFrota($marca, $placa, $ano, $tipo); 
            
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
    <link rel="shortcut icon" href="../../public/resources/ico/icon.jpeg" type="image/png">
    <title>Drivex | Estoque Interno</title>
    <link rel="stylesheet" href="../../public/resources/css/index.css">
    <link rel="stylesheet" href="../../public/resources/css/rh-page.css">
    <link rel="stylesheet" href="../../public/resources/css/cf-page.css">
    <link rel="stylesheet" href="../../public/resources/css/cfv-page.css">
    <link rel="stylesheet" href="../../public/resources/css/rh-page-lista1.css">
    <link rel="stylesheet" href="../../public/resources/css/aside-responsive.css">
    <link rel="stylesheet" href="../../public/resources/css/index-responsive.css">
    <link rel="stylesheet" href="../../public/resources/css/novoprod.css">
    <link rel="shortcut icon" href="../../public/resources/ico/icon.jpeg" type="image/png">
</head>

<style>
.dd-content input {
margin-bottom: 10px;
}
body {
    overflow-y: hidden;
}
</style>

<body>
    <header>
        <div class="esq">
            <div class="logo-section">
                <div class="home-ico">
                    <a href="<?php echo $homeLink; ?>"><img src="../../public/resources/assets/img/home.png"></a>
                    <h1>Home</h1>
                </div>

                <div class="rh-ico">
                    <a href="novoproduto.php"><img src="../../public/resources/assets/img/CE.png"></a>
                    <h1>CE</h1>
                </div>

                <div class="rh-ico">
                    
                </div>
                <div class="rh-ico">
                    
                    </div>

                    <div class="rh-ico">
                    
                    </div>

            </div>
        </div>

        <div class="dir">
            <div class="adm-ico" id="adm-ico">
                <img src="../../public/resources/assets/img/user.png">
                <h1><?php echo $nomelogin; ?></h1>
                <div class="seta">
                    <img id="seta" src="../../public/resources/assets/img/seta.png">
                </div>
            </div>
            <div class="logout-menu" id="logout-menu">
                <button class="exitbutton" onclick="logout()">
                    <div class="login-button">
                        <h6 class="exit-button position-header">Sair</h6><img src="../../public/resources/assets/img/exit.png">
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
                <img src="../../public/resources/assets/img/estoque.png">
                    <h1>Estoque Interno</h1>
                    
                </div>
                <br>
                <div class="lista">
                    <ul>
                        <li><a href="novoproduto.php"><img src="../../public/resources/assets/img/produto.png">Novo produto</a></li>
                        <li><a href="lista-produtos.php"><img src="../../public/resources/assets/img/lista.png">Lista de produtos</a></li>
                    </ul>
                </div>
            </div>
            <br><br><br>
            
            <div class="competencias-section">
                <div class="funcionarios-section">
                    <div class="funcionarios-title" id="fun">
                       <img src="../../public/resources/assets/img/ico-b.png">
                        <h1>Frota</h1>
                    </div>
                    <br>
                    <div class="lista">
                        <ul>
                            <li><a href="frota.php"><img src="../../public/resources/assets/img/frota.png">Frota de Veículos</a></li>
                            <li><a href="listafrota.php"><img src="../../public/resources/assets/img/lista.png">Lista da frota</a></li>
                            
                            
                        </ul>
                    </div>
                </div>
            
                


        </aside>
        <div class="main-title">
            <div class="title-section">
                <div class="direction">
                    <img src="../../public/resources/assets/img/frota.png">

                    <h1>Frota de Veículos</h1>
                </div>
                <h2>Este formulario permite que você registre um produto em sua empresa/organização.</h2>
            </div>
            <form method="post">
            <div class="sub-content">
            <div class="dd">
            <fieldset>
   
   

            <div class="dd-content" >
            <div class="dd-bg" style="width:70vw">
                
            <div class="title-cf"><h1>Frota de Veículos</h1></div>
        

            <label for="marca">Marca do Veículo:</label>
            <input type="text" name="marca" required><br>

            <label for="placa">Placa do Veículo:</label>
            <input type="text" name="placa" required><br>

            <label for="ano">Ano de Fabricação:</label>
            <input type="number" name="ano" required><br>

            <label for="tipo">Tipo de Veículo:</label>
    <select name="tipo" required style="margin-bottom:15px">
            <option value="" selected disabled></option>
            <option value="Carro">Carro</option>
            <option value="Moto">Moto</option>
            <option value="Caminhão">Caminhão</option>
            <option value="Ônibus">Ônibus</option>
            <option value="van">Van</option>
            </select><br>

            <input type="submit" value="Enviar"></input>
</form>
    


   

</fieldset>
    </section>

    <script src="../../public/resources/js/logoutalter.js"></script>
</body>

</html>
