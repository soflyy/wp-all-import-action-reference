<?php
/**
 * ==============================================
 * Filter: wp_all_import_auto_create_csv_headers
 * ==============================================
 *
 * Auto generate headers, or use header in file.
 *
 * Note: Most of our API hooks can used directly in the WP All Import function editor 
 *   (found on the settings page). However, WP All Import doesn't load that code when creating 
 *   a brand new import, only when running it. For that reason, this code needs to be added 
 *   elsewhere. For example, in your theme's functions.php file or using a plugin like "Code Snippets".
 *
 * @param $create_headers
 * @param $import_id
 *
 * @return boolean
 */
add_filter( 'wp_all_import_auto_create_csv_headers', 'wpai_wp_all_import_auto_create_csv_headers', 10, 2 ); 

function wpai_wp_all_import_auto_create_csv_headers( $create_headers, $import_id ){ 
    // Return true to auto-generate header, or false to use the header in the file.
}

// ----------------------------
// Example uses below
// ----------------------------

/**
 * See note above about where to place this code snippet.
 */
add_filter( 'wp_all_import_auto_create_csv_headers', 'wpai_wp_all_import_auto_create_csv_headers', 10, 2 ); 

function wpai_wp_all_import_auto_create_csv_headers( $create_headers, $import_id ){ 
    return true; // or return `false` instead to use headers from file
}
