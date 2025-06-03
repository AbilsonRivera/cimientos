<?php
// Archivo de inicialización del sistema

// Definir constantes por defecto
define('DEFAULT_CONTROLLER', 'home');
define('DEFAULT_ACTION', 'index');

// Definir URL base de la aplicación
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$path = dirname($_SERVER['SCRIPT_NAME']);
define('BASE_URL', $protocol . '://' . $host . $path . '/');

// Autoloader simple para cargar clases automáticamente
spl_autoload_register(function ($className) {
    $directories = [
        __DIR__ . '/core/',
        __DIR__ . '/controllers/',
        __DIR__ . '/models/'
    ];
    
    foreach ($directories as $directory) {
        $file = $directory . $className . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Función para inicializar la aplicación
function initializeApp() {
    try {
        // Probar la conexión a la base de datos
        $pdo = Database::connect();
        return true;
    } catch (Exception $e) {
        die("Error de inicialización: " . $e->getMessage());
    }
}

// Función helper para validar y limpiar datos de entrada
function sanitizeInput($data) {
    if (is_array($data)) {
        return array_map('sanitizeInput', $data);
    }
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Función para responder con JSON
function jsonResponse($data, $statusCode = 200) {
    http_response_code($statusCode);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}