<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Empleado</title>
</head>
<body>

<table>
    <tr>
        <th>Nom</th><th>Telefons</th><th>Sou</th>
    </tr>
    <?php foreach ($empleados as $empleado): ?>
    <tr>
        <td><?= $empleado ?></td><td><?= $empleado->listarTelefonos() ?></td><td><?= $empleado->getSou() ?></td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
