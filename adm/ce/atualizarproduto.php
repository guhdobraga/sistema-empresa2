<?php
include_once '../../config/config.php';
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
if (!isset($_GET['id'])) {
    header('Location: lista-produtos.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM estoque_interno WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: lista-produtos.php');
    exit;   
}
$nome = $appointment['nome'];
$qntd = $appointment['qntd'];
$fornecedor = $appointment['fornecedor'];
$lote = $appointment['lote'];
$validade = $appointment['validade'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $qntd = $_POST['qntd'];
    $fornecedor = $_POST['fornecedor'];
    $lote = $_POST['lote'];
    $lugar = $_POST['lugar'];
    $validade = $_POST['validade'];

    //Validação dos dados do formulário aqui
    $stmt = $pdo->prepare('UPDATE estoque_interno SET nome = ?, qntd = ?, fornecedor = ?, lote = ?, lugar = ?, validade = ? WHERE id = ?');
    $stmt->execute([$nome, $qntd, $fornecedor, $lote, $lugar, $validade, $id]);
    header('Location: lista-produtos.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../public/resources/ico/icon.jpeg" type="image/png">
    <title>Drivex | Atualizar Produto</title>
    <link rel="stylesheet" href="../../public/resources/css/index.css">
    <link rel="stylesheet" href="../../public/resources/css/rh-page.css">
    <link rel="stylesheet" href="../../public/resources/css/index-responsive.css">
    <link rel="stylesheet" href="../../public/resources/css/aside-responsive.css">
    <link rel="stylesheet" href="../../public/resources/css/cf-page.css">
    <link rel="stylesheet" href="../../public/resources/css/cfv-page.css">
    <link rel="stylesheet" href="../../public/resources/css/cfe-page.css">
    <link rel="stylesheet" href="../../public/resources/css/cf-responsive.css">
    <link rel="stylesheet" href="../../public/resources/css/cf-page.css">
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
        button[type="submit"] {
            border-radius: 3px;
            width: 80px;
            height: 30px;
            background-color: rgb(0, 0, 122);
            color: #F0F0F0;
        }
        button[type="submit"]:hover {
            cursor: pointer;
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
                window.location.href = '../../app/controllers/deletarproduto.php?id=' + id;
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
            <div class="main-searchbar">
                <input type="search" placeholder="Procurar" id= "searchInput">
                <div class="seta-e">
                    <img id="seta-e" src="../../public/resources/assets/img/seta2.png">
                </div>
            </div>

            <div class="funcionarios-section">

                <div class="funcionarios-title">
                <img src="../../public/resources/assets/img/estoque.png">
                    <h1>Estoque interno</h1>
                </div>
                <br>
                <div class="lista">
                    <ul>
                        <li><a href="novoproduto.php"><img src="../../public/resources/assets/img/produto.png">Novo Produto</a></li>
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
                <img src="../../public/resources/assets/img/ico-b.png">

                    <h1>Atualizar Produto</h1>
                </div>
                <h2>Este formulario permite que você faça o atualizar</h2>
            </div>

<form method="post">
<div class="sub-content">
            <div class="dd">
                    
                <div class="dd-bg" style="height:68vh">
                
                    <div class="title-cf">
                        <h1>Atualizar Produtos</h1>
                    </div>
                    <div class="dd-bgf">
                    <div class="cima">
                    <div class="dd-content">
<label for="nome">Nome:</label>
    <input type="text" name="nome" value="<?php echo $nome; ?>" required></br>
    


    <div class="dd-content">
    <label for="qntd">Quantidade:</label>
    <input type="number" name="qntd" value="<?php echo $qntd; ?>" required></br>
    </div>
    </div>

    <div class="baixo">
    <div class="dire">
    <div class="dd-content">
    <label for="fornecedor">Fornecedor:</label>
    <input type="text" name="fornecedor" value="<?php echo $fornecedor; ?>" required></br>
    </div>
    </div>
    <div class="dd-content">
    <label for="lote">Lote:</label>
    <input type="number" name="lote" value="<?php echo $lote; ?>" required></br>
    </div>
    </div>
    <div class="baixo">
    <div class="dire">
    <div class="dd-content">
    <label for="lugar">Lugar:</label>
    <select name="lugar" required>
                            <option value="Cozinha">Cozinha</option>
            <option value="Banheiro">Banheiro</option>
            <option value="Almoxarifado">Almoxarifado</option>
            <option value="Secretaria">Secretaria</option>
            <option value="Salas">Salas</option>
                        </select>
                        </div>
    </div>
    <div class="dd-content">
    <label for="validade">Validade:</label>
    <input type="date" name="validade" value="<?php echo $validade; ?>" required></br>
    </div>
    </div>
    </div>
 </div>

    <button type="submit">Atualizar</button>
    <a class= "lixo" id= "delete" href="#" onclick="confirmDelete(event, '<?php echo htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'); ?>')"><img src="<?php echo '../../public/resources/assets/img/lixeira.png' ?>" width="30px" height= "30px"></a>
    </div>
    
    
    </div>
    
    </div>

    <BR><BR>
    

    </div>
    </div>


    </div>
</div></form>
</section>  
<!-- Modal de confirmação -->
<div id="confirmModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">DriveX</div>
        <p>Você tem certeza que deseja deletar este produto?</p>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeModal()">Cancelar</button>
            <button class="btn-confirm" id="confirmBtn">Confirmar</button>
        </div>
    </div>
</div>
</body>
</html>