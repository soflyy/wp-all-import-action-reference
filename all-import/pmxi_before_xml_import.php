<?php
/**
 * ==================================
 * Action: pmxi_before_xml_import
 * ==================================
 *
 * @param $import_id int - The import in progress
 *
 */
function wp_all_import_before_xml_import($import_id)
{
    // Unless you want this code to execute for every import, check the import id
    // if ($import_id === 5) { ... }
}

add_action('pmxi_before_xml_import', 'wp_all_import_before_xml_import', 10, 1);


