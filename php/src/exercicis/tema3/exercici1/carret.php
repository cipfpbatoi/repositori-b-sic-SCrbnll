<?php
session_start();

if (!isset($_SESSION['carret'])) {
    $_SESSION['carret'] = [];
}

if (isset($_POST['eliminar'])) {
    $producteAEliminar = $_POST['producteAEliminar'];
    unset($_SESSION['carret'][$producteAEliminar]);
}

?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Carret de compres</title>
</head>
<body>
    <h1>Contingut del carret</h1>
    
    <?php if (empty($_SESSION['carret'])): ?>
        <p>El carret està buit.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($_SESSION['carret'] as $producte => $quantitat): ?>
                <li><?php echo $producte . " - Quantitat: " . $quantitat; ?>
                    <form action="carret.php" method="POST" style="display:inline;">
                        <input type="hidden" name="producteAEliminar" value="<?php echo $producte; ?>">
                        <input type="submit" name="eliminar" value="Eliminar">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <a href="index.php">Tornar a la selecció de productes</a>
</body>
</html>
