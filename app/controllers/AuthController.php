<?php

class AuthController extends Controller {
    private $userModel;
    
    public function __construct() {
        $this->userModel = new UserModel();
    }
    
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = sanitizeInput($_POST['correo'] ?? '');
            $contraseña = $_POST['contraseña'] ?? '';
            
            if (empty($correo) || empty($contraseña)) {
                $error = "Por favor, complete todos los campos.";
                $this->view('auth/login', ['error' => $error]);
                return;
            }
            
            $user = $this->userModel->authenticate($correo, $contraseña);
            
            if ($user) {
                // Iniciar sesión
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['correo'];
                $_SESSION['user_type'] = $user['tipo'];
                $_SESSION['logged_in'] = true;
                
                // Redirigir al dashboard o página principal
                header('Location: ' . BASE_URL . 'admin/dashboard');
                exit;
            } else {
                $error = "Correo o contraseña incorrectos.";
                $this->view('auth/login', ['error' => $error]);
            }
        } else {
            $this->view('auth/login');
        }
    }
    
    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL);
        exit;
    }
    
    public function isAuthenticated() {
        session_start();
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }
    
    public function requireAuth() {
        if (!$this->isAuthenticated()) {
            header('Location: ' . BASE_URL . 'auth/login');
            exit;
        }
    }
}
