<?php
/**
 *
 * Single Author
 *
 * @package   ByteTree_Base
 * @author    Marina Sharun
 * @link      __
 * @since 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();
    $author = get_user_by( 'slug', get_query_var( 'author_name' ) );
    $custom_args = array(
    'post_type' => 'events',
    'author' =>  $author->ID,
    'posts_per_page' => 10,
    );

$events = new WP_Query($custom_args);

    get_template_part( 'partials/content/site', 'header' ); ?>
<?php
if($events->have_posts()) : ?>
    <section class="container">
        <div class="event-list">
          <?php while ($events->have_posts()) : $events->the_post(); ?>
            <?php get_template_part( 'partials/content/events', 'list' ); ?>
          <?php endwhile; ?>
        </div>
    </section>
<?php endif;
wp_reset_postdata();

get_footer();
