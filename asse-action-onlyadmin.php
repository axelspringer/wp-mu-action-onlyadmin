<?php

// @codingStandardsIgnoreFile

if (defined('ASSE_ONLY_ADMIN_CAN_LOGIN') && ASSE_ONLY_ADMIN_CAN_LOGIN === true) {
    add_action('admin_init', 'redirect_non_admin_users');
}
/**
 * Redirect non-admin users to home page
 *
 * This function is attached to the 'admin_init' action hook.
 */
function redirect_non_admin_users() {
    if ( ! current_user_can( 'manage_options' ) && '/wp-admin/admin-ajax.php' != $_SERVER['PHP_SELF'] ) {
        wp_redirect( home_url() . "/hagen-maintenance.html");
        exit;
    }
}

function remove_thickbox_on_frontend() {
    if (!is_admin()) {
        wp_deregister_style('thickbox');
        wp_deregister_script('thickbox');
    }
}
add_action('init', 'remove_thickbox_on_frontend');
