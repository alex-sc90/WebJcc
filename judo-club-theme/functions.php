<?php
/**
 * Judo Club Coruña Theme Functions
 */

if (!defined('ABSPATH')) exit;

define('JCC_VERSION', '1.0.0');
define('JCC_DIR', get_template_directory());
define('JCC_URI', get_template_directory_uri());

require_once(JCC_DIR . '/inc/custom-post-types.php');
require_once(JCC_DIR . '/inc/theme-settings.php');

/**
 * Theme Setup
 */
function jcc_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 250,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'jcc_theme_setup');

/**
 * Enqueue scripts and styles
 */
function jcc_scripts() {
    wp_enqueue_style('jcc-style', JCC_URI . '/assets/css/style.css', array(), JCC_VERSION);
    wp_enqueue_style('jcc-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Open+Sans:wght@400;500;600&display=swap', array(), null);
    wp_enqueue_style('jcc-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    wp_enqueue_script('jcc-main', JCC_URI . '/assets/js/main.js', array(), JCC_VERSION, true);
    
    wp_localize_script('jcc-main', 'jccData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('jcc_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'jcc_scripts');

/**
 * Get theme option
 */
function jcc_get_option($key, $default = '') {
    $options = get_option('jcc_theme_options', array());
    return isset($options[$key]) ? $options[$key] : $default;
}
