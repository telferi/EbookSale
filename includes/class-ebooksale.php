<?php
/**
 * EbookSale osztály
 *
 * Ez az osztály kezeli az EbookSale plugin alapfunkcióit,
 * beleértve a custom post típus regisztrációját és egyéb lényeges feladatokat.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Közvetlen hozzáférés esetén kilépés.
}

class EbookSale {

    public function __construct() {
        // A plugin inicializálása az init hook segítségével,
        // biztosítva, hogy a WP rewrite rendszere már elérhető legyen.
        add_action( 'init', array( $this, 'init' ) );
    }

    public function init() {
        // Custom post típus regisztrációja
        $this->register_custom_post_type();

        // További inicializációs feladatok itt adhatók hozzá.
    }

    private function register_custom_post_type() {
        // eBook custom post típus regisztrációja
        $args = array(
            'public'      => true,
            'label'       => 'eBooks',
            'supports'    => array( 'title', 'editor', 'thumbnail' ),
            'has_archive' => true,
            'rewrite'     => array( 'slug' => 'ebooks' ),
        );

        register_post_type( 'ebook', $args );
    }
}

// Az EbookSale osztály inicializálása
new EbookSale();
?>