<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Administrador | Cimientos</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: #f8f9fa;
            line-height: 1.6;
            color: #283618;
        }

        .header {
            background: linear-gradient(135deg, #283618 0%, #606c38 100%);
            color: white;
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(40, 54, 24, 0.1);
        }

        .header h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logout-btn, .back-btn {
            background: rgba(188, 108, 37, 0.8);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .logout-btn:hover, .back-btn:hover {
            background: rgba(188, 108, 37, 1);
            transform: translateY(-2px);
        }

        .container {
            display: flex;
            min-height: calc(100vh - 100px);
        }

        .sidebar {
            width: 280px;
            background: white;
            box-shadow: 2px 0 10px rgba(40, 54, 24, 0.1);
            transition: transform 0.3s ease;
        }

        .sidebar-header {
            padding: 1.5rem;
            background: #606c38;
            color: white;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h2 {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .nav-menu {
            list-style: none;
            padding: 1rem 0;
        }

        .nav-item {
            margin: 0.25rem 0;
        }

        .nav-link {
            display: block;
            padding: 0.75rem 1.5rem;
            color: #283618;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .nav-link:hover {
            background: #f8f9fa;
            border-left-color: #bc6c25;
        }

        .nav-link.active {
            background: rgba(96, 108, 56, 0.1);
            border-left-color: #606c38;
            color: #283618;
            font-weight: 600;
        }

        .main-content {
            flex: 1;
            padding: 2rem;
            overflow-x: auto;
        }

        .breadcrumb {
            background: white;
            padding: 1rem 1.5rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 10px rgba(40, 54, 24, 0.1);
            font-size: 0.9rem;
            color: #606c38;
        }

        .breadcrumb span {
            color: #283618;
            font-weight: 600;
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .content-header h2 {
            color: #283618;
            font-size: 1.8rem;
            font-weight: 700;
        }

        .stats-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(40, 54, 24, 0.1);
            margin-bottom: 2rem;
            border-left: 4px solid #606c38;
        }

        .stats-card h3 {
            color: #283618;
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .stats-number {
            font-size: 2rem;
            font-weight: 700;
            color: #bc6c25;
        }

        .table-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(40, 54, 24, 0.1);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .table-header {
            background: #606c38;
            color: white;
            padding: 1rem 1.5rem;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th {
            background: #f8f9fa;
            color: #283618;
            font-weight: 600;
            padding: 1rem;
            text-align: left;
            border-bottom: 2px solid #e9ecef;
            font-size: 0.9rem;
        }

        .table td {
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
            font-size: 0.9rem;
        }

        .table tbody tr:hover {
            background: #f8f9fa;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.8rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-delete:hover {
            background: #c82333;
            transform: translateY(-1px);
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            padding: 1.5rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(40, 54, 24, 0.1);
        }

        .pagination a,
        .pagination span {
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .pagination a {
            color: #283618;
            border: 1px solid #dee2e6;
        }

        .pagination a:hover {
            background: #606c38;
            color: white;
            border-color: #606c38;
        }

        .pagination .current {
            background: #bc6c25;
            color: white;
            border: 1px solid #bc6c25;
        }

        .pagination .disabled {
            color: #6c757d;
            border: 1px solid #dee2e6;
            cursor: not-allowed;
        }

        .alert {
            padding: 1rem 1.5rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .no-data {
            text-align: center;
            padding: 3rem;
            color: #6c757d;
            font-style: italic;
        }        .mobile-toggle {
            display: none;
            background: #606c38;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 1rem;
        }

        .desktop-only {
            display: block;
        }

        .mobile-only {
            display: none;
        }

        .welcome-text {
            font-size: 0.9rem;
        }

        .nav-divider {
            height: 1px;
            background: #e9ecef;
            margin: 1rem 1.5rem;
        }

        .logout-mobile {
            color: #dc3545 !important;
            font-weight: 600;
        }

        .logout-mobile:hover {
            background: rgba(220, 53, 69, 0.1) !important;
            border-left-color: #dc3545 !important;
        }

        .logout-icon {
            margin-right: 0.5rem;
        }        @media (max-width: 768px) {
            .mobile-toggle {
                display: block;
            }

            .desktop-only {
                display: none;
            }

            .mobile-only {
                display: block;
            }

            .welcome-text {
                font-size: 0.8rem;
            }

            .sidebar {
                position: fixed;
                left: -280px;
                top: 0;
                height: 100vh;
                z-index: 1000;
            }

            .sidebar.active {
                transform: translateX(280px);
            }

            .container {
                flex-direction: column;
            }

            .main-content {
                padding: 1rem;
            }

            .header {
                flex-wrap: wrap;
                gap: 1rem;
            }

            .header h1 {
                font-size: 1.2rem;
            }

            .content-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .content-header h2 {
                font-size: 1.5rem;
            }

            .table-container {
                overflow-x: auto;
            }

            .table {
                min-width: 800px;
            }

            .pagination {
                flex-wrap: wrap;
                gap: 0.25rem;
            }
        }        @media (max-width: 480px) {
            .header {
                padding: 1rem;
            }

            .header h1 {
                font-size: 1rem;
            }

            .welcome-text {
                font-size: 0.75rem;
            }

            .main-content {
                padding: 0.5rem;
            }

            .stats-card {
                padding: 1rem;
            }

            .table th,
            .table td {
                padding: 0.75rem 0.5rem;
                font-size: 0.8rem;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <div style="display: flex; align-items: center;">
            <button class="mobile-toggle" onclick="toggleSidebar()">☰</button>
            <h1>Dashboard Administrativo</h1>
        </div>        <div class="user-info">
            <span class="welcome-text">Bienvenido, <?= $_SESSION['user_email'] ?></span>
            <a href="<?= BASE_URL ?>admin/logout" class="logout-btn desktop-only">Cerrar Sesión</a>
        </div>
    </div>

    <div class="container">
        <nav class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h2>Gestión de Contactos</h2>
            </div>            <ul class="nav-menu">
                <?php foreach ($projects as $key => $name): ?>
                    <li class="nav-item">
                        <a href="<?= BASE_URL ?>admin/dashboard?project=<?= $key ?>" 
                           class="nav-link <?= $currentProject === $key ? 'active' : '' ?>">
                            <?= htmlspecialchars($name) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                
                <!-- Cerrar Sesión para móvil -->
                <li class="nav-item mobile-only">
                    <div class="nav-divider"></div>
                    <a href="<?= BASE_URL ?>admin/logout" class="nav-link logout-mobile">
                        <span class="logout-icon">🚪</span>
                        Cerrar Sesión
                    </a>
                </li>
            </ul>
        </nav>

        <div class="main-content">
            <div class="breadcrumb">
                Dashboard → <span><?= htmlspecialchars($projectName) ?></span>
            </div>

            <div class="content-header">
                <h2><?= htmlspecialchars($projectName) ?></h2>
            </div>

            <?php if (isset($_GET['success']) && $_GET['success'] === 'deleted'): ?>
                <div class="alert alert-success">Contacto eliminado correctamente.</div>
            <?php endif; ?>

            <?php if (isset($_GET['error']) && $_GET['error'] === 'delete_failed'): ?>
                <div class="alert alert-error">Error al eliminar el contacto.</div>
            <?php endif; ?>

            <div class="stats-card">
                <h3>Total de Contactos</h3>
                <div class="stats-number"><?= $data['total'] ?></div>
            </div>

            <?php if (!empty($data['contacts'])): ?>
                <div class="table-container">
                    <div class="table-header">
                        Contactos - Página <?= $data['page'] ?> de <?= $data['totalPages'] ?>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <?php if ($currentProject === 'home_contacts'): ?>
                                    <th>Proyecto de Interés</th>
                                    <th>Mensaje</th>
                                <?php else: ?>
                                    <th>Ciudad</th>
                                    <th>Interés</th>
                                    <th>Comentario</th>
                                <?php endif; ?>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['contacts'] as $contact): ?>
                                <tr>
                                    <td><?= $contact['id'] ?></td>
                                    <td><?= htmlspecialchars($contact['nombre']) ?></td>
                                    <td><?= htmlspecialchars($contact['email']) ?></td>
                                    <td><?= htmlspecialchars($contact['telefono']) ?></td>
                                    <?php if ($currentProject === 'home_contacts'): ?>
                                        <td><?= htmlspecialchars($contact['proyecto_interes']) ?></td>
                                        <td><?= htmlspecialchars(substr($contact['mensaje'] ?? '', 0, 50)) ?><?= strlen($contact['mensaje'] ?? '') > 50 ? '...' : '' ?></td>
                                    <?php else: ?>
                                        <td><?= htmlspecialchars($contact['ciudad']) ?></td>
                                        <td><?= htmlspecialchars($contact['interes']) ?></td>
                                        <td><?= htmlspecialchars(substr($contact['comentario'] ?? '', 0, 50)) ?><?= strlen($contact['comentario'] ?? '') > 50 ? '...' : '' ?></td>
                                    <?php endif; ?>
                                    <td><?= date('d/m/Y H:i', strtotime($contact['fecha_envio'])) ?></td>
                                    <td>
                                        <form method="POST" action="<?= BASE_URL ?>admin/deleteContact" style="display: inline;" 
                                              onsubmit="return confirm('¿Estás seguro de que quieres eliminar este contacto?')">
                                            <input type="hidden" name="project" value="<?= $currentProject ?>">
                                            <input type="hidden" name="id" value="<?= $contact['id'] ?>">
                                            <button type="submit" class="btn-delete">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <?php if ($data['totalPages'] > 1): ?>
                    <div class="pagination">
                        <?php if ($data['page'] > 1): ?>
                            <a href="?project=<?= $currentProject ?>&page=<?= $data['page'] - 1 ?>">« Anterior</a>
                        <?php else: ?>
                            <span class="disabled">« Anterior</span>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $data['totalPages']; $i++): ?>
                            <?php if ($i == $data['page']): ?>
                                <span class="current"><?= $i ?></span>
                            <?php else: ?>
                                <a href="?project=<?= $currentProject ?>&page=<?= $i ?>"><?= $i ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php if ($data['page'] < $data['totalPages']): ?>
                            <a href="?project=<?= $currentProject ?>&page=<?= $data['page'] + 1 ?>">Siguiente »</a>
                        <?php else: ?>
                            <span class="disabled">Siguiente »</span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="table-container">
                    <div class="table-header">
                        <?= htmlspecialchars($projectName) ?>
                    </div>
                    <div class="no-data">
                        No hay contactos disponibles para este proyecto.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        // Cerrar sidebar al hacer clic fuera en móvil
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.querySelector('.mobile-toggle');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !toggle.contains(event.target) && 
                sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });
    </script>
</body>
</html>