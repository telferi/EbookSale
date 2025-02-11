<?php
// This file provides the layout for the user login page.

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo esc_url( plugins_url( 'style.css', __FILE__ ) ); ?>">
</head>
<body>
    <div class="login-container">
        <h2><?php esc_html_e( 'Login to Your Account', 'ebook-sale' ); ?></h2>
        <form method="post" action="<?php echo esc_url( $_SERVER['REQUEST_URI'] ); ?>">
            <label for="username"><?php esc_html_e( 'Username', 'ebook-sale' ); ?></label>
            <input type="text" name="username" id="username" required>

            <label for="password"><?php esc_html_e( 'Password', 'ebook-sale' ); ?></label>
            <input type="password" name="password" id="password" required>

            <input type="submit" name="login" value="<?php esc_html_e( 'Login', 'ebook-sale' ); ?>">
        </form>
        <p><?php esc_html_e( 'Don\'t have an account?', 'ebook-sale' ); ?> <a href="<?php echo esc_url( site_url( 'register' ) ); ?>"><?php esc_html_e( 'Register here', 'ebook-sale' ); ?></a></p>
    </div>
</body>
</html>