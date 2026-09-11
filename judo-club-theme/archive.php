<?php
/**
 * Archive Template
 */
get_header();
?>

<section class="archive-noticias">
    <div class="container">
        <div class="section-header">
            <h1 class="section-title"><?php the_archive_title(); ?></h1>
            <?php the_archive_description('<p class="section-text">', '</p>'); ?>
        </div>

        <?php if (have_posts()) : ?>
            <div class="actualidad-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/noticia', 'card'); ?>
                <?php endwhile; ?>
            </div>

            <div class="pagination">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => '<i class="fas fa-chevron-left"></i>',
                    'next_text' => '<i class="fas fa-chevron-right"></i>',
                ));
                ?>
            </div>
        <?php else : ?>
            <p>No se encontraron noticias.</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
