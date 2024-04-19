<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

define('HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0');

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles()
{

    wp_enqueue_style(
        'hello-elementor-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        [],
        HELLO_ELEMENTOR_CHILD_VERSION
    );

    wp_enqueue_script(
        'hello-elementor-child-script',
        get_stylesheet_directory_uri() . '/functions.js',
        [
            'jquery'
        ],
        HELLO_ELEMENTOR_CHILD_VERSION,
        true
    );
}
add_action('wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20);

if (function_exists('add_image_size')) {
    add_image_size('gallery', 300, 300, array('center', 'center'));
}

require_once('inc/custom-taxonomy.php');
