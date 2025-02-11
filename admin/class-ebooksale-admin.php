<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class EbookSale_Admin {

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
        add_action( 'admin_init', array( $this, 'register_settings' ) );
    }

    public function add_admin_menu() {
        add_menu_page(
            'Ebook Sale',
            'Ebook Sale',
            'manage_options',
            'ebook-sale',
            array( $this, 'admin_page' ),
            'dashicons-book',
            6
        );
    }

    public function admin_page() {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e( 'Ebook Sale Settings', 'ebook-sale' ); ?></h1>
            <form method="post" action="options.php">
                <?php
                settings_fields( 'ebook_sale_options_group' );
                do_settings_sections( 'ebook_sale_options_group' );
                ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e( 'Stripe API Key', 'ebook-sale' ); ?></th>
                        <td><input type="text" name="stripe_api_key" value="<?php echo esc_attr( get_option('stripe_api_key') ); ?>" /></td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }

    public function register_settings() {
        register_setting( 'ebook_sale_options_group', 'stripe_api_key' );
    }
}