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

require_once '../app/controllers/RegistroRVController.php';

$controller = new RegistroRVController($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos obrigatórios estão preenchidos
    if (!empty($_POST['placa']) && !empty($_POST['numfiscal']) && !empty($_POST['data']) && !empty($_POST['valor']) && !empty($_POST['nomev']) && !empty($_POST['comissao']) && !empty($_POST['duracao']) && !empty($_POST['cobertura']) && !empty($_POST['termos']) && !empty($_POST['status']) && !empty($_POST['datav']) && !empty($_POST['pagamento'])  && !empty($_POST['valortotal'])) {

        // Recupera os dados do formulário
        $placa = $_POST['placa'];
        $inform = isset($_POST['inform']) ? $_POST['inform'] : ''; // Informação adicional
        $numfiscal = $_POST['numfiscal']; // Número fiscal
        $data = $_POST['data']; // Data da venda
        $valor = $_POST['valor']; // Valor da venda
        $nomev = $_POST['nomev']; // Nome do vendedor
        $comissao = $_POST['comissao']; // Comissão
        $duracao = $_POST['duracao']; // Duração
        $cobertura = $_POST['cobertura']; // Cobertura
        $termos = $_POST['termos']; // Termos
        $seguro = isset($_POST['seguro']) ? $_POST['seguro'] : ''; // Seguro
        $texto_seguro = isset($_POST['texto_seguro']) ? $_POST['texto_seguro'] : ''; // Texto do seguro
        $planomenu = isset($_POST['planomanu']) ? $_POST['planomanu'] : ''; // Plano de menu
        $texto_plano = isset($_POST['texto_plano']) ? $_POST['texto_plano'] : ''; // Texto do plano
        $nenhum = isset($_POST['nenhum']) ? $_POST['nenhum'] : ''; // Nenhum
        $status = $_POST['status']; // Status
        $datav = $_POST['datav']; // Data de validade
        $pagamento = $_POST['pagamento']; // Método de pagamento
        $nomtitular = $_POST['nomtitular']; // Nome do titular (cheque/dinheiro)
        $numcartao = isset($_POST['numcartao']) ? $_POST['numcartao'] : '';
        $mes = isset($_POST['mes']) ? $_POST['mes'] : '';
        $anoc = isset($_POST['anoc']) ? $_POST['anoc'] : '';
        $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';
        $parcelas = isset($_POST['parcelas']) ? $_POST['parcelas'] : '';
        $depositar = ($pagamento == 'cartao') ? '-' : (isset($_POST['depositar']) ? $_POST['depositar'] : '');
        $valortotal = $_POST['valortotal']; // Valor total da compra
        $imagem = isset($_POST['selectedImage']) ? $_POST['selectedImage'] : '';

        $controller->criarRegistroVendas($placa, $inform, $numfiscal, $data, $valor, $nomev, $comissao, $duracao, $cobertura, $termos, $seguro, $texto_seguro, $planomenu, $texto_plano, $nenhum, $status, $datav, $pagamento, $nomtitular, $numcartao, $mes, $anoc, $codigo, $parcelas, $depositar, $valortotal, $imagem);
    } else {
        echo "<div class= 'todos'>
        Todos os campos obrigatórios devem ser preenchidos.
        </div>";
    }
}   
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../public/resources/ico/icone.jpg" type="image/png">
    <title>AgroMais Ltda. | Registro De Compras</title>
    <link rel="stylesheet" href="../public/resources/css/index.css">
    <link rel="stylesheet" href="../public/resources/css/rh-page.css">
    <link rel="stylesheet" href="../public/resources/css/index-responsive.css">
    <link rel="stylesheet" href="../public/resources/css/aside-responsive.css">
    <link rel="stylesheet" href="../public/resources/css/cf-page.css">
    <link rel="stylesheet" href="../public/resources/css/cfv-page.css">
    <link rel="stylesheet" href="../public/resources/css/cfc-page.css">
    <link rel="stylesheet" href="../public/resources/css/cf-responsive.css">
    <style>
         .hidden {
            display: none;
        }
        button:hover {
            cursor: pointer;
        }
        .todos {
            color: black;
        }
        </style>
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

                    <h1>Registro de Vendas</h1>
                </div>
                <h2>Este formulario permite que você registre uma venda de sua empresa/organização.</h2>
            </div>
            <form method="post" id="meuFormulario">
            <div class="sub-content">
            <div class="dd">
                    
                <div class="dd-bg">
                
                    <div class="title-cf">
                        <h1>Documento Fiscal</h1>
                    </div>
                    <div class="dd-bgf">
                    <div class="esq">
                    <div class="dd-content">
                        <label>Numero Fiscal:</label>
                        <input type="text" name="numfiscal" placeholder="Nota Fiscal de Compra">
                    </div>


                    <div class="dd-content">
                        <label>Data:<span>LLLi</span></label>
                        <input type="date" name="data" placeholder="Data de Emissão de Nota">
                    </div>
                    </div>

                    <div class="dire">
                    
                    <div class="dd-content">
                        <label>Valor:<span>LLLLLi</span></label>
                        <input type="number" name="valor" placeholder="Valor Total">
                    </div>

                    
                    <div class="dd-content">
                        <label>Pagamento:<span></span></label>
                        <select name="pagamento">
                        <option value="" selected disabled>Escolha a Condição de Pagamento</option>
                        <option value="parcelado">Parcelado</option>
                        <option value="parcelado com entrada">Parcelado + Entrada</option>
                        <option value="a vista">À vista</option>
                        </select>
                    </div>

                </div>
                </div>
                </div>

                <BR><BR>


                <div class="dd-bg">
                
                    <div class="title-cf">
                        <h1>Vendedor</h1>
                    </div>
                    <div class="dd-bgf">
                    <div class="esq">
                    <div class="dd-content">
                        <label>Nome:<span>LLLi</span></label>
                        <input type="text" name="nomev" placeholder="Nome Completo">
                    </div>
                    <div class="dd-content">
                        <label>Comissão:</label>
                        <input type="text" name="comissao" placeholder="Comissão">
                    </div>
                    
                    </div>
                
                </div>
                </div>
                

                <br><br>


                <div class="dd-bg" id="z">
                
                    <div class="title-cf">
                        <h1>Garantia e Serviços</h1>
                    </div>
                    <div class="dd-bgf" id="f">
                    <div class="esquerda">

                    <div class="dd-content">
                    <label>Duração</label>
                    
                    </div>
                    
                    <div class="dd-content">
                    <label>Cobertura</label>
                    
                    </div>
                    <div class="dd-content">
                    <label>Termos e Condições </label>
                    
                    </div>

                    </div>

                    

                    
                    <div class="meio">

                    <div class="dd-content-meio">
                    <label >Garantia</label>
                    <input type="text" name="duracao" placeholder="Duração">
                    <input type="text" name="cobertura" placeholder="Cobertura">
                    <input type="text" name="termos" placeholder="Termos e Condições">
                    </div>

                    </div>

                    <div class="direita">
                    <div class="dd-content-meio">
                    <label>Adicionais</label>
                    <div class="flex">
                    <input type="checkbox" name="seguro" value="sim" id="seguro">
                    <span class="span-preto">Seguro</span>
                    <input type="text" name="texto_seguro">
                    </div>
                    <div class="flex">
                    <input type="checkbox" name="planomanu" id="Plano_de_manutencao">
                    <span class="span-preto">Plano de manutenção</span>
                    <input type="text" name="texto_plano">
                    </div> 
                    <div class="flex">
                    <input type="checkbox" name="nenhum" id="nenhum">
                    <span class="span-preto">Nenhum</span>
                    </div>
                    
</div>



                    </div>

                    </div>
            
                </div>
                

            <br><br>


                <div class="dd-bg">
                
                    <div class="title-cf">
                        <h1>Documentação do Veiculo</h1>
                    </div>
                    <div class="dd-bgf">
                        <div class="esq">
                    <div class="dd-content">
                        <label>Status de Documentação:</label>
                        <select name="status">
                        <option value="Em processo">Em processo</option>
                        <option value= "Registrado">Registrado</option>        
                        </select>
                    </div>
                    </div>

                    <div class="dire">
                        <div class="dd-content">
                        <label>Data Para<br> entrega do Veiculo:</label>
                        <input type="date" name="datav" placeholder="entrega do Veiculo">
                    </div>

                    <div class="dd-content">
                        <label>Placa:<span>LLLLLLLLLLLLI</span></label>
                        <input type="text" name="placa" placeholder="Placa do Veículo">
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
                    <select name="pagamento1" id="metodoPagamento" required>
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
    <div class="f-button"><input type="submit"></div>
    
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
<div class="f-button"><input type="submit"></div>
</div>
</div>
            </div>
            </div>
            


</form>         
    </section>

    <script src="../public/resources/js/logout.js"></script>
    <script src="../public/resources/js/cartao.js"></script>
</body>

</html>