<?php
/**
 * Plugin Name: Voip Call Charges Lite
 * Plugin URI: http://www.vnbenny.com/voip-call-charges.php
 * Description: A Voip call charges calculator lite version
 * Version: 1.0
 * Author: Ben Van Nimmen
 * Author URI: http://www.vnbenny.com
 * License: GPLv2 or later
 */


if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

define( 'VOIP__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'VOIP__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( VOIP__PLUGIN_DIR . 'class.voipcallcharges_widget.php' );

if ( is_admin() ) {
	require_once( VOIP__PLUGIN_DIR . 'class.voipcallcharges_admin.php' );
	add_action( 'init', array( 'Voipcallcharges_Admin', 'init' ) );
}
?>