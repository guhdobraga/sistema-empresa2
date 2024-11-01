<?php
session_start();
include_once '../verifica_login.php';
include_once '../config/config.php';
require '../vendor/autoload.php';

use Dompdf\Dompdf;

require_once '../app/controllers/RegistroFController.php';
require_once '../app/controllers/RegistroNFController.php';
require_once '../app/controllers/RegistroRCController.php';
require_once '../app/controllers/RegistroRVController.php';
require_once '../app/controllers/EstoqueIController.php';
require_once '../app/controllers/GestaoFController.php';

$dompdf = new Dompdf();

// Combine todos os conteúdos das listas em um único HTML
$html = ''; // Inicialize a variável HTML
$html .= '<meta charset="utf-8">';

$registroFController = new RegistroFController($pdo);
$funcionarios = $registroFController->listarFuncionario();
$registroNFController = new RegistroNFController($pdo);
$notasfiscais = $registroNFController->listarNF();
$registroRCController = new RegistroRCController($pdo);
$compras = $registroRCController->listarCompras();
$registroRVController = new RegistroRVController($pdo);
$vendas = $registroRVController->listarVendas();
$estoqueIController = new EstoqueIController($pdo);
$estoques = $estoqueIController->listarEstoque();

$gestaoFController = new GestaoFController($pdo);
$gestoes = $gestaoFController->listarGestaoFinanceira();


// Adicione o conteúdo HTML de cada lista, mantendo o título <h1> acima da tabela com espaço entre eles
$html .= '<div style="margin-bottom: 20px;"><h1>Funcionários</h1>' . formatarLista($funcionarios) .'</div>'; // Adiciona espaço após a primeira lista
$html .= '<div style="margin-bottom: 20px;"><h1>Notas</h1>' . formatarLista2($notasfiscais) .'</div>'; // Adiciona espaço após a segunda lista
$html .= '<div style="margin-bottom: 20px;"><h1>Carros</h1>' . formatarLista3($compras) . '</div>'; // Adiciona espaço após a terceira lista
$html .= '<div style="margin-bottom: 20px;"><h1>Vendas</h1>' . formatarLista4($vendas) . '</div>'; // Adiciona espaço após a quarta lista
$html .= '<div style="margin-bottom: 20px;"><h1>Estoque Interno</h1>' . formatarLista5($estoques) . '</div>'; // Adiciona espaço após a quinta lista
$html .= '<div style="margin-bottom: 20px;"><h1>Gestão Financeira</h1>' . formatarLista6($gestoes) . '</div>'; // Adiciona espaço após a sexta lista
$html .= '<div style="margin-bottom: 20px;"><h1>Frota de Veículos</h1>' . formatarLista7($veiculo) . '</div>'; // Adiciona espaço após a sexta lista

function formatarLista($funcionarios) {
    $html = '<table border="1">'; // Inicia a tabela HTML
    // Adiciona cabeçalho da tabela
    $html .= '<thead><tr><th>ID</th><th>Título</th><th>Nome</th><th>Email</th><th>Nível de Permissão</th></tr></thead>';
    $html .= '<tbody>'; // Inicia o corpo da tabela
    // Adiciona os dados dos funcionários à tabela
    foreach ($funcionarios as $funcionario) {
        $html .= '<tr>';
        $html .= '<td>' . $funcionario['id_funcionario'] . '</td>';
        $html .= '<td>' . $funcionario['titulo'] . '</td>';
        $html .= '<td>' . $funcionario['pnome'] . '</td>';
        $html .= '<td>' . $funcionario['email'] . '</td>';
        $html .= '<td>' . $funcionario['cargo'] . '</td>';
        $html .= '</tr>';
    }
    $html .= '</tbody>'; // Fecha o corpo da tabela
    $html .= '</table>'; // Fecha a tabela HTML
    return $html;
}

function formatarLista2($notasfiscais) {
    $html = '<table border="1">'; // Inicia a tabela HTML
    // Adiciona cabeçalho da tabela
    $html .= '<thead><tr><th>ID</th><th>Nome</th><th>Número</th></tr></thead>';
    $html .= '<tbody>'; // Inicia o corpo da tabela
    // Adiciona os dados dos funcionários à tabela
    foreach ($notasfiscais as $notafiscal) {
        $html .= '<tr>';
        $html .= '<td>' . $notafiscal['id'] . '</td>';
        $html .= '<td>' . $notafiscal['nome'] . '</td>';
        $html .= '<td>' . $notafiscal['numero'] . '</td>';
        $html .= '</tr>';
    }
    $html .= '</tbody>'; // Fecha o corpo da tabela
    $html .= '</table>'; // Fecha a tabela HTML
    return $html;
}

function formatarLista3($compras) {
    $html = '<table border="1">'; // Inicia a tabela HTML
    // Adiciona cabeçalho da tabela
    $html .= '<thead><tr><th>ID</th><th>Modelo</th><th>Ano</th><th>Cor</th><th>Quilometragem</th><th>Combustível</th></tr></thead>';
    $html .= '<tbody>'; // Inicia o corpo da tabela
    // Adiciona os dados dos funcionários à tabela
    foreach ($compras as $compra) {
        $html .= '<tr>';
        $html .= '<td>' . $compra['id'] . '</td>';
        $html .= '<td>' . $compra['modelo'] . '</td>';
        $html .= '<td>' . $compra['ano'] . '</td>';
        $html .= '<td>' . $compra['cor'] . '</td>';
        $html .= '<td>' . $compra['quilometragem'] . '</td>';
        $html .= '<td>' . $compra['combustivel'] . '</td>';
        $html .= '</tr>';
    }
    $html .= '</tbody>'; // Fecha o corpo da tabela
    $html .= '</table>'; // Fecha a tabela HTML
    return $html;
}

function formatarLista4($vendas) {
    $html = '<table border="1">'; // Inicia a tabela HTML
    // Adiciona cabeçalho da tabela
    $html .= '<thead><tr><th>ID</th><th>Nome</th><th>Número Fiscal</th><th>Data</th><th>Pagamento</th><th>Valor Total</th>
    </tr>
</thead>';
    $html .= '<tbody>'; // Inicia o corpo da tabela
    // Adiciona os dados dos funcionários à tabela
    foreach ($vendas as $venda) {
        $html .= '<tr>';
        $html .= '<td>' . $venda['id'] . '</td>';
        $html .= '<td>' . $venda['nomev'] . '</td>';
        $html .= '<td>' . $venda['numfiscal'] . '</td>';
        $html .= '<td>' . date('d/m/Y', strtotime($venda['data'])) . '</td>';
        $html .= '<td>' . $venda['pagamento'] . '</td>';
        $html .= '<td>R$ ' . $venda['valortotal'] . '</td>';
        $html .= '</tr>';
    }
    $html .= '</tbody>'; // Fecha o corpo da tabela
    $html .= '</table>'; // Fecha a tabela HTML
    return $html;
}

function formatarLista5($estoques) {
    $html = '<table border="1">'; // Inicia a tabela HTML
    // Adiciona cabeçalho da tabela
    $html .= '<thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Quantidade</th>
        <th>Fornecedor</th>
        <th>Lote</th>
        <th>Lugar</th>
        <th>Validade</th>
    </tr>
</thead>';
    $html .= '<tbody>'; // Inicia o corpo da tabela
    // Adiciona os dados dos funcionários à tabela
    foreach ($estoques as $estoque) {
        $html .= '<tr>';
        $html .= '<td>' . $estoque['id'] . '</td>';
        $html .= '<td>' . $estoque['nome'] . '</td>';
        $html .= '<td>' . $estoque['qntd'] . '</td>';
        $html .= '<td>' . $estoque['fornecedor'] . '</td>';
        $html .= '<td>' . $estoque['lote'] . '</td>';
        $html .= '<td>' . $estoque['lugar'] . '</td>';
        $html .= '<td>' . date('d/m/Y', strtotime($estoque['validade'])) . '</td>';
        $html .= '</tr>';
    }
    $html .= '</tbody>'; // Fecha o corpo da tabela
    $html .= '</table>'; // Fecha a tabela HTML
    return $html;
}

function formatarLista6($gestoes) {
    $html = '<table border="1">'; // Inicia a tabela HTML
    // Adiciona cabeçalho da tabela
    $html .= '<thead>
    <tr>
        <th>ID</th>
        <th>Título da Fatura</th>
        <th>Fornecedor</th>
        <th>CNPJ</th>
        <th>Data de vencimento</th>
        <th>Valor da Fatura</th>
    </tr>
</thead>';
$total = 0;
    $html .= '<tbody>'; // Inicia o corpo da tabela
    // Adiciona os dados dos funcionários à tabela
    foreach ($gestoes as $gestao) {
        $total += $gestao['valor']; // Soma o valor atual ao total
        $html .= '<tr>';
        $html .= '<td>' . $gestao['id'] . '</td>';
        $html .= '<td>' . $gestao['titulo_fatura'] . '</td>';
        $html .= '<td>' . $gestao['fornecedor'] . '</td>';
        $html .= '<td>' . $gestao['cnpj'] . '</td>';
        $html .= '<td>' . $gestao['vencimento'] . '</td>';
        $html .= '<td>' . number_format($gestao['valor'], 2, ',', '.') . '</td>';
        $html .= '</tr>';
    }
    $html .= '</tbody>' ; // Fecha o corpo da tabela
    $html .=  "<tfoot>
    <tr>
        <td colspan='5' style= 'text-align:right;'><strong>Total:</strong></td>
        <td><strong>" . number_format($total, 2, ',', '.') . "</strong></td>
        <td></td>
    </tr>
</tfoot>";
    $html .= '</table>'; // Fecha a tabela HTML
    return $html;
}

function formatarLista7($veiculos) {
    $html = '<table border="1">'; // Inicia a tabela HTML
    // Adiciona cabeçalho da tabela
    $html .= '<thead>
    <tr>
    <th>ID</th>
    <th>Marca</th>
    <th>Placa</th>
    <th>Ano</th>
    <th>Tipo</th>
    </tr>
</thead>';
    $html .= '<tbody>'; // Inicia o corpo da tabela
    // Adiciona os dados dos funcionários à tabela
    foreach ($veiculos as $veiculo) {
        $html .= '<tr>';
        $html .= '<td>' . $veiculo['id'] . '</td>';
        $html .= '<td>' . $veiculo['marcca'] . '</td>';
        $html .= '<td>' . $veiculo['placa'] . '</td>';
        $html .= '<td>' . $veiculo['ano'] . '</td>';
        $html .= '<td>' . $veiculo['tipo'] . '</td>';
        $html .= '</tr>';
    }
    $html .= '</tbody>'; // Fecha o corpo da tabela
    $html .= '</table>'; // Fecha a tabela HTML
    return $html;
}

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="listas.pdf"');
echo $dompdf->output();

function removeLegend($html) {
    // Usa uma expressão regular para remover a tag <legend> e seu conteúdo
    return preg_replace('/<legend>.*?<\/legend>/', '', $html);
}
