<?php
/**
 * =======================================
 * Filter: wp_all_import_is_post_to_update
 * =======================================
 *
 * Return a boolean indicating if the existing record should be updated. For
 * new posts see "wp_all_import_is_post_to_create"
 *
 * @param $post_id int   - Post id
 * @param $data array    - An array holding values for the current record. If importing from
 *                         XML, attributes can be accessed as SimpleXMLElement objects.
 * @param $import_id int - Import id
 * 
 * @return bool (true = update, false = skip)
 */
function my_is_post_to_update($post_id, $data, $import_id)
{
    // your code here
    return true;
}

add_filter('wp_all_import_is_post_to_update', 'my_is_post_to_update', 10, 3);


// ----------------------------
// Example uses below
// ----------------------------


/**
 * This function will prevent updating of any product whose price has been manually changed
 * by the user. In other words, the user can create his own override price and that won't get
 * overwritten by future imports. To work, the regular price must also be imported as a custom
 * field named "_last_imported_price". Screenshot: http://imgur.com/a/R3kKT This is an all-or-
 * nothing solution. You'll need a second import if there are fields you always do want to update
 * like stock level for example.
 */
function do_not_update_if_hand_modified($post_id, $data, $import_id)
{
    // Enter your import id here
    if ($import_id != 1) return true;

    // Check if price has been modified since last import
    $imported_price = get_post_meta($post_id, "_last_imported_price", true);
    if ($imported_price <= 0) return true;
    if ($imported_price === get_post_meta($post_id, "_price", true)) return true;
    return false;
}

add_filter('wp_all_import_is_post_to_update', 'do_not_update_if_hand_modified', 10, 3);
