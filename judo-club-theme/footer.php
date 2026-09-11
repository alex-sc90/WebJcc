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
                        <?php $twitter = jcc_get_option('twitter'); ?>
                        <?php if ($twitter) : ?>
                            <a href="<?php echo esc_url($twitter); ?>" target="_blank" aria-label="Twitter / X">
                                <i class="fab fa-twitter"></i>
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
