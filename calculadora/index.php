<?php
session_start();
require 'Calculadora.php';

if (!isset($_SESSION['historial'])) {
    $_SESSION['historial'] = [];
}

$resultado = '';

if (isset($_POST['calcular'])) {
    $num1 = (float) $_POST['num1'];
    $num2 = (float) $_POST['num2'];
    $op = $_POST['operacion'];

    $calc = new Calculadora();
    $resultado = $calc->calcular($num1, $num2, $op);

    $_SESSION['historial'][] = "$num1 $op $num2 = $resultado";
}

if (isset($_POST['borrar'])) {
    $_SESSION['historial'] = [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h2>Calculadora</h2>

<form method="post">
    <input type="number" step="any" name="num1" required>
    
    <select name="operacion">
        <option value="suma">+</option>
        <option value="resta">-</option>
        <option value="multiplicacion">*</option>
        <option value="division">/</option>
        <option value="porcentaje">%</option>
    </select>

    <input type="number" step="any" name="num2" required>

    <button type="submit" name="calcular">Calcular</button>
</form>

<?php if ($resultado !== ''): ?>
    <p><strong>Resultado:</strong> <?= $resultado ?></p>
<?php endif; ?>

<h3>Historial</h3>

<ul>
    <?php foreach ($_SESSION['historial'] as $item): ?>
        <li><?= $item ?></li>
    <?php endforeach; ?>
</ul>

<form method="post">
    <button type="submit" name="borrar">Borrar historial</button>
</form>

</body>
</html>