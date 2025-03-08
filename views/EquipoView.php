<?php 
    require_once __DIR__ . "/../controllers/EquipoController.php";

    $equipoController = new EquipoController();

    $equipo = $equipoController->listarEquipo($_GET['id']);
    

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
            text-align: left;
        }
        th {
            background: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Detalles del Equipo</h1>
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
    </table>
</div>