<!-- Vista de editar un jugador -->
<?php 
require_once __DIR__ . "/../controllers/JugadorController.php";
require_once __DIR__ . "/../controllers/EquipoController.php";

if (!isset($_GET['id'])) {
    die("ID de jugador no proporcionado");
}

$jugadorController = new JugadorController();
$equipoController = new EquipoController();

$jugador = $jugadorController->listarJugador($_GET['id']);
$equipos = $equipoController->listarEquipos();

if (!$jugador) {
    die("Jugador no encontrado");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = $jugadorController->editandoJugador($_GET['id'], $_POST);

    if ($resultado === "El equipo ya tiene un capitan") {
        $errorMensaje = $resultado;
    } else {
        $jugadorActualizado = $jugadorController->listarJugador($_GET['id']);
        $equipo_id = $jugadorActualizado['equipo_id'];
        header("Location: /views/EquipoView.php?id=" . $equipo_id . "&edit_success=true");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Jugador</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
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
        input {
            width: calc(100% - 20px);
            margin-top: 5px;
            margin-right: 20px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .button {
            margin-top: 15px;
            background: #007bff;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .button:hover {
            background: #0056b3;
        }
        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            font-size: 16px;
        }
        .btn-index {
            background:rgb(77, 142, 206);
            color: white;
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
    
</head>
<body>
<a href="/">
    <button type="button" class="btn btn-index">Volver al Inicio</button>
</a>
<div class="container">
    <h1>Editar Jugador</h1>

    <?php if (isset($errorMensaje)): ?>
        <p class="error" style="color: red; font-weight: bold;"><?= htmlspecialchars($errorMensaje) ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($jugador['nombre']) ?>" required minlength="3" maxlength="50">

        <label>Número:</label>
        <input type="number" name="numero" value="<?= htmlspecialchars($jugador['numero']) ?>" required min="1" max="99">

        <label>Equipo:</label>
        <select name='equipo_id' required>
            <?php foreach($equipos as $equipo): ?>
            <option value="<?=$equipo['id']?>" <?=($equipo['id'] == $jugador['equipo_id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($equipo['nombre']) ?>
            </option>
            <?php endforeach; ?>
        </select>

        <label>Capitán:</label>
        <select name="es_capitan" required>
            <option value=0 <?= $jugador['es_capitan'] == 0 ? 'selected' : '' ?>>No</option>
            <option value=1 <?= $jugador['es_capitan'] == 1 ? 'selected' : '' ?>>Sí</option>
        </select>

        <button type="submit" class="button">Guardar Cambios</button>
    </form>
</div>

</body>
</html>
