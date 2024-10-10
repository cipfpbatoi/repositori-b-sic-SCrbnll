<?php
session_start();

$usuaris = [
    'admin' => 'admin',
];

$loggedIn = isset($_SESSION['username']);

if (isset($_COOKIE['nomUsuari'])) {
    $loggedIn = true;
    $username = $_COOKIE['nomUsuari'];
} else {
    $loggedIn = false;
}

$missatge = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    setcookie('logged', true, ['secure' => true,'httponly' => true, 'samesite' => 'Lax']);
    if (isset($usuaris[$username]) && $usuaris[$username] === $password) {
        $_SESSION['username'] = $username;
        if(isset($_POST['cookieCheckbox'])) {
            setcookie('nomUsuari', $username, ['secure' => true,'httponly' => true, 'samesite' => 'Lax']);
        }
        $loggedIn = true;
        $missatge = "Has iniciat sessió correctament!";
    } else {
        $missatge = "Nom d'usuari o contrasenya incorrectes.";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    setcookie('nomUsuari', '', time() - 3600);
    setcookie('logged', '', time() - 3600);
    $loggedIn = false;
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sessió - Jocs</title>
</head>
<body>
    <h1>Iniciar Sessió per Jugar</h1>

    <?php if (!$loggedIn): ?>
        <h2>Inicia sessió</h2>
        <form action="" method="post">
            <label for="username">Nom d'usuari:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Contrasenya:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <input type="checkbox" id="cookieCheckbox" name="cookieCheckbox" value="cookie">
            <label for="cookieCheckbox"> Recordar-me</label><br>
            <button type="submit">Inicia Sessió</button>
        </form>
        <?php if ($missatge): ?>
            <p><?php echo $missatge; ?></p>
        <?php endif; ?>
    <?php else: ?>
        <h2>Hola, <?php echo $username; ?>!</h2>
        <p>Tria el joc al qual vols jugar:</p>
        <ul>
            <li><a href="./ofegat/index.php">Jugar al Penjat</a></li>
            <li><a href="./4ratlla/index.php">Jugar a 4 en Ratlla</a></li>
        </ul>
        <a href="?logout=true">Tanca Sessió</a>
    <?php endif; ?>
</body>
</html>
