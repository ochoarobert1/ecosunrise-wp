<?php
/**
 * Custom Taxonomy
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

if (! function_exists('custom_page_type')) {

    /**
     * Method custom_page_type
     * Register Custom Taxonomy
     *
     * @return void
     */
    function custom_page_type()
    {

        $labels = array(
            'name'                       => _x('Types', 'Taxonomy General Name', 'hello-elementor-child'),
            'singular_name'              => _x('Type', 'Taxonomy Singular Name', 'hello-elementor-child'),
            'menu_name'                  => __('Types', 'hello-elementor-child'),
            'all_items'                  => __('All Types', 'hello-elementor-child'),
            'parent_item'                => __('Parent Type', 'hello-elementor-child'),
            'parent_item_colon'          => __('Parent Type:', 'hello-elementor-child'),
            'new_item_name'              => __('New Type Name', 'hello-elementor-child'),
            'add_new_item'               => __('Add New Type', 'hello-elementor-child'),
            'edit_item'                  => __('Edit Type', 'hello-elementor-child'),
            'update_item'                => __('Update Type', 'hello-elementor-child'),
            'view_item'                  => __('View Type', 'hello-elementor-child'),
            'separate_items_with_commas' => __('Separate Types with commas', 'hello-elementor-child'),
            'add_or_remove_items'        => __('Add or remove Types', 'hello-elementor-child'),
            'choose_from_most_used'      => __('Choose from the most used', 'hello-elementor-child'),
            'popular_items'              => __('Popular Types', 'hello-elementor-child'),
            'search_items'               => __('Search Types', 'hello-elementor-child'),
            'not_found'                  => __('Not Found', 'hello-elementor-child'),
            'no_terms'                   => __('No Types', 'hello-elementor-child'),
            'items_list'                 => __('Types list', 'hello-elementor-child'),
            'items_list_navigation'      => __('Types list navigation', 'hello-elementor-child'),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => false,
            'show_tagcloud'              => false,
            'show_in_rest'               => true,
        );
        register_taxonomy('page_type', array( 'page' ), $args);

    }
    add_action('init', 'custom_page_type', 0);
}
