    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Cimientos. Vivienda con propósito.</h3>
                    <p>Más de 25 años de experiencia, 60 proyectos desarrollados y una visión clara: construir hogares con sentido.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="<?= BASE_URL ?>" class="btn btn-outline-light">Volver al inicio</a>
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
            anchor.addEventListener('click', function (e) {
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
    </script>
</body>
</html>
