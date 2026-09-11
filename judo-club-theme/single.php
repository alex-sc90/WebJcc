<?php
/**
 * Single Post Template
 */
get_header();
?>

<section class="single-noticia">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article class="noticia-single">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="noticia-single-img">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="noticia-single-content">
                    <?php
                    $categoria = get_post_meta(get_the_ID(), '_jcc_noticia_categoria', true);
                    if (!empty($categoria)) :
                    ?>
                        <span class="noticia-badge <?php echo esc_attr($categoria); ?>"><?php echo esc_html(ucfirst($categoria)); ?></span>
                    <?php endif; ?>
                    
                    <h1 class="noticia-single-title"><?php the_title(); ?></h1>
                    
                    <div class="noticia-meta">
                        <span><i class="far fa-calendar"></i> <?php echo get_the_date(); ?></span>
                        <span><i class="far fa-user"></i> <?php the_author(); ?></span>
                    </div>
                    
                    <div class="noticia-single-text">
                        <?php the_content(); ?>
                    </div>
                    
                    <div class="noticia-single-nav">
                        <a href="<?php echo esc_url(home_url('/')); ?>#actualidad" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i> Volver a Noticias
                        </a>
                    </div>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>
