<?php
/**
 * Custom Post Types Registration
 */

if (!defined('ABSPATH')) exit;

/**
 * Register Noticias CPT
 */
function jcc_register_noticias() {
    $labels = array(
        'name'               => 'Noticias',
        'singular_name'      => 'Noticia',
        'menu_name'          => 'Noticias',
        'add_new'            => 'Añadir Noticia',
        'add_new_item'       => 'Añadir Nueva Noticia',
        'edit_item'          => 'Editar Noticia',
        'new_item'           => 'Nueva Noticia',
        'view_item'          => 'Ver Noticia',
        'search_items'       => 'Buscar Noticias',
        'not_found'          => 'No se encontraron noticias',
        'not_found_in_trash' => 'No hay noticias en la papelera',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'noticias'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-megaphone',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    );

    register_post_type('noticia', $args);
}
add_action('init', 'jcc_register_noticias');

/**
 * Register Fotos Carrusel CPT
 */
function jcc_register_fotos_carrusel() {
    $labels = array(
        'name'               => 'Fotos Carrusel',
        'singular_name'      => 'Foto Carrusel',
        'menu_name'          => 'Fotos Carrusel',
        'add_new'            => 'Añadir Foto',
        'add_new_item'       => 'Añadir Nueva Foto',
        'edit_item'          => 'Editar Foto',
        'new_item'           => 'Nueva Foto',
        'view_item'          => 'Ver Foto',
        'search_items'       => 'Buscar Fotos',
        'not_found'          => 'No se encontraron fotos',
        'not_found_in_trash' => 'No hay fotos en la papelera',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-images-alt2',
        'supports'           => array('title', 'thumbnail', 'custom-fields'),
    );

    register_post_type('foto_carrusel', $args);
}
add_action('init', 'jcc_register_fotos_carrusel');

/**
 * Register Categorías para Noticias
 */
function jcc_register_categorias() {
    $labels = array(
        'name'              => 'Categorías de Noticias',
        'singular_name'     => 'Categoría',
        'search_items'      => 'Buscar Categorías',
        'all_items'         => 'Todas las Categorías',
        'parent_item'       => 'Categoría Padre',
        'parent_item_colon' => 'Categoría Padre:',
        'edit_item'         => 'Editar Categoría',
        'update_item'       => 'Actualizar Categoría',
        'add_new_item'      => 'Añadir Nueva Categoría',
        'new_item_name'     => 'Nombre de la Nueva Categoría',
        'menu_name'         => 'Categorías',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'categoria-noticia'),
    );

    register_taxonomy('categoria_noticia', array('noticia'), $args);
}
add_action('init', 'jcc_register_categorias');

/**
 * Add Custom Meta Boxes
 */
function jcc_add_meta_boxes() {
    add_meta_box(
        'jcc_noticia_categoria',
        'Categoría de Noticia',
        'jcc_noticia_categoria_callback',
        'noticia',
        'side',
        'default'
    );

    add_meta_box(
        'jcc_foto_orden',
        'Orden en Carrusel',
        'jcc_foto_orden_callback',
        'foto_carrusel',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'jcc_add_meta_boxes');

/**
 * Noticia Category Meta Box
 */
function jcc_noticia_categoria_callback($post) {
    wp_nonce_field('jcc_noticia_categoria', 'jcc_noticia_categoria_nonce');
    $value = get_post_meta($post->ID, '_jcc_noticia_categoria', true);
    ?>
    <select name="jcc_noticia_categoria" id="jcc_noticia_categoria">
        <option value="noticia" <?php selected($value, 'noticia'); ?>>Noticia</option>
        <option value="competicion" <?php selected($value, 'competicion'); ?>>Competiciones</option>
        <option value="evento" <?php selected($value, 'evento'); ?>>Eventos</option>
        <option value="galeria" <?php selected($value, 'galeria'); ?>>Galería</option>
    </select>
    <?php
}

/**
 * Foto Orden Meta Box
 */
function jcc_foto_orden_callback($post) {
    wp_nonce_field('jcc_foto_orden', 'jcc_foto_orden_nonce');
    $value = get_post_meta($post->ID, '_jcc_foto_orden', true);
    ?>
    <input type="number" name="jcc_foto_orden" id="jcc_foto_orden" value="<?php echo esc_attr($value); ?>" min="0" style="width:100%;">
    <p class="description">Número que define el orden de aparición en el carrusel (0 = primero).</p>
    <?php
}

/**
 * Save Meta Box Data
 */
function jcc_save_meta_boxes($post_id) {
    // Noticia Categoria
    if (isset($_POST['jcc_noticia_categoria_nonce']) && wp_verify_nonce($_POST['jcc_noticia_categoria_nonce'], 'jcc_noticia_categoria')) {
        if (isset($_POST['jcc_noticia_categoria'])) {
            update_post_meta($post_id, '_jcc_noticia_categoria', sanitize_text_field($_POST['jcc_noticia_categoria']));
        }
    }

    // Foto Orden
    if (isset($_POST['jcc_foto_orden_nonce']) && wp_verify_nonce($_POST['jcc_foto_orden_nonce'], 'jcc_foto_orden')) {
        if (isset($_POST['jcc_foto_orden'])) {
            update_post_meta($post_id, '_jcc_foto_orden', intval($_POST['jcc_foto_orden']));
        }
    }
}
add_action('save_post', 'jcc_save_meta_boxes');
