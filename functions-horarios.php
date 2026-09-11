<?php
/**
 * Shortcode para mostrar los horarios del Judo Club Coruña
 * 
 * Uso: [horarios_judo]
 * 
 * Para añadir a functions.php del tema:
 * require_once(get_template_directory() . '/functions-horarios.php');
 */

if (!defined('ABSPATH')) exit;

function judo_horarios_shortcode() {
    ob_start();
    ?>
    <div class="judo-horarios-wrapper">
        <style>
            .judo-horarios-wrapper {
                font-family: 'Montserrat', 'Open Sans', sans-serif;
                max-width: 100%;
                overflow-x: auto;
            }
            .judo-horarios-table {
                width: 100%;
                border-collapse: collapse;
                background: #fff;
                border-radius: 15px;
                overflow: hidden;
                box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            }
            .judo-horarios-table th,
            .judo-horarios-table td {
                padding: 18px 15px;
                text-align: center;
                border: 1px solid #e9ecef;
            }
            .judo-horarios-table thead {
                background: #1a1a2e;
                color: #fff;
            }
            .judo-horarios-table th {
                font-weight: 600;
                font-size: 0.95rem;
                text-transform: uppercase;
                letter-spacing: 1px;
            }
            .judo-horarios-table tbody tr:hover {
                background: #f8f9fa;
            }
            .judo-horarios-table td {
                font-size: 0.9rem;
                line-height: 1.8;
            }
            .judo-disciplina {
                font-weight: 600;
                text-align: left !important;
                padding-left: 20px !important;
            }
            .judo-disciplina i {
                margin-right: 10px;
                width: 20px;
                text-align: center;
            }
            .judo-disciplina.judo { color: #c8102e; }
            .judo-disciplina.jiu-jitsu { color: #2563eb; }
            .judo-disciplina.aikido { color: #059669; }
            .judo-disciplina.iaido { color: #7c3aed; }
            .judo-disciplina.taichi { color: #d97706; }
            .judo-horarios-legend {
                display: flex;
                justify-content: center;
                gap: 30px;
                margin-top: 30px;
                flex-wrap: wrap;
            }
            .judo-legend-item {
                display: flex;
                align-items: center;
                gap: 8px;
                font-size: 0.9rem;
                font-weight: 500;
            }
            .judo-legend-color {
                width: 16px;
                height: 16px;
                border-radius: 4px;
            }
            .judo-legend-color.judo { background: #c8102e; }
            .judo-legend-color.jiu-jitsu { background: #2563eb; }
            .judo-legend-color.aikido { background: #059669; }
            .judo-legend-color.iaido { background: #7c3aed; }
            .judo-legend-color.taichi { background: #d97706; }
        </style>
        
        <table class="judo-horarios-table">
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
                    <td class="judo-disciplina judo"><i class="fas fa-user-friends"></i> Judo</td>
                    <td>18:00 - 19:00<br>19:00 - 20:00<br>20:00 - 21:30</td>
                    <td>17:30 - 18:30</td>
                    <td>18:00 - 19:00<br>19:00 - 20:00<br>20:00 - 21:30</td>
                    <td>17:30 - 18:30</td>
                    <td>18:00 - 19:00<br>19:00 - 20:00<br>20:00 - 21:30</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td class="judo-disciplina jiu-jitsu"><i class="fas fa-hand-rock"></i> Jiu-Jitsu</td>
                    <td>9:30 - 10:30</td>
                    <td>18:30 - 19:30<br>19:30 - 20:30<br>20:30 - 21:30</td>
                    <td>9:30 - 10:30</td>
                    <td>18:30 - 19:30<br>19:30 - 20:30<br>20:30 - 21:30</td>
                    <td>9:30 - 10:30</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td class="judo-disciplina aikido"><i class="fas fa-yin-yang"></i> Aikido</td>
                    <td>21:30</td>
                    <td>21:30</td>
                    <td>21:30</td>
                    <td>21:30</td>
                    <td>21:30</td>
                    <td>21:30</td>
                </tr>
                <tr>
                    <td class="judo-disciplina iaido"><i class="fas fa-ribbon"></i> Iaido</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>10:00 - 12:00</td>
                </tr>
                <tr>
                    <td class="judo-disciplina taichi"><i class="fas fa-spa"></i> Tai Chi</td>
                    <td>16:50 - 17:50</td>
                    <td>-</td>
                    <td>16:50 - 17:50</td>
                    <td>-</td>
                    <td>16:50 - 17:50</td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>
        
        <div class="judo-horarios-legend">
            <div class="judo-legend-item"><span class="judo-legend-color judo"></span> Judo</div>
            <div class="judo-legend-item"><span class="judo-legend-color jiu-jitsu"></span> Jiu-Jitsu</div>
            <div class="judo-legend-item"><span class="judo-legend-color aikido"></span> Aikido</div>
            <div class="judo-legend-item"><span class="judo-legend-color iaido"></span> Iaido</div>
            <div class="judo-legend-item"><span class="judo-legend-color taichi"></span> Tai Chi</div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('horarios_judo', 'judo_horarios_shortcode');

// Añadir estilos de Font Awesome en el frontend
function judo_horarios_scripts() {
    if (is_singular()) {
        global $post;
        if (has_shortcode($post->post_content, 'horarios_judo')) {
            wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
        }
    }
}
add_action('wp_enqueue_scripts', 'judo_horarios_scripts');
