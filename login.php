<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroMais Ltda. | Login</title>
    <link rel="stylesheet" href="public/resources/css/login.css">
    <link rel="shortcut icon" href="public/resources/ico/icone.jpg" type="image/png">
    <link rel="stylesheet" href="public/resources/css/login-responsive.css">
</head>
<body>
<?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
    <section class="main-login">
    
    <div class="main-text">
    
    <h1 class="info-text">Informe seu <strong>E-mail corporativo</strong> e a sua <strong>Senha</strong><br> para iniciar o registro</h1>
        </div>
        <div class="vertical-bg">
        
        <div class="logo">
        <img src="public/resources/ico/icone.jpg">
        </div>
        <div class="main-form">
            <form  action="loginconfig.php" method="POST">
            <div class="form-group">
                <div class="bg-img">
                    <img src="public/resources/assets/img/e-mail.png">
                </div> 
                <input type="text" name="email" placeholder="E-mail Corporativo">
            </div>
            <br>
            <br>
            <div class="form-group">
                <div class="bg-img">
                    <img src="public/resources/assets/img/senha-incorreta.png">
                </div>
                <input type="text" name="senha" placeholder="Senha">
            </div>
            <br>
            <br>
            <br>
            <div class="btn-group">
                <button type="submit">Iniciar</button>
            </div>
            </form>
            
           
    </div>
        </div>
     
<script>
    // Se você precisar adicionar alguma lógica adicional, você pode usar JavaScript
document.addEventListener('DOMContentLoaded', () => {
    const downloadButton = document.getElementById('download-button');
    
    // Exemplo de lógica adicional
    downloadButton.addEventListener('click', () => {
        console.log('Botão de download clicado');
    });
});

</script>
</body> 
</html>