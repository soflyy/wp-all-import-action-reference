<?php
/**
 * ========================================
 * Filter: wp_all_import_is_post_to_create
 * ========================================
 *
 * Return a boolean indicating if the record should be imported. Note that
 * this is only for new posts. See "wp_all_import_is_post_to_update"
 * filter for updating existing posts
 *
 * @param $xml_node An array of all the values for the current record
 *
 * @return bool (true = create, false = skip)
 */
function my_is_post_to_create($xml_node)
{
    // your code here
    return true;
}

add_filter('wp_all_import_is_post_to_create', 'my_is_post_to_create', 10, 2);


// ----------------------------
// Example uses below
// ----------------------------
