<?php
// This file provides the layout for the user registration page.

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

?>

<div class="ebook-sale-registration">
    <h2><?php esc_html_e( 'Register', 'ebook-sale' ); ?></h2>
    <form method="post" action="<?php echo esc_url( $_SERVER['REQUEST_URI'] ); ?>">
        <label for="username"><?php esc_html_e( 'Username', 'ebook-sale' ); ?></label>
        <input type="text" name="username" id="username" required>

        <label for="email"><?php esc_html_e( 'Email', 'ebook-sale' ); ?></label>
        <input type="email" name="email" id="email" required>

        <label for="password"><?php esc_html_e( 'Password', 'ebook-sale' ); ?></label>
        <input type="password" name="password" id="password" required>

        <input type="submit" name="register" value="<?php esc_attr_e( 'Register', 'ebook-sale' ); ?>">
    </form>
</div>

<?php
// Handle registration logic here if needed
?>