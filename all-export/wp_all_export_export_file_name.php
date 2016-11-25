<?php
/**
 * ======================================
 * Filter: wp_all_export_export_file_name
 * =======================================
 * Filter to change the filename of the exported data file
 * 
 * @param $file_path
 * @param $export_id
 *
 * @return string
 */

function wpae_wp_all_export_export_file_name($file_path, $export_id){
    // Unless you want your code to execute for every export, be sure to check the export id
    // if ($export_id === 5) { ... }
    
    return $file_path;
}
add_filter('wp_all_export_export_file_name', 'wpae_wp_all_export_export_file_name', 10, 2);


// ----------------------------
// Example uses below
// ----------------------------


/**
 * Prepend "NEW-" to file name
 */
function wpae_wp_all_export_change_file_name($file_path, $export_id){
    $file_name = basename($file_path);
    $new_file_name = 'NEW-' . $file_name;
    $file_path = str_replace($file_name, $new_file_name, $file_path);
    return $file_path;
}
add_filter('wp_all_export_export_file_name', 'wpae_wp_all_export_change_file_name', 10, 2);
