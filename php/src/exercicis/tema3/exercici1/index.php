<?php
session_start();

if (!isset($_SESSION['carret'])) {
    $_SESSION['carret'] = [];
}

?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Carret de Compres sense Base de Dades</title>
</head>
<body>
    <h1>Afegir productes al carret</h1>
    <form action="index.php" method="POST">
        <label for="producte">Tria un producte:</label>
        <select name="producte" id="producte">
            <option value="Poma">Poma</option>
            <option value="Plàtan">Plàtan</option>
            <option value="Taronja">Taronja</option>
        </select>
        <input type="submit" name="afegir" value="Afegir al carret">
    </form>
    
    <?php
    if (isset($_POST['afegir'])) {
        $producte = $_POST['producte'];

        if (isset($_SESSION['carret'][$producte])) {
            $_SESSION['carret'][$producte]++;
        } else {
            $_SESSION['carret'][$producte] = 1;
        }

        echo "<p>Producte afegit: $producte</p>";
    }
    ?>

    <a href="carret.php">Veure carret</a>
</body>
</html>
