<?php
/**
 * =======================================
 * Filter: wp_all_import_search_image_by_wp_attached_file
 * =======================================
 *
 * Can be used to stop WP All Import from looking for existing images via _wp_attached_file.
 *
 *
 * @param $is_search_by_wp_attached_file bool - Default true.
 *
 */


add_filter( 'wp_all_import_search_image_by_wp_attached_file', 'wpai_wp_all_import_search_image_by_wp_attached_file', 10, 1 );
function wpai_wp_all_import_search_image_by_wp_attached_file( $is_search_by_wp_attached_file ) {
	return true;
}