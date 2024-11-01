<?php
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

include_once '../../config/config.php';
if (!isset($_GET['id'])) {
    header('Location: listafaturas.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM gestao_financeira WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: listafaturas.php');
    exit;   
}
$titulo_fatura = $appointment['titulo_fatura'];
$fornecedor = $appointment['fornecedor'];
$cnpj = $appointment['cnpj'];
$vencimento = $appointment['vencimento'];
$valor = $appointment['valor'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo_fatura = $_POST['titulo_fatura'];
    $fornecedor = $_POST['fornecedor'];
    $cnpj = $_POST['cnpj'];
    $venciemento = $_POST['vencimento'];
    $valor = $_POST['valor'];
    

    //Validação dos dados do formulário aqui
    $stmt = $pdo->prepare('UPDATE gestao_financeira SET titulo_fatura = ?, fornecedor = ?, cnpj = ?, vencimento = ?, valor = ? WHERE id = ?');
    $stmt->execute([$titulo_fatura, $fornecedor, $cnpj, $vencimento, $valor,$id]);
    header('Location: listafaturas.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar</title>
    <link rel="stylesheet" href="../../public/resources/css/index.css">
    <link rel="stylesheet" href="../../public/resources/css/rh-page.css">
    <link rel="stylesheet" href="../../public/resources/css/index-responsive.css">
    <link rel="stylesheet" href="../../public/resources/css/aside-responsive.css">
    <link rel="stylesheet" href="../../public/resources/css/cf-page.css">
    <link rel="stylesheet" href="../../public/resources/css/cfv-page.css">
    <link rel="stylesheet" href="../../public/resources/css/cfe-page.css">
    <link rel="stylesheet" href="../../public/resources/css/cf-responsive.css">
    <link rel="shortcut icon" href="../../public/resources/ico/icon.jpeg" type="image/png">
    <style>
        /* Estilo para o diálogo de confirmação */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            color: black;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 300px;
            text-align: center;
            border-radius: 10px;
        }
        .modal-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .modal-footer {
            display: flex;
            justify-content: space-between;
        }
        .modal-footer button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-cancel {
            background-color: #ccc;
        }
        .btn-cancel:hover{
            background-color: #ccb;
        }
        .btn-confirm {
            background-color: #f44336;
            color: white;
        }
        .btn-confirm:hover {
            background-color: red;
            color: white;
        }
        .enviar {
            display: flex;
            justify-content: center;
        }
        body {
            overflow-y: hidden;
        }
    </style>
    <script type="text/javascript">
        function confirmDelete(event, id) {
            event.preventDefault();
            var modal = document.getElementById('confirmModal');
            var confirmBtn = document.getElementById('confirmBtn');
            confirmBtn.setAttribute('data-id', id); // Set the ID on the button as a data attribute
            modal.style.display = 'block';
            confirmBtn.onclick = function() {
                window.location.href = '../../app/controllers/deletarfatura.php?id=' + id;
            }
        }

        function closeModal() {
            var modal = document.getElementById('confirmModal');
            modal.style.display = 'none';
        }

        window.onclick = function(event) {
            var modal = document.getElementById('confirmModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
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
                <img src="../../public/resources/assets/img/ico-b.png">

                <h1>Atualizar Fatura</h1>
                </div>
                <h2>Este formulario permite que você atualize a despesa selecionada</h2>
            </div>
            <form method="post">
            <div class="sub-content">
            <div class="dd">
                    
                <div class="dd-bg" style="height:57vh">
                
                    <div class="title-cf">
                        <h1>Atualizar Despesa</h1>
                    </div>
                    <div class="dd-bgf">
                    <div class="cima">
                    <div class="dd-content">
<label for="titulo_fatura">Titulo da Fatura:</label>
    <input type="text" name="titulo_fatura" value="<?php echo $titulo_fatura; ?>" required></br>
    </div>
    </div>

    <div class="baixo">
        <div class="dire">
        <div class="dd-content">
    <label for="fornecedor">Fornecedor:</label>
    <input type="text" name="fornecedor" value="<?php echo $fornecedor; ?>" required></br>
    </div>

    <div class="dd-content">
    <label for="cnpj">CNPJ:</label>
    <input type="number" name="cnpj" value="<?php echo $cnpj; ?>" required></br>
    </div>
    </div>

    <div class="esq">
    <div class="dd-content">
    <label for="vencimento">Vencimento:</label>
    <input type="date" name="vencimento" value="<?php echo $vencimento; ?>" required></br>
    </div>

    <div class="dd-content">
    <label for="valor">Valor:</label>
    <input type="number" name="valor" value="<?php echo $valor; ?>" required></br>
    </div>
    </div>
    </div>
    
    <div class="enviar">
    <a class= "lixo" id= "delete" href="#" onclick="confirmDelete(event, '<?php echo htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'); ?>')"><img src="<?php echo '../../public/resources/assets/img/lixeira.png' ?>" width="30px" height= "30px"></a>
    <input type="submit">
                    </div>
                </div>
                
                </div>

                <BR><BR>
                

                </div>
                </div>


                </div>
            </div></form>
    </section>
    <div id="confirmModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">DriveX</div>
        <p>Você tem certeza que deseja deletar esta despesa?</p>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeModal()">Cancelar</button>
            <button class="btn-confirm" id="confirmBtn">Confirmar</button>
        </div>
    </div>
</div>
</body>
</html>

