<?php
/**
 * =======================================
 * Filter: wp_all_import_is_post_to_update
 * =======================================
 *
 * Return a boolean indicating if the existing record should be updated. For
 * new posts see "wp_all_import_is_post_to_create"
 *
 * @param $continue_import  bool    - Default value true.
 * @param $post_id          int     - Post id
 * @param $data             array   - An array holding values for the current record. If importing from
 *                         XML, attributes can be accessed as SimpleXMLElement objects.
 * @param $import_id        int     - Import id
 * 
 * @return bool (true = update, false = skip)
 */
function my_is_post_to_update( $continue_import, $post_id, $data, $import_id ) {
    // Unless you want this code to execute for every import, check the import id    
    // if ($import_id === 5) { ... }
    return true;
}

add_filter( 'wp_all_import_is_post_to_update', 'my_is_post_to_update', 10, 4 );


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
function do_not_update_if_hand_modified( $continue_import, $post_id, $data, $import_id ) {
    // Check for your import
    if ($import_id == 1) {
        // Check if price has been modified since last import
        $imported_price = get_post_meta($post_id, "_last_imported_price", true);
        if ($imported_price <= 0) return true;
        if ($imported_price === get_post_meta($post_id, "_price", true)) return true;
        return false;
    }
    else {
        return true;
    }
}

add_filter( 'wp_all_import_is_post_to_update', 'do_not_update_if_hand_modified', 10, 4 );


/**
 * This function will only update the post if the stock status in the import file is different
 * to the stock status saved for the product.
 * $data["stock"] is the {stock[1]} element from the import file.
 */
function my_check_stock_before_update ( $continue_import, $post_id, $data, $import_id ) {
    // Check for your import
    if ($import_id == 1) {
		// Get import file stock status
        $import_stock_status = $data["stock"];
		// get Woo stock status
		$woo_stock_status = get_post_meta($post_id, "_stock_status", true);
		// Check if my_stock_status and woo_stock_status match
        if ($import_stock_status !== $woo_stock_status) {
			return true;
		}
        return false;
    }
    else {
        return true;
    }
}
add_filter( 'wp_all_import_is_post_to_update', 'my_check_stock_before_update', 10, 4 );


/**
 * Only update posts where the post_status = "draft"
 * 
 */
function my_check_post_status ($continue_import, $post_id, $data, $import_id ) {
    // Check for your import
    if ($import_id == 1) {
	// Get post status
	$my_post_status = get_post_status($post_id);
	// Only update posts where the status = "draft"
        if ($my_post_status == "draft") {
		return true;
	}
        return false;
    }
    else {
        return true;
    }
}
add_filter( 'wp_all_import_is_post_to_update', 'my_check_post_status', 10, 4 );
