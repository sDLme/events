<?php

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Class Join_Button
 */

if( ! class_exists('Join_Button')) {

  class Join_Button extends WP_Widget {

    public function __construct() {
      $widget_ops = array(
        'class'			=>	'join-btn',
        'description'	=>	__( 'A widget to display join button events', 'uep' )
      );

      parent::__construct(
        'uep_join-button',
        __( 'Join button', 'uep' ),
        $widget_ops
      );

    }

    public function form( $instance ) { ?>
        <p><?php _e("Button for join to event");?></p>
      <?php
    }


    public function widget( $args, $instance ) { ?>
        <div class="take-part">
            <a href="#" id="delete-member" ><?php  _e( 'No, not want to go.' ); ?></a>
            <a href="#" id="join-member" user-id="<?php echo get_current_user_id(); ?>" post-id="<?php echo get_the_ID(); ?>" ><?php  _e( 'Join event' ); ?></a>
        </div>
    <?php }

  }

  function uep_register_join_widget() {
    register_widget( 'Join_Button' );
  }

  add_action( 'widgets_init', 'uep_register_join_widget' );
}
