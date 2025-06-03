<?php

class UserModel {
    private $db;
    
    public function __construct() {
        $this->db = Database::connect();
    }
      public function authenticate($correo, $contraseña) {
        try {
            $stmt = $this->db->prepare("SELECT id, correo, contraseña, tipo FROM usuarios WHERE correo = :correo");
            $stmt->execute(['correo' => $correo]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user && $contraseña === $user['contraseña']) {
                // Remove password from returned data
                unset($user['contraseña']);
                return $user;
            }
            
            return false;
        } catch (PDOException $e) {
            error_log("Error en autenticación: " . $e->getMessage());
            return false;
        }
    }
    
    public function getUserById($id) {
        try {
            $stmt = $this->db->prepare("SELECT id, correo, tipo FROM usuarios WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error al obtener usuario: " . $e->getMessage());
            return false;
        }
    }
}
