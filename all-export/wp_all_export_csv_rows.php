<?php
/**
 * ==================================
 * Filter: wp_all_export_csv_rows
 * ==================================
 *
 * Filters CSV rows to export.
 *
 * See 'wp_all_export_xml_rows' for XML data. (which get passed a single
 * record instead of an array of records)
 *
 * @param $articles
 * @param $options
 * @param $export_id int - The export in progress
 *
 * @return array - the records to import
 */
function wp_all_export_csv_rows($articles, $options, $export_id)
{
    // Unless you want this code to execute for every export, be sure to check the export id
    //
    // if ($export_id === 5) { ...

    // $articles contains on array of records for exporting.
    // Loop through the array and unset() any entries you don't
    // want exported

    return $articles; // Return the array of records to import
}

add_filter('wp_all_export_csv_rows', 'wp_all_export_csv_rows', 10, 2);


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

/**
 * Add custom line to export file.
 *
 */
add_filter('wp_all_export_csv_rows', 'my_export_csv_rows', 10, 2);

add_filter('wp_all_export_csv_rows', 'wpai_wp_all_export_csv_rows', 10, 3);
function wpai_wp_all_export_csv_rows( $articles, $options, $export_id ) {
        $new_article = array();
        if ( ! empty($articles)) {
                foreach( $articles as $article ) {
                        foreach ($article as $header => $value ) {
                                $new_article[$header] = 'NEW ' . $value;
                                // here we can switch $header to determine Order ID
                        }
                }
                $articles[] = $new_article;
        }
        return $articles;
}