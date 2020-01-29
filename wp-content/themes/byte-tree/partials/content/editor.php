<?php
/**
 * Editor
 *
 * @package   ByteTree_Base
 * @author    Marina Sharun
 * @link      __
 * @since 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

?>
<section id="editor-section" class="container">
	<?php
	if (have_posts()) :
	   while (have_posts()) :
	      the_post();
	         the_content();
	   endwhile;
	endif;
	?>
</section>
