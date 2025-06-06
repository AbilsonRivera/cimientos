-- Creando el archivo SQL para la base de datos
CREATE DATABASE IF NOT EXISTS cimientos_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE cimientos_db;

-- Tabla para formulario del HOME
CREATE TABLE home_contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    proyecto_interes VARCHAR(50) NOT NULL,
    mensaje TEXT,
    fecha_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla para Viventa Plaza
CREATE TABLE viventa_plaza_contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    ciudad VARCHAR(100) NOT NULL,
    interes ENUM('vivir', 'invertir', 'ambos') NOT NULL,
    comentario TEXT,
    fecha_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla para Viventa Santa Barbara
CREATE TABLE viventa_santa_barbara_contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    ciudad VARCHAR(100) NOT NULL,
    interes ENUM('vivir', 'invertir', 'ambos') NOT NULL,
    comentario TEXT,
    fecha_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla para Viventa Usaquen
CREATE TABLE viventa_usaquen_contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    ciudad VARCHAR(100) NOT NULL,
    interes ENUM('vivir', 'invertir', 'ambos') NOT NULL,
    comentario TEXT,
    fecha_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla para Viventa Andes
CREATE TABLE viventa_andes_contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    ciudad VARCHAR(100) NOT NULL,
    interes ENUM('vivir', 'invertir', 'ambos') NOT NULL,
    comentario TEXT,
    fecha_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla para Viventa Guaduas
CREATE TABLE viventa_guaduas_contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    ciudad VARCHAR(100) NOT NULL,
    interes ENUM('vivir', 'invertir', 'ambos') NOT NULL,
    comentario TEXT,
    fecha_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla para usuarios (administradores)
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(100) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL,
    tipo ENUM('admin') DEFAULT 'admin' NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insertar usuario administrador por defecto (contraseña: admin123)
INSERT INTO usuarios (correo, contraseña, tipo) VALUES 
('admin@cimientos.com', 'admin123', 'admin');