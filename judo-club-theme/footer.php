<?php
/**
 * Footer template
 */
?>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <img src="<?php echo esc_url(JCC_URI . '/assets/images/logo.png'); ?>" alt="<?php bloginfo('name'); ?>" class="footer-logo">
                    <p class="footer-desc">El Gimnasio para toda la familia en A Coruña. Ven a disfrutar de las artes marciales o a ponerte en forma.</p>
                </div>
                <div class="footer-col">
                    <h3 class="footer-title">Actividades</h3>
                    <ul class="footer-links">
                        <li><a href="#actividades">Judo</a></li>
                        <li><a href="#actividades">Jiu-Jitsu</a></li>
                        <li><a href="#actividades">Aikido</a></li>
                        <li><a href="#actividades">Iaido</a></li>
                        <li><a href="#actividades">Tai Chi</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3 class="footer-title">Enlaces</h3>
                    <ul class="footer-links">
                        <li><a href="#inicio">Inicio</a></li>
                        <li><a href="#horarios">Horarios</a></li>
                        <li><a href="#sobre-nosotros">Sobre Nosotros</a></li>
                        <li><a href="#contacto">Contacto</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3 class="footer-title">Síguenos</h3>
                    <div class="footer-social">
                        <?php $instagram = jcc_get_option('instagram'); ?>
                        <?php if ($instagram) : ?>
                            <a href="<?php echo esc_url($instagram); ?>" target="_blank" aria-label="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        <?php endif; ?>
                        <?php $facebook = jcc_get_option('facebook'); ?>
                        <?php if ($facebook) : ?>
                            <a href="<?php echo esc_url($facebook); ?>" target="_blank" aria-label="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
