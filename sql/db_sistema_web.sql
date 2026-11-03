-- ==========================================
-- Base de Datos: db_sistema_web
-- Asignatura: Sistemas Inteligentes / Diseño Web
-- Universidad ECOTEC
-- ==========================================

CREATE DATABASE IF NOT EXISTS db_sistema_web 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

USE db_sistema_web;

-- Creación de la tabla principal: estudiantes
CREATE TABLE IF NOT EXISTS estudiantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    correo VARCHAR(150) NOT NULL UNIQUE,
    carrera VARCHAR(100) NOT NULL,
    edad INT NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
