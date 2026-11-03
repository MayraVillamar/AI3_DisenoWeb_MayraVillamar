<?php
require_once 'conexion.php';

$mensaje = '';
$tipo_mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura y sanitización de entradas
    $nombres   = trim($_POST['nombres'] ?? '');
    $apellidos = trim($_POST['apellidos'] ?? '');
    $correo    = trim($_POST['correo'] ?? '');
    $carrera   = trim($_POST['carrera'] ?? '');
    $edad      = filter_var($_POST['edad'] ?? 0, FILTER_VALIDATE_INT);

    if (!empty($nombres) && !empty($apellidos) && !empty($correo) && !empty($carrera) && $edad > 0) {
        try {
            // Sentencia preparada para prevenir Inyección SQL
            $sql = "INSERT INTO estudiantes (nombres, apellidos, correo, carrera, edad) 
                    VALUES (:nombres, :apellidos, :correo, :carrera, :edad)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nombres'   => $nombres,
                ':apellidos' => $apellidos,
                ':correo'    => $correo,
                ':carrera'   => $carrera,
                ':edad'      => $edad
            ]);

            $mensaje = "Estudiante registrado exitosamente.";
            $tipo_mensaje = "exito";
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $mensaje = "El correo electrónico ya se encuentra registrado.";
            } else {
                $mensaje = "Error al registrar el estudiante: " . $e->getMessage();
            }
            $tipo_mensaje = "error";
        }
    } else {
        $mensaje = "Por favor, complete todos los campos correctamente.";
        $tipo_mensaje = "error";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiantes - ECOTEC</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; margin: 20px; }
        .container { max-width: 600px; margin: auto; background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { color: #003366; text-align: center; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="email"], input[type="number"] { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { background: #003366; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-size: 16px; font-weight: bold; }
        button:hover { background: #002244; }
        .alerta { padding: 10px; border-radius: 4px; margin-bottom: 15px; text-align: center; font-weight: bold; }
        .exito { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .nav-link { display: block; text-align: center; margin-top: 15px; color: #003366; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registro de Estudiantes</h2>
        
        <?php if (!empty($mensaje)): ?>
            <div class="alerta <?= $tipo_mensaje ?>"><?= $mensaje ?></div>
        <?php endif; ?>

        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="nombres">Nombres:</label>
                <input type="text" id="nombres" name="nombres" required>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="carrera">Carrera:</label>
                <input type="text" id="carrera" name="carrera" required>
            </div>
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad" min="15" max="100" required>
            </div>
            <button type="submit">Guardar Estudiante</button>
        </form>

        <a href="consulta.php" class="nav-link">Ver Lista de Estudiantes &rarr;</a>
    </div>
</body>
</html>
