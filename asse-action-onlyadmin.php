<?php

defined( 'ABSPATH' ) || exit;

Class Asse_Sitemap {

    public function __construct() {
        add_action( 'init', array( $this, 'remove_thickbox_on_frontend' ) );
    }

    public function remove_thickbox_on_frontend() {
        if ( ! is_admin() ) {
            wp_deregister_style('thickbox');
            wp_deregister_script('thickbox');
        }
    }

}

$asse_sitemap = new Asse_Sitemap();
