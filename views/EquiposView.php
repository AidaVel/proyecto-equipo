<?php 
require_once __DIR__ . "/../controllers/EquipoController.php";

$equipoController = new EquipoController();
$equipos = $equipoController->listarEquipos();
$formulario = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formulario = $equipoController->creacionEquipo($_POST);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Equipos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        .team-list {
            list-style: none;
            padding: 0;
        }
        .team-list li {
            background: #007bff;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            transition: 0.3s;
        }
        .team-list li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            display: block;
        }
        .team-list li:hover {
            background: #0056b3;
        }
        form {
            margin-top: 20px;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            text-align: left;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            margin-top: 15px;
            background: #28a745;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background: #218838;
        }
        .error {
            color: red;
            font-weight: bold;
        }
        .success {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Lista de Equipos</h1>
    <ul class="team-list">
        <?php foreach ($equipos as $equipo): ?>
            <li><a href="/views/EquipoView.php?id=<?= htmlspecialchars($equipo['id']) ?>">
                <?= htmlspecialchars($equipo['nombre']) ?>
            </a></li>
        <?php endforeach; ?>
    </ul>

    <h2>Crear Nuevo Equipo</h2>

    <?php if (!is_null($formulario)): ?>
        <?php if (is_array($formulario)): ?>
            <?php foreach ($formulario as $error): ?>
                <p class="error"><?= htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="success"><?= htmlspecialchars($formulario) ?></p>
        <?php endif; ?>
    <?php endif; ?>

    <form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" required minlength="3" required maxlength="50" title="Debe tener entre 3 a 50 caracteres">

    <label>Ciudad:</label>
    <input type="text" name="ciudad" required minlength="3" required maxlength="50" title="Debe tener entre 3 a 50 caracteres">

    <label>Deporte:</label>
    <select name="deporte" required>
        <option value="">Selecciona un deporte</option>
        <option value="Fútbol">Fútbol</option>
        <option value="Baloncesto">Baloncesto</option>
        <option value="Voleibol">Voleibol</option>
        <option value="Béisbol">Béisbol</option>
        <option value="Tenis">Tenis</option>
    </select>

    <label>Fundación:</label>
    <input type="date" name="fecha_fundacion" required max="<?= date('Y-m-d') ?>" title="No puede ser una fecha futura.">

    <button type="submit">Crear Equipo</button>
</form>

</div>

</body>
</html>