<?php
                    session_start();
                    include_once '../../verifica_login.php'
                    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../public/resources/ico/icone.jpg" type="image/png">
    <title>AgroMais Ltda. | Página Inicial</title>
    <link rel="stylesheet" href="../../public/resources/css/index.css">
    <link rel="stylesheet" href="../../public/resources/css/index-responsive.css">
</head>
<body>
    <header>
    <div class="esq">
        <div class="logo-section">
            <div class="home-ico">
                <a href="index.php"><img src="../../public/resources/assets/img/home.png"></a>
                <h1>Home</h1>
            </div>

            <div class="rh-ico">
                <a href="novoproduto.php"><img src="../../public/resources/assets/img/ce.png"></a>
                <h1>CE</h1>
            </div>
            <div class="rh-ico"></div>
            <div class="rh-ico"></div>
            <div class="rh-ico"></div>
        </div>
    </div>

    <div class="dir">
        <div class="adm-ico" id="adm-ico" >
        <img src="../../public/resources/assets/img/user.png">
        <h1>G.Estoque</h1>
        <div class="seta">
        <img id="seta" src="../../public/resources/assets/img/seta.png">
    </div>    

    </div>
    <div class="logout-menu" id="logout-menu">
    <button class= "exitbutton" onclick="logout()">
                    <div class="login-button"><h6 class="exit-button position-header">Sair</h6><img src="../../public/resources/assets/img/exit.png"></div></button>
                </div>
            </div>
    </div>

    </header>
<br><br><br>
<section class="content">
<div class="main-card">


<div class="card">
        <div class="f-ico">
            <img src="../../public/resources/assets/img/ce.png">
            <h1>CONTROLE DE ESTOQUE</h1>
            <h2>Gestão do estoque</h2>
            <br>
            <ul>
            <li><a href="novoproduto.php">Cadastro de produtos;</a></li>
            <li><a href="lista-produtos.php">Inventário;</a></li>
            <li><a href="frota.php">Adicionar Veículo a Frota;</a></li>
            <li><a href="listafrota.php">Frota de Veículos.</a></li>
            
</ul>
        </div>
    </div>


</section>
<script src= "../../public/resources/js/logoutalter.js"></script>
</body>
</html>
