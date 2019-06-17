<?php
/**
 * ==================================
 * Filter: wp_all_export_csv_rows
 * ==================================
 *
 * Filters the records to export.
 * This is for CSV formatted exports only. See 'wp_all_export_xml_rows' for filtering XML exports.
 *
 * @param $articles - An array of records for exporting. Each article is keyed by the column header name for that field.
 * @param $options
 * @param $export_id int - The export in progress
 *
 * @return array - the records to export
 */
function wp_all_export_csv_rows($articles, $options, $export_id)
{
    // Unless you want this code to execute for every export, be sure to check the export id
    // if ($export_id == 5) { ...

    // Loop through the array and unset() any entries you don't want exported
    // foreach ($articles as $key => $article) {
    //    if ($article["Title"] == "Something") {
    //      unset($articles[$key]);
    //  }
    // }

    return $articles; // Return the array of records to export
}

add_filter('wp_all_export_csv_rows', 'wp_all_export_csv_rows', 10, 3);


// ----------------------------
// Example uses below
// ----------------------------

/**
 * Export based on some criteria. In this case pricing.
 *
 */
function my_export_csv_rows($articles, $options, $export_id)
{
    foreach ($articles as $key => $article) {
        if (!empty($article['Regular Price'] && !empty($article['Sale Price']))) {
            if ($article['Sale Price'] < ($article['Regular Price'] / 2)) {
                unset($articles[$key]);
            }
        }
    }

    return $articles;
}

add_filter('wp_all_export_csv_rows', 'my_export_csv_rows', 10, 3);


/**
 * Export based on date in the "_my_time" field
 *
 */
function wp_all_export_csv_rows($articles, $options, $export_id)
{
    // Loop through the array and unset() any entries you don't want exported
     foreach ($articles as $key => $article) {
	   $date = date(strtotime("tomorrow"));
	   $my_time = strtotime($article["_my_time"]);
        if ($my_time < $date) {
		  unset($articles[$key]);
		}
     }
    return $articles; // Return the array of records to export
}
add_filter('wp_all_export_csv_rows', 'wp_all_export_csv_rows', 10, 3);


/*
* Export all posts from the previous calendar month
*
*/
function wp_all_export_csv_rows($articles, $options, $export_id) {
	// Get start date of previous month
	$start_date = date("Y-m-d", strtotime("first day of previous month"));
	// Get end date of previous month
	$end_date = date("Y-m-d", strtotime("last day of previous month"));	
	// Loop through the array and unset() any entries you don't want exported
     	foreach ($articles as $key => $article) {
		// Get post date from export data
		$post_date = $article["_my_post_date"];
		// Compare the dates
        	if ( ( $post_date >= $start_date ) && ( $post_date <= $end_date ) ) {
			// Don't unset the $articles
		} else {
			// Unset the $articles
			unset($articles[$key]);
		}
	}
	// Return the array of records to export
    	return $articles;
}
add_filter('wp_all_export_csv_rows', 'wp_all_export_csv_rows', 10, 3);

/*
* Exclude variations from Google Merchant Center export when the parent product is in "Draft" status
*
*/

function my_exclude_drafts_from_gmc_export($articles, $options, $export_id) {
	
	if ($options["xml_template_type"] == "XmlGoogleMerchants") {

		foreach ($articles as $key => $article) {
			if ( ! empty($article['id']) ) {

				$post_id = $article['id'];

				$parent_id = wp_get_post_parent_id($post_id);

				if ( get_post_status($parent_id) == "draft" ) {
					unset($articles[$key]);
				}

			}
		}

	}
	
    return $articles;
}
add_filter('wp_all_export_csv_rows', 'my_exclude_drafts_from_gmc_export', 10, 3);
