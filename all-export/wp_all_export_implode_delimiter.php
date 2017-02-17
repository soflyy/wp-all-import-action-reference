<?php
/**
 * ======================================
 * Filter: wp_all_export_implode_delimiter
 * ======================================
 * Modify the implode delimiter for export fields.
 *
 * @param $implode_delimiter int - current implode delimiter
 * @param $export_id int - export ID
 *
 * @return string
 */
function wpae_wp_all_export_implode_delimiter( $implode_delimiter, $export_id ){
	return '|';
}
add_filter('wp_all_export_implode_delimiter', 'wpae_wp_all_export_implode_delimiter', 10, 2);


// ----------------------------
// Example uses below
// ----------------------------

/**
 * Example: modifies the export delimiter from | to , in case of export ID 1
 *
 */
function wpae_wp_all_export_implode_delimiter( $implode_delimiter, $export_id ){
	if($export_id == 1){
		return ',';
	}
}
add_filter('wp_all_export_implode_delimiter', 'wpae_wp_all_export_implode_delimiter', 10, 2);