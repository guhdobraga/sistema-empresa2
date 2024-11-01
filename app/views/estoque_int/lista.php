<!DOCTYPE html>
<html>
<head>
    <title>Lista Estoque Interno</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de Estoque Interno</h1></legend>
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
                        <th>Opções</th>
                    </tr>
                </thead>
                <?php foreach ($estoques as $estoque): ?>
                    <tbody>
                        <tr class= "sessao">
                            <td><?php echo $estoque['id']; ?></td>
                            <td><?php echo $estoque['nome']; ?></td>
                            <td><?php echo $estoque['qntd']; ?></td>
                            <td><?php echo $estoque['fornecedor']; ?></td>
                            <td><?php echo $estoque['lote']; ?></td>
                            <td><?php echo $estoque['lugar']; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($estoque['validade'])); ?></td>
                            <?php
                                echo "<td><a class='btn-editar' style='color:blue;'
                                href='atualizarproduto.php?id={$estoque['id']}'>Atualizar</a></td>";

                            ?>
                            </tr>
                <?php endforeach; ?>
                <tbody>
            </table>
            </fieldset>
</body>
</html>