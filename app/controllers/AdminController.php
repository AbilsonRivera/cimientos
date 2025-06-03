<?php

class AdminController extends Controller {
    private $userModel;
    
    public function __construct() {
        $this->userModel = new UserModel();
        $this->startSession();
    }
    
    private function startSession() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public function index() {
        // Redirect to login if not authenticated, otherwise to dashboard
        if ($this->isAuthenticated()) {
            header('Location: ' . BASE_URL . 'admin/dashboard');
        } else {
            header('Location: ' . BASE_URL . 'admin/login');
        }
        exit;
    }
    
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = sanitizeInput($_POST['correo'] ?? '');
            $contraseña = $_POST['contraseña'] ?? '';
              if (empty($correo) || empty($contraseña)) {
                $error = "Por favor, complete todos los campos.";
                $this->view('admin/login', ['error' => $error]);
                return;
            }
            
            $user = $this->userModel->authenticate($correo, $contraseña);
              if ($user) {
                // Iniciar sesión
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['correo'];
                $_SESSION['user_type'] = $user['tipo'];
                $_SESSION['logged_in'] = true;
                
                // Redirigir al dashboard o página principal
                header('Location: ' . BASE_URL . 'admin/dashboard');
                exit;            } else {
                $error = "Correo o contraseña incorrectos.";
                $this->view('admin/login', ['error' => $error]);
            }
        } else {
            $this->view('admin/login');
        }
    }
      public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL);
        exit;
    }
      public function isAuthenticated() {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }
      public function requireAuth() {
        if (!$this->isAuthenticated()) {
            header('Location: ' . BASE_URL . 'admin/login');
            exit;
        }
    }
      public function dashboard() {
        $this->requireAuth();
        $this->view('admin/dashboard');
    }
}
