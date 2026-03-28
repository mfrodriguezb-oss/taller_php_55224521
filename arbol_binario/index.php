<?php
require 'ArbolBinario.php';

$resultado = $error = '';

if ($_POST) {

    $pre  = trim($_POST['preorden'])  ? explode(' ', trim($_POST['preorden']))  : [];
    $in   = trim($_POST['inorden'])   ? explode(' ', trim($_POST['inorden']))   : [];
    $post = trim($_POST['postorden']) ? explode(' ', trim($_POST['postorden'])) : [];

    $arbol = new ArbolBinario();

    if (!empty($pre) && !empty($in)) {
        $raiz = $arbol->construirPreIn($pre, $in);
    } elseif (!empty($post) && !empty($in)) {
        $raiz = $arbol->construirPostIn($post, $in);
    } else {
        $error = "Debe ingresar mínimo dos recorridos válidos (Pre + In o Post + In)";
    }

    if (!$error) {
        $rPre = $rIn = $rPost = [];
        $arbol->preorden($raiz, $rPre);
        $arbol->inorden($raiz, $rIn);
        $arbol->postorden($raiz, $rPost);

        $resultado = "
            <strong>Preorden:</strong> " . implode(' ', $rPre) . "<br>
            <strong>Inorden:</strong> " . implode(' ', $rIn) . "<br>
            <strong>Postorden:</strong> " . implode(' ', $rPost) . "
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Árbol Binario</title>
    <link rel="stylesheet" href="../css/estilos.css">

</head>
<body>

<h2>Árbol Binario </h2>

<form method="post">
    <label>Preorden:</label><br>
    <input type="text" name="preorden"><br><br>

    <label>Inorden:</label><br>
    <input type="text" name="inorden"><br><br>

    <label>Postorden:</label><br>
    <input type="text" name="postorden"><br><br>

    <button type="submit">Construir Árbol</button>
</form>

<?php if ($error): ?>
    <p style="color:red"><?= $error ?></p>
<?php endif; ?>

<?php if ($resultado): ?>
    <p><?= $resultado ?></p>
<?php endif; ?>

</body>
</html>