<?php
/**
 * ==========================================
 * Filter: wp_all_import_skip_x_csv_rows
 * ==========================================
 *
 * Specifies the amount of rows to be skipped.
 * 
 * **********************************************************
 * NOTE: This code will not work in WPAI's Function Editor, *
 * or in a plugin like Code Snippets.                       *
 * **********************************************************
 *
 * @since 4.4.4-beta-2.3
 *
 * @param $skip_rows   bool|int  - false to not skip rows, integer to specify how many rows should be skipped
 * @param $import_id   int       - The ID of the current import
 *
 * @return $skip_rows
 */

add_filter('wp_all_import_skip_x_csv_rows', 'wpai_skip_rows', 10, 2);

function wpai_skip_rows($skip_rows, $import_id) {
    // Handle & return $skip_rows here.
}

// ----------------------------
// Example uses below
// ----------------------------
/**
 * Example: Skip the first row
 *
 */
 
add_filter('wp_all_import_skip_x_csv_rows', 'wpai_skip_rows', 10, 2);

function wpai_skip_rows($skip_rows, $import_id) {
	$skip_rows = 1;

	return $skip_rows;
}
