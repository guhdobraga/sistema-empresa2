<?php
require_once 'C:\xampp\htdocs\sistema-empresa\app\model\RegistroRVModel.php';

class RegistroRVController {
    private $registroRVModel;

    public function __construct($pdo) {
        $this->registroRVModel = new RegistroRVModel($pdo);
    }

    public function criarRegistroVendas($placa, $inform, $numfiscal, $data, $valor, $nomev, $comissao, $duracao, $cobertura, $termos, $seguro, $texto_seguro, $planomenu, $texto_plano, $nenhum, $status, $datav, $pagamento, $nomtitular, $numcartao, $mes, $anoc, $codigo, $parcelas, $depositar, $valortotal, $imagem) {
        $this->registroRVModel->criarRegistroVendas($placa, $inform, $numfiscal, $data, $valor, $nomev, $comissao, $duracao, $cobertura, $termos, $seguro, $texto_seguro, $planomenu, $texto_plano, $nenhum, $status, $datav, $pagamento, $nomtitular, $numcartao, $mes, $anoc, $codigo, $parcelas, $depositar, $valortotal, $imagem);
    }
    
    public function listarVendas() {
        return $this->registroRVModel->listarVendas();
    }

    public function exibirListaVenda() {
        $vendas = $this->registroRVModel->listarVendas();
        include 'C:\xampp\htdocs\sistema-empresa\app\views\vendas\lista.php';
    }
    public function exibirListaVendaC() {
        $vendasc = $this->registroRVModel->listarVendas();
        include 'C:\xampp\htdocs\sistema-empresa\app\views\vendas\listac.php';
    }

   
}
?>
