<?php
/**
 * Theme Settings Page
 */

if (!defined('ABSPATH')) exit;

/**
 * Add settings page to admin menu
 */
function jcc_add_settings_page() {
    add_theme_page(
        'Opciones del Tema JCC',
        'Opciones JCC',
        'manage_options',
        'jcc-settings',
        'jcc_settings_page_html'
    );
}
add_action('admin_menu', 'jcc_add_settings_page');

/**
 * Register settings
 */
function jcc_register_settings() {
    register_setting('jcc_theme_options', 'jcc_theme_options', 'jcc_sanitize_options');

    add_settings_section(
        'jcc_contact_section',
        'Información de Contacto',
        null,
        'jcc-settings'
    );

    add_settings_field('jcc_telefono', 'Teléfono', 'jcc_render_field', 'jcc-settings', 'jcc_contact_section', array('id' => 'telefono', 'type' => 'text'));
    add_settings_field('jcc_email', 'Email', 'jcc_render_field', 'jcc-settings', 'jcc_contact_section', array('id' => 'email', 'type' => 'email'));
    add_settings_field('jcc_direccion', 'Dirección', 'jcc_render_field', 'jcc-settings', 'jcc_contact_section', array('id' => 'direccion', 'type' => 'text'));
    add_settings_field('jcc_horario_general', 'Horario General', 'jcc_render_textarea_field', 'jcc-settings', 'jcc_contact_section', array('id' => 'horario_general'));
    add_settings_field('jcc_redes_sociales', 'Redes Sociales (URLs)', 'jcc_render_social_fields', 'jcc-settings', 'jcc_contact_section');
    add_settings_field('jcc_google_maps', 'Google Maps Embed URL', 'jcc_render_field', 'jcc-settings', 'jcc_contact_section', array('id' => 'google_maps', 'type' => 'url'));
}
add_action('admin_init', 'jcc_register_settings');

/**
 * Sanitize options
 */
function jcc_sanitize_options($input) {
    $sanitized = array();
    $sanitized['telefono'] = sanitize_text_field($input['telefono'] ?? '');
    $sanitized['email'] = sanitize_email($input['email'] ?? '');
    $sanitized['direccion'] = sanitize_text_field($input['direccion'] ?? '');
    $sanitized['horario_general'] = sanitize_textarea_field($input['horario_general'] ?? '');
    $sanitized['instagram'] = esc_url_raw($input['instagram'] ?? '');
    $sanitized['facebook'] = esc_url_raw($input['facebook'] ?? '');
    $sanitized['google_maps'] = esc_url_raw($input['google_maps'] ?? '');
    return $sanitized;
}

/**
 * Render text/email/url field
 */
function jcc_render_field($args) {
    $options = get_option('jcc_theme_options', array());
    $value = $options[$args['id']] ?? '';
    ?>
    <input type="<?php echo esc_attr($args['type']); ?>" name="jcc_theme_options[<?php echo esc_attr($args['id']); ?>]" value="<?php echo esc_attr($value); ?>" class="regular-text">
    <?php
}

/**
 * Render textarea field
 */
function jcc_render_textarea_field($args) {
    $options = get_option('jcc_theme_options', array());
    $value = $options[$args['id']] ?? '';
    ?>
    <textarea name="jcc_theme_options[<?php echo esc_attr($args['id']); ?>]" rows="3" class="large-text"><?php echo esc_textarea($value); ?></textarea>
    <?php
}

/**
 * Render social fields
 */
function jcc_render_social_fields() {
    $options = get_option('jcc_theme_options', array());
    ?>
    <input type="url" name="jcc_theme_options[instagram]" value="<?php echo esc_attr($options['instagram'] ?? ''); ?>" class="regular-text" placeholder="https://www.instagram.com/tu-usuario/">
    <p class="description">URL de Instagram</p>
    <input type="url" name="jcc_theme_options[facebook]" value="<?php echo esc_attr($options['facebook'] ?? ''); ?>" class="regular-text" placeholder="https://www.facebook.com/tu-pagina/">
    <p class="description">URL de Facebook</p>
    <?php
}

/**
 * Settings page HTML
 */
function jcc_settings_page_html() {
    if (!current_user_can('manage_options')) return;
    ?>
    <div class="wrap">
        <h1>Opciones del Tema Judo Club Coruña</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('jcc_theme_options');
            do_settings_sections('jcc-settings');
            submit_button('Guardar Cambios');
            ?>
        </form>
    </div>
    <?php
}
