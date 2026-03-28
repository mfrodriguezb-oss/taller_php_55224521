<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'Conjuntos.php';

$resultado = '';

if ($_POST) {
    $A = array_map('intval', explode(',', $_POST['conjuntoA']));
    $B = array_map('intval', explode(',', $_POST['conjuntoB']));

    $c = new Conjuntos();

    $union = $c->union($A, $B);
    $interseccion = $c->interseccion($A, $B);
    $diffAB = $c->diferencia($A, $B);
    $diffBA = $c->diferencia($B, $A);

    $resultado = "
        Unión: " . implode(', ', $union) . "<br>
        Intersección: " . implode(', ', $interseccion) . "<br>
        A - B: " . implode(', ', $diffAB) . "<br>
        B - A: " . implode(', ', $diffBA);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conjuntos</title>
    <link rel="stylesheet" href="../css/estilos.css">

</head>
<body>

<h2>Operaciones con Conjuntos</h2>

<form method="post">
    <label>Conjunto A (por favor separa por comas):</label><br>
    <input type="text" name="conjuntoA" placeholder="Ej: 1,2,3,4" required><br><br>

    <label>Conjunto B ( por favor separa por comas):</label><br>
    <input type="text" name="conjuntoB" placeholder="Ej: 3,4,5,6" required><br><br>

    <button type="submit">Calcular</button>
</form>

<?php if ($resultado): ?>
    <p><?= $resultado ?></p>
<?php endif; ?>

</body>
</html>
