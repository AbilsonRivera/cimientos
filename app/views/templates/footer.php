    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Cimientos. Construcción con sentido.</h3>
                    <p>Sumamos experiencia, visión y compromiso para entregarte más que un inmueble: te entregamos un
                        hogar con propósito.</p>
                </div>
                <div class="col-lg-3">
                    <h5>Enlaces</h5>
                    <ul class="list-unstyled">
                        <li><a href="#about">Nosotros</a></li>
                        <li><a href="#projects">Proyectos</a></li>
                        <li><a href="#contact">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h5>Contacto</h5>
                    <p><i class="fas fa-phone"></i> +57 (1) 234-5678</p>
                    <p><i class="fas fa-envelope"></i> info@cimientos.com</p>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-12 text-center">
                    <p>&copy; 2024 Cimientos. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Navbar background on scroll
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.style.backgroundColor = 'rgba(40, 54, 24, 0.98)';
        } else {
            navbar.style.backgroundColor = 'rgba(40, 54, 24, 0.95)';
        }
    });
    </script>
</body>
</html>
