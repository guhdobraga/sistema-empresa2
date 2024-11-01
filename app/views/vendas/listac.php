<!DOCTYPE html>
<html>
<head>
    <title>Lista de Carros</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de Carros</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Número Fiscal</th>
                        <th>Data</th>
                        <th>Pagamento</th>
                        <th>Valor Total</th>
                    </tr>
                </thead>
                <?php $total = 0; 
                 foreach ($vendasc as $venda): 
                    $total += $venda['valortotal'];
                 ?>
                    <tbody>
                        <tr class= "sessao">
                            <td><?php echo $venda['id']; ?></td>
                            <td><?php echo $venda['nomev']; ?></td>
                            <td><?php echo $venda['numfiscal']; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($venda['data'])); ?></td>
                            <td><?php echo $venda['pagamento']; ?></td>
                            <td><?php echo 'R$' , $venda['valortotal']; ?></td>
                            </tr></tbody>
                <?php endforeach; ?>
                <tfoot>
        <tr>
            <td colspan="5" style="text-align:right;"><strong>Lucro Total:</strong></td>
            <td><strong><?php echo 'R$' . number_format($total, 2, ',', '.'); ?></strong></td>
            <td></td>
        </tr>
    </tfoot>
            </table>
            </fieldset>
</body>
</html>