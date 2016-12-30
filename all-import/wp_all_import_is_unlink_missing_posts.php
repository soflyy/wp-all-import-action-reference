<?php
/**
 * ==================================
 * Filter: wp_all_import_is_unlink_missing_posts
 * ==================================
 *
 * Used to completely remove the relationship between import and post from pmxi_posts database table.
 *
 * @param $is_unlink_missing 	- ????
 * @param $import_id 			- ????
 * @param $post_id 				- ????
 */

add_filter( 'wp_all_import_is_unlink_missing_posts', 'wpai_wp_all_import_is_unlink_missing_posts', 10, 3 );

function wpai_wp_all_import_is_unlink_missing_posts( $is_unlink_missing, $import_id, $post_id ) {
	// Return "true" to unlink the post.
}