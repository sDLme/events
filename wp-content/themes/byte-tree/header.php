<?php
/**
 *
 * Header Page
 *
 * @package   ByteTree_Base
 * @author    Marina Sharun
 * @link      __
 * @since 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

?>
<!doctype html>
<!--[if (gt IE 9)|!(IE)]><html lang="en"><![endif]-->
<html <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="wrapper">
            <main id="main">
