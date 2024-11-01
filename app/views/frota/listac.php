<!DOCTYPE html>
<html>
<head>
    <title>Lista Frota de Veículos</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista da Frota de Veículos</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Placa</th>
                        <th>Ano</th>
                        <th>Tipo</th>
                    </tr>
                </thead>
                <?php foreach ($veiculosC as $veiculo): ?>
                    <tbody>
                        <tr class= "sessao">
                            <td><?php echo $veiculo['id']; ?></td>
                            <td><?php echo $veiculo['marca']; ?></td>
                            <td><?php echo $veiculo['placa']; ?></td>
                            <td><?php echo $veiculo['ano']; ?></td>
                            <td><?php echo $veiculo['tipo']; ?></td>
                            </tr>
                <?php endforeach; ?>
                <tbody>
            </table>
            </fieldset>
</body>
</html>