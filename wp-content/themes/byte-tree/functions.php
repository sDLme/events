<?php
/**
 *
 * Theme Files
 *
 * @package   ByteTree_Base
 * @author    Marina Sharun
 * @link      __
 * @since 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'THEME_DIR', get_template_directory() . '/' );
define( 'THEME_URL', get_template_directory_uri() . '/' );
define( 'THEME_MODS', get_theme_mods() );

require_once ( THEME_DIR . '/includes/class-theme-setup.php'); //Theme setup
require_once ( THEME_DIR . '/includes/class-theme-scripts.php'); //Theme scripts
require_once ( THEME_DIR . '/includes/template-functions.php'); //Template Functions

