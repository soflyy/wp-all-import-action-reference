<?php
/**
 * ==================================
 * Action: pmxi_before_xml_import
 * ==================================
 *
 * @param $import_id The id of the executing import
 *
 */
function wp_all_import_before_xml_import($import_id)
{
    // Unless you want this code to execute for every import, be sure to check the import id
    //
    // if ($import_id === 5) { ...
}

add_action('pmxi_before_xml_import', 'wp_all_import_before_xml_import', 10, 1);



// ----------------------------
// Example uses below
// ----------------------------


function wp_all_import_before_xml_import($import_id)
{
  // TO DO
}
add_action('pmxi_before_xml_import', 'wp_all_import_before_xml_import', 10, 1);
