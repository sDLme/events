<?php
/**
 *
 * Single
 *
 * @package   ByteTree_Base
 * @author    Marina Sharun
 * @link      __
 * @since 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header(); ?>

	<?php get_template_part( 'partials/content/editor' ); ?>

<?php get_footer();
