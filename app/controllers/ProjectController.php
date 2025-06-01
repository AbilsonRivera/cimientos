<?php
require_once 'app/core/Controller.php';

class ProjectController extends Controller {
    private $projects = [
        'viventa-plaza' => [
            'title' => 'Viventa Plaza',
            'location' => 'Plaza de las Américas',
            'units' => '24',
            'hero_image' => [
                'url' => 'familia.jpg',
                'position' => 'center 40%'
            ],
            'nearby' => [
                ['icon' => 'shopping-cart', 'name' => 'CC Plaza de las Américas', 'distance' => '5 minutos caminando'],
                ['icon' => 'subway', 'name' => 'TransMilenio', 'distance' => '2 cuadras'],
                ['icon' => 'tree', 'name' => 'Parque Ciudad Montes', 'distance' => '10 minutos'],
                ['icon' => 'hospital', 'name' => 'Hospital MediPlaza', 'distance' => 'Zona hospitalaria cercana']
            ],
            'features' => [
                ['icon' => 'home', 'title' => '24 apartamentos', 'description' => 'desde 65 m²'],
                ['icon' => 'building', 'title' => '6 pisos', 'description' => 'con parqueaderos subterráneos'],
                ['icon' => 'couch', 'title' => 'Espacios amplios', 'description' => 'diseño tipo loft'],
                ['icon' => 'star', 'title' => 'Acabados premium', 'description' => 'materiales importados'],
                ['icon' => 'dumbbell', 'title' => 'Gimnasio', 'description' => 'equipado y zona de yoga'],
                ['icon' => 'tree', 'title' => 'Terraza verde', 'description' => 'área social compartida']
            ]
        ],
        'viventa-santa-barbara' => [
            'title' => 'Viventa Santa Bárbara',
            'location' => 'Santa Bárbara',
            'units' => '50',
            'hero_image' => [
                'url' => 'santa-barbara-hero.jpg',
                'position' => 'center center'
            ],
            'nearby' => [
                ['icon' => 'shopping-cart', 'name' => 'CC Santa Bárbara', 'distance' => '3 minutos caminando'],
                ['icon' => 'subway', 'name' => 'TransMilenio', 'distance' => '5 cuadras'],
                ['icon' => 'tree', 'name' => 'Parque El Virrey', 'distance' => '15 minutos'],
                ['icon' => 'hospital', 'name' => 'Clínica del Country', 'distance' => 'Zona hospitalaria cercana']
            ],
            'features' => [
                ['icon' => 'home', 'title' => '50 apartamentos', 'description' => 'desde 85 m²'],
                ['icon' => 'building', 'title' => '12 pisos', 'description' => 'con ascensor inteligente'],
                ['icon' => 'swimming-pool', 'title' => 'Piscina', 'description' => 'climatizada cubierta'],
                ['icon' => 'star', 'title' => 'Acabados de lujo', 'description' => 'marcas europeas'],
                ['icon' => 'chess', 'title' => 'Sala de juegos', 'description' => 'y centro de negocios'],
                ['icon' => 'car', 'title' => 'Parqueadero doble', 'description' => 'para cada unidad']
            ]
        ],
        'viventa-usaquen' => [
            'title' => 'Viventa Usaquén',
            'location' => 'Usaquén',
            'units' => '40',
            'hero_image' => [
                'url' => 'usaquen-hero.jpg',
                'position' => 'center 30%'
            ],
            'nearby' => [
                ['icon' => 'shopping-cart', 'name' => 'CC Unicentro', 'distance' => '5 minutos caminando'],
                ['icon' => 'subway', 'name' => 'TransMilenio', 'distance' => '3 cuadras'],
                ['icon' => 'tree', 'name' => 'Parque de Usaquén', 'distance' => '10 minutos'],
                ['icon' => 'hospital', 'name' => 'Fundación Santa Fe', 'distance' => 'Zona hospitalaria cercana']
            ],
            'features' => [
                ['icon' => 'home', 'title' => '40 apartamentos', 'description' => 'desde 75 m²'],
                ['icon' => 'building', 'title' => '8 pisos', 'description' => 'con parqueaderos subterráneos'],
                ['icon' => 'couch', 'title' => 'Espacios funcionales', 'description' => 'y bien distribuidos'],
                ['icon' => 'star', 'title' => 'Acabados de alta calidad', 'description' => 'diseño moderno'],
                ['icon' => 'paint-brush', 'title' => 'Personalización', 'description' => 'opciones de acabados'],
                ['icon' => 'chart-line', 'title' => 'Alta valorización', 'description' => 'ubicación premium']
            ]
        ],
        'viventa-andes' => [
            'title' => 'Viventa Andes',
            'location' => 'Los Andes',
            'units' => '30',
            'hero_image' => [
                'url' => 'andes-hero.jpg',
                'position' => 'center 45%'
            ],
            'nearby' => [
                ['icon' => 'shopping-cart', 'name' => 'CC Iserra 100', 'distance' => '5 minutos caminando'],
                ['icon' => 'subway', 'name' => 'TransMilenio', 'distance' => '4 cuadras'],
                ['icon' => 'tree', 'name' => 'Parque Los Andes', 'distance' => '8 minutos'],
                ['icon' => 'hospital', 'name' => 'Hospital Universitario', 'distance' => 'Zona hospitalaria cercana']
            ],
            'features' => [
                ['icon' => 'home', 'title' => '30 apartamentos', 'description' => 'desde 55 m²'],
                ['icon' => 'building', 'title' => '7 pisos', 'description' => 'con ascensor'],
                ['icon' => 'bicycle', 'title' => 'Bicicletero', 'description' => 'y taller de reparación'],
                ['icon' => 'wifi', 'title' => 'Smart Building', 'description' => 'domótica incluida'],
                ['icon' => 'recycle', 'title' => 'Eco-friendly', 'description' => 'paneles solares'],
                ['icon' => 'users', 'title' => 'Coworking', 'description' => 'espacio compartido']
            ]
        ],
        'viventa-guaduas' => [
            'title' => 'Viventa Guaduas',
            'location' => 'Guaduas',
            'units' => '50',
            'hero_image' => [
                'url' => 'guaduas-hero.jpg',
                'position' => 'center 35%'
            ],
            'nearby' => [
                ['icon' => 'shopping-cart', 'name' => 'Centro Comercial', 'distance' => '10 minutos caminando'],
                ['icon' => 'bus', 'name' => 'Terminal de Transporte', 'distance' => '5 cuadras'],
                ['icon' => 'tree', 'name' => 'Parque Central', 'distance' => '5 minutos'],
                ['icon' => 'hospital', 'name' => 'Hospital San José', 'distance' => 'Zona hospitalaria cercana']
            ],
            'features' => [
                ['icon' => 'home', 'title' => '50 apartamentos', 'description' => 'desde 60 m²'],
                ['icon' => 'building', 'title' => '5 pisos', 'description' => 'estilo colonial'],
                ['icon' => 'mountain', 'title' => 'Vista panorámica', 'description' => 'a la montaña'],
                ['icon' => 'umbrella-beach', 'title' => 'Área social', 'description' => 'con piscina'],
                ['icon' => 'leaf', 'title' => 'Jardines', 'description' => 'áreas verdes privadas'],
                ['icon' => 'shield-alt', 'title' => 'Conjunto cerrado', 'description' => 'seguridad 24/7']
            ]
        ]
    ];

    public function showProject($projectSlug = '') {
        if (!isset($this->projects[$projectSlug])) {
            // Redirect to 404 or home page
            header('Location: ' . BASE_URL);
            exit;
        }

        $data = $this->projects[$projectSlug];
        $data['slug'] = $projectSlug;
        
        parent::view('projects/detail', $data);
    }
}
