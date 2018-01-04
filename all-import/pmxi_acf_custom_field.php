<?php
/**
 * ================================================
 * Filter: pmxi_acf_custom_field
 * ================================================
 *
 * Filter for ACF custom field values.
 *
 * @param $value    		-   Imported value
 * @param $pid 				-	The post ID.
 * @param $name 			-	The field name.
 *
 */
add_filter( 'pmxi_acf_custom_field', 'wp_all_import_pmxi_acf_custom_field', 10, 3 ); 

function wp_all_import_pmxi_acf_custom_field( $value, $pid, $name ) { 
	// Code here.
}

// ----------------------------
// Example uses below
// ----------------------------

/**
 * Example: only update ACF field if the imported value is not empty. Only works if "Choose which data to update" is enabled in the import settings.
 *
 */
add_filter( 'pmxi_acf_custom_field', 'wp_all_import_pmxi_acf_custom_field', 10, 3 ); 

function wp_all_import_pmxi_acf_custom_field( $value, $pid, $name ) { 
	// get existing value 
	$existing = get_post_meta( $pid, $name, true );
	if ( empty( $value ) ) { 
		// The field is empty in the import, so use the existing value in the post.
		$value = $existing;
	} 
	return $value; 
}