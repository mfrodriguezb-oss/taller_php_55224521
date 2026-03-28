<?php
require 'Acronimo.php';
$resultado = '';

if ($_POST) {
    $obj = new Acronym();
    $resultado = $obj->generar($_POST['frase']);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acrónimo</title>
</head>
<body>

<h2>Generador de Acrónimos</h2>

<form method="post">
    <input type="text" name="frase" required>
    <button type="submit">Generar</button>
</form>

<?php if ($resultado): ?>
<p>Acrónimo: <strong><?= $resultado ?></strong></p>
<?php endif; ?>

</body>
</html>
