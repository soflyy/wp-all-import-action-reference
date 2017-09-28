<?php

/**
 * ==================================
 * Filter: wp_all_import_handle_upload
 * ==================================
 *
 * Filters the data array for attachments & images uploaded through WP All Import
 *
 * @param $file array - Contains the filepath, URL & filetype
 *
 * @return $file 
 */

add_filter('wp_all_import_handle_upload', 'wpai_wp_all_import_handle_upload', 10, 1);

function wpai_wp_all_import_handle_upload( $file ){
	// Handle & return $file here.
}
 
// ----------------------------
// Example uses below
// ----------------------------
/**
 * Apply WordPress's 'wp_handle_upload' filter to $file, so that plugins like Imsanity can work their magic
 *
 */

add_filter('wp_all_import_handle_upload', 'wpai_wp_all_import_handle_upload', 10, 1);

function wpai_wp_all_import_handle_upload( $file ){
	return apply_filters( 'wp_handle_upload', $file, 'upload');
}
