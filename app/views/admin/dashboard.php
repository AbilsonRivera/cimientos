<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Administrador | Cimientos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background: #f4f4f4;
            line-height: 1.6;
        }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header h1 {
            font-size: 1.5rem;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .logout-btn {
            background: rgba(255,255,255,0.2);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }
        
        .logout-btn:hover {
            background: rgba(255,255,255,0.3);
        }
        
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .card h3 {
            color: #333;
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }
        
        .card p {
            color: #666;
            margin-bottom: 1rem;
        }
        
        .btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
        }
        
        .btn:hover {
            transform: translateY(-2px);
        }
        
        .welcome-message {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #667eea;
        }
        
        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Panel de Administración - Cimientos</h1>
        <div class="user-info">
            <span>Bienvenido, <?php echo htmlspecialchars($_SESSION['user_email']); ?></span>
            <a href="<?php echo BASE_URL; ?>admin/logout" class="logout-btn">Cerrar Sesión</a>
        </div>
    </div>
    
    <div class="container">
        <div class="welcome-message">
            <h2>¡Bienvenido al Panel de Administración!</h2>
            <p>Desde aquí puedes gestionar todos los aspectos de tu sitio web Cimientos.</p>
        </div>
        
        <div class="stats">
            <div class="stat-card">
                <div class="stat-number">0</div>
                <div class="stat-label">Contactos del Home</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">0</div>
                <div class="stat-label">Contactos Viventa Plaza</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">0</div>
                <div class="stat-label">Contactos Viventa Santa Barbara</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">0</div>
                <div class="stat-label">Total de Contactos</div>
            </div>
        </div>
        
        <div class="dashboard-grid">
            <div class="card">
                <h3>Gestionar Contactos</h3>
                <p>Ver y administrar todos los contactos recibidos desde los formularios del sitio web.</p>
                <a href="<?php echo BASE_URL; ?>admin/contacts" class="btn">Ver Contactos</a>
            </div>
            
            <div class="card">
                <h3>Configuración</h3>
                <p>Actualizar información del sitio web y configuraciones generales.</p>
                <a href="<?php echo BASE_URL; ?>admin/settings" class="btn">Configuración</a>
            </div>
            
            <div class="card">
                <h3>Reportes</h3>
                <p>Generar reportes de contactos y estadísticas del sitio web.</p>
                <a href="<?php echo BASE_URL; ?>admin/reports" class="btn">Ver Reportes</a>
            </div>
            
            <div class="card">
                <h3>Volver al Sitio</h3>
                <p>Regresar al sitio web principal para ver cómo se ve para los visitantes.</p>
                <a href="<?php echo BASE_URL; ?>" class="btn">Ir al Sitio Web</a>
            </div>
        </div>
    </div>
</body>
</html>
