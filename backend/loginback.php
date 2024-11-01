<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <section>
        
        <div>  
            <form action="loginconfig.php" method="POST">
                
                <div>Email ou Nome de Usuário:</div>
                <input type="text" name="email" placeholder="E-mail ou Nome de Usuário">
                </div>
                
                <div>Senha:</div>
                <input type="password" name="senha" placeholder="Senha">
                </div>
                    <button type="submit">Logar</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>