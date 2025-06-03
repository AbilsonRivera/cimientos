<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Contactos - Administrador | Cimientos</title>
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
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .logout-btn:hover, .back-btn:hover {
            background: #bc6c25;
            transform: translateY(-2px);
        }

        .main-container {
            display: flex;
            max-width: 1400px;
            margin: 0 auto;
            gap: 2rem;
            padding: 2rem 1rem;
        }

        .sidebar {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(40, 54, 24, 0.1);
            width: 300px;
            height: fit-content;
            position: sticky;
            top: 2rem;
        }

        .sidebar h3 {
            color: #283618;
            margin-bottom: 1rem;
            font-size: 1.2rem;
            font-weight: 700;
            border-bottom: 2px solid #bc6c25;
            padding-bottom: 0.5rem;
        }

        .project-list {
            list-style: none;
        }

        .project-item {
            margin-bottom: 0.5rem;
        }

        .project-link {
            display: block;
            padding: 12px 15px;
            color: #606c38;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .project-link:hover {
            background: #f8f9fa;
            color: #283618;
            transform: translateX(5px);
        }

        .project-link.active {
            background: linear-gradient(135deg, #bc6c25 0%, #a55a1f 100%);
            color: white;
        }

        .content {
            flex: 1;
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(40, 54, 24, 0.1);
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            border-bottom: 2px solid #f8f9fa;
            padding-bottom: 1rem;
        }

        .content-header h2 {
            color: #283618;
            font-weight: 700;
        }

        .contacts-count {
            background: #bc6c25;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .table-container {
            overflow-x: auto;
            margin-bottom: 2rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }

        th {
            background: #f8f9fa;
            color: #283618;
            font-weight: 700;
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        td {
            color: #606c38;
            font-size: 0.9rem;
        }

        tr:hover {
            background: #f8f9fa;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.8rem;
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
            gap: 1rem;
            margin-top: 2rem;
        }

        .pagination a, .pagination span {
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
            color: #606c38;
            font-weight: 500;
        }

        .pagination a:hover {
            background: #f8f9fa;
            color: #283618;
        }

        .pagination .current {
            background: #bc6c25;
            color: white;
        }

        .pagination .disabled {
            color: #ccc;
            cursor: not-allowed;
        }

        .no-data {
            text-align: center;
            padding: 3rem;
            color: #606c38;
        }

        .alert {
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 1rem;
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
                text-align: center;
            }

            .header h1 {
                font-size: 1.2rem;
            }

            .user-info {
                flex-direction: column;
                gap: 0.5rem;
                width: 100%;
            }

            .main-container {
                flex-direction: column;
                padding: 1rem 0.5rem;
                gap: 1rem;
            }

            .sidebar {
                width: 100%;
                position: static;
            }

            .content {
                padding: 1.5rem;
            }

            .content-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .table-container {
                font-size: 0.8rem;
            }

            th, td {
                padding: 8px;
            }
        }

        @media (max-width: 480px) {
            .sidebar {
                padding: 1rem;
            }

            .content {
                padding: 1rem;
            }

            .pagination {
                flex-wrap: wrap;
                gap: 0.5rem;
            }

            th, td {
                padding: 6px;
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div style="display: flex; align-items: center; gap: 1rem;">
            <a href="<?= BASE_URL ?>">
                <img src="<?= BASE_URL ?>assets/img/logo.png" alt="Cimientos Logo" height="40">
            </a>
            <h1>Gestionar Contactos</h1>
        </div>
        <div class="user-info">
            <span>Bienvenido, <?php echo htmlspecialchars($_SESSION['user_email']); ?></span>
            <a href="<?php echo BASE_URL; ?>admin/dashboard" class="back-btn">Dashboard</a>
            <a href="<?php echo BASE_URL; ?>admin/logout" class="logout-btn">Cerrar Sesión</a>
        </div>
    </div>

    <div class="main-container">
        <div class="sidebar">
            <h3>Proyectos</h3>
            <ul class="project-list">
                <?php foreach ($projects as $key => $name): ?>
                    <li class="project-item">
                        <a href="<?= BASE_URL ?>admin/contacts?project=<?= $key ?>" 
                           class="project-link <?= $currentProject === $key ? 'active' : '' ?>">
                            <?= htmlspecialchars($name) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="content">
            <?php if (isset($_GET['success']) && $_GET['success'] === 'deleted'): ?>
                <div class="alert alert-success">Contacto eliminado exitosamente.</div>
            <?php endif; ?>

            <?php if (isset($_GET['error']) && $_GET['error'] === 'delete_failed'): ?>
                <div class="alert alert-error">Error al eliminar el contacto.</div>
            <?php endif; ?>

            <div class="content-header">
                <h2><?= htmlspecialchars($projectName) ?></h2>
                <div class="contacts-count">
                    <?= $data['total'] ?> contacto<?= $data['total'] !== 1 ? 's' : '' ?>
                </div>
            </div>

            <?php if (empty($data['contacts'])): ?>
                <div class="no-data">
                    <h3>No hay contactos disponibles</h3>
                    <p>Aún no se han recibido contactos para este proyecto.</p>
                </div>
            <?php else: ?>
                <div class="table-container">
                    <table>
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
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
