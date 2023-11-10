<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Temperatura</title>

<style>

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

label {
    display: block;
    margin-bottom: 10px;
}

input[type="text"],
select {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

p {
    margin-top: 20px;
    font-size: 18px;
    font-weight: bold;
    color: #333;
}
sd
</style>
</head>
<body>

<?php
// Função para converter Celsius para Fahrenheit
function celsiusToFahrenheit($celsius) {
    return ($celsius * 9/5) + 32;
}

// Função para converter Fahrenheit para Celsius
function fahrenheitToCelsius($fahrenheit) {
    return ($fahrenheit - 32) * 5/9;
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valor = $_POST["valor"];
    $unidadeOrigem = $_POST["unidadeOrigem"];
    $unidadeDestino = $_POST["unidadeDestino"];

    $resultado = 0;

    // Converter a temperatura
    if ($unidadeOrigem == "celsius" && $unidadeDestino == "fahrenheit") {
        $resultado = celsiusToFahrenheit($valor);
    } elseif ($unidadeOrigem == "fahrenheit" && $unidadeDestino == "celsius") {
        $resultado = fahrenheitToCelsius($valor);
    } else {
        // Lidar com outras conversões de unidades, se necessário
        echo "Conversão não suportada.";
    }

    // Exibir o resultado
    echo "<p>O resultado da conversão é: $resultado $unidadeDestino</p>";
}
?>

<!-- Formulário de entrada -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="valor">Valor:</label>
    <input type="text" name="valor" required>

    <label for="unidadeOrigem">De:</label>
    <select name="unidadeOrigem" required>
        <option value="celsius">Celsius</option>
        <option value="fahrenheit">Fahrenheit</option>
        <!-- Adicione mais opções conforme necessário -->
    </select>

    <label for="unidadeDestino">Para:</label>
    <select name="unidadeDestino" required>
        <option value="celsius">Celsius</option>
        <option value="fahrenheit">Fahrenheit</option>
        <!-- Adicione mais opções conforme necessário -->
    </select>

    <input type="submit" value="Converter">
</form>

</body>
</html>
