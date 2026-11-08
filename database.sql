CREATE DATABASE IF NOT EXISTS db_sistema_web;
USE db_sistema_web;

CREATE TABLE IF NOT EXISTS estudiantes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  apellido VARCHAR(100) NOT NULL,
  correo VARCHAR(150) NOT NULL,
  telefono VARCHAR(20),
  carrera VARCHAR(100)
);