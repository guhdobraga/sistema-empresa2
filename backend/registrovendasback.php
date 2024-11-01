<?php
require_once '../config/config.php';
require_once '../app/controllers/RegistroRVController.php';

$controller = new RegistroRVController($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos obrigatórios estão preenchidos
    if (!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['endereco']) && !empty($_POST['email']) && !empty($_POST['telefone']) && !empty($_POST['modelo']) && !empty($_POST['ano']) && !empty($_POST['placa']) && !empty($_POST['estoque']) && !empty($_POST['numfiscal']) && !empty($_POST['data']) && !empty($_POST['valor']) && !empty($_POST['nomev']) && !empty($_POST['comissao']) && !empty($_POST['duracao']) && !empty($_POST['cobertura']) && !empty($_POST['termos']) && !empty($_POST['status']) && !empty($_POST['datav']) && !empty($_POST['pagamento'])  && !empty($_POST['nomtitular']) && !empty($_POST['valortotal'])) {

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

        $controller->criarRegistroVendas($nome, $cpf, $endereco, $email, $telefone, $modelo, $ano, $placa, $inform, $estoque, $numfiscal, $data, $valor, $nomev, $comissao, $duracao, $cobertura, $termos, $seguro, $texto_seguro, $planomenu, $texto_plano, $nenhum, $status, $datav, $pagamento, $nomtitular, $numcartao, $mes, $anoc, $codigo, $parcelas, $depositar, $valortotal, $imagem);
    } else {
        echo "Todos os campos obrigatórios devem ser preenchidos.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Venda</title>
    <style>
        .hidden {
            display: none;
        }
        img {
            width: 40px;
            height: 20px;
            cursor: pointer;
            border: 2px solid transparent; /* Borda transparente por padrão */
        }
        .selected {
            border: 2px solid blue;
            transition: 0.5s;
        }

    </style>
</head>
<body>
    <form method="post"  id="meuFormulario">
<h2>Fornecedor</h2>

<label for="nome">Nome:</label>
<input type="text" name="nome" id="inputNome"><br>

<label for="cpf">CPF:</label>
<input type="number" name="cpf" id="inputCPF"><br>

<label for="endereco">Endereço:</label>
<input type="text" name="endereco" id="inputEndereco"><br>

<label for="email">E-mail:</label>
<input type="email" name="email" id="inputEmail"><br>

<label for="telefone">Telefone:</label>
<input type="number" name="telefone" id="inputTelefone"><br>

<h2>Veículo</h2>

<label for="modelo">Modelo:</label>
<input type="text" name="modelo" id="inputModelo"><br>

<label for="ano">Ano:</label>
<input type="number" name="ano" id="inputAno"><br>

<label for="placa">Placa:</label>
<input type="text" name="placa" id="inputPlaca"><br>

<label for="inform">Inform. Adicional:</label>
<input type="text" name="inform" id="inputInform"><br>

<label for="estoque">Qnt. estoque:</label>
<input type="number" name="estoque" id="inputEstoque"><br>

<h2>Documento Fiscal</h2>

<label for="numfiscal">Número Fiscal</label>
<input type="number" name= "numfiscal" id= "inputNumfiscal"><br>

<label for="data">Data</label>
<input type="date" name= "data" id= "inputData"><br>

<label for="valor">Valor</label>
<input type="number" name= "valor" id= "inputValor"><br>

<select name="pagamento" required>
<option value="" selected disabled>Escolha a Condição de Pagamento</option>
<option value="parcelado">Parcelado</option>
<option value="parcelado com entrada">Parcelado + Entrada</option>
<option value="a vista">À vista</option>
    </select><br>

<h2>Vendedor</h2>

<label for="nomev">Nome:</label>
<input type="text" name= "nomev" id= "inputNomevendedor"><br>

<label for="comissao">Comissão:</label>
<input type="text" name= "comissao" id= "inputComissao"><br>

<h2>Garantia e Serviços</h2>

<h3>Garantia</h3>

<label for="duracao">Duração:</label>
<input type="text" name="duracao" id="inputDuracao"><br>

<label for="cobertura">Cobertura:</label>
<input type="text" name="cobertura" id="inputCobertura"><br>

<label for="termos">Termos e Condições:</label>
<input type="text" name="termos" id="inputTermos"><br>

<h3>Adicionais</h3>

<input type="checkbox" name="seguro" value= "sim" id="segurocheck">Seguro
<input type="text" name="texto_seguro" id="inputSeguro"><br>

<input type="checkbox" name="planomanu" value= "sim" id= "planocheck">Plano de Manutenção
<input type="text" name="texto_plano" id="inputPlanomanu"><br>

<input type="checkbox" name="nenhum" value="sim" id= "nenhumcheck">Nenhum<br>

<h2>Documentação do Veículo</h2>

<select name="status">
    <option value="" selected disabled>Escolha o Status do Veículo</option>
    <option value="processo">Em processo</option>
    <option value="registrado">Registrado</option>
</select><br>

<label for="datav">Data:</label>
<input type="date" name="datav" id="InputDatav">

<h2>Pagamento</h2>

<select name="pagamento" id="metodoPagamento" required>
    <option value="" selected disabled>Escolha o método de pagamento</option>
    <option value="cartao">Cartão</option>
    <option value="cheque">Cheque</option>
    <option value="dinheiro">Dinheiro</option>
</select><br><br>

<label for="nomtitular">Nome do Titular:</label>
    <input type="text" name="nomtitular" id="inputNomTitular"><br>
    
<div id="cartaoDetails" class="hidden">
    <h2>Detalhes do Cartão</h2>
    <img src="../public/resources/assets/img/visa.png" onclick="selectImage(this)" width= "20px" height = "10px">
    <img src="../public/resources/assets/img/mastercard.jpg" onclick="selectImage(this)"width= "20px" height = "10px">
    <img src="../public/resources/assets/img/american.png" onclick="selectImage(this)"width= "20px" height = "10px">
    <img src="../public/resources/assets/img/elo.png" onclick="selectImage(this)"width= "20px" height = "10px">
    <img src="../public/resources/assets/img/diners.png" onclick="selectImage(this)"width= "20px" height = "10px">
    <img src="../public/resources/assets/img/hipercard.png" onclick="selectImage(this)"width= "20px" height = "10px">
    <img src="../public/resources/assets/img/jcb.jpg" onclick="selectImage(this)" width= "20px" height = "10px"><br>

    <input type="hidden" id="selectedImage" name="selectedImage" value="">

    <label for="numcartao">Número do Cartão:</label>
    <input type="number" name="numcartao" id="inputNumCartao"><br>

    <label>Data de Validade:</label>
    <input type="number" name="mes" id="inputMes" placeholder="Mês">
    <input type="number" name="anoc" id="inputAnoC" placeholder="Ano"><br>

    <label for="codigo">Código de Segurança:</label>
    <input type="number" name="codigo" id="inputCodigo"><br>

    <label for="parcelas">Parcelas:</label>
    <input type="number" name="parcelas" id="inputParcelas"><br>
</div>

<div id="chequeDinheiroDetails" class="hidden">
    <h2>Detalhes do Cheque/Dinheiro</h2>

    <label for="depositar">Depositar na Conta:</label>
    <input type="number" name="depositar" id="inputDepositar"><br>
</div>

<label for="valortotal">Valor Total:</label>
<input type="number" name="valortotal" id="inputValorTotal"><br>

<input type="submit" value="Finalizar">

<h2>Resumo de Compra</h2>
<div id="resumoCompra"></div>

    <script src="..\public\resources\js\cartao.js"></script>
    <script>
      function selectImage(img) {
    console.log('Clicou na imagem:', img.src);

    // Remover a classe 'selected' de todas as imagens
    document.querySelectorAll('img').forEach(function(image) {
        image.classList.remove('selected');
    });

    // Adicionar a classe 'selected' à imagem clicada
    img.classList.add('selected');

    // Extrair o nome da imagem (sem o caminho)
    const imageNameWithExtension = img.src.split('/').pop(); // Extrai o último segmento (nome do arquivo com extensão)
    const imageName = imageNameWithExtension.split('.')[0]; // Obtém o nome do arquivo sem a extensão

    // Definir o valor do campo hidden com o nome da imagem
    document.getElementById('selectedImage').value = imageName;

   
    // Mostrar o nome da imagem selecionada (para fins de depuração)
    console.log('Imagem selecionada:', imageName);
}

document.addEventListener('DOMContentLoaded', function() {
        const checkbox1 = document.getElementById('segurocheck');
        const checkbox2 = document.getElementById('planocheck');
        const checkbox3 = document.getElementById('nenhumcheck');

        checkbox3.addEventListener('change', function() {
            if (this.checked) {
                // Desmarcar os outros dois checkboxes se o checkbox3 for marcado
                checkbox1.checked = false;
                checkbox2.checked = false;
            }
        });
        checkbox2.addEventListener('change', function() {
                if (this.checked) {
                    checkbox3.checked = false;
                }
            });

            checkbox1.addEventListener('change', function() {
                if (this.checked) {
                    checkbox3.checked = false;
                }
            });
    });
    </script>
    </form>
</body>
</html>