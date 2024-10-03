<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 7: Validació de Formularis</title>
    <style>
        .error { color: red; margin-left: 10px; }
        .success { color: green; }
        .form-group { margin-bottom: 15px; }
    </style>
</head>
<body>
    <h1>Exercici 7: Validació de Formularis</h1>

    <?php
    $name = $email = $password = "";
    $nameErr = $emailErr = $passwordErr = $confirmPasswordErr = "";
    $isValid = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];

        if (empty($name)) {
            $nameErr = "El nom és obligatori";
            $isValid = false;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "El correu no és vàlid";
            $isValid = false;
        }

        if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/[0-9]/", $password)) {
            $passwordErr = "La contrasenya ha de tindre 8 caràcters, una majúscula i un número";
            $isValid = false;
        }

        if ($password !== $confirm_password) {
            $confirmPasswordErr = "Les contrasenyes no coincidixen";
            $isValid = false;
        }

        if ($isValid) {
            echo "<p class='success'>Usuari registrat correctament!</p>";
        }
    }
    ?>

    <form action="" method="POST">
        <div class="form-group">
            <label>Nom: <input type="text" name="name" value="<?= htmlspecialchars($name); ?>"></label>
            <span class="error"><?= $nameErr; ?></span>
        </div>

        <div class="form-group">
            <label>Correu: <input type="text" name="email" value="<?= htmlspecialchars($email); ?>"></label>
            <span class="error"><?= $emailErr; ?></span>
        </div>

        <div class="form-group">
            <label>Contrasenya: <input type="password" name="password"></label>
            <span class="error"><?= $passwordErr; ?></span>
        </div>

        <div class="form-group">
            <label>Confirma Contrasenya: <input type="password" name="confirm_password"></label>
            <span class="error"><?= $confirmPasswordErr; ?></span>
        </div>

        <input type="submit" value="Registrar-se">
    </form>

</body>
</html>
