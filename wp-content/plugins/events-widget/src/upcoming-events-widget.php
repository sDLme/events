<?php

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }


/**
 * Class Upcoming_Events
 */

if( ! class_exists('Upcoming_Events')) {

  class Upcoming_Events extends WP_Widget {

    /**
     * Initializing the widget
     */
    public function __construct() {
      $widget_ops = array(
        'class'			=>	'uep_upcoming_events',
        'description'	=>	__( 'A widget to display a list of upcoming events', 'uep' )
      );

      parent::__construct(
        'uep_upcoming_events',
        __( 'Upcoming Events', 'uep' ),
        $widget_ops
      );
    }


    /**
     * Displaying the widget on the back-end
     * @param  array $instance An instance of the widget
     */
    public function form( $instance ) {
      $widget_defaults = array(
        'title'			=>	'Upcoming Events',
        'number_events'	=>	5
      );

      $instance  = wp_parse_args( (array) $instance, $widget_defaults );
      ?>

        <!-- Rendering the widget form in the admin -->
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'uep' ); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" class="widefat" value="<?php echo esc_attr( $instance['title'] ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'number_events' ); ?>"><?php _e( 'Number of events to show', 'uep' ); ?></label>
            <select id="<?php echo $this->get_field_id( 'number_events' ); ?>" name="<?php echo $this->get_field_name( 'number_events' ); ?>" class="widefat">
              <?php for ( $i = 1; $i <= 10; $i++ ): ?>
                  <option value="<?php echo $i; ?>" <?php selected( $i, $instance['number_events'], true ); ?>><?php echo $i; ?></option>
              <?php endfor; ?>
            </select>
        </p>

      <?php
    }


    /**
     * Making the widget updateable
     * @param  array $new_instance New instance of the widget
     * @param  array $old_instance Old instance of the widget
     * @return array An updated instance of the widget
     */
    public function update( $new_instance, $old_instance ) {
      $instance = $old_instance;

      $instance['title'] = $new_instance['title'];
      $instance['number_events'] = $new_instance['number_events'];

      return $instance;
    }


    /**
     * Displaying the widget on the front-end
     * @param  array $args     Widget options
     * @param  array $instance An instance of the widget
     */
    public function widget( $args, $instance ) {

      extract( $args );
      $title = apply_filters( 'widget_title', $instance['title'] );


      $query_args = array(
        'post_type'				=>	'events',
        'posts_per_page'		=>	$instance['number_events'],
        'post_status'			=>	'publish',
        'order'					=>	'DESC',
      );

      $upcoming_events = new WP_Query( $query_args );

      //Preparing to show the events


      echo $before_widget; ?>
        <div>
          <?php
          if ( $title ) :
            echo "<h2>" . $title . "</h2>";
          endif; ?>

            <ul class="uep_event_entries">
              <?php while( $upcoming_events->have_posts() ): $upcoming_events->the_post(); ?>
                  <li class="uep_event_entry">
                      <a href="<?php the_permalink(); ?>" class="uep_event_title"><?php the_title(); ?></a>
                  </li>
              <?php endwhile; ?>
            </ul>
        </div>


      <?php
      wp_reset_query();

      echo $after_widget;

    }
  }

  function uep_register_widget() {
    register_widget( 'Upcoming_Events' );
  }

  add_action( 'widgets_init', 'uep_register_widget' );
}

