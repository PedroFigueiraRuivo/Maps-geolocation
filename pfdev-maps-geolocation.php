<?php

/**
 * Plugin Name:       pfDev - Maps Geolocation
 * Plugin URI:        https://github.com/PedroFigueiraRuivo/maps-geolocation
 * Description:       Handle the basics with this plugin.
 * Version:           0.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Pedro Figueira
 * Author URI:        https://pedrofigueira.dev
 */

 
if ( ! defined( 'WPINC' ) ) {
	die;
}

if( !defined( 'PFDEV__MG_VERSION' ) ){
    define( 'PFDEV__MG_VERSION', '0.0.1' );
}

if( !defined( 'PFDEV__MG_NAME' ) ){
    define( 'PFDEV__MG_NAME', 'pfDev - Maps Geolocation' );
}

if( !defined( 'PFDEV__MG_SLUG' ) ){
    define( 'PFDEV__MG_SLUG', 'pfdev-maps-geolocation' );
}

if( !defined( 'PFDEV__MG_SLUG_ARCHIVE' ) ){
    define( 'PFDEV__MG_SLUG_ARCHIVE', 'pfdev-mg' );
}

if( !defined( 'PFDEV__MG_SLUG_DB' ) ){
    define( 'PFDEV__MG_SLUG_DB', 'pfdev_maps_geolocation' );
}

if( !defined( 'PFDEV__MG_BASENAME' ) ){
    define( 'PFDEV__MG_BASENAME', plugin_basename( __FILE__ ) );
}

if( !defined( 'PFDEV__MG_DIR' ) ){
    define( 'PFDEV__MG_DIR', plugin_dir_path( __FILE__ ) );
}

require_once PFDEV__MG_DIR . 'includes/' . PFDEV__MG_SLUG_ARCHIVE . '-configuration-fields.php';

if( is_admin() ){
  require_once PFDEV__MG_DIR . 'includes/class/class-' . PFDEV__MG_SLUG_ARCHIVE . '-admin.php';

  $pfr__dppy_admin = new pfdev_maps_geolocation(
    PFDEV__MG_NAME,
    PFDEV__MG_BASENAME,
    PFDEV__MG_SLUG,
    PFDEV__MG_SLUG_DB,
    PFDEV__MG_CONFIGURATION_FIELDS
  );
}
?>