<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Cimientos</title>
    <link rel="icon" type="image/png" href="<?= BASE_URL ?>assets/img/path30.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/project-styles.css">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= BASE_URL ?>">
                <img src="<?= BASE_URL ?>assets/img/logo.png" alt="Cimientos Logo" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ubicacion">Ubicación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#proyecto">El Proyecto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#inversion">Inversión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const planosModal = document.getElementById('planosModal');
        const planosContainer = document.getElementById('planosContainer');

        planosModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const project = button.getAttribute('data-project');

            // Limpia el contenedor
            planosContainer.innerHTML = '';

            // Lista de imágenes por proyecto (debes tenerlas en tu carpeta img/planos/)
            const planos = {
                'viventa-plaza': ['plaza1.jpg', 'plaza1.jpg', 'plaza1.jpg', 'plaza1.jpg'],
                'viventa-santa-barbara': ['santa1.jpg'],
                'viventa-usaquen': ['usaquen1.jpg', 'usaquen2.jpg'],
                'viventa-andes': ['andes1.jpg'],
                'viventa-guaduas': ['guaduas1.jpg', 'guaduas2.jpg']
            };

            if (planos[project]) {
                planos[project].forEach(function(img) {
                    const imgElement = document.createElement('img');
                    imgElement.src = `<?= BASE_URL ?>assets/img/planos/${img}`;
                    imgElement.className = 'img-fluid mb-3 rounded';
                    planosContainer.appendChild(imgElement);
                });
            } else {
                planosContainer.innerHTML = '<p>No hay planos disponibles para este proyecto.</p>';
            }
        });
    });
    </script>