<!DOCTYPE html>
<html>
<head>
    <title>Lista de faturas</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de faturas e fornecedores</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título da Fatura</th>
                        <th>Fornecedor</th>
                        <th>CNPJ</th>
                        <th>Data de vencimento</th>
                        <th>Valor da Fatura</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <?php 
    $total = 0; // Inicializa a variável total
    foreach ($gestoes as $gestao): 
        $total += $gestao['valor']; // Soma o valor atual ao total
    ?>
        <tbody>
            <tr class="sessao">
                <td><?php echo $gestao['id']; ?></td>
                <td><?php echo $gestao['titulo_fatura']; ?></td>
                <td><?php echo $gestao['fornecedor']; ?></td>
                <td><?php echo $gestao['cnpj']; ?></td>
                <td><?php echo date('d/m/Y', strtotime($gestao['vencimento'])); ?></td>
                <td><?php echo number_format($gestao['valor'], 2, ',', '.'); ?></td>
                <td><a class="btn-editar" style="color:blue;" href="atualizarfatura.php?id=<?php echo $gestao['id']; ?>">Atualizar</a></td>
            </tr>
        </tbody>
    <?php endforeach; ?>
    <tfoot>
        <tr>
            <td colspan="5" style="text-align:right;"><strong>Total:</strong></td>
            <td><strong><?php echo number_format($total, 2, ',', '.'); ?></strong></td>
            <td></td>
        </tr>
    </tfoot>
</table>
            </fieldset>
</body>
</html>