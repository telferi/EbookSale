<?php
// Stripe Integration for EbookSale Plugin

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class EbookSale_Stripe_Integration {

    private $stripe_secret_key;

    public function __construct() {
        $this->stripe_secret_key = get_option( 'ebooksale_stripe_secret_key' );
        add_action( 'wp_ajax_ebooksale_create_payment_intent', array( $this, 'create_payment_intent' ) );
        add_action( 'wp_ajax_nopriv_ebooksale_create_payment_intent', array( $this, 'create_payment_intent' ) );
    }

    public function create_payment_intent() {
        // Check for required parameters
        if ( ! isset( $_POST['amount'] ) || ! isset( $_POST['currency'] ) ) {
            wp_send_json_error( 'Invalid parameters' );
            wp_die();
        }

        $amount = sanitize_text_field( $_POST['amount'] );
        $currency = sanitize_text_field( $_POST['currency'] );

        \Stripe\Stripe::setApiKey( $this->stripe_secret_key );

        try {
            $payment_intent = \Stripe\PaymentIntent::create([
                'amount' => $amount,
                'currency' => $currency,
                'payment_method_types' => ['card'],
            ]);

            wp_send_json_success( $payment_intent );
        } catch ( Exception $e ) {
            wp_send_json_error( $e->getMessage() );
        }

        wp_die();
    }
}
?>