<?php 
session_start();
include 'config/config.php';

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $query = "SELECT * FROM login_empresa WHERE (email = :email) AND senha = :senha";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        $_SESSION['usuarioId'] = $resultado['id'];
        $_SESSION['usuarioEmail'] = $resultado['email'];
        $_SESSION['usuarioNomedeUsuario'] = $resultado['nome_u'];
        $_SESSION['usuarioNiveisAcessoId'] = $resultado['cargo'];

        
        if ($_SESSION['usuarioNiveisAcessoId'] == "1") {
            header("Location: adm/index.php");
        } elseif ($_SESSION['usuarioNiveisAcessoId'] == "2") {
            header("Location: adm/rh/index.php");
        } elseif ($_SESSION['usuarioNiveisAcessoId'] == "3") {
            header("Location: adm/cf/index.php");
        } elseif ($_SESSION['usuarioNiveisAcessoId'] == "4") {
            header("Location: adm/ce/index.php");
        } elseif ($_SESSION['usuarioNiveisAcessoId'] == "5") {
            header("Location: adm/gf/index.php");
        } elseif ($_SESSION['usuarioNiveisAcessoId'] == "6") {
            header("Location: adm/colaborador/index.php");
        }
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: login.php');
        exit();
    }
} 
?>