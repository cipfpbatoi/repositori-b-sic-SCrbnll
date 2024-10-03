<?php
session_start();

$usuaris = [
    'admin' => 'admin',
    'usuari' => 'usuari'
];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($usuaris[$username]) && $usuaris[$username] === $password) {
        $_SESSION['username'] = $username;
        if($_POST['cookieCheckbox']) {
            setcookie('nomUsuari', $username, ['secure' => true,'httponly' => true, 'samesite' => 'Lax']);
        }
    } else {
        $error_message = "Nom d'usuari o contrasenya incorrectes.";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    setcookie('nomUsuari', '', time() - 3600);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticació Bàsica</title>
</head>
<body>
    <?php if (isset($_SESSION['username'])): ?>
        <h1>Benvingut/da, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>Has iniciat sessió correctament.</p>
        <a href="?logout=true">Tanca Sessió</a>
    <?php else: ?>
        <h1>Iniciar Sessió</h1>
        <form action="index.php" method="post">
            <div>
                <label for="username">Nom d'usuari:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Contrasenya:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <input type="checkbox" id="cookieCheckbox" name="cookieCheckbox" value="cookie">
                <label for="cookieCheckbox"> Recordar-me</label><br>
            </div>
            <div>
                <button type="submit">Inicia Sessió</button>
            </div>
        </form>

        <?php if (isset($error_message)): ?>
            <p style="color:red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
