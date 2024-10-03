<?php
session_start();

function afegirHistorial($pagina) {
    if (!isset($_SESSION['historial'])) {
        $_SESSION['historial'] = [];
    }
    $_SESSION['historial'][] = $pagina;
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

$paginaActual = isset($_GET['page']) ? $_GET['page'] : 'Pàgina Principal';

afegirHistorial($paginaActual);

?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $paginaActual; ?></title>
</head>
<body>
    <h1><?php echo $paginaActual; ?></h1>

    <nav>
        <ul>
            <li><a href="index.php?page=Pàgina Principal">Pàgina Principal</a></li>
            <li><a href="index.php?page=Pàgina 1">Pàgina 1</a></li>
            <li><a href="index.php?page=Pàgina 2">Pàgina 2</a></li>
            <li><a href="index.php?page=Historial">Veure Historial</a></li>
            <li><a href="index.php?logout=true">Tanca Sessió</a></li>
        </ul>
    </nav>

    <?php if ($paginaActual === 'Historial'): ?>
        <h2>Historial de pàgines visitades</h2>
        <ul>
            <?php foreach ($_SESSION['historial'] as $pagina): ?>
                <li><?php echo htmlspecialchars($pagina); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
