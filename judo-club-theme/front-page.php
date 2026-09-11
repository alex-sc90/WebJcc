<?php
/**
 * Front Page Template
 */
get_header();
?>

    <!-- CARRUSEL -->
    <?php
    $fotos_carrusel = new WP_Query(array(
        'post_type'      => 'foto_carrusel',
        'posts_per_page' => -1,
        'meta_key'       => '_jcc_foto_orden',
        'orderby'        => 'meta_value_num',
        'order'          => 'ASC',
    ));

    if ($fotos_carrusel->have_posts()) :
    ?>
    <section class="carousel" id="carousel">
        <div class="carousel-container">
            <div class="carousel-slides">
                <?php while ($fotos_carrusel->have_posts()) : $fotos_carrusel->the_post(); ?>
                    <div class="carousel-slide">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('full'); ?>
                        <?php endif; ?>
                        <div class="carousel-caption">
                            <h3><?php the_title(); ?></h3>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <button class="carousel-btn carousel-prev" aria-label="Anterior">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="carousel-btn carousel-next" aria-label="Siguiente">
                <i class="fas fa-chevron-right"></i>
            </button>
            <div class="carousel-dots"></div>
        </div>
    </section>
    <?php endif; ?>

    <!-- HERO -->
    <section class="hero" id="inicio">
        <div class="hero-bg">
            <img src="<?php echo esc_url(JCC_URI . '/assets/images/portada.png'); ?>" alt="<?php bloginfo('name'); ?>">
        </div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title"><?php bloginfo('name'); ?></h1>
            <p class="hero-subtitle">El Camino de la Suavidad</p>
            <p class="hero-text">Más de 50 años de experiencia en artes marciales en A Coruña. Únete a nuestra familia de deportistas.</p>
            <div class="hero-buttons">
                <a href="#horarios" class="btn btn-primary">Ver Horarios</a>
                <a href="#contacto" class="btn btn-secondary">Contacto</a>
            </div>
        </div>
    </section>

    <!-- ACTIVIDADES -->
    <section class="actividades" id="actividades">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Nuestras Disciplinas</span>
                <h2 class="section-title">Actividades</h2>
                <p class="section-text">Ofrecemos una amplia variedad de artes marciales para todas las edades y niveles</p>
            </div>
            <div class="actividades-grid">
                <div class="actividad-card">
                    <div class="actividad-img">
                        <img src="<?php echo esc_url(JCC_URI . '/assets/images/judo.svg'); ?>" alt="Judo">
                        <div class="actividad-badge">Popular</div>
                    </div>
                    <div class="actividad-content">
                        <h3 class="actividad-title">Judo</h3>
                        <p class="actividad-desc">Arte marcial y deporte olímpico. Desarrolla fuerza, equilibrio y disciplina.</p>
                        <div class="actividad-horario">
                            <i class="far fa-clock"></i>
                            <span>Lun, Mié, Vie: 18:00 - 21:30</span>
                        </div>
                    </div>
                </div>

                <div class="actividad-card">
                    <div class="actividad-img">
                        <img src="<?php echo esc_url(JCC_URI . '/assets/images/jiu-jitsu.svg'); ?>" alt="Jiu-Jitsu">
                    </div>
                    <div class="actividad-content">
                        <h3 class="actividad-title">Jiu-Jitsu</h3>
                        <p class="actividad-desc">La madre de todas las artes marciales. Técnicas de suelo y defensa personal.</p>
                        <div class="actividad-horario">
                            <i class="far fa-clock"></i>
                            <span>Lun, Mié, Vie: 9:30 - 10:30</span>
                        </div>
                    </div>
                </div>

                <div class="actividad-card">
                    <div class="actividad-img">
                        <img src="<?php echo esc_url(JCC_URI . '/assets/images/karate.svg'); ?>" alt="Karate">
                    </div>
                    <div class="actividad-content">
                        <h3 class="actividad-title">Karate</h3>
                        <p class="actividad-desc">Karate ni sente nashi: en el karate no existe el primer ataque. Un camino de defensa personal, respeto y desarrollo personal.</p>
                        <div class="actividad-horario">
                            <i class="far fa-clock"></i>
                            <span>Mar, Jue: 20:30 - 22:30</span>
                        </div>
                    </div>
                </div>

                <div class="actividad-card">
                    <div class="actividad-img">
                        <img src="<?php echo esc_url(JCC_URI . '/assets/images/aikido.svg'); ?>" alt="Aikido">
                    </div>
                    <div class="actividad-content">
                        <h3 class="actividad-title">Aikido</h3>
                        <p class="actividad-desc">El arte de la armonía. Aprende a redirigir la energía del oponente.</p>
                        <div class="actividad-horario">
                            <i class="far fa-clock"></i>
                            <span>Todos los días: 21:30</span>
                        </div>
                    </div>
                </div>

                <div class="actividad-card">
                    <div class="actividad-img">
                        <img src="<?php echo esc_url(JCC_URI . '/assets/images/iaido.svg'); ?>" alt="Iaido">
                    </div>
                    <div class="actividad-content">
                        <h3 class="actividad-title">Iaido</h3>
                        <p class="actividad-desc">El arte de desenvainar la espada. Disciplina tradicional japonesa.</p>
                        <div class="actividad-horario">
                            <i class="far fa-clock"></i>
                            <span>Sábados: 10:00 - 12:00</span>
                        </div>
                    </div>
                </div>

                <div class="actividad-card">
                    <div class="actividad-img">
                        <img src="<?php echo esc_url(JCC_URI . '/assets/images/taichi.svg'); ?>" alt="Tai Chi">
                    </div>
                    <div class="actividad-content">
                        <h3 class="actividad-title">Tai Chi</h3>
                        <p class="actividad-desc">Movimientos fluidos para el equilibrio, la salud y la relajación.</p>
                        <div class="actividad-horario">
                            <i class="far fa-clock"></i>
                            <span>Lun, Mié, Vie: 16:50 - 17:50</span>
                        </div>
                    </div>
                </div>

                <div class="actividad-card">
                    <div class="actividad-img">
                        <img src="<?php echo esc_url(JCC_URI . '/assets/images/pilates.svg'); ?>" alt="Pilates">
                    </div>
                    <div class="actividad-content">
                        <h3 class="actividad-title">Pilates</h3>
                        <p class="actividad-desc">Mejora la respiración, la postura y la flexibilidad. Tonifica el cuerpo y reduce el estrés, adaptándose a cualquier condición física.</p>
                        <div class="actividad-horario">
                            <i class="far fa-clock"></i>
                            <span>Lun, Mar, Vie: 9:00 - 10:00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- HORARIOS -->
    <section class="horarios" id="horarios">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Planificación Semanal</span>
                <h2 class="section-title">Horarios</h2>
                <p class="section-text">Consulta los horarios de todas nuestras disciplinas</p>
            </div>
            <div class="horarios-table-wrapper">
                <table class="horarios-table">
                    <thead>
                        <tr>
                            <th>Disciplina</th>
                            <th>Lunes</th>
                            <th>Martes</th>
                            <th>Miércoles</th>
                            <th>Jueves</th>
                            <th>Viernes</th>
                            <th>Sábado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="disciplina judo"><i class="fas fa-user-friends"></i> Judo</td>
                            <td>18:00 - 19:00<br>19:00 - 20:00<br>20:00 - 21:30</td>
                            <td>17:30 - 18:30</td>
                            <td>18:00 - 19:00<br>19:00 - 20:00<br>20:00 - 21:30</td>
                            <td>17:30 - 18:30</td>
                            <td>18:00 - 19:00<br>19:00 - 20:00<br>20:00 - 21:30</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td class="disciplina jiu-jitsu"><i class="fas fa-hand-rock"></i> Jiu-Jitsu</td>
                            <td>9:30 - 10:30</td>
                            <td>18:30 - 19:30<br>19:30 - 20:30<br>20:30 - 21:30</td>
                            <td>9:30 - 10:30</td>
                            <td>18:30 - 19:30<br>19:30 - 20:30<br>20:30 - 21:30</td>
                            <td>9:30 - 10:30</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td class="disciplina karate"><i class="fas fa-fist-raised"></i> Karate</td>
                            <td>-</td>
                            <td>20:30 - 21:30<br>21:30 - 22:30</td>
                            <td>-</td>
                            <td>20:30 - 21:30<br>21:30 - 22:30</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td class="disciplina aikido"><i class="fas fa-yin-yang"></i> Aikido</td>
                            <td>21:30</td>
                            <td>21:30</td>
                            <td>21:30</td>
                            <td>21:30</td>
                            <td>21:30</td>
                            <td>21:30</td>
                        </tr>
                        <tr>
                            <td class="disciplina iaido"><i class="fas fa-ribbon"></i> Iaido</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>10:00 - 12:00</td>
                        </tr>
                        <tr>
                            <td class="disciplina taichi"><i class="fas fa-spa"></i> Tai Chi</td>
                            <td>16:50 - 17:50</td>
                            <td>-</td>
                            <td>16:50 - 17:50</td>
                            <td>-</td>
                            <td>16:50 - 17:50</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td class="disciplina pilates"><i class="fas fa-dumbbell"></i> Pilates</td>
                            <td>9:00 - 10:00<br>18:00 - 19:00</td>
                            <td>9:00 - 10:00</td>
                            <td>-</td>
                            <td>17:00 - 18:00</td>
                            <td>9:00 - 10:00</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="horarios-legend">
                <div class="legend-item"><span class="legend-color judo"></span> Judo</div>
                <div class="legend-item"><span class="legend-color jiu-jitsu"></span> Jiu-Jitsu</div>
                <div class="legend-item"><span class="legend-color karate"></span> Karate</div>
                <div class="legend-item"><span class="legend-color aikido"></span> Aikido</div>
                <div class="legend-item"><span class="legend-color iaido"></span> Iaido</div>
                <div class="legend-item"><span class="legend-color taichi"></span> Tai Chi</div>
                <div class="legend-item"><span class="legend-color pilates"></span> Pilates</div>
            </div>
        </div>
    </section>

    <!-- SOBRE NOSOTROS -->
    <section class="sobre-nosotros" id="sobre-nosotros">
        <div class="container">
            <div class="sobre-grid">
                <div class="sobre-img">
                    <img src="<?php echo esc_url(JCC_URI . '/assets/images/gimnasio.png'); ?>" alt="<?php bloginfo('name'); ?> Interior">
                </div>
                <div class="sobre-content">
                    <span class="section-tag">Nuestra Historia</span>
                    <h2 class="section-title">Sobre Nosotros</h2>
                    <p class="sobre-text">
                        Somos un gimnasio multidisciplinar situado en A Coruña con más de 50 años de experiencia
                        en la enseñanza de artes marciales. Contamos con un amplio abanico de servicios y actividades 
                        orientadas a todas las edades y niveles.
                    </p>
                    <p class="sobre-text">
                        Tenemos personal cualificado en las diferentes disciplinas de artes marciales y monitores 
                        para nuestra área de fitness y musculación. Más de 50 años de experiencia nos avalan.
                    </p>
                    <div class="sobre-features">
                        <div class="feature">
                            <div class="feature-icon">
                                <i class="fas fa-medal"></i>
                            </div>
                            <div class="feature-text">
                                <strong>+50 años</strong>
                                <span>de experiencia</span>
                            </div>
                        </div>
                        <div class="feature">
                            <div class="feature-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="feature-text">
                                <strong>Personal</strong>
                                <span>cualificado</span>
                            </div>
                        </div>
                        <div class="feature">
                            <div class="feature-icon">
                                <i class="fas fa-child"></i>
                            </div>
                            <div class="feature-text">
                                <strong>Todas las edades</strong>
                                <span>y niveles</span>
                            </div>
                        </div>
                    </div>
                    <a href="#contacto" class="btn btn-primary">Conócenos</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ACTUALIDAD -->
    <?php
    $noticias = new WP_Query(array(
        'post_type'      => 'noticia',
        'posts_per_page' => 3,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ));

    if ($noticias->have_posts()) :
    ?>
    <section class="actualidad" id="actualidad">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Últimas Novedades</span>
                <h2 class="section-title">Actualidad del Club</h2>
                <p class="section-text">Noticias, fotos y eventos del Judo Club Coruña</p>
            </div>
            <div class="actualidad-grid">
                <?php while ($noticias->have_posts()) : $noticias->the_post(); ?>
                    <?php get_template_part('template-parts/noticia', 'card'); ?>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- CONTACTO -->
    <section class="contacto" id="contacto">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Estamos Aquí</span>
                <h2 class="section-title">Contacto</h2>
                <p class="section-text">No dudes en contactarnos para cualquier consulta</p>
            </div>
            <div class="contacto-grid">
                <div class="contacto-info">
                    <div class="contacto-item">
                        <div class="contacto-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contacto-text">
                            <h3>Dirección</h3>
                            <p><?php echo esc_html(jcc_get_option('direccion', 'Calle Pintor Seijo Rubio, 19 Bajo, 15006 A Coruña')); ?></p>
                        </div>
                    </div>
                    <div class="contacto-item">
                        <div class="contacto-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="contacto-text">
                            <h3>Teléfono</h3>
                            <p><a href="tel:<?php echo esc_attr(jcc_get_option('telefono', '981290739')); ?>"><?php echo esc_html(jcc_get_option('telefono', '981 29 07 39')); ?></a></p>
                        </div>
                    </div>
                    <div class="contacto-item">
                        <div class="contacto-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contacto-text">
                            <h3>Email</h3>
                            <p><a href="mailto:<?php echo esc_attr(jcc_get_option('email', 'gimnasiojc.coruna@mundo-r.com')); ?>"><?php echo esc_html(jcc_get_option('email', 'gimnasiojc.coruna@mundo-r.com')); ?></a></p>
                        </div>
                    </div>
                    <div class="contacto-item">
                        <div class="contacto-icon">
                            <i class="far fa-clock"></i>
                        </div>
                        <div class="contacto-text">
                            <h3>Horario</h3>
                            <p><?php echo nl2br(esc_html(jcc_get_option('horario_general', "Lunes a Viernes: 9:30 - 13:30 / 17:00 - 23:00\nSábados: 9:30 - 13:30"))); ?></p>
                        </div>
                    </div>
                    <div class="contacto-social">
                        <?php $instagram = jcc_get_option('instagram'); ?>
                        <?php if ($instagram) : ?>
                            <a href="<?php echo esc_url($instagram); ?>" target="_blank" class="social-link" aria-label="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        <?php endif; ?>
                        <?php $facebook = jcc_get_option('facebook'); ?>
                        <?php if ($facebook) : ?>
                            <a href="<?php echo esc_url($facebook); ?>" target="_blank" class="social-link" aria-label="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        <?php endif; ?>
                        <?php $twitter = jcc_get_option('twitter'); ?>
                        <?php if ($twitter) : ?>
                            <a href="<?php echo esc_url($twitter); ?>" target="_blank" class="social-link" aria-label="Twitter / X">
                                <i class="fab fa-twitter"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="contacto-map">
                    <?php $maps_url = jcc_get_option('google_maps'); ?>
                    <?php if ($maps_url) : ?>
                        <iframe 
                            src="<?php echo esc_url($maps_url); ?>"
                            width="100%" 
                            height="400" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Ubicación Judo Club Coruña">
                        </iframe>
                    <?php else : ?>
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2904.55!2d-8.406241!3d43.361437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sCalle+Pintor+Seijo+Rubio+19+A+Coruna!5e0!3m2!1ses!2ses!4v1234567890123" 
                            width="100%" 
                            height="400" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Ubicación Judo Club Coruña">
                        </iframe>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
