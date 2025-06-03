<?php

class Database {
    private static $host = 'localhost';
    private static $dbName = 'cimientos_db';
    private static $username = 'root';
    private static $password = '';
    private static $instance = null;
    private $connection;

    private function __construct() {
        try {
            $this->connection = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName, self::$username, self::$password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->exec("SET NAMES utf8mb4"); 
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            exit;
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    // Mantener el método estático para compatibilidad
    public static function connect() {
        return self::getInstance()->getConnection();
    }
}