<?php
/**
 * Plugin Name: Events widget
 * Description: widget with "Take part" button and list of recent events
 * Version: 1.0
 * Author: Mari
 */

define( 'ROOT', plugins_url( '', __FILE__ ) );
define( 'STYLES', ROOT . '/css/' );
define( 'SCRIPTS', ROOT . '/js/' );


/**
 * Enqueueing styles abd scripts for the front-end widget
 */

if( ! function_exists('uep_widget_style')) {
  function uep_widget_style() {
    wp_enqueue_style( 'upcoming-events', STYLES . 'style.css', false, '1.0', 'all');
    wp_enqueue_script('join-button', SCRIPTS . 'script.js', array( 'jquery' ), '1.0', true);

  }
  add_action( 'wp_enqueue_scripts', 'uep_widget_style' );
}

include( 'src/upcoming-events-widget.php' );
include( 'src/join-button.php' );

if ( ! function_exists( 'join_member' ) ) {

  add_action( 'wp_ajax_join_member', 'join_member' );
  add_action( 'wp_ajax_nopriv_join_member', 'join_member' );


  function join_member() {

    $postId    = $_POST['post_id'];
    $members = get_field( 'members', $postId, false );
    $members[] = get_current_user_id();

    update_field( 'members', array_unique($members), $postId );

    foreach ( $members as $member ) :

      $member_name = get_userdata( $member ); ?>
      <a href="<?php echo get_author_posts_url( $member ); ?>" class=" user member" id="<?php echo $member; ?>">
        <img src="<?php echo get_avatar_url($member); ?>">
        <span class="name"><?php echo $member_name->nickname; ?></span>
      </a>
    <?php endforeach;
    wp_die();

  };
}

if ( ! function_exists( 'delete_member' ) ) {

  add_action( 'wp_ajax_delete_member', 'delete_member' );
  add_action( 'wp_ajax_nopriv_delete_member', 'delete_member' );


  function delete_member() {

    $postId = $_POST['post_id'];
    $user = $_POST['user'];
    $members = get_field( 'members', $postId, false );

    $key = array_search($user, $members);
    if (false !== $key) {
      unset($members[$key]);
    }

    update_field( 'members', array_unique($members), $postId );

    if ( $members ):
      foreach ( $members as $member ) :
        $member_name = get_userdata( $member ); ?>
        <a href="<?php echo get_author_posts_url( $user ); ?>" class="user member" id="<?php echo $member; ?>">
          <img src="<?php echo get_avatar_url($member); ?>">
          <span class="name"><?php echo $member_name->nickname; ?></span>
        </a>
      <?php endforeach;
    endif;
    wp_die();

  };
}
