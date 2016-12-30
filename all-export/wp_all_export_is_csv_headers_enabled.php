<?php
/**
 * ==================================
 * Filter: wp_all_export_is_csv_headers_enabled
 * ==================================
 *
 * Used to completely remove the relationship between import and post from pmxi_posts database table.
 *
 * @param $is_headers_enabled 	- true/false.
 * @param $export_id 			- The Export ID.
 */

add_filter('wp_all_export_is_csv_headers_enabled', 'wpae_wp_all_export_is_csv_headers_enabled', 10, 2);

function wpae_wp_all_export_is_csv_headers_enabled( $is_headers_enabled, $export_id ){
    // return 'false' to remove the header.
}