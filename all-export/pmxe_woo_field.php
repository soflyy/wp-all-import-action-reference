<?php
/**
 * ==================================
 * Filter: pmxe_woo_field
 * ==================================
 *
 * Filters WooCommerce fields.
 *
 *
 * @param $value 		-	The value of the field.
 * @param $field_name 	-	The field name.
 * @param $pid 			-	The post ID.
 *
 * @return string
 */
add_filter( 'pmxe_woo_field', 'wp_all_export_woo_field', 10, 3 );

function wp_all_export_woo_field( $value, $field_name, $pid ) {
	// Code here.
}



// ----------------------------
// Example uses below
// ----------------------------

/**
 * Change crossell and upsell fields to product IDs instead of SKUs.
 *
 */
add_filter('pmxe_woo_field', 'wp_all_export_woo_field', 10, 3);

function wp_all_export_woo_field( $value, $field_name, $pid ) { 
	if ( $field_name == '_crosssell_ids' || $field_name == '_upsell_ids' ) {
		$_ids = maybe_unserialize( get_post_meta( $pid, $field_name, true ) ); 
		$value = empty( $_ids ) ? '' : implode( "|", $_ids ); 
	}
	return $value;
}
