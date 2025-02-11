<?php
/**
 * Custom Post Type for eBooks
 *
 * This file registers the custom post type for eBooks, allowing users to create and manage eBook entries.
 */

function ebooksale_register_custom_post_type() {
    $labels = array(
        'name'               => _x('eBooks', 'post type general name', 'ebooksale'),
        'singular_name'      => _x('eBook', 'post type singular name', 'ebooksale'),
        'menu_name'          => _x('eBooks', 'admin menu', 'ebooksale'),
        'name_admin_bar'     => _x('eBook', 'add new on admin bar', 'ebooksale'),
        'add_new'            => _x('Add New', 'eBook', 'ebooksale'),
        'add_new_item'       => __('Add New eBook', 'ebooksale'),
        'new_item'           => __('New eBook', 'ebooksale'),
        'edit_item'          => __('Edit eBook', 'ebooksale'),
        'view_item'          => __('View eBook', 'ebooksale'),
        'all_items'          => __('All eBooks', 'ebooksale'),
        'search_items'       => __('Search eBooks', 'ebooksale'),
        'parent_item_colon'  => __('Parent eBooks:', 'ebooksale'),
        'not_found'          => __('No eBooks found.', 'ebooksale'),
        'not_found_in_trash' => __('No eBooks found in Trash.', 'ebooksale'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'ebook'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    );

    register_post_type('ebook', $args);
}

add_action('init', 'ebooksale_register_custom_post_type');
?>