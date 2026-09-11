<?php
/**
 * Noticia Card Template Part
 */
$categoria = get_post_meta(get_the_ID(), '_jcc_noticia_categoria', true);
if (empty($categoria)) $categoria = 'noticia';
?>
<article class="noticia-card">
    <div class="noticia-img">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('medium_large'); ?>
        <?php endif; ?>
        <span class="noticia-badge <?php echo esc_attr($categoria); ?>"><?php echo esc_html(ucfirst($categoria)); ?></span>
    </div>
    <div class="noticia-content">
        <div class="noticia-meta">
            <span><i class="far fa-calendar"></i> <?php echo get_the_date(); ?></span>
            <span><i class="far fa-user"></i> <?php the_author(); ?></span>
        </div>
        <h3 class="noticia-title"><?php the_title(); ?></h3>
        <p class="noticia-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
        <a href="<?php the_permalink(); ?>" class="noticia-link">Leer más <i class="fas fa-arrow-right"></i></a>
    </div>
</article>
