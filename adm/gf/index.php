<?php
                    session_start();
                    include_once '../../verifica_login.php'
                    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../public/resources/ico/icon.jpeg" type="image/png">
    <title>Drivex | Página Inicial</title>
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
            <a href="gf.php"><img src="../../public/resources/assets/img/gf.png"></a>
                <h1>GF</h1>
            </div>
            <div class="rh-ico"></div>
            <div class="rh-ico"></div>
            <div class="rh-ico"></div>

        </div>
    </div>

    <div class="dir">
        <div class="adm-ico" id="adm-ico" >
        <img src="../../public/resources/assets/img/user.png">
        <h1>G.Financeiro</h1>
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
            <img src="../../public/resources/assets/img/gf.png">
            <h1>GESTÃO FINANCEIRA</h1>
            <h2>Gestão de despesas</h2>
            <br>
            <ul>
            <li><a href="gf.php">Registro de faturas;</a></li>
            <li><a href="listafaturas.php">Lista de Faturas.</li>
            
</ul>
        </div>
    </div>
    </div>


</section>
<script src= "../../public/resources/js/logoutalter.js"></script>
</body>
</html>
