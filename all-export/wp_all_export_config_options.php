<?php
/**
 * ======================================
 * Filter: wp_all_export_config_options
 * ======================================
 *
 * Set export options.
 *
 * @param $options array - export configuration options.
 *
 * @return array
 */
add_filter( 'wp_all_export_config_options', 'wpai_wp_all_import_config_options', 10, 1 );

function wpai_wp_all_import_config_options( $options ) {
	// Code here.
}


// ----------------------------
// Example uses below
// ----------------------------

/**
 * Example: set the 'max_execution_time' to 30 seconds.
 *
 */
add_filter( 'wp_all_export_config_options', 'wpai_wp_all_import_config_options', 10, 1 );

function wpai_wp_all_import_config_options( $options ) {
	$options['max_execution_time'] = 30;
	return $options;
}

