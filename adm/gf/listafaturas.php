<?php
require_once '../../config/config.php';
require_once '../../app/controllers/gestaoFController.php';

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
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../public/resources/ico/icon.jpeg" type="image/png">
    <title>Drivex | CF</title>
    <link rel="stylesheet" href="../../public/resources/css/index.css">
    <link rel="stylesheet" href="../../public/resources/css/rh-page.css">
    <link rel="stylesheet" href="../../public/resources/css/index-responsive.css">
    <link rel="stylesheet" href="../../public/resources/css/aside-responsive.css">
    <link rel="stylesheet" href="../../public/resources/css/cf-page.css">
    <link rel="stylesheet" href="../../public/resources/css/rh-page-lista.css">
    <link rel="stylesheet" href="../../public/resources/css/rh-page-lista1.css">
    
</head>

<body>
    <header>
        <div class="esq">
            <div class="logo-section">
                <div class="home-ico">
                    <a href="<?php echo $homeLink; ?>"><img src="../../public/resources/assets/img/home.png"></a>
                    <h1>Home</h1>
                </div>

                <div class="rh-ico">
                    <a href="gf.php"><img src="../../public/resources/assets/img/GF.png"></a>
                    <h1>GF</h1>
                </div>

                <div class="rh-ico">

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
                <img src="../../public/resources/assets/img/gff.png">
                    <h1>Faturas e Fornecedores</h1>
                </div>
                <br>
                <div class="lista">
                    <ul>
                        <li><a href="gf.php"><img src="../../public/resources/assets/img/+.png">Nova fatura</a></li>
                        <li><a href="listafaturas.php"><img src="../../public/resources/assets/img/lista.png">Lista</a></li>
                    </ul>
                </div>
            </div>
            <br><br><br>
           

        </aside>
        <div class="main-title">
            <div class="title-section">
                <div class="direction">
                <img src="../../public/resources/assets/img/lista.png">

                    <h1>Lista de Faturas</h1>
                </div>
                <h2>Este formulario permite que você veja a lista de uma fatura em sua empresa/organização.</h2>
            </div>
            <div class="sub-content">
            <?php
$controller = new GestaoFController($pdo);

// Chame o método para exibir a lista de funcionários
$controller->exibirListaGestaoFinanceira();
?>
            </div>
    </section>

    <script src="../../public/resources/js/logoutalter.js"></script>
    <script>
    document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const sessoes = document.querySelectorAll('.sessao');

            sessoes.forEach(sessao => {
                const idText = sessao.children[0].textContent.toLowerCase();
                const modeloText = sessao.children[1].textContent.toLowerCase();
                const anoText = sessao.children[2].textContent.toLowerCase();
                const corText = sessao.children[3].textContent.toLowerCase();

                if (idText.includes(searchTerm) || modeloText.includes(searchTerm) || anoText.includes(searchTerm) || corText.includes(searchTerm)){
                    sessao.style.display = 'table-row';
                } else {
                    sessao.style.display = 'none';
                }
            });
        });</script>
</body>

</html>