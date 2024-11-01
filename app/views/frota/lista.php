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
                        <th>Opções</th>
                    </tr>
                </thead>
                <?php foreach ($veiculos as $veiculo): ?>
                    <tbody>
                        <tr class= "sessao">
                            <td><?php echo $veiculo['id']; ?></td>
                            <td><?php echo $veiculo['marca']; ?></td>
                            <td><?php echo $veiculo['placa']; ?></td>
                            <td><?php echo $veiculo['ano']; ?></td>
                            <td><?php echo $veiculo['tipo']; ?></td>
                            <?php
                                echo "<td><a class='btn-editar' style='color:blue;'
                                href='atualizarfrota.php?id={$veiculo['id']}'>Atualizar</a></td>";

                            ?>
                            </tr>
                <?php endforeach; ?>
                <tbody>
            </table>
            </fieldset>
</body>
</html>