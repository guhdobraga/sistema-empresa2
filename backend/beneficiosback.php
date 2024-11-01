<?php
require_once '../config/config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Beneficios</title>
</head>
<body>

<fieldset>
    <legend><h1>Lista de Benefícios</h1></legend>
    <table border="1">
        <tr>
            <th>Benefício</th>
            <th>Selecionar</th>
        </tr>
        <tr>
            <td>Fundo de Garantia do Tempo de Serviço (FGTS)</td>
            <td><input type="checkbox" name="fundog" data-id="fundog" value="Fundo de Garantia do Tempo de Serviço (FGTS)"></td>
        </tr>
        <tr>
            <td>Vale-Transporte</td>
            <td><input type="checkbox" name="vale_transporte" data-id="vale_transporte" value="Vale-Transporte"></td>
        </tr>
        <tr>
            <td>Férias Remuneradas</td>
            <td><input type="checkbox" name="ferias" data-id="ferias" value="Férias Remuneradas"></td>
        </tr>
        <tr>
            <td>Licença maternidade</td>
            <td><input type="checkbox" name="licença" data-id="licença" value="Licença maternidade"></td>
        </tr>
        <tr>
            <td>13° terceiro: é um salário adicional que os colaboradores recebem no final do ano</td>
            <td><input type="checkbox" name="13terceiro" data-id="terceiro" value="13° terceiro"></td>
        </tr>
        <tr>
            <td>Vale-Refeição e Alimentação</td>
            <td><input type="checkbox" name="vale_alimento" data-id="vale_alimento" value="Vale-Refeição e Alimentação"></td>
        </tr>
        <tr>
            <td>Plano de saúde e odontológico</td>
            <td><input type="checkbox" name="plano" data-id="plano" value="Plano de saúde e odontológico"></td>
        </tr>
    </table>
</fieldset>
<script src= "../public/resources/js/beneficios.js"></script>
</body>
</html>