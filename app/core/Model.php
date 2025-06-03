<?php

class Model {
    protected $table;

    // Método para obtener todos los registros de una tabla
    protected function getAll($conditions = '', $params = []) {
        $sql = "SELECT * FROM {$this->table}";
        if (!empty($conditions)) {
            $sql .= " WHERE " . $conditions;
        }
        $sql .= " ORDER BY id DESC";
        
        $pdo = Database::connect();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener un registro por ID
    protected function getById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $pdo = Database::connect();
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para insertar un nuevo registro
    protected function create($data) {
        $fields = array_keys($data);
        $placeholders = ':' . implode(', :', $fields);
        $fieldList = implode(', ', $fields);
        
        $sql = "INSERT INTO {$this->table} ({$fieldList}) VALUES ({$placeholders})";
        
        $pdo = Database::connect();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        return $pdo->lastInsertId();
    }

    // Método para actualizar un registro
    protected function update($id, $data) {
        $fields = array_keys($data);
        $setClause = implode(' = :, ', $fields) . ' = :';
        
        $sql = "UPDATE {$this->table} SET {$setClause} WHERE id = :id";
        $data['id'] = $id;
        
        $pdo = Database::connect();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        return $stmt->rowCount();
    }

    // Método para eliminar un registro
    protected function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $pdo = Database::connect();
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount();
    }

    // Método para contar registros
    protected function count($conditions = '', $params = []) {
        $sql = "SELECT COUNT(*) as total FROM {$this->table}";
        if (!empty($conditions)) {
            $sql .= " WHERE " . $conditions;
        }
        
        $pdo = Database::connect();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }

    // Método para verificar si existe un registro
    protected function exists($field, $value) {
        $sql = "SELECT COUNT(*) as total FROM {$this->table} WHERE {$field} = :value";
        $pdo = Database::connect();
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['value' => $value]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] > 0;
    }
}