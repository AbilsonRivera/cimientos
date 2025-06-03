<?php

class ContactModel extends Model {
    protected $table = 'home_contacts';

    public function saveContact($data) {
        // Validar y limpiar los datos antes de guardar
        $contactData = [
            'nombre' => trim($data['nombre']),
            'email' => trim($data['email']),
            'telefono' => trim($data['telefono']),
            'proyecto_interes' => trim($data['proyecto_interes']),
            'mensaje' => trim($data['mensaje'] ?? '')
        ];

        return $this->create($contactData);
    }

    public function getAllContacts() {
        return $this->getAll();
    }

    public function getContactById($id) {
        return $this->getById($id);
    }

    public function getContactsByProject($project) {
        return $this->getAll('proyecto_interes = :project', ['project' => $project]);
    }

    public function getTotalContacts() {
        return $this->count();
    }

    public function getContactsFromDate($date) {
        return $this->getAll('fecha_envio >= :date', ['date' => $date]);
    }
}