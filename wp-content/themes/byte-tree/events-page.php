<?php
/**
 *
 *  Template Name: Events Page
 *
 * @package   ByteTree_Base
 * @author    Marina Sharun
 * @link      __
 * @since 1.0
 */

get_header();

$args = array(
  'numberposts' => -1,
  'post_type' => 'events',

);
$the_query = new WP_Query($args);

    get_template_part( 'partials/content/site', 'header' ); ?>

<?php if ($the_query->have_posts()): ?>
  <section class="container">
      <div class="event-list">
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <?php get_template_part( 'partials/content/events', 'list' ); ?>
        <?php endwhile; ?>
      </div>
  </section>
<?php endif;
wp_reset_query();

wp_footer();
