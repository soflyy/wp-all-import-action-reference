<?php
/**
 * ==========================================
 * Filter: wp_all_import_is_check_duplicates
 * ==========================================
 *
 * @param $is_check_duplicates 		- true or false.
 * @param $import_id 				- The current import ID.
 *
 */
add_filter( 'wp_all_import_is_check_duplicates', 'wpai_is_check_duplicates', 10, 2 );

function wpai_is_check_duplicates( $is_check_duplicates, $import_id ) {
	// Cancel checking for duplicates if this is import ID 10.
    return ( $import_id == 10 ) ? false : true;
}
