<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa</title>
</head>
<body>
    <h1>Empleados</h1>
    <?= $empresa->listWorkersHtml() ?>

    <h1>Coste empleados</h1>
    <p><?= $empresa->getCosteNominas() ?></p>
</body>
</html>