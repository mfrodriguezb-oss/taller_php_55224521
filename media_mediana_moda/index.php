<?php
require 'Estadistica.php';

$resultado = '';

if ($_POST) {
    $entrada = $_POST['numeros'];
    $numeros = array_map('floatval', explode(',', $entrada));

    $est = new Estadistica();

    $resultado = "
        Media: " . $est->media($numeros) . "<br>
        Mediana: " . $est->mediana($numeros) . "<br>
        Moda: " . $est->moda($numeros);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Media, Mediana y Moda</title>
    <link rel="stylesheet" href="../css/estilos.css">

</head>
<body>

<h2>Media, Mediana y Moda</h2>

<form method="post">
    <label>Ingrese números separados por coma:</label><br>
    <input type="text" name="numeros" placeholder="Ej: 2,3,4,4,5" required><br><br>
    <button type="submit">Calcular</button>
</form>

<?php if ($resultado): ?>
    <p><?= $resultado ?></p>
<?php endif; ?>

</body>
</html>

