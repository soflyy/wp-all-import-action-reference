<?php

/**
 * ==================================
 * Filter: wp_all_import_handle_upload
 * ==================================
 *
 * @param $file array - The local file path to the full size image
 *
 * @return $file 
 */

add_filter('wp_all_import_handle_upload', 'wpai_wp_all_import_handle_upload', 10, 1);

function wpai_wp_all_import_handle_upload( $file ){
	// Code to handle $file here.
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
