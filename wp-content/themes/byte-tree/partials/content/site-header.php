<?php
$title        = get_field( 'title' );
?>

<div class="header">
  <?php
  if(is_singular('events')) :
    if ($title): ?>
      <h1><?php echo $title;
    endif; ?></h1>
    <?php elseif (is_author()) :
      $author = get_user_by( 'slug', get_query_var( 'author_name' ) ); ?>
       <h1><?php echo  _('Events list of user: ') . $author->data->display_name; ?></h1>
    <?php else : ?>
      <h1> <?php _e( "Upcoming Events", "bytetree-base" ) ;?></h1>
  <?php
  endif;
  if(!is_page('events')) : ?>
    <a class="br" href="<?php echo get_home_url() ;?>">home >></a>
  <?php endif; ?>
</div>
