<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora em PHP</title>
</head>
<body>
    <h2>Calculadora Simples em PHP</h2>

    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtém os valores do formulário
        $numero1 = $_POST["numero1"];
        $numero2 = $_POST["numero2"];
        $operacao = $_POST["operacao"];

        // Realiza a operação selecionada
        switch ($operacao) {
            case "soma":
                $resultado = $numero1 + $numero2;
                break;
            case "subtracao":
                $resultado = $numero1 - $numero2;
                break;
            case "multiplicacao":
                $resultado = $numero1 * $numero2;
                break;
            case "divisao":
                // Verifica se o divisor é zero para evitar a divisão por zero
                if ($numero2 != 0) {
                    $resultado = $numero1 / $numero2;
                } else {
                    $resultado = "Erro: divisão por zero.";
                }
                break;
            default:
                $resultado = "Operação inválida.";
                break;
        }

        // Exibe o resultado
        echo "<p>Resultado: $resultado</p>";
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="numero1">Número 1:</label>
        <input type="text" name="numero1" required>
        <br>

        <label for="numero2">Número 2:</label>
        <input type="text" name="numero2" required>
        <br>

        <label for="operacao">Operação:</label>
        <select name="operacao">
            <option value="soma">Soma</option>
            <option value="subtracao">Subtração</option>
            <option value="multiplicacao">Multiplicação</option>
            <option value="divisao">Divisão</option>
        </select>
        <br>

        <input type="submit" value="Calcular">
    </form>
</body>
</html>
