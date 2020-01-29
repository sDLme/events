<?php
/**
 *
 * Theme Home Page
 *
 * @package   ByteTree_Base
 * @author    Marina Sharun
 * @link      __
 * @since 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();

	 get_template_part( 'partials/content/editor' );

get_footer();
