<?php
require_once '../config/config.php';
require_once '../app/controllers/RegistroRCController.php';

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Compra</title>
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
<input type="text" name="cpf" id="inputCPF"><br>

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
    </script>
</form>
</body>
</html>