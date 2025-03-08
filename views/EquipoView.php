<!-- Vista del equipo -->
<?php 
    require_once __DIR__ . "/../controllers/EquipoController.php";
    require_once __DIR__ . "/../controllers/JugadorController.php";

    $equipoController = new EquipoController();
    $jugadorController = new JugadorController();

    $equipo = $equipoController->listarEquipo($_GET['id']);
    $jugadores = $jugadorController->listarJugadores($_GET['id']);
    $capitan = $equipoController->listarCapitan($_GET['id']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $jugadorController->eliminandoJugador($_POST);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Equipo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 700px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
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
        .btn-edit {
            background: #ffc107;
            color: white;
        }
        .btn-delete {
            background: #dc3545;
            color: white;
        }
        .btn-edit:hover {
            background: #e0a800;
        }
        .btn-delete:hover {
            background: #c82333;
        }
        .success {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
<a href="/">
    <button type="button" class="btn btn-index">Volver al Inicio</button>
</a>

<div class="container">
    <h1>Detalles del Equipo</h1>
    <?php if (isset($_GET['edit_success']) && $_GET['edit_success'] === 'true'): ?>
        <p class="success">Jugador editado correctamente</p>
    <?php endif; ?>
    <table>
        <tr>
            <th>Campo</th>
            <th>Valor</th>
        </tr>
        <tr>
            <td><strong>Nombre</strong></td>
            <td><?= htmlspecialchars($equipo['nombre']) ?></td>
        </tr>
        <tr>
            <td><strong>Ciudad</strong></td>
            <td><?= htmlspecialchars($equipo['ciudad']) ?></td>
        </tr>
        <tr>
            <td><strong>Deporte</strong></td>
            <td><?= htmlspecialchars($equipo['deporte']) ?></td>
        </tr>
        <tr>
            <td><strong>Fecha de Fundación</strong></td>
            <td><?= htmlspecialchars($equipo['fecha_fundacion']) ?></td>
        </tr>
        <?php if (!empty($capitan)): ?>
        <tr>
            <td><strong>Capitán del equipo</strong></td>
            <td><?= htmlspecialchars($capitan) ?></td>
        </tr>
        <?php endif ?>
    </table>
</div>

<div class="container">
    <h2>Lista de Jugadores</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Número</th>
            <th>Capitán</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($jugadores as $jugador): ?>
        <tr>
            <td><?= htmlspecialchars($jugador['nombre']) ?></td>
            <td><?= htmlspecialchars($jugador['numero']) ?></td>
            <td><?= $jugador['es_capitan'] ? '⭐ Sí' : 'No' ?></td>
            <td>
                <a href="/views/EditarJugadorView.php?id=<?= $jugador['id'] ?>" class="btn btn-edit">Editar</a>
                <form method="POST" action="" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $jugador['id'] ?>">
                    <button type="submit" class="btn btn-delete" onclick="return confirm('¿Seguro que quieres eliminar este jugador?');">
                        Borrar
                    </button>
                </form>

            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>