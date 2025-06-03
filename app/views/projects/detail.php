<?php require_once 'app/views/templates/project_header.php'; ?>

<!-- Modal de éxito -->
<?php if (isset($_GET['success']) && $_GET['success'] == '1'): ?>
<div class="modal fade show" id="successModal" tabindex="-1" style="display: block; background: rgba(0,0,0,0.5);">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <div class="mb-4">
                    <i class="fas fa-check-circle" style="font-size: 4rem; color: #28a745;"></i>
                </div>
                <h4 class="mb-3" style="color: var(--primary-color);">¡Solicitud Enviada Exitosamente!</h4>
                <p class="mb-4">Gracias por tu interés en <strong><?= $title ?></strong>. Un asesor especializado se pondrá en contacto contigo muy pronto para brindarte toda la información sobre este proyecto.</p>
                <button type="button" class="btn btn-primary" onclick="closeSuccessModal()">¡Perfecto!</button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Modal de error -->
<?php if (isset($_GET['error'])): ?>
<div class="modal fade show" id="errorModal" tabindex="-1" style="display: block; background: rgba(0,0,0,0.5);">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <div class="mb-4">
                    <i class="fas fa-exclamation-triangle" style="font-size: 4rem; color: #dc3545;"></i>
                </div>
                <h4 class="mb-3" style="color: #dc3545;">Oops... Algo salió mal</h4>
                <p class="mb-4">Hubo un problema al procesar tu solicitud. Por favor verifica los datos e intenta nuevamente.</p>
                <button type="button" class="btn btn-danger" onclick="closeErrorModal()">Intentar de nuevo</button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<script>
function closeSuccessModal() {
    document.getElementById('successModal').style.display = 'none';
    // Limpiar URL
    const url = new URL(window.location);
    url.searchParams.delete('success');
    window.history.replaceState({}, document.title, url);
}

function closeErrorModal() {
    document.getElementById('errorModal').style.display = 'none';
    // Limpiar URL
    const url = new URL(window.location);
    url.searchParams.delete('error');
    window.history.replaceState({}, document.title, url);
}

// Auto cerrar después de 7 segundos
setTimeout(function() {
    if (document.getElementById('successModal')) {
        closeSuccessModal();
    }
    if (document.getElementById('errorModal')) {
        closeErrorModal();
    }
}, 7000);
</script>

<!-- Hero Section -->
<section class="hero"
    style="background: linear-gradient(rgba(40, 54, 24, 0.7), rgba(40, 54, 24, 0.7)), url('<?= BASE_URL ?>assets/img/<?= $hero_image['url'] ?>'); background-position: <?= $hero_image['position'] ?>; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1>Tu nuevo hogar te espera en <?= $location ?></h1>
                <p>Vive en un proyecto diseñado para tu bienestar: ubicación estratégica, diseño moderno y excelente
                    valorización.</p>
                <a href="#contacto" class="btn btn-primary btn-lg">Quiero más información</a>
            </div>
        </div>
    </div>
</section>

<!-- Ubicación Section -->
<section id="ubicacion" class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="section-title">Donde todo te queda cerca</h2>
                <p class="section-subtitle">Este proyecto está ubicado en <?= $location ?>, una zona de alta
                    conectividad, con fácil acceso a transporte, comercio, parques y servicios esenciales.</p>

                <?php foreach ($nearby as $place): ?>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-<?= $place['icon'] ?>"></i>
                    </div>
                    <div>
                        <strong><?= $place['name'] ?></strong> - <?= $place['distance'] ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-6">
                <div class="map-container">
                    <iframe 
                        src="<?= $map['iframe'] ?>" 
                        width="100%" 
                        height="480" 
                        style="border:0; border-radius: 8px;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Proyecto Section -->
<section id="proyecto" class="section section-alt">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-title"><?= $title ?> en detalle</h2>
                <p class="section-subtitle">Un edificio de <?= $units ?> apartamentos pensado para quienes buscan un
                    estilo de vida práctico, moderno y conectado.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <img src="<?= BASE_URL ?>assets/img/projects/<?= $detail_image ?>" alt="<?= $title ?>"
                    class="img-fluid rounded">
            </div>
            <div class="col-lg-6">
                <h3 class="mb-4">Características clave:</h3>
                <?php foreach ($features as $feature): ?>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-<?= $feature['icon'] ?>"></i>
                    </div>
                    <div>
                        <strong><?= $feature['title'] ?></strong> - <?= $feature['description'] ?>
                    </div>
                </div>
                <?php endforeach; ?>

                <div class="mt-4">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#planosModal"
                        data-project="<?= $slug ?>">
                        Mostrar plano
                    </button>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Investment Section -->
<section id="inversion" class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-title">¿Por qué invertir aquí?</h2>
                <p class="section-subtitle">Porque aquí se vive y se valoriza</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="investment-card">
                    <h4><i class="fas fa-chart-line me-2" style="color: var(--accent-color);"></i>Alta demanda
                        residencial</h4>
                    <p>Zona con crecimiento constante y alta demanda de vivienda por su ubicación privilegiada.</p>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="investment-card">
                    <h4><i class="fas fa-leaf me-2" style="color: var(--accent-color);"></i>Diseño eficiente y
                        sostenible</h4>
                    <p>Proyecto con diseño moderno, eficiente en espacios y con criterios de sostenibilidad.</p>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="investment-card">
                    <h4><i class="fas fa-clock me-2" style="color: var(--accent-color);"></i>Construcción de rápida
                        ejecución</h4>
                    <p>Cronograma optimizado para entrega oportuna y retorno de inversión acelerado.</p>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="investment-card">
                    <h4><i class="fas fa-users me-2" style="color: var(--accent-color);"></i>Desarrollado por expertos
                    </h4>
                    <p>Profesionales con experiencia nacional y trayectoria comprobada en el sector.</p>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="investment-card text-center">
                    <h4><i class="fas fa-dollar-sign me-2" style="color: var(--accent-color);"></i>Precio competitivo y
                        facilidades de pago</h4>
                    <p>Opciones de financiación flexibles y precios acordes al mercado actual.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contacto" class="section section-alt">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="section-title">¿Te interesa este proyecto?</h2>
                <p class="section-subtitle">Déjanos tus datos y un asesor te contactará pronto</p>
                <div class="mb-4">
                    <h5><i class="fas fa-phone me-2" style="color: var(--accent-color);"></i>Línea directa</h5>
                    <p>+57 (1) 234-5678</p>
                </div>
                <div class="mb-4">
                    <h5><i class="fas fa-envelope me-2" style="color: var(--accent-color);"></i>Email</h5>
                    <p><?= str_replace(' ', '', strtolower($location)) ?>@cimientos.com</p>
                </div>
                <div class="mb-4">
                    <h5><i class="fas fa-clock me-2" style="color: var(--accent-color);"></i>Horarios de atención</h5>
                    <p>Lunes a Viernes: 8:00 AM - 6:00 PM<br>Sábados: 9:00 AM - 4:00 PM</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-form">
                    <form action="<?= BASE_URL ?>contact/submitProject" method="POST">
                        <div class="mb-3">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre completo" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
                        </div>
                        <div class="mb-3">
                            <input type="tel" name="telefono" class="form-control" placeholder="Teléfono" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="ciudad" class="form-control" placeholder="¿En qué ciudad vives?" required>
                        </div>
                        <div class="mb-3">
                            <select name="interes" class="form-control" required>
                                <option value="">¿Te interesa para vivir o para invertir?</option>
                                <option value="vivir">Para vivir</option>
                                <option value="invertir">Para invertir</option>
                                <option value="ambos">Ambos</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <textarea name="comentario" class="form-control" rows="4"
                                placeholder="Comentario adicional (opcional)"></textarea>
                        </div>
                        <input type="hidden" name="project" value="<?= $slug ?>">
                        <button type="submit" class="btn btn-primary w-100">Quiero saber más</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal de planos -->
<div class="modal fade" id="planosModal" tabindex="-1" aria-labelledby="planosModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="planosModalLabel">Planos del proyecto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body text-center">
        <div id="planosContainer">
          <!-- Las imágenes se insertarán aquí -->
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once 'app/views/templates/project_footer.php'; ?>