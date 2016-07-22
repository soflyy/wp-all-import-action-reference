<?php
/**
 * ==================================
 * Filter: wp_all_export_xml_rows
 * ==================================
 * Filter a single XML record for conditional export.
 *
 * See 'wp_all_export_csv_rows' for CSV data (which get passed an array of
 * records instead of a single record)
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
    // if ($export_id === 5) { ...

    // Check $record object and return true to export or false to skip

    return true;
}

add_filter('wp_all_export_xml_rows', 'my_wp_all_export_xml_rows', 10, 4);


// ----------------------------
// Example uses below
// ----------------------------
