<?php
/**
 * Event list
 *
 * @package   ByteTree_Base
 * @author    Marina Sharun
 * @link      __
 * @since 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

$date        = get_field('data');
$location    = get_field('location');
$description = get_field('description');
$title       = get_field('title');

?>
<a href="<?php echo get_permalink(); ?>" class="event-list__item">
  <?php
  if ($title) : ?>
      <h2 class="title"><?php echo $title; ?></h2>
  <?php endif;
  if ($description) : ?>
      <div class="dscr"><?php echo $description; ?></div>
  <?php endif;
  if ($location) : ?>
      <div class="location"><?php echo $location; ?></div>
  <?php endif;
  if ($date) : ?>
      <div class="data"><?php echo $date; ?></div>
  <?php endif; ?>
</a>


