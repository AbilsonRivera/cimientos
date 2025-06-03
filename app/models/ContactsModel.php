<?php

class ContactsModel {
    private $db;
    
    public function __construct() {
        $this->db = Database::connect();
    }
    
    // Obtener todos los proyectos disponibles
    public function getProjects() {
        return [
            'home_contacts' => 'Contactos del Home',
            'viventa_plaza_contacts' => 'Viventa Plaza',
            'viventa_santa_barbara_contacts' => 'Viventa Santa Barbara',
            'viventa_usaquen_contacts' => 'Viventa Usaquén',
            'viventa_andes_contacts' => 'Viventa Andes',
            'viventa_guaduas_contacts' => 'Viventa Guaduas'
        ];
    }
    
    // Obtener contactos de un proyecto específico con paginación
    public function getContactsByProject($project, $page = 1, $perPage = 10) {
        try {
            $offset = ($page - 1) * $perPage;
            
            // Validar que la tabla existe
            $validTables = array_keys($this->getProjects());
            if (!in_array($project, $validTables)) {
                return false;
            }
            
            // Obtener contactos con paginación
            $stmt = $this->db->prepare("SELECT * FROM {$project} ORDER BY fecha_envio DESC LIMIT :limit OFFSET :offset");
            $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            
            $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Obtener total de registros
            $totalStmt = $this->db->prepare("SELECT COUNT(*) as total FROM {$project}");
            $totalStmt->execute();
            $total = $totalStmt->fetch(PDO::FETCH_ASSOC)['total'];
            
            return [
                'contacts' => $contacts,
                'total' => $total,
                'page' => $page,
                'perPage' => $perPage,
                'totalPages' => ceil($total / $perPage)
            ];
            
        } catch (PDOException $e) {
            error_log("Error al obtener contactos: " . $e->getMessage());
            return false;
        }
    }
    
    // Obtener estadísticas de todos los proyectos
    public function getStats() {
        try {
            $stats = [];
            $projects = $this->getProjects();
            
            foreach ($projects as $table => $name) {
                $stmt = $this->db->prepare("SELECT COUNT(*) as count FROM {$table}");
                $stmt->execute();
                $count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
                $stats[$table] = $count;
            }
            
            return $stats;
        } catch (PDOException $e) {
            error_log("Error al obtener estadísticas: " . $e->getMessage());
            return [];
        }
    }
    
    // Eliminar un contacto
    public function deleteContact($project, $id) {
        try {
            $validTables = array_keys($this->getProjects());
            if (!in_array($project, $validTables)) {
                return false;
            }
            
            $stmt = $this->db->prepare("DELETE FROM {$project} WHERE id = :id");
            $stmt->execute(['id' => $id]);
            
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Error al eliminar contacto: " . $e->getMessage());
            return false;
        }
    }
}
