<?php
/**
 * Header template
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if (function_exists('wp_body_open')) { wp_body_open(); } ?>

    <!-- HEADER -->
    <header class="header" id="header">
        <div class="container">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <img src="<?php echo esc_url(JCC_URI . '/assets/images/logo.png'); ?>" alt="<?php bloginfo('name'); ?>">
                <?php endif; ?>
            </a>
            <nav class="nav" id="nav">
                <ul class="nav-menu">
                    <li><a href="#inicio" class="nav-link active">Inicio</a></li>
                    <li><a href="#actividades" class="nav-link">Actividades</a></li>
                    <li><a href="#horarios" class="nav-link">Horarios</a></li>
                    <li><a href="#sobre-nosotros" class="nav-link">Sobre Nosotros</a></li>
                    <li><a href="#actualidad" class="nav-link">Actualidad</a></li>
                    <li><a href="#contacto" class="nav-link">Contacto</a></li>
                </ul>
            </nav>
            <button class="nav-toggle" id="nav-toggle" aria-label="Menú">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>
