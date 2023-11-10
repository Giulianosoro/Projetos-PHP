<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Unidades</title>
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
    background-color: #3498db;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #2980b9;
}

p {
    margin-top: 20px;
    font-size: 18px;
    font-weight: bold;
    color: #333;
}

    </style>
</head>
<body>

<?php
// Função para converter metros para quilômetros
function metrosToQuilometros($metros) {
    return $metros / 1000;
}

// Função para converter quilômetros para metros
function quilometrosToMetros($quilometros) {
    return $quilometros * 1000;
}

// Função para converter metros para centímetros
function metrosToCentimetros($metros) {
    return $metros * 100;
}

// Função para converter centímetros para metros
function centimetrosToMetros($centimetros) {
    return $centimetros / 100;
}

// Função para converter milímetros para metros
function milimetrosToMetros($milimetros) {
    return $milimetros / 1000;
}

// Função para converter metros para milímetros
function metrosToMilimetros($metros) {
    return $metros * 1000;
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valor = $_POST["valor"];
    $unidadeOrigem = $_POST["unidadeOrigem"];
    $unidadeDestino = $_POST["unidadeDestino"];

    $resultado = 0;

    // Converter a unidade de comprimento
    if ($unidadeOrigem == "metros" && $unidadeDestino == "quilometros") {
        $resultado = metrosToQuilometros($valor);
    } elseif ($unidadeOrigem == "quilometros" && $unidadeDestino == "metros") {
        $resultado = quilometrosToMetros($valor);
    } elseif ($unidadeOrigem == "metros" && $unidadeDestino == "centimetros") {
        $resultado = metrosToCentimetros($valor);
    } elseif ($unidadeOrigem == "centimetros" && $unidadeDestino == "metros") {
        $resultado = centimetrosToMetros($valor);
    } elseif ($unidadeOrigem == "milimetros" && $unidadeDestino == "metros") {
        $resultado = milimetrosToMetros($valor);
    } elseif ($unidadeOrigem == "metros" && $unidadeDestino == "milimetros") {
        $resultado = metrosToMilimetros($valor);
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
        <option value="metros">Metros</option>
        <option value="quilometros">Quilômetros</option>
        <option value="centimetros">Centímetros</option>
        <option value="milimetros">Milímetros</option>
        <!-- Adicione mais opções conforme necessário -->
    </select>

    <label for="unidadeDestino">Para:</label>
    <select name="unidadeDestino" required>
        <option value="metros">Metros</option>
        <option value="quilometros">Quilômetros</option>
        <option value="centimetros">Centímetros</option>
        <option value="milimetros">Milímetros</option>
        <!-- Adicione mais opções conforme necessário -->
    </select>

    <input type="submit" value="Converter">
</form>

</body>
</html>
