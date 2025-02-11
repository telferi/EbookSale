<?php
/**
 * EbookSale Class
 *
 * This class handles the core functionality of the EbookSale plugin,
 * including the registration of custom post types and other essential features.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class EbookSale {

    public function __construct() {
        // Initialize the plugin
        $this->init();
    }

    private function init() {
        // Load custom post type
        $this->register_custom_post_type();

        // Other initialization tasks can be added here
    }

    private function register_custom_post_type() {
        // Register the eBook custom post type
        $args = array(
            'public' => true,
            'label'  => 'eBooks',
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'ebooks' ),
        );

        register_post_type( 'ebook', $args );
    }
}

// Initialize the EbookSale class
new EbookSale();
?>