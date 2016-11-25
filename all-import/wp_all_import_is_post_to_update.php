<?php
/**
 * =======================================
 * Filter: wp_all_import_is_post_to_update
 * =======================================
 *
 * Return a boolean indicating if the existing record should be updated. For
 * new posts see "wp_all_import_is_post_to_create"
 *
 * @param $id       int                 - Post id
 * @param $xml_node SimpleXMLElement    - An object holding values for the current record
 *
 * @return bool (true = update, false = skip)
 */
function my_is_post_to_update($id, $xml_node)
{
    // your code here
    return true;
}

add_filter('wp_all_import_is_post_to_update', 'my_is_post_to_update', 10, 2);


// ----------------------------
// Example uses below
// ----------------------------

