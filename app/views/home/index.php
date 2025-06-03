<?php require_once 'app/views/templates/header.php'; ?>

<!-- Modal de éxito -->
<?php if (isset($_GET['success']) && $_GET['success'] == 'home'): ?>
<div class="modal fade show" id="successModal" tabindex="-1" style="display: block; background: rgba(0,0,0,0.5);">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <div class="mb-4">
                    <i class="fas fa-check-circle" style="font-size: 4rem; color: #28a745;"></i>
                </div>
                <h4 class="mb-3" style="color: var(--primary-color);">¡Mensaje Enviado Exitosamente!</h4>
                <p class="mb-4">Gracias por tu interés. Un asesor de Cimientos se pondrá en contacto contigo muy pronto para brindarte toda la información que necesitas.</p>
                <button type="button" class="btn btn-primary" onclick="closeSuccessModal()">Entendido</button>
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
                <p class="mb-4">Hubo un problema al enviar tu mensaje. Por favor verifica los datos e intenta nuevamente.</p>
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
    window.history.replaceState({}, document.title, window.location.pathname);
}

function closeErrorModal() {
    document.getElementById('errorModal').style.display = 'none';
    // Limpiar URL
    window.history.replaceState({}, document.title, window.location.pathname);
}

// Auto cerrar después de 5 segundos
setTimeout(function() {
    if (document.getElementById('successModal')) {
        closeSuccessModal();
    }
    if (document.getElementById('errorModal')) {
        closeErrorModal();
    }
}, 5000);
</script>

<!-- Hero Section -->
<section id="home" class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1>Construimos proyectos de vivienda con propósito</h1>
                <p>Diseñamos espacios funcionales, sostenibles y listos para vivir. Conoce nuestras propuestas y
                    elige el hogar que mejor se adapta a ti.</p>
                <a href="#projects" class="btn btn-primary btn-lg">Explorar proyectos</a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="section-title text-start">¿Quiénes somos?</h2>
                <h3 class="h4 mb-4" style="color: var(--secondary-color);">Más que construir, edificamos valor</h3>
                <p class="lead">Somos una alianza de profesionales con más de 25 años de experiencia en el sector
                    inmobiliario colombiano. Creamos desarrollos de vivienda pensados para el presente y el futuro:
                    construcciones ágiles, de alta calidad, con diseño funcional y visión social.</p>
                <p class="mb-4"><strong>Nuestro compromiso:</strong> hogares que conectan con las personas y
                    comunidades.</p>
                <a href="#contact" class="btn btn-outline-primary">Conócenos</a>
            </div>
            <div class="col-lg-6">
                <img src="./assets/img/somos.jpg" alt="Equipo profesional" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section id="why-us" class="section section-alt">
    <div class="container">
        <h2 class="section-title">¿Por qué elegirnos?</h2>
        <p class="section-subtitle">Vivienda que se adapta a ti y al mercado actual</p>

        <div class="row">
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h4>Proyectos de venta rápida</h4>
                    <p>Construcción ágil y estrategias de comercialización efectivas</p>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h4>Trayectoria comprobada</h4>
                    <p>Más de 60 proyectos desarrollados en 10 municipios</p>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4>Equipos expertos</h4>
                    <p>Profesionales con experiencia en firmas líderes como Amarilo, Oikos y Prodesa</p>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h4>Visión moderna</h4>
                    <p>Enfoque estratégico y visión moderna del desarrollo urbano</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quote Section -->
<section class="quote-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <p class="quote-text">"Construimos con propósito, vendemos con estrategia, entregamos hogares."</p>
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="section">
    <div class="container">
        <h2 class="section-title">Nuestros proyectos</h2>
        <p class="section-subtitle">Conoce las líneas de vivienda en estructuración</p>

        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="project-card">
                    <img src="/placeholder.svg?height=250&width=400" alt="Viventa Plaza">
                    <div class="project-card-body">
                        <h4 class="project-title">Viventa Plaza</h4>
                        <p class="project-description">24 unidades cerca al CC Plaza de las Américas.</p>
                        <a href="<?= BASE_URL ?>project/showProject/viventa-plaza" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="project-card">
                    <img src="/placeholder.svg?height=250&width=400" alt="Viventa Santa Bárbara">
                    <div class="project-card-body">
                        <h4 class="project-title">Viventa Santa Bárbara</h4>
                        <p class="project-description">50 unidades cerca al CC Santa Bárbara.</p>
                        <a href="<?= BASE_URL ?>project/showProject/viventa-santa-barbara" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="project-card">
                    <img src="/placeholder.svg?height=250&width=400" alt="Viventa Usaquén">
                    <div class="project-card-body">
                        <h4 class="project-title">Viventa Usaquén</h4>
                        <p class="project-description">40 unidades cerca al CC Unicentro.</p>
                        <a href="<?= BASE_URL ?>project/showProject/viventa-usaquen" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="project-card">
                    <img src="/placeholder.svg?height=250&width=400" alt="Viventa Andes">
                    <div class="project-card-body">
                        <h4 class="project-title">Viventa Andes</h4>
                        <p class="project-description">30 unidades cerca al CC Iserra 100.</p>
                        <a href="<?= BASE_URL ?>project/showProject/viventa-andes" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="project-card">
                    <img src="/placeholder.svg?height=250&width=400" alt="Viventa Guaduas">
                    <div class="project-card-body">
                        <h4 class="project-title">Viventa Guaduas</h4>
                        <p class="project-description">50 unidades con proyección de alta valorización.</p>
                        <a href="<?= BASE_URL ?>project/showProject/viventa-guaduas" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="section section-alt">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="section-title text-start">¿Estás interesado en uno de nuestros proyectos?</h2>
                <p class="section-subtitle text-start">Recibe información personalizada</p>
                <p class="lead">Completa el formulario y un asesor te contactará para brindarte los detalles del
                    proyecto que te interesa.</p>
            </div>
            <div class="col-lg-6">
                <div class="contact-form">
                    <form action="<?= BASE_URL ?>contact/submitHome" method="POST">
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
                            <select name="proyecto_interes" class="form-control" required>
                                <option value="">Proyecto de interés</option>
                                <option value="viventa-plaza">Viventa Plaza</option>
                                <option value="viventa-santa-barbara">Viventa Santa Bárbara</option>
                                <option value="viventa-usaquen">Viventa Usaquén</option>
                                <option value="viventa-andes">Viventa Andes</option>
                                <option value="viventa-guaduas">Viventa Guaduas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <textarea name="mensaje" class="form-control" rows="4"
                                placeholder="Mensaje adicional (opcional)"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Quiero información</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php require_once 'app/views/templates/footer.php'; ?>