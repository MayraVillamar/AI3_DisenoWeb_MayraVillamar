-- 1. Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS `db_sistema_web` 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

-- 2. Seleccionar la base de datos para su uso
USE `db_sistema_web`;

-- 3. Eliminar la tabla si existe para reiniciar la estructura limpia
DROP TABLE IF EXISTS `estudiantes`;

-- 4. Evidencia 1: Estructura DDL de la tabla estudiantes
CREATE TABLE `estudiantes` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nombres` VARCHAR(100) NOT NULL,
  `apellidos` VARCHAR(100) NOT NULL,
  `correo` VARCHAR(150) NOT NULL UNIQUE,
  `carrera` VARCHAR(100) NOT NULL,
  `edad` INT NOT NULL,
  `fecha_creacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. Insertar registros de prueba (Datos iniciales)
INSERT INTO `estudiantes` (`nombres`, `apellidos`, `correo`, `carrera`, `edad`) VALUES
('Mayra', 'Villamar', 'mayra.villamar@ecotec.edu.ec', 'Ingeniería en Sistemas', 22),
('Carlos', 'Mendoza', 'carlos.mendoza@ecotec.edu.ec', 'Diseño Web', 24),
('Ana', 'Gómez', 'ana.gomez@ecotec.edu.ec', 'Tecnologías de la Información', 21),
('Luis', 'Pérez', 'luis.perez@ecotec.edu.ec', 'Ciberseguridad', 23),
('Elena', 'Torres', 'elena.torres@ecotec.edu.ec', 'Desarrollo de Software', 20);
