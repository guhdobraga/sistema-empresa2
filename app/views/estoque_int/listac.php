<!DOCTYPE html>
<html>
<head>
    <title>Lista EStoque Interno</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista EStoque Interno</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Fornecedor</th>
                        <th>Lote</th>
                        <th>Lugar</th>
                        <th>Validade</th>
                    </tr>
                </thead>
                <?php foreach ($estoquesc as $estoque): ?>
                    <tbody>
                        <tr class= "sessao">
                            <td><?php echo $estoque['id']; ?></td>
                            <td><?php echo $estoque['nome']; ?></td>
                            <td><?php echo $estoque['qntd']; ?></td>
                            <td><?php echo $estoque['fornecedor']; ?></td>
                            <td><?php echo $estoque['lote']; ?></td>
                            <td><?php echo $estoque['lugar']; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($estoque['validade'])); ?></td>
                            </tr>
                <?php endforeach; ?>
                <tbody>
            </table>
            </fieldset>
</body>
</html>