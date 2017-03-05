<?php
/**
 * ======================================
 * Filter: wp_all_export_csv_headers
 * ======================================
 *
 * Manipulate export file headers.
 *
 * @param $headers 			- array of header columns.
 * @param $export_id 		- the current export id.
 *
 * @return array
 */
add_filter( 'wp_all_export_csv_headers', 'wpae_wp_all_export_csv_headers', 10, 2 ); 

function wpae_wp_all_export_csv_headers( $headers, $export_id ) { 
	// Code here.
}


// ----------------------------
// Example uses below
// ----------------------------

/**
 * Example: remove "Rate Name" column.
 *
 */
add_filter( 'wp_all_export_csv_headers', 'wpae_wp_all_export_csv_headers', 10, 2 ); 

function wpae_wp_all_export_csv_headers( $headers, $export_id ) { 
	foreach ( $headers as $key => $header ) { 
		if ( $header == 'Rate Name' ) { 
			unset( $headers[ $key ] ); 
		} 
	} 
	return $headers; 
}
