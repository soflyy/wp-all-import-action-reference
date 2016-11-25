<?php
/**
 * =======================================
 * Filter: wp_all_import_specified_records
 * =======================================
 * Use this to override the specified records to be imported. It's a comma
 * seperated list of ints or int ranges. e.g. "1-7,10,15-20". The integers
 * represent the position in the data file.
 *
 *
 * @param $specified_records String - Holds the currently specified records
 * @param $import_id         Int - The import in progress
 * @param $root_nodes        ??
 *
 * @return string
 */
function my_specified_records($specified_records, $import_id, $root_nodes)
{
    // Unless you want this code to execute for every import, check the import id
    // if ($import_id === 5) { ... }

    // your code here
    return $specified_records;
}

add_filter('wp_all_import_specified_records', 'my_specified_records', 10, 2);


// ----------------------------
// Example uses below
// ----------------------------


/**
 * Example: Import only the first 10 records in the data file
 *
 */
function wpai_specified_records($specified_records, $import_id, $root_nodes)
{
    return '1-10';
}

add_filter('wp_all_import_specified_records', 'wpai_specified_records', 10, 3);
