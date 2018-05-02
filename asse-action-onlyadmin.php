<?php

defined( 'ABSPATH' ) || exit;

Class Axelspringer_Admin {

    public function __construct() {
        add_action( 'init', array( &$this, 'remove_thickbox_on_frontend' ) );
        add_action( 'admin_init', array( &$this, 'disable_theme_switching' ) );
    }

    public function remove_thickbox_on_frontend() {
        if ( ! is_admin() ) {
            wp_deregister_style( 'thickbox' );
            wp_deregister_script( 'thickbox' );
        }
    }

    public function disable_theme_switching() {
        global $submenu;
        $current_user = wp_get_current_user();
        if ( $current_user->ID !== 1 ) {
            unset( $submenu['themes.php'][5] );
            unset( $submenu['themes.php'][15] );
        }
    }

}

$axelspringer_sitemap = new Axelspringer_Admin();
