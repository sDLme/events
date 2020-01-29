<?php

get_header();
$description  = get_field( 'description' );
$data         = get_field( 'data' );
$location     = get_field( 'location' );
$members      = get_field( 'members' );

global $post;
$a_id=$post->post_author;

    get_template_part( 'partials/content/site', 'header' ); ?>
    <section class="body container">
        <div class="content">
          <?php
           if ( $description ) : ?>
              <div class="dscr">
                <?php echo $description; ?>
              </div>
          <?php endif;
           if ( $location ):?>
              <h2><?php  _e( 'Location', 'bytetree-base' ) ?></h2>
              <div class="location">
                <?php echo $location; ?>
              </div>
          <?php endif;
           if ( $data ) : ?>
              <h2><?php  _e( 'Event date', 'bytetree-base' ) ?></h2>
              <div class="data">
                <?php echo $data; ?>
              </div>
          <?php endif; ?>
            <div class="author">
                <h2> <?php  _e('Event author'); ?></h2>
              <a  class="user" href="<?php echo get_author_posts_url( $a_id);?>">
                <img src="<?php  echo get_avatar_url($a_id);?>">
                <span class="name"><?php  the_author_meta( 'display_name', $a_id ); ?></span>
              </a>
            </div>
            <div class="member-ajax-container members">
                <h2><?php  _e( 'Members:' ); ?></h2>
              <?php
              foreach ( $members as $member ) :
                $member_name = get_userdata( $member ); ?>
                  <a href="<?php echo get_author_posts_url( $member ); ?>" class="user member" id="<?php echo $member; ?>">
                      <img src="<?php echo get_avatar_url($member); ?>">
                      <span class="name"><?php echo $member_name->nickname; ?></span>
                  </a>
              <?php endforeach; ?>
            </div>
        </div>
        <aside class="site-aside">
	        <?php if ( is_active_sidebar( 'event_single-sidebar' ) ) : ?>
		        <?php dynamic_sidebar( 'event_single-sidebar' ); ?>
	        <?php endif; ?>
        </aside>
    </section>
<?php
wp_footer();