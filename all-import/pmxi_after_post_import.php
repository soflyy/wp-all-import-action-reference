<?php
/**
 * ==================================
 * Action: pmxi_after_post_import
 * ==================================
 *
 * Triggered after a post has been completely imported
 *
 * @param $import_id int - The import in progress
 *
 */
function my_after_post_import($import_id)
{
    // Unless you want this code to execute for every import, check the import id
    // if ($import_id === 5) { ... }
}

add_action('pmxi_after_post_import', 'my_after_post_import', 10, 1);


// ----------------------------
// Example uses below
// ----------------------------

