<?php
/**
 * ==================================
 * Filter: wp_all_export_pre_csv_headers
 * ==================================
 *
 * Allows for CSV headers to be added.
 *
 * @since 1.4.8-beta-1.25
 *
 * @param $preCsvHeaders  bool|string - Contains the headers to add to the CSV. Default false.
 * @param $export_id      int         - The ID of the export in progress
 *
 * @return $preCsvHeaders
 */
 
add_filter('wp_all_export_pre_csv_headers', 'export_add_headers', 10, 2);
		   
function export_add_headers ($preCsvHeaders, $exportId) {
	// Modify & return $preCsvHeaders
}

// ----------------------------
// Example uses below
// ----------------------------

/**
 * Add one row of headers
 *
 */
 
add_filter('wp_all_export_pre_csv_headers', 'export_add_one_header_row', 10, 2);
		   
function export_add_one_header_row($preCsvHeaders, $exportId) {
	// List the row of headers to add here
	$headers_list = array(
		"1st Row Header 1",
		"1st Row Header 2",
		"1st Row Header 3"
	);
	
	/**
	 * implode() is used here to convert the array into a string, so it
     *  can be appended to $preCsvHeaders.
	 *
	 * If you're not using a comma as the separator in the "Advanced Options" section
	 *  in your export settings, change the separator that's used in implode() here.
	 */
	$preCsvHeaders .= implode(",", $headers_list);
	
	return $preCsvHeaders;
}

/**
 * Add two rows of headers
 *
 */
 
add_filter('wp_all_export_pre_csv_headers', 'export_add_two_header_rows', 10, 2);
		   
function export_add_two_header_rows($preCsvHeaders, $exportId) {
	// List the first row of headers to add here
	$row1_headers_list = array(
		"1st Row Header 1",
		"1st Row Header 2",
		"1st Row Header 3"
	);
	// List the second row of headers to add here
	$row2_headers_list = array(
		"2nd Row Header 1",
		"2nd Row Header 2",
		"2nd Row Header 3"
	);
	
	/**
   * implode() is used here to convert the arrays into strings, so they
   *  can be appended to $preCsvHeaders.
	 *
	 * If you're not using a comma as the separator in the "Advanced Options" section
	 *  in your export settings, change the separator that's used in implode() here.
	 */
	$preCsvHeaders .= implode(",", $row1_headers_list) . "\n"; // "\n" is appended here because there's another set of headers to add
	$preCsvHeaders .= implode(",", $row2_headers_list); // "\n" isn't appended here because this is the last set of headers we're adding
	
	return $preCsvHeaders;
}
