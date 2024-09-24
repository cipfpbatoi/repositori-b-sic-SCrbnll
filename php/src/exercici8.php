<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Alta Llibre</title>
    <style>
        .error { color: red; }
        table { margin-top: 20px; border-collapse: collapse; width: 100%; }
        th, td { padding: 10px; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <h1>Donar d'alta un nou llibre</h1>

    <?php
    $modules = ["Informatica", "Matematiques", "Fisica", "Literatura"];
    $statusOptions = ["Disponible", "No disponible", "En reparació"];
    
    $module = $publisher = $price = $pages = $status = $comments = "";
    $moduleErr = $statusErr = "";
    $isValid = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $module = $_POST["module"];
        $publisher = trim($_POST["publisher"]);
        $price = trim($_POST["price"]);
        $pages = trim($_POST["pages"]);
        $status = isset($_POST["status"]) ? $_POST["status"] : "";
        $comments = trim($_POST["comments"]);

        if (empty($module)) {
            $moduleErr = "El mòdul és obligatori";
            $isValid = false;
        }

        if (empty($status)) {
            $statusErr = "L'estat és obligatori";
            $isValid = false;
        }

        if ($isValid) {
            echo "<h2>Dades del llibre registrat</h2>";
            echo "<table>";
            echo "<tr><th>Mòdul</th><td>$module</td></tr>";
            echo "<tr><th>Editorial</th><td>$publisher</td></tr>";
            echo "<tr><th>Preu</th><td>$price</td></tr>";
            echo "<tr><th>Pàgines</th><td>$pages</td></tr>";
            echo "<tr><th>Estat</th><td>$status</td></tr>";
            echo "<tr><th>Comentaris</th><td>$comments</td></tr>";
            echo "</table>";
        }
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label for="module">Mòdul:</label>
            <select id="module" name="module">
                <option value="">-- Selecciona un mòdul --</option>
                <?php
                foreach ($modules as $mod) {
                    echo "<option value='$mod'" . ($module == $mod ? " selected" : "") . ">$mod</option>";
                }
                ?>
            </select>
            <span class="error"><?= $moduleErr; ?></span>
        </div><br>

        <div>
            <label for="publisher">Editorial:</label>
            <input type="text" id="publisher" name="publisher" value="<?= htmlspecialchars($publisher); ?>">
        </div><br>

        <div>
            <label for="price">Preu:</label>
            <input type="text" id="price" name="price" value="<?= htmlspecialchars($price); ?>">
        </div><br>

        <div>
            <label for="pages">Pàgines:</label>
            <input type="text" id="pages" name="pages" value="<?= htmlspecialchars($pages); ?>">
        </div><br>

        <div>
            <label for="status">Estat:</label><br>
            <?php
            foreach ($statusOptions as $opt) {
                echo "<label><input type='radio' name='status' value='$opt'" . ($status == $opt ? " checked" : "") . ">$opt</label><br>";
            }
            ?>
            <span class="error"><?= $statusErr; ?></span>
        </div><br>

        <div>
            <label for="photo">Foto:</label>
            <input type="file" id="photo" name="photo">
        </div><br>

        <div>
            <label for="comments">Comentaris:</label>
            <textarea id="comments" name="comments"><?= htmlspecialchars($comments); ?></textarea>
        </div><br>

        <div>
            <button type="submit">Donar d'alta</button>
        </div>
    </form>
</body>
</html>
