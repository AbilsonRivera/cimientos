<?php
require_once 'app/core/Controller.php';

class HomeController extends Controller {
    public function index() {
        // Aquí podrías cargar datos desde modelos si los necesitas
        $this->view('home/index');
    }
}
