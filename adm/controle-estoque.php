<?php
require_once '../config/config.php';

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
    header('Location: listacompras.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM registro_compras WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: listacompras.php');
    exit;   
}
$modelo = $appointment['modelo'];
$ano = $appointment['ano'];
$cor = $appointment['cor'];
$quilometragem = $appointment['quilometragem'];   
$combustivel = $appointment['combustivel'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];
    $quilometragem = $_POST['quilometragem'];
    $combustivel = $_POST['combustivel'];

    //Validação dos dados do formulário aqui
    $stmt = $pdo->prepare('UPDATE registro_compras SET modelo = ?, ano = ?, cor = ?, quilometragem = ?, combustivel = ? WHERE id = ?');
    $stmt->execute([$modelo, $ano, $cor, $quilometragem, $combustivel, $id]);
    header('Location: listacompras.php');
    exit;
};
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../public/resources/ico/icone.jpg" type="image/png">
    <title>Drivex | Controle de Estoque</title>
    <link rel="stylesheet" href="../public/resources/css/index.css">
    <link rel="stylesheet" href="../public/resources/css/rh-page.css">
    <link rel="stylesheet" href="../public/resources/css/index-responsive.css">
    <link rel="stylesheet" href="../public/resources/css/aside-responsive.css">
    <link rel="stylesheet" href="../public/resources/css/cf-page.css">
    <link rel="stylesheet" href="../public/resources/css/cfv-page.css">
    <link rel="stylesheet" href="../public/resources/css/cfe-page.css">
    <link rel="stylesheet" href="../public/resources/css/cf-responsive.css">
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
                window.location.href = '../app/controllers/deletarcompra.php?id=' + id;
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
    
            <div class="funcionarios-section">

                <div class="funcionarios-title">
                    <img src="../public/resources/assets/img/doc.png">
                    <h1>Documentos</h1>
                </div>
                <br>
                <div class="lista">
                    <ul>
                        <li><a href="cf.php"><img src="../public/resources/assets/img/+.png">Emissão de Documentos Fiscais</a></li>
                        <li><a href="listacompras.php"><img src="../public/resources/assets/img/lista.png">Lista de Compras</a></li>
                        <li><a href="listavendas.php"><img src="../public/resources/assets/img/lista.png">Lista de Vendas</a></li>
                    </ul>
                </div>
            </div>
            <br><br><br>
            <div class="competencias-section">
                <div class="funcionarios-section">
                    <div class="funcionarios-title" id="fun">
                       <img src="../public/resources/assets/img/f.png">
                        <h1>Controle Financeiro</h1>
                    </div>
                    <br>
                    <div class="lista">
                        <ul>
                            <li><a href="vendas.php"><img src="../public/resources/assets/img/vendas.png">Registro de Vendas</a></li>
                            <li><a href="compras.php"><img src="../public/resources/assets/img/compras.png">Registro de Compras</a></li>
                            
                            
                        </ul>
                    </div>
                </div>


        </aside>
        <div class="main-title">
            <div class="title-section">
                <div class="direction">
                <img src="../public/resources/assets/img/ico-b.png">

                    <h1>Controle de Estoque</h1>
                </div>
                <h2>Este formulario permite que você faça o controle de cada veículo</h2>
            </div>
            <form method="post">
            <div class="sub-content">
            <div class="dd">
                    
                <div class="dd-bg" style="height:57vh">
                
                    <div class="title-cf">
                        <h1>Modelo de Carro</h1>
                    </div>
                    <div class="dd-bgf">
                    <div class="cima">
                    <div class="dd-content">
                        <label>Modelo:</label>
                        <input type="text" name="modelo" id="model" value="<?php echo $modelo; ?>" placeholder="Modelo do carro">
                    </div>
                    
                    </div>
                    
                    <div class="baixo">
                    <div class="dire">
                    
                    <div class="dd-content">
                        <label>Ano do Veículo:</label>
                        <input type="number" name="ano" value="<?php echo $ano; ?>" placeholder="Ano de fabricação">
                    </div>

                    
                    <div class="dd-content">
                       <label>Cor:<span>L</span></label>
                        <input type="text" name="cor" value="<?php echo $cor; ?>" placeholder="Cor do carro">
                    </div>
                    </div>
                    
                    <div class="esq">
                    <div class="dd-content">
                    <label>Quilometragem:</label>
                        <input type="text" name="quilometragem" value="<?php echo $quilometragem; ?>" placeholder="Kms rodados">
                    </div>


                    <div class="dd-content">
                        <label>Combustível:<span>L</span></label>
                        <input type="text" name="combustivel" value="<?php echo $combustivel; ?>" placeholder="Combustível">
                    </div>
                    
                    </div>
                    
                    </div>
                </div>
                <div class="enviar">
                    <a class= "lixo" id= "delete" href="#" onclick="confirmDelete(event, '<?php echo htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'); ?>')"><img src="<?php echo '../public/resources/assets/img/lixeira.png' ?>" width="30px" height= "30px"></a>
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
        <p>Você tem certeza que deseja deletar esta compra?</p>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeModal()">Cancelar</button>
            <button class="btn-confirm" id="confirmBtn">Confirmar</button>
        </div>
    </div>
</div>
    <script src="../public/resources/js/logout.js"></script>
</body>

</html>
