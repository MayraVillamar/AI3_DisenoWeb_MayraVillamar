<?php
require_once 'conexion.php';

try {
    // Consulta para obtener todos los registros ordenados por id descendente
    $sql = "SELECT id, nombres, apellidos, correo, carrera, edad, fecha_creacion FROM estudiantes ORDER BY id DESC";
    $stmt = $pdo->query($sql);
    $estudiantes = $stmt->fetchAll();
} catch (PDOException $e) {
    error_log("Error al consultar datos: " . $e->getMessage());
    die("Error crítico al obtener la lista de estudiantes.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estudiantes - ECOTEC</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; margin: 20px; }
        .container { max-width: 900px; margin: auto; background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { color: #003366; text-align: center; }
        .table-responsive { overflow-x: auto; margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #003366; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .btn-volver { display: inline-block; background: #003366; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px; font-weight: bold; margin-bottom: 15px; }
        .btn-volver:hover { background: #002244; }
        .sin-datos { text-align: center; padding: 20px; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php" class="btn-volver">&larr; Registrar Nuevo Estudiante</a>
        <h2>Estudiantes Registrados</h2>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Carrera</th>
                        <th>Edad</th>
                        <th>Fecha de Registro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($estudiantes) > 0): ?>
                        <?php foreach ($estudiantes as $estudiante): ?>
                            <tr>
                                <td><?= htmlspecialchars($estudiante['id']) ?></td>
                                <td><?= htmlspecialchars($estudiante['nombres']) ?></td>
                                <td><?= htmlspecialchars($estudiante['apellidos']) ?></td>
                                <td><?= htmlspecialchars($estudiante['correo']) ?></td>
                                <td><?= htmlspecialchars($estudiante['carrera']) ?></td>
                                <td><?= htmlspecialchars($estudiante['edad']) ?></td>
                                <td><?= htmlspecialchars($estudiante['fecha_creacion']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="sin-datos">No hay estudiantes registrados en la base de datos.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
