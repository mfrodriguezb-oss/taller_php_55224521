<?php
require 'Calculadora.php';

$resultado = '';

if ($_POST) {
    $numero = (int) $_POST['numero'];
    $operacion = $_POST['operacion'];

    $calc = new Calculadora();

    if ($operacion == 'factorial') {
        $resultado = "Factorial de $numero: " . $calc->factorial($numero);
    } else {
        $serie = $calc->fibonacci($numero);
        $resultado = "Serie Fibonacci: " . implode(', ', $serie);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Fibonacci y Factorial</title>
</head>
<body>

<h2>Fibonacci / Factorial</h2>

<form method="post">
    <label>Número:</label><br>
    <input type="number" name="numero" min="0" required><br><br>

    <label>Operación:</label><br>
    <select name="operacion">
        <option value="fibonacci">Fibonacci</option>
        <option value="factorial">Factorial</option>
    </select><br><br>

    <button type="submit">Calcular</button>
</form>

<?php if ($resultado): ?>
    <p><strong><?= $resultado ?></strong></p>
<?php endif; ?>

</body>
</html>
