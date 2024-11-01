<?php


if (isset($_SESSION['usuarioNiveisAcessoId'])) {
    // Use uma estrutura condicional para redirecionar com base no nível de acesso do usuário
    switch ($_SESSION['usuarioNiveisAcessoId']) {
        case "1":
            require_once '../config/config.php';
            break;
        case "2":
            require_once '../../config/config.php';
            break;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Users</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de Users</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Compras</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Nível de Permissão</th>
                        <th>Opções</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <?php foreach ($funcionarios as $funcionario): ?>
                    <tbody>
                        <tr class= "sessao">
                            <td><?php echo $funcionario['id_funcionario']; ?></td>
                            <td><?php echo $funcionario['titulo']; ?></td>
                            <td><?php echo $funcionario['pnome']; ?></td>
                            <td><?php echo $funcionario['email']; ?></td>
                            <td><?php echo $funcionario['cargo']; ?></td>
                            <?php
                            echo "<td><a class='btn-editar' style='color:blue;' href='beneficios.php?id={$funcionario['id_funcionario']}'>Beneficios</a></td>";
                            ?>
                            <td>
                            <?php if (!($_SESSION['usuarioNiveisAcessoId'] == 2 && $funcionario['cargo'] == 1)): ?>
                                <a class="btn-editar" style="color:blue;" href="atualizarfunc.php?id=<?php echo $funcionario['id_funcionario']; ?>">Atualizar</a>
                                <?php endif; ?>
                                </td>
                            </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </fieldset>
</body>
</html>