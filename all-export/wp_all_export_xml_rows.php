<?php
/**
 * ==================================
 * Filter: wp_all_export_xml_rows
 * ==================================
 * Filter a single XML record for conditional export.
 *
 * This is for XML formatted exports only. See 'wp_all_export_csv_rows' for CSV exports.
 *
 * @param $is_export_record
 * @param $record
 * @param $export_options
 * @param $export_id
 *
 * @return bool - Return true to export or false to ignore this record
 */
function my_wp_all_export_xml_rows($is_export_record, $record, $export_options, $export_id)
{
    // Unless you want this code to execute for every export, be sure to check the export id
    //
    // if ($export_id == 5) { ...

    // Check $record object and return true to export or false to skip

    return true;
}

add_filter('wp_all_export_xml_rows', 'my_wp_all_export_xml_rows', 10, 4);

// ----------------------------
// Example uses below
// ----------------------------

/**
 * Export based on some criteria. In this case stock status or stock value in WooCommerce.
 *
 */
function my_wp_all_export_xml_rows( $is_export_record, $record, $export_options, $export_id ) {
    $is_export_record = true;
	$product_id = $record->ID;
	$stock_status = get_post_meta( $product_id, "_stock_status", true );
	$stock = get_post_meta( $product_id, "_stock", true );
	
	// Now, we can conditionally export the records.
	
	// Example A: Don't export records that are out of stock:

	// if ( $stock_status == 'outofstock' ) {
	//  	$is_export_record = false;
	// }
	
	// Example B: Only export records with a positive stock value:
	
	// if ( empty( $stock ) ) {
	//  	$is_export_record = false;
	// }
	
	// Now, we let WP All Export know whether we should export the record.
    return $is_export_record;
}
add_filter( 'wp_all_export_xml_rows', 'my_wp_all_export_xml_rows', 10, 4 );

/*
 *
 * Limit XML Export to a certain number of records
 *
 */

add_filter('wp_all_export_xml_rows', function($shouldExport, $record, $exportOptions, $exportId) {

    // THE ID OF THE EXPORT YOU WANT TO APPLY THE FILTER TO
    $exportToApplyFilterTo = 3;

    // THE NUMBER OF POSTS TO EXPORT
    $lastNumberOfPostsToExport = 200;

    if($exportId == $exportToApplyFilterTo) {

        // GET THE LATEST POSTS
        $posts = get_posts(
            array(
                'numberposts' => $lastNumberOfPostsToExport,
                'post_status' => 'publish',  // ONLY RETURN PUBLISHED
// START TAXONOMY QUERY, REMOVE IF NOT FILTERING BY TAXONOMY
'tax_query' => array(
    array(
      'taxonomy' => 'property_status', // CHANGE TO THE TAXONOMY SLUG FOR YOUR TAXONOMY
      'field' => 'term_id',
      'terms' => 575, // CHANGE TO THE term_id OF YOUR TAXONOMY TERM THAT YOU WANT TO MATCH
      'include_children' => false
    )
  ),
// END TAXONOMY QUERY
                'fields' => 'ids',
                'order' => 'desc',
                'orderby' => 'ID',
                'post_type' => $record->post_type
            )
        );

        // IF THE CURRENT POST'S ID WAS RETURNED BY THE QUERY ABOVE THEN EXPORT IT.
        if(in_array($record->ID, $posts)) {
            return true;
        } else {
            return false;
        }
    }

    // RETURN THE DEFAULT IF EXPORT ID DOESN'T MATCH
    return $shouldExport;
}, 11, 4);
