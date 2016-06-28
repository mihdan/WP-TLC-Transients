<?php
/**
 * Plugin Name: WP TLC Transient
 * Description: A WP transients interface with support for soft-expiration, background updating of the transients.
 * Plugin URI: https://github.com/mihdan/WP-TLC-Transients
 * Version: 1.0
 * Author: mikhail@kobzarev.com
 * Author URI: https://www.kobzarev.com/
 */

/*  Copyright 2016  Mikhail Kobzarev  (email: mikhail@kobzarev.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'WP_TLC_TRANSIENTS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

if ( ! class_exists( 'TLC_Transient_Update_Server' ) ) {
	require_once WP_TLC_TRANSIENTS_PLUGIN_DIR . 'includes/class-tlc-transient-update-server.php';
}

new TLC_Transient_Update_Server;

if ( ! class_exists( 'TLC_Transient' ) ) {
	require_once WP_TLC_TRANSIENTS_PLUGIN_DIR . 'includes/class-tlc-transient.php';
}

function tlc_transient( $key ) {
	$transient = new TLC_Transient( $key );
	return $transient;
}
// Example:
/*
function sample_fetch_and_append( $url, $append ) {
	$f  = wp_remote_retrieve_body( wp_remote_get( $url, array( 'timeout' => 30 ) ) );
	$f .= $append;
	return $f;
}

function test_tlc_transient() {
	$t = tlc_transient( 'foo' )
		->expires_in( 30 )
		->background_only()
		->updates_with( 'sample_fetch_and_append', array( 'http://coveredwebservices.com/tools/long-running-request.php', ' appendfooparam ' ) )
		->get();
	var_dump( $t );
	if ( !$t )
		echo "The request is false, because it isn't yet in the cache. It'll be there in about 10 seconds. Keep refreshing!";
}

add_action( 'wp_footer', 'test_tlc_transient' );
*/
