<?php
                    session_start();
                    include_once '../verifica_login.php';
                    require '../vendor/autoload.php';
                    
                    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../public/resources/ico/icon.jpeg" type="image/png">
    <title>Drivex | Página Inicial</title>
    <link rel="stylesheet" href="../public/resources/css/index.css">
    <link rel="stylesheet" href="../public/resources/css/index-responsive.css">
</head>
<body>
    <header>
    <div class="esq">
        <div class="logo-section">
            <div class="home-ico">
                <a href="index.php"><img src="../public/resources/assets/img/home.png"></a>
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

            <div class="rh-ico">
    <form id="pdfForm" action="geradorpdf.php" method="post" target="_blank" style="display: inline;">
        <input type="hidden" name="generate_pdf" value="1">
        <a href="javascript:void(0);" onclick="submitFormAndRedirect();"><img src="../public/resources/assets/img/pdf.png"></a>
        <h1>PDF</h1>
    </form>
</div>
<script>
function submitFormAndRedirect() {
    document.getElementById('pdfForm').submit();
    setTimeout(function() {
        window.location.href = 'index.php';
    }, 10000); // Atraso para permitir que o PDF seja gerado e iniciado o download
}
</script>
        </div>
    </div>

    <div class="dir">
        <div class="adm-ico" id="adm-ico" >
        <img src="../public/resources/assets/img/user.png">
        <h1>Admin</h1>
        <div class="seta">
        <img id="seta" src="../public/resources/assets/img/seta.png">
    </div>    

    </div>
    <div class="logout-menu" id="logout-menu">
    <button class= "exitbutton" onclick="logout()">
                    <div class="login-button"><h6 class="exit-button position-header">Sair</h6><img src="../public/resources/assets/img/exit.png"></div></button>
                </div>
            </div>
    </div>

    </header>
<br><br><br>
<section class="content">
<div class="main-card">
    <div class="card">
        <div class="f-ico">
            <img src="../public/resources/assets/img/RH.png">
            <h1>RH</h1>
            <h2>Gestão de pessoas</h2>
            <br>
            <ul>
            <li><a href="lista-funcionarios.php">Lista de novos funcionários;</a></li>
            <li><a href="rh.php">Novo funcionário;</a></li>

</ul>
        </div>
    </div>



    <div class="card">
        <div class="f-ico">
            <img src="../public/resources/assets/img/cf.png">
            <h1>CONTROLE FISCAL</h1>
            <h2>Controle Financeiro</h2>
            <br>
            <ul>
            <li><a href="vendas.php">Registro de vendas;</a></li>
            <li><a href="compras.php">Registro de compras;</a></li>
            
            <li><a href="cf.php">Documentos Fiscais;</a></li>
            <li><a href="listacompras.php">Lista de Compras;</a></li>
            <li><a href="listavendas.php">Lista de Vendas.</a></li>
            
</ul>
        </div>
    </div>



    <div class="card">
        <div class="f-ico">
            <img src="../public/resources/assets/img/ce.png">
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



    <div class="card">
        <div class="f-ico">
            <img src="../public/resources/assets/img/gf.png">
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
<script src= "../public/resources/js/logout.js"></script>
</body>
</html>
