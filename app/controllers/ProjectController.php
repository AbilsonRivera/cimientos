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
            'detail_image' => '3.jpg',
            'map' => [
                'iframe' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.6087661231894!2d-74.13757972674034!3d4.606322343417089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9a4b77c7f5e7%3A0x1c5c5c5c5c5c5c5c!2sPlaza%20de%20las%20Am%C3%A9ricas!5e0!3m2!1ses-419!2sco!4v1648968979925!5m2!1ses-419!2sco',
                'address' => 'Plaza de las Américas, Bogotá, Colombia'
            ],
            'nearby' => [
                ['icon' => 'shopping-cart', 'name' => 'CC Plaza de las Américas', 'distance' => '5 minutos caminando'],
                ['icon' => 'subway', 'name' => 'TransMilenio', 'distance' => '2 cuadras'],
                ['icon' => 'tree', 'name' => 'Parque Ciudad Montes', 'distance' => '10 minutos'],
                ['icon' => 'hospital', 'name' => 'Hospital MediPlaza', 'distance' => 'Zona hospitalaria cercana']
            ],
            'features' => [
                ['icon' => 'home', 'title' => 'apartamentos', 'description' => 'desde 65 m²'],
                ['icon' => 'building', 'title' => '6 pisos', 'description' => 'con parqueaderos subterráneos'],
                ['icon' => 'couch', 'title' => 'Espacios amplios', 'description' => 'y bien distribuidos'],
                ['icon' => 'star', 'title' => 'Acabados', 'description' => 'de alta calidad'],
                ['icon' => 'dumbbell', 'title' => 'Posiblidad', 'description' => 'de personalización'],
                ['icon' => 'tree', 'title' => 'Excelente proyeccion', 'description' => 'de valorización']
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
            'detail_image' => '3.jpg',
            'map' => [
                'iframe' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.234567890123!2d-74.05852562674034!3d4.652945643417089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9a5b88d8f6e8%3A0x2d6d6d6d6d6d6d6d!2sSanta%20B%C3%A1rbara%2C%20Bogot%C3%A1!5e0!3m2!1ses-419!2sco!4v1648968979925!5m2!1ses-419!2sco',
                'address' => 'Santa Bárbara, Bogotá, Colombia'
            ],
            'nearby' => [
                ['icon' => 'shopping-cart', 'name' => 'CC Santa Bárbara', 'distance' => '3 minutos caminando'],
                ['icon' => 'subway', 'name' => 'TransMilenio', 'distance' => '5 cuadras'],
                ['icon' => 'tree', 'name' => 'Parque El Virrey', 'distance' => '15 minutos'],
                ['icon' => 'hospital', 'name' => 'Clínica del Country', 'distance' => 'Zona hospitalaria cercana']
            ],
            'features' => [
                ['icon' => 'home', 'title' => 'apartamentos', 'description' => 'desde 65 m²'],
                ['icon' => 'building', 'title' => '6 pisos', 'description' => 'con parqueaderos subterráneos'],
                ['icon' => 'couch', 'title' => 'Espacios amplios', 'description' => 'y bien distribuidos'],
                ['icon' => 'star', 'title' => 'Acabados', 'description' => 'de alta calidad'],
                ['icon' => 'dumbbell', 'title' => 'Posiblidad', 'description' => 'de personalización'],
                ['icon' => 'tree', 'title' => 'Excelente proyeccion', 'description' => 'de valorización']
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
            'detail_image' => '3.jpg',
            'map' => [
                'iframe' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3975.789012345678!2d-74.03185062674034!3d4.693834643417089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9a6c99e9f7e9%3A0x3e7e7e7e7e7e7e7e!2sUsaqu%C3%A9n%2C%20Bogot%C3%A1!5e0!3m2!1ses-419!2sco!4v1648968979925!5m2!1ses-419!2sco',
                'address' => 'Usaquén, Bogotá, Colombia'
            ],
            'nearby' => [
                ['icon' => 'shopping-cart', 'name' => 'CC Unicentro', 'distance' => '5 minutos caminando'],
                ['icon' => 'subway', 'name' => 'TransMilenio', 'distance' => '3 cuadras'],
                ['icon' => 'tree', 'name' => 'Parque de Usaquén', 'distance' => '10 minutos'],
                ['icon' => 'hospital', 'name' => 'Fundación Santa Fe', 'distance' => 'Zona hospitalaria cercana']
            ],
            'features' => [
                ['icon' => 'home', 'title' => 'apartamentos', 'description' => 'desde 65 m²'],
                ['icon' => 'building', 'title' => '6 pisos', 'description' => 'con parqueaderos subterráneos'],
                ['icon' => 'couch', 'title' => 'Espacios amplios', 'description' => 'y bien distribuidos'],
                ['icon' => 'star', 'title' => 'Acabados', 'description' => 'de alta calidad'],
                ['icon' => 'dumbbell', 'title' => 'Posiblidad', 'description' => 'de personalización'],
                ['icon' => 'tree', 'title' => 'Excelente proyeccion', 'description' => 'de valorización']
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
            'detail_image' => '3.jpg',
            'map' => [
                'iframe' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.345678901234!2d-74.08285062674034!3d4.609734643417089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9a7d10f0f8ea%3A0x4f8f8f8f8f8f8f8f!2sLos%20Andes%2C%20Bogot%C3%A1!5e0!3m2!1ses-419!2sco!4v1648968979925!5m2!1ses-419!2sco',
                'address' => 'Los Andes, Bogotá, Colombia'
            ],
            'nearby' => [
                ['icon' => 'shopping-cart', 'name' => 'CC Iserra 100', 'distance' => '5 minutos caminando'],
                ['icon' => 'subway', 'name' => 'TransMilenio', 'distance' => '4 cuadras'],
                ['icon' => 'tree', 'name' => 'Parque Los Andes', 'distance' => '8 minutos'],
                ['icon' => 'hospital', 'name' => 'Hospital Universitario', 'distance' => 'Zona hospitalaria cercana']
            ],
            'features' => [
                ['icon' => 'home', 'title' => 'apartamentos', 'description' => 'desde 65 m²'],
                ['icon' => 'building', 'title' => '6 pisos', 'description' => 'con parqueaderos subterráneos'],
                ['icon' => 'couch', 'title' => 'Espacios amplios', 'description' => 'y bien distribuidos'],
                ['icon' => 'star', 'title' => 'Acabados', 'description' => 'de alta calidad'],
                ['icon' => 'dumbbell', 'title' => 'Posiblidad', 'description' => 'de personalización'],
                ['icon' => 'tree', 'title' => 'Excelente proyeccion', 'description' => 'de valorización']
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
            'detail_image' => '3.jpg',
            'map' => [
                'iframe' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31793.639099049087!2d-74.62190061029524!3d5.070514173992969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e40bd6345c63247%3A0x6e97df1a867a7d54!2sGuaduas%2C%20Cundinamarca!5e0!3m2!1ses-419!2sco!4v1748980055971!5m2!1ses-419!2sco',
                'address' => 'Guaduas, Cundinamarca, Colombia'
            ],
            'nearby' => [
                ['icon' => 'shopping-cart', 'name' => 'Centro Comercial', 'distance' => '10 minutos caminando'],
                ['icon' => 'bus', 'name' => 'Terminal de Transporte', 'distance' => '5 cuadras'],
                ['icon' => 'tree', 'name' => 'Parque Central', 'distance' => '5 minutos'],
                ['icon' => 'hospital', 'name' => 'Hospital San José', 'distance' => 'Zona hospitalaria cercana']
            ],
            'features' => [
                ['icon' => 'home', 'title' => 'apartamentos', 'description' => 'desde 65 m²'],
                ['icon' => 'building', 'title' => '6 pisos', 'description' => 'con parqueaderos subterráneos'],
                ['icon' => 'couch', 'title' => 'Espacios amplios', 'description' => 'y bien distribuidos'],
                ['icon' => 'star', 'title' => 'Acabados', 'description' => 'de alta calidad'],
                ['icon' => 'dumbbell', 'title' => 'Posiblidad', 'description' => 'de personalización'],
                ['icon' => 'tree', 'title' => 'Excelente proyeccion', 'description' => 'de valorización']
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
