<?php

/**
 *
 * Theme Scripts
 *
 * @package   ByteTree_Base
 * @author    Marina Sharun
 * @link      __
 * @since 1.0
 */

if (!class_exists('ByteTree_Base_Prepare_Theme_Scripts')) {

    class ByteTree_Base_Prepare_Theme_Scripts {

        function __construct() {

            $this->theme_version = wp_get_theme('bytetree-base');

            add_action( 'wp_enqueue_scripts', array( &$this, 'enqueue_scripts' ), 100 );
            
            add_action( 'admin_enqueue_scripts', array( &$this, 'enqueue_admin_scripts' ), 10, 1 );
        }

        public function enqueue_scripts() {

            /* Styles */
            wp_register_style('bytetree-base-style', get_template_directory_uri() . '/assets/css/style.css', array(), $this->theme_version->get('Version'));

            wp_enqueue_style('bytetree-base-style');

            /* Scripts */

            wp_register_script('bytetree-base-script', get_template_directory_uri() . '/assets/js/script.js', array( "jquery" ), $this->theme_version->get('Version'), true);

            wp_enqueue_script('bytetree-base-script');

        }

        public function enqueue_admin_scripts( $hook ) {

        }

    }

    new ByteTree_Base_Prepare_Theme_Scripts();
}
