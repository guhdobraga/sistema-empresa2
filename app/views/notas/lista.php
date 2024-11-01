<!DOCTYPE html>
<html>
<head>
    <title>Lista de Notas</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de Notas</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Número</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <?php foreach ($notasfiscais as $notafiscal): ?>
                    <tbody>
                        <tr class= "sessao">
                            <td><?php echo $notafiscal['id']; ?></td>
                            <td><?php echo $notafiscal['nome']; ?></td>
                            <td><?php echo $notafiscal['numero']; ?></td>
                            <?php
                            echo "<td><a class='btn-editar' style='color:blue;'
                           href='atualizarnota.php?id={$notafiscal['id']}'>Atualizar</a></td>";
                            ?>
                            </tr>
                <?php endforeach; ?>
                <tbody>
            </table>
            </fieldset>
</body>
</html>