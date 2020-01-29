<?php

/**
 *
 * Template Functions
 *
 * @package   ByteTree_Base
 * @author    Marina Sharun
 * @link      __
 * @since 1.0
 */
 
// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }


if (! function_exists('restrict_site_access')) {

  add_action( 'template_redirect', 'restrict_site_access' );

	function restrict_site_access () {

		if ( ! is_user_logged_in() ) {
          wp_redirect( wp_registration_url() );
          exit;
		}
	}
}