<?php
require_once '../../config/config.php';

session_start();

        // Verifique se a variável de sessão 'usuarioNiveisAcessoId' está definida
        if (isset($_SESSION['usuarioNiveisAcessoId'])) {
            // Use uma estrutura condicional para redirecionar com base no nível de acesso do usuário
            switch ($_SESSION['usuarioNiveisAcessoId']) {
                case "1":
                    $homeLink = "../index.php"; // Link de home para administrador
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
            $homeLink = "../../login.php"; // Link de home para página de login
        };

require_once '../../app/controllers/RegistroRCController.php';

$controller = new RegistroRCController($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos obrigatórios estão preenchidos
    if (!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['endereco']) && !empty($_POST['email']) && !empty($_POST['telefone']) && !empty($_POST['modelo']) && !empty($_POST['ano']) && !empty($_POST['placa']) && !empty($_POST['estoque']) && !empty($_POST['pagamento']) && !empty($_POST['valortotal'])) {

        // Recupera os dados do formulário
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $endereco = $_POST['endereco'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $modelo = $_POST['modelo'];
        $ano = $_POST['ano'];
        $placa = $_POST['placa'];
        $inform = isset($_POST['inform']) ? $_POST['inform'] : ''; // Informação adicional
        $estoque = $_POST['estoque'];
        $pagamento = $_POST['pagamento']; // Método de pagamento
        $nomtitular = $_POST['nomtitular']; // Nome do titular (cheque/dinheiro)
        $numcartao = isset($_POST['numcartao']) ? $_POST['numcartao'] : '';
        $mes = isset($_POST['mes']) ? $_POST['mes'] : '';
        $anoc = isset($_POST['anoc']) ? $_POST['anoc'] : '';
        $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';
        $imagem = isset($_POST['selectedImage']) ? $_POST['selectedImage'] : '';
        $parcelas = isset($_POST['parcelas']) ? $_POST['parcelas'] : '';
        $depositar = ($pagamento == 'cartao') ? '-' : (isset($_POST['depositar']) ? $_POST['depositar'] : '');
        $valortotal = $_POST['valortotal']; // Valor total da compra+
        $cor = 'Não Definido';
        $quilometragem = 'Não Definido';
        $combustivel = 'Não Definido';
        

        $controller->criarRegistroCompra($nome, $cpf, $endereco, $email, $telefone, $modelo, $ano, $placa, $inform, $estoque, $pagamento, $nomtitular, $numcartao, $mes, $anoc, $codigo, $parcelas, $depositar, $valortotal, $imagem, $cor, $quilometragem, $combustivel);
    } else {
        echo "Todos os campos obrigatórios devem ser preenchidos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../public/resources/ico/icon.jpg" type="image/png">
    <title>AgroMais Ltda. | Registro De Compras</title>
    <link rel="stylesheet" href="../../public/resources/css/index.css">
    <link rel="stylesheet" href="../../public/resources/css/rh-page.css">
    <link rel="stylesheet" href="../../public/resources/css/index-responsive.css">
    <link rel="stylesheet" href="../../public/resources/css/aside-responsive.css">
    <link rel="stylesheet" href="../../public/resources/css/cf-page.css">
    <link rel="stylesheet" href="../../public/resources/css/cfv-page.css">
    <link rel="stylesheet" href="../../public/resources/css/cf-responsive.css">
    <style>
         .hidden {
            display: none;
        }
        button:hover {
            cursor: pointer;
        }
        </style>
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
                    <a href="cf.php"><img src="../../public/resources/assets/img/CF.png"></a>
                    <h1>CF</h1>
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
                    <img src="../../public/resources/assets/img/doc.png">
                    <h1>Documentos</h1>
                </div>
                <br>
                <div class="lista">
                    <ul>
                        <li><a href="cf.php"><img src="../../public/resources/assets/img/+.png">Emissão de Documentos Fiscais</a></li>
                        <li><a href="listacompras.php"><img src="../../public/resources/assets/img/lista.png">Lista de Compras</a></li>
                        <li><a href="listavendas.php"><img src="../../public/resources/assets/img/lista.png">Lista de Vendas</a></li>
                    </ul>
                </div>
            </div>
            <br><br><br>
            <div class="competencias-section">
                <div class="funcionarios-section">
                    <div class="funcionarios-title" id="fun">
                       <img src="../../public/resources/assets/img/f.png">
                        <h1>Controle Financeiro</h1>
                    </div>
                    <br>
                    <div class="lista">
                        <ul>
                            <li><a href="vendas.php"><img src="../../public/resources/assets/img/vendas.png">Registro de Vendas</a></li>
                            <li><a href="compras.php"><img src="../../public/resources/assets/img/compras.png">Registro de Compras</a></li>
                            
                            
                        </ul>
                    </div>
                </div>


        </aside>
        <div class="main-title">
            <div class="title-section">
                <div class="direction"> 
                <img src="../../public/resources/assets/img/ico-b.png">

                    <h1>Registro de Compras</h1>
                </div>
                <h2>Este formulario permite que você registre uma compra em sua empresa/organização.</h2>
            </div>
            <form method="post" id="meuFormulario">
            <div class="sub-content">
            <div class="dd">
                    
                <div class="dd-bg">
                
                    <div class="title-cf">
                        <h1>Fornecedor</h1>
                    </div>
                    <div class="dd-bgf">
                    <div class="esq">
                    <div class="dd-content">
                        <label>Nome:</label>
                        <input type="text" name="nome" placeholder="Nome Completo">
                    </div>
                    <div class="dd-content">
                        <label>CPF:<span>fff</span></label>
                        <input type="number" name="cpf" placeholder="CPF">
                    </div>
                    
                    </div>

                    <div class="dire">
                    
                    <div class="dd-content">
                        <label>Endereço:</label>
                        <input type="text" name="endereco" placeholder="Endereço">
                    </div>

                    
                    <div class="dd-content">
                        <label>E-mail:<span>LLL</span></label>
                        <input type="email" name="email" placeholder="E-mail">
                    </div>

                    <div class="dd-content">
                        <label>Telefone:<span>L</span></label>
                        <input type="number" name="telefone" placeholder="Telefone p/ Contato">
                    </div>
                </div>
                </div>
                </div>

                <BR><BR>


                <div class="dd-bg">
                
                    <div class="title-cf">
                        <h1>Veículo</h1>
                    </div>
                    <div class="dd-bgf">
                    <div class="esq">
                    <div class="dd-content">
                        <label>Modelo:</label>
                        <input type="text" name="modelo" placeholder="Modelo de veículo">
                    </div>
                    <div class="dd-content">
                        <label>Ano:<span>fff</span></label>
                        <input type="number" name="ano" placeholder="Ano de Fabricação">
                    </div>
                    
                    </div>

                    <div class="dire">
                    
                    <div class="dd-content">
                        <label>Placa:<span>LLLLLLLLLL</span></label>
                        <input type="text" name="placa" placeholder="Placa do veículo">
                    </div>

                    
                    <div class="dd-content">
                        <label>Inform Adicional:</label>
                        <input type="text" name="inform" placeholder="Tirando cor e combustível...">
                    </div>

                    <div class="dd-content">
                        <label>Qnt. Estoque:<span>LLLL</span></label>
                        <input type="number" name="estoque" placeholder="Quantidade no estoque">
                    </div>
                </div>
                </div>
                </div>

                <br><br>


                <div class="dd-bg" id="rz">
                
                    <div class="title-cf">
                        <h1>Pagamento</h1>
                    </div>
                    <div class="dd-bgf">
                    <div class="dd-content">
                        <label>Forma de pagamento:</label>
                        <select name="pagamento" id="metodoPagamento" required>
                        <option value="" selected disabled>Escolha o método de pagamento</option>
    <option value="cartao">Cartão</option>
    <option value="cheque">Cheque</option>
    <option value="dinheiro">Dinheiro</option>     
                        </select>
                    </div>
                </div>
                </div>
                

            <br><br>


                <div class="dd-bg hidden" id="rzz">
                
                    <div id= "cartaoDetails" class="title-cf hidden">
                        <h1>Cartão</h1>
                    </div>
                    <div id= "cartaoDetails1" class="dd-bgf hidden">
                    <div id= "cartaoDetails2" class="esq hidden">
                    <div class="dd-content">
                        <label>Num. Cartão:<span>L</span></label>
                        <input type="number" name="numcartao" placeholder="Apenas numeros s/espaço">
                    </div>
                    <div class="dd-content">
                        <label>Nom. Titular:<span>fff</span></label>
                        <input type="text" name="nomtitular" placeholder="Nome impresso no cart.">
                    </div>

                    <div class="dd-content">
                        <label>Data de Val.:<span>fff</span></label>
                        <div id="cartao"><input id="es" type="number" name="mes" placeholder="Mês">
                        <input type="number" name="anoc" placeholder="Ano">
                        </div>
                    </div>
                    
                    </div>

                    <div class="dire">
                    
                    <div class="dd-content">
                        <label>Cod. Segurança:<span>LL</span></label>
                        <input type="number" name="codigo" placeholder="Código de Segurança">
                    </div>

                    <div class="dd-content">
                    <label for="parcelas">Parcelas:</label>
    <input type="number" name="parcelas" id="inputParcelas" placeholder="Parcelas   ">
</div>
                
                    
                    <div class="dd-content">
                    <div class="finish-button">
                    <div class="f-button"><button>Finalizar</button></div>
                    
                    </div>
                    </div>
                    


                

                    
                </div>



                



    </div>

                </div>

                <br>
                <br>







                <div id="rzzz" class="dd-bg">
                
                <div id= "chequeDinheiroDetails" class="title-cf">
                    <h1>Dinheiro/Cheque</h1>
                </div>
                <div id= "chequeDinheiroDetails1" class="dd-bgf">
                <div id= "chequeDinheiroDetails2" class="esq">
                <div class="dd-content">
                    <label>Nom. Titular:<span>L</span></label>
                    <input type="text" name="nomtitular" placeholder="Nome">
                </div>
                </div>
                <div class="dire">
                
                <div class="dd-content">
                    <label>Valor Total:<span>LL</span></label>
                    <input type="text" name="valortotal" placeholder="Valor Total a ser pago">
                </div>

                
                <div class="dd-content">
                    <label>Depositar na conta:<span>L</span></label>
                    <input type="text" name="depositar" placeholder="Depositar na Conta">
                </div>

                
                <div class="dd-content">
                <div class="finish-button">
                <div class="f-button"><button>Finalizar</button></div>
                </div>
                </div>


                </div>
            </div>
    </form>
    </section>

    <script src="../../public/resources/js/logoutalter.js"></script>
    <script src="../../public/resources/js/cartao.js"></script>
</body>

</html>