<?php
/**
 * Shortcode para mostrar información de contacto del Judo Club Coruña
 * 
 * Uso: [contacto_judo]
 * 
 * Para añadir a functions.php del tema:
 * require_once(get_template_directory() . '/functions-contacto.php');
 */

if (!defined('ABSPATH')) exit;

function judo_contacto_shortcode() {
    ob_start();
    ?>
    <div class="judo-contacto-wrapper">
        <style>
            .judo-contacto-wrapper {
                font-family: 'Montserrat', 'Open Sans', sans-serif;
                max-width: 100%;
            }
            .judo-contacto-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 50px;
            }
            .judo-contacto-info {
                display: flex;
                flex-direction: column;
                gap: 25px;
            }
            .judo-contacto-item {
                display: flex;
                gap: 20px;
                align-items: flex-start;
            }
            .judo-contacto-icon {
                width: 55px;
                height: 55px;
                background: #c8102e;
                color: #fff;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.3rem;
                flex-shrink: 0;
            }
            .judo-contacto-text h3 {
                font-size: 1.1rem;
                font-weight: 600;
                color: #1a1a2e;
                margin-bottom: 5px;
            }
            .judo-contacto-text p {
                color: #6c757d;
                font-size: 0.95rem;
                line-height: 1.6;
                margin: 0;
            }
            .judo-contacto-text a {
                color: #c8102e;
                font-weight: 500;
                text-decoration: none;
            }
            .judo-contacto-text a:hover {
                text-decoration: underline;
            }
            .judo-contacto-social {
                display: flex;
                gap: 15px;
                margin-top: 10px;
            }
            .judo-social-link {
                width: 45px;
                height: 45px;
                background: #1a1a2e;
                color: #fff;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.2rem;
                text-decoration: none;
                transition: all 0.3s ease;
            }
            .judo-social-link:hover {
                background: #c8102e;
                transform: translateY(-3px);
            }
            .judo-contacto-map {
                border-radius: 15px;
                overflow: hidden;
                box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            }
            .judo-contacto-map iframe {
                display: block;
                width: 100%;
                height: 400px;
                border: 0;
            }
            @media (max-width: 768px) {
                .judo-contacto-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>
        
        <div class="judo-contacto-grid">
            <div class="judo-contacto-info">
                <div class="judo-contacto-item">
                    <div class="judo-contacto-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="judo-contacto-text">
                        <h3>Dirección</h3>
                        <p>Calle Pintor Seijo Rubio, 19 Bajo<br>15006 A Coruña</p>
                    </div>
                </div>
                
                <div class="judo-contacto-item">
                    <div class="judo-contacto-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="judo-contacto-text">
                        <h3>Teléfono</h3>
                        <p><a href="tel:981290739">981 29 07 39</a></p>
                    </div>
                </div>
                
                <div class="judo-contacto-item">
                    <div class="judo-contacto-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="judo-contacto-text">
                        <h3>Email</h3>
                        <p><a href="mailto:gimnasiojc.coruna@mundo-r.com">gimnasiojc.coruna@mundo-r.com</a></p>
                    </div>
                </div>
                
                <div class="judo-contacto-item">
                    <div class="judo-contacto-icon">
                        <i class="far fa-clock"></i>
                    </div>
                    <div class="judo-contacto-text">
                        <h3>Horario General</h3>
                        <p>Lunes a Viernes: 10:30 - 13:30 / 17:00 - 21:30<br>Sábados: 10:00 - 13:00</p>
                    </div>
                </div>
                
                <div class="judo-contacto-social">
                    <a href="https://www.instagram.com/judoclubcoruna/" target="_blank" class="judo-social-link" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.facebook.com/Judo-Club-Coru%C3%B1a-114301045261292/" target="_blank" class="judo-social-link" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
            </div>
            
            <div class="judo-contacto-map">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2904.5!2d-8.4!3d43.35!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDPCsDIxJzAwLjAiTiA4wrAyNCcwMC4wIlc!5e0!3m2!1ses!2ses!4v1234567890" 
                    width="100%" 
                    height="400" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Ubicación Judo Club Coruña">
                </iframe>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('contacto_judo', 'judo_contacto_shortcode');

// Añadir estilos de Font Awesome en el frontend
function judo_contacto_scripts() {
    if (is_singular()) {
        global $post;
        if (has_shortcode($post->post_content, 'contacto_judo')) {
            wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
        }
    }
}
add_action('wp_enqueue_scripts', 'judo_contacto_scripts');
