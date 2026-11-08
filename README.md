# AI3 - Diseño Web - Sistema de Estudiantes

Módulo Web Dinámico en PHP con CRUD + Seguridad - Fase 2.

## Tecnologías
- PHP 8 + PDO
- MySQL / MariaDB
- HTML5 / CSS3
- XAMPP

## Cómo desplegar localmente

1. Clonar el repositorio en htdocs : git clone https://github.com/dabenavides-dev/AI3_DisenoWeb_DannesBenavides.git

2. Iniciar Apache y MySQL en XAMPP.

3. Crear la base de datos en phpMyAdmin:
   CREATE DATABASE db_sistema_web;

4. Importar el archivo `database.sql` o crear la tabla:
   CREATE TABLE estudiantes (
     id INT AUTO_INCREMENT PRIMARY KEY,
     nombre VARCHAR(100) NOT NULL,
     apellido VARCHAR(100) NOT NULL,
     correo VARCHAR(150) NOT NULL,
     telefono VARCHAR(20),
     carrera VARCHAR(100)
   );

5. Verificar `conexion.php` con tus datos locales:
   host=localhost, dbname=db_sistema_web, user=root, pass=

6. Abrir en el navegador:
   http://localhost/db_sistema_web_dwbg/index.php

## Seguridad implementada
- Conexión PDO con try-catch sin exponer credenciales.
- Prepared Statements contra Inyección SQL.
- htmlspecialchars() contra XSS.
- Validación en cliente y servidor.