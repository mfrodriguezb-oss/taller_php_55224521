<?php
require 'Binario.php';

$resultado = '';

if ($_POST) {
    $numero = (int) $_POST['numero'];

    $bin = new Binario();
    $resultado = $bin->convertir($numero);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conversión a Binario</title>
</head>
<body>

<h2>Convertir número a binario</h2>

<form method="post">
    <label>Número entero:</label><br>
    <input type="number" name="numero" required><br><br>
    <button type="submit">Convertir</button>
</form>

<?php if ($resultado !== ''): ?>
    <p><strong>Binario:</strong> <?= $resultado ?></p>
<?php endif; ?>

</body>
</html>
