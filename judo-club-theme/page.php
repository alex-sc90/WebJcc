<?php
/**
 * Page Template
 */
get_header();
?>

<section class="page-content">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article class="page-article">
                <h1 class="page-title"><?php the_title(); ?></h1>
                <div class="page-text">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>
