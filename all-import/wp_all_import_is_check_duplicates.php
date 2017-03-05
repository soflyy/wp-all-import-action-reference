<?php
/**
 * ==========================================
 * Filter: wp_all_import_is_check_duplicates
 * ==========================================
 *
 * Turn duplicate checking on/off
 * If turned off, duplicates will be created by the impot each re-run
 *
 * @param $is_check_duplicates 		- true or false.
 * @param $import_id 				- The current import ID.
 *
 */


// ----------------------------
// Example uses below
// ----------------------------

/*
* Turn off duplicate checking for import ID 10 only
*/

add_filter( 'wp_all_import_is_check_duplicates', 'wpai_is_check_duplicates', 10, 2 );

function wpai_is_check_duplicates( $is_check_duplicates, $import_id ) {
	// Cancel checking for duplicates if this is import ID 10.
    return ( $import_id == 10 ) ? false : true;
}
