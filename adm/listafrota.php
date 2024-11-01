<?php
require_once '../config/config.php';
require_once '../app/controllers/RegistroFrotaController.php';

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
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../public/resources/ico/icone.jpg" type="image/png">
    <title>AgroMais Ltda. | Lista de Veículos</title>
    <link rel="stylesheet" href="../public/resources/css/index.css">
    <link rel="stylesheet" href="../public/resources/css/rh-page.css">
    <link rel="stylesheet" href="../public/resources/css/rh-page-lista1.css">
    <link rel="stylesheet" href="../public/resources/css/rh-page-lista.css">
    <link rel="stylesheet" href="../public/resources/css/aside-responsive.css">
    <link rel="stylesheet" href="../public/resources/css/index-responsive.css">
    

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
            <div class="main-searchbar">
                <input type="search" placeholder="Procurar" id= "searchInput">
                <div class="seta-e">
                    <img id="seta-e" src="../public/resources/assets/img/seta2.png">
                </div>
            </div>

            <div class="funcionarios-section">

                <div class="funcionarios-title">
                <img src="../public/resources/assets/img/estoque.png">
                    <h1>Estoque Interno</h1>
                </div>
                <br>
                <div class="lista">
                    <ul>
                    <li><a href="novoproduto.php"><img src="../public/resources/assets/img/produto.png">Novo Produto</a></li>
                        <li><a href="lista-produtos.php"><img src="../public/resources/assets/img/lista.png">Lista de produtos</a></li> 


                    </ul>
                </div>
            </div>
            <br><br><br>
            <div class="competencias-section">
                <div class="funcionarios-section">
                    <div class="funcionarios-title" id="fun">
                       <img src="../public/resources/assets/img/ico-b.png">
                        <h1>Frota</h1>
                    </div>
                    <br>
                    <div class="lista">
                        <ul>
                            <li><a href="frota.php"><img src="../public/resources/assets/img/frota.png">Frota de Veículos</a></li>
                            <li><a href="listafrota.php"><img src="../public/resources/assets/img/lista.png">Lista da frota</a></li>
                            
                            
                        </ul>
                    </div>
                </div>
            


        </aside>
        <div class="main-title">
            <div class="title-section">
                <div class="direction">
                    <img src="../public/resources/assets/img/lista.png">

                    <h1>Lista de Veículos </h1>
                </div>
                <h2>Este formulario permite que você liste os veículos de sua empresa/organização.</h2>
                
            </div>
            
            <div class="sub-content">
            <?php
$controller = new RegistroFrotaController($pdo);

// Chame o método para exibir a lista de funcionários
$controller->exibirListaFrota();
?>
            </div>
    </section>
    

    <script src="../public/resources/js/logoutalter.js"></script>
    <script>
    document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const sessoes = document.querySelectorAll('.sessao');

            sessoes.forEach(sessao => {
                const idText = sessao.children[0].textContent.toLowerCase();
                const marcaText = sessao.children[1].textContent.toLowerCase();
                const placaText = sessao.children[2].textContent.toLowerCase();
                const tipoText = sessao.children[4].textContent.toLowerCase();

                if (idText.includes(searchTerm) || marcaText.includes(searchTerm) || placaText.includes(searchTerm) || tipoText.includes(searchTerm)){
                    sessao.style.display = 'table-row';
                } else {
                    sessao.style.display = 'none';
                }
            });
        });</script>
</body>

</html>