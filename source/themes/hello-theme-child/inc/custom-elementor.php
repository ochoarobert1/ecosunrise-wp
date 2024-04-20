<?php
/**
 * Custom Elementor Handler
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

/**
 * Register oEmbed Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */

function register_elementor_widget($widgets_manager)
{

    require_once(get_stylesheet_directory() . '/widgets/custom-step-form.php');

    $widgets_manager->register(new \CustomStepForm());

}
add_action('elementor/widgets/register', 'register_elementor_widget');

/**
 * Register scripts and styles for Elementor test widgets.
 */
function elementor_test_widgets_dependencies()
{
    wp_register_style('custom-step-form-css', get_stylesheet_directory_uri() . '/widgets/custom-step-form.css', [], HELLO_ELEMENTOR_CHILD_VERSION, 'all');
    wp_register_script('custom-step-form-js', get_stylesheet_directory_uri() . '/widgets/custom-step-form.js', ['jquery'], HELLO_ELEMENTOR_CHILD_VERSION, ['in_footer' => true]);
    $thanks_page = get_option('es_thanks_page');
    wp_localize_script(
        'custom-step-form-js',
        'form_ajax',
        [
            'thanks_page' => get_permalink($thanks_page['thanks_page']),
            'zapier_endpoint' => $thanks_page['zapier_endpoint'],
        ]
    );
}

add_action('wp_enqueue_scripts', 'elementor_test_widgets_dependencies');
