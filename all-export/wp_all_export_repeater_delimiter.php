<?php
/**
 * ======================================
 * Filter: wp_all_export_repeater_delimiter
 * ======================================
 *
 * Define the delimiter used for ACF Repeater fields. Default is comma.
 *
 * @param $implode_delimiter string     - The delimiter to use.
 * @param $export_id int                - The export ID.
 *
 */

add_filter( 'wp_all_export_repeater_delimiter', 'wpae_wp_all_export_repeater_delimiter', 10, 2 );
function wpae_wp_all_export_repeater_delimiter( $implode_delimiter, $export_id ){
	return $implode_delimiter;
}

//
// Example: use pipe symbols as the delimiter.
//

add_filter( 'wp_all_export_repeater_delimiter', 'wpae_wp_all_export_repeater_delimiter', 10, 2 );
function wpae_wp_all_export_repeater_delimiter( $implode_delimiter, $export_id ){
	return "|";
}