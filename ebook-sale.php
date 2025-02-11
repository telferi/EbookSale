<?php
/**
 * Plugin Name: Ebook Sale
 * Description: A plugin for selling eBooks with Stripe payment integration.
 * Version: 1.0
 * Author: Your Name
 * Text Domain: ebook-sale
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define plugin directory
define( 'EBOOK_SALE_DIR', plugin_dir_path( __FILE__ ) );

// Include necessary files
require_once EBOOK_SALE_DIR . 'includes/class-ebooksale.php';
require_once EBOOK_SALE_DIR . 'includes/custom-post-type.php';
require_once EBOOK_SALE_DIR . 'includes/stripe-integration.php';
require_once EBOOK_SALE_DIR . 'admin/class-ebooksale-admin.php';
require_once EBOOK_SALE_DIR . 'public/class-ebooksale-public.php';

// Initialize the plugin
function run_ebook_sale() {
    $plugin = new EbookSale();
    $plugin->run();
}
run_ebook_sale();
?>