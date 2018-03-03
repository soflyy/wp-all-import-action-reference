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
    //    if ($article["Title"] == "Something") unset($articles[$key]);
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
