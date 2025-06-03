<?php
require_once 'app/core/Controller.php';

class ContactController extends Controller {

    public function submitHome() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Usar el modelo ContactModel
                $contactModel = $this->model('ContactModel');
                
                $data = [
                    'nombre' => sanitizeInput($_POST['nombre']),
                    'email' => sanitizeInput($_POST['email']),
                    'telefono' => sanitizeInput($_POST['telefono']),
                    'proyecto_interes' => sanitizeInput($_POST['proyecto_interes']),
                    'mensaje' => sanitizeInput($_POST['mensaje'] ?? '')
                ];

                $contactModel->saveContact($data);

                // Redireccionar con mensaje de éxito
                header('Location: ' . BASE_URL . '?success=home');
                exit;

            } catch(Exception $e) {
                header('Location: ' . BASE_URL . '?error=1');
                exit;
            }
        }
    }

    public function submitProject() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $project = sanitizeInput($_POST['project'] ?? '');
            
            // Mapear slugs a nombres de tabla para crear modelos dinámicos
            $projectTables = [
                'viventa-plaza' => 'viventa_plaza_contacts',
                'viventa-santa-barbara' => 'viventa_santa_barbara_contacts',
                'viventa-usaquen' => 'viventa_usaquen_contacts',
                'viventa-andes' => 'viventa_andes_contacts',
                'viventa-guaduas' => 'viventa_guaduas_contacts'
            ];

            if (!isset($projectTables[$project])) {
                header('Location: ' . BASE_URL . '?error=2');
                exit;
            }

            try {
                // Crear modelo dinámico para el proyecto específico
                $projectModel = new class($projectTables[$project]) extends Model {
                    public function __construct($tableName) {
                        $this->table = $tableName;
                    }
                    
                    public function saveProjectContact($data) {
                        return $this->create($data);
                    }
                };
                
                $data = [
                    'nombre' => sanitizeInput($_POST['nombre']),
                    'email' => sanitizeInput($_POST['email']),
                    'telefono' => sanitizeInput($_POST['telefono']),
                    'ciudad' => sanitizeInput($_POST['ciudad']),
                    'interes' => sanitizeInput($_POST['interes']),
                    'comentario' => sanitizeInput($_POST['comentario'] ?? '')
                ];

                $projectModel->saveProjectContact($data);

                // Redireccionar con mensaje de éxito
                header('Location: ' . BASE_URL . 'project/showProject/' . $project . '?success=1');
                exit;

            } catch(Exception $e) {
                header('Location: ' . BASE_URL . 'project/showProject/' . $project . '?error=1');
                exit;
            }
        }
    }
}