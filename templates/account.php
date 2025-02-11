<?php
/**
 * Account page template for EbookSale plugin.
 */

// Check if the user is logged in
if ( ! is_user_logged_in() ) {
    wp_redirect( wp_login_url() );
    exit;
}

// Get current user information
$current_user = wp_get_current_user();
?>

<div class="ebook-sale-account">
    <h1><?php echo esc_html( $current_user->display_name ); ?>'s Account</h1>
    
    <h2>Your Purchases</h2>
    <ul>
        <?php
        // Fetch and display user's purchased eBooks
        $purchased_ebooks = get_user_meta( $current_user->ID, 'purchased_ebooks', true );

        if ( ! empty( $purchased_ebooks ) ) {
            foreach ( $purchased_ebooks as $ebook_id ) {
                $ebook_title = get_the_title( $ebook_id );
                echo '<li>' . esc_html( $ebook_title ) . '</li>';
            }
        } else {
            echo '<li>No purchases found.</li>';
        }
        ?>
    </ul>

    <h2>Account Settings</h2>
    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo esc_attr( $current_user->user_email ); ?>" required>
        
        <input type="submit" name="update_account" value="Update Account">
    </form>
</div>

<?php
// Handle account update
if ( isset( $_POST['update_account'] ) ) {
    $new_email = sanitize_email( $_POST['email'] );
    wp_update_user( array( 'ID' => $current_user->ID, 'user_email' => $new_email ) );
    echo '<p>Account updated successfully!</p>';
}
?>