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

add_action('customize_register', 'ecosunrise_customize_register');

function ecosunrise_customize_register($wp_customize)
{

    /* SOCIAL */
    $wp_customize->add_section(
        'es_thanks_page',
        array(
            'title'    => __('Landing Pages', 'hello-elementor-child'),
            'description' => __('Options for Landing pages', 'hello-elementor-child'),
            'priority' => 175,
        )
    );

    $wp_customize->add_setting(
        'es_thanks_page[thanks_page]',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_dropdown_pages',
            'capability'        => 'edit_theme_options',
            'type'           => 'option'
        )
    );

    $wp_customize->add_control(
        'thanks_page',
        array(
            'type' => 'dropdown-pages',
            'section' => 'es_thanks_page',
            'settings' => 'es_thanks_page[thanks_page]',
            'label' => __('Thanks Page', 'hello-elementor-child'),
        )
    );

    $wp_customize->add_setting(
        'es_thanks_page[zapier_endpoint]',
        array(
            'default'           => '',
            'sanitize_callback' => '',
            'capability'        => 'edit_theme_options',
            'type'           => 'option'
        )
    );

    $wp_customize->add_control(
        'zapier_endpoint',
        array(
            'type' => 'text',
            'section' => 'es_thanks_page',
            'settings' => 'es_thanks_page[zapier_endpoint]',
            'label' => __('Zapier Endpoint', 'hello-elementor-child'),
        )
    );
}

function sanitize_dropdown_pages($page_id, $setting)
{
    $page_id = absint($page_id);
    return ('publish' == get_post_status($page_id) ? $page_id : $setting->default);
}
