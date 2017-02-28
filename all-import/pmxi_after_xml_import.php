<?php
/**
 * ==================================
 * Action: pmxi_after_xml_import
 * ==================================
 *
 * Called after an import is complete.
 * Useful for any cleanup or other task that needs to be performed after an import.
 * For hooks to execute after a post is saved see pmxi_after_post_import & pmxi_saved_post
 *
 * @param $import_id int - The import in progress
 */
function after_xml_import($import_id)
{
    // Unless you want this code to execute for every import, check the import id
    // if ($import_id == 5) { ... }
}

add_action('pmxi_after_xml_import', 'after_xml_import', 10, 1);

