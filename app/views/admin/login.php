<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Administrador | Cimientos</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
          body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #606c38 0%, #283618 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
          .login-container {
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(40, 54, 24, 0.2);
            width: 100%;
            max-width: 400px;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .logo img {
            max-width: 120px;
            height: auto;
        }
          .logo h2 {
            color: #283618;
            margin-top: 1rem;
            font-size: 1.5rem;
            font-weight: 700;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
          label {
            display: block;
            margin-bottom: 0.5rem;
            color: #283618;
            font-weight: 600;
        }
          input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            font-family: 'Montserrat', sans-serif;
        }
          input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #bc6c25;
            box-shadow: 0 0 0 0.2rem rgba(188, 108, 37, 0.25);
        }
          .btn-login {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #bc6c25 0%, #a55a1f 100%);
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
        }
          .btn-login:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #a55a1f 0%, #944f1b 100%);
        }
          .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 1rem;
            border: 1px solid #f5c6cb;
            font-weight: 500;
        }
        
        .back-link {
            text-align: center;
            margin-top: 1.5rem;
        }
          .back-link a {
            color: #606c38;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }
          .back-link a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                padding: 1rem;
                align-items: flex-start;
                padding-top: 2rem;
            }

            .login-container {
                padding: 2rem 1.5rem;
                max-width: 100%;
                margin: 0 auto;
            }

            .logo h2 {
                font-size: 1.3rem;
            }

            .logo img {
                max-width: 100px;
            }

            .form-group {
                margin-bottom: 1.2rem;
            }

            input[type="email"],
            input[type="password"] {
                padding: 14px 15px;
                font-size: 16px;
            }

            .btn-login {
                padding: 14px;
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 1.5rem 1rem;
                border-radius: 10px;
            }

            .logo {
                margin-bottom: 1.5rem;
            }

            .logo h2 {
                font-size: 1.2rem;
                margin-top: 0.8rem;
            }

            .logo img {
                max-width: 80px;
            }

            .form-group {
                margin-bottom: 1rem;
            }

            label {
                font-size: 14px;
                margin-bottom: 0.4rem;
            }

            input[type="email"],
            input[type="password"] {
                padding: 12px;
                font-size: 15px;
            }

            .btn-login {
                padding: 12px;
                font-size: 15px;
            }

            .back-link {
                margin-top: 1rem;
            }

            .back-link a {
                font-size: 13px;
            }

            .error-message {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <img src="<?php echo BASE_URL; ?>assets/img/logo.png" alt="Cimientos Logo">
            <h2>Administrador</h2>
        </div>
        
        <?php if (isset($error)): ?>
            <div class="error-message">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="<?php echo BASE_URL; ?>admin/login">
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" required 
                       value="<?php echo isset($_POST['correo']) ? htmlspecialchars($_POST['correo']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="contraseña">Contraseña:</label>
                <input type="password" id="contraseña" name="contraseña" required>
            </div>
            
            <button type="submit" class="btn-login">Iniciar Sesión</button>
        </form>
        
        <div class="back-link">
            <a href="<?php echo BASE_URL; ?>">← Volver al sitio web</a>
        </div>
    </div>
</body>
</html>
