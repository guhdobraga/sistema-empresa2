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
                        <th>Modelo</th>
                        <th>Ano</th>
                        <th>Cor</th>
                        <th>Quilometragem</th>
                        <th>Combustível</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <?php foreach ($compras as $compra): ?>
                    <tbody>
                        <tr class= "sessao">
                            <td><?php echo $compra['id']; ?></td>
                            <td><?php echo $compra['modelo']; ?></td>
                            <td><?php echo $compra['ano']; ?></td>
                            <td><?php echo $compra['cor']; ?></td>
                            <td><?php echo $compra['quilometragem']; ?></td>
                            <td><?php echo $compra['combustivel']; ?></td>
                            <?php
                            echo "<td><a class='btn-editar' style='color:blue;' href='controle-estoque.php?id={$compra['id']}'>Controle</a></td>";
                            ?>
                            </tr>
                <?php endforeach; ?>
                <tbody>
            </table>
            </fieldset>
</body>
</html>