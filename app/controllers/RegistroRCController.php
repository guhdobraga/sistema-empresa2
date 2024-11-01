<?php
require_once 'C:\xampp\htdocs\sistema-empresa\app\model\RegistroRCModel.php';

class RegistroRCController {
    private $registroRCModel;

    public function __construct($pdo) {
        $this->registroRCModel = new RegistroRCModel($pdo);
    }

    public function criarRegistroCompra($nome, $cpf, $endereco, $email, $telefone, $modelo, $ano, $placa, $inform, $estoque, $pagamento, $nomtitular, $numcartao, $mes, $anoc, $codigo, $parcelas, $depositar, $valortotal, $imagem, $cor, $quilometragem, $combustivel) {
        $this->registroRCModel->criarRegistroCompra($nome, $cpf, $endereco, $email, $telefone, $modelo, $ano, $placa, $inform, $estoque, $pagamento, $nomtitular, $numcartao, $mes, $anoc, $codigo, $parcelas, $depositar, $valortotal, $imagem, $cor, $quilometragem, $combustivel);
    }
    
    public function listarCompras() {
        return $this->registroRCModel->listarCompra();
    }

    public function exibirListaCompra() {
        $compras = $this->registroRCModel->listarCompra();
        include 'C:\xampp\htdocs\sistema-empresa\app\views\carro\lista.php';
    }
    public function exibirListaCompraC() {
        $comprasc = $this->registroRCModel->listarCompra();
        include 'C:\xampp\htdocs\sistema-empresa\app\views\carro\listac.php';
    }

   
}
?>
