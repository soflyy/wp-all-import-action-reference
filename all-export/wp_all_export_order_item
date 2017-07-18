<?php
/**
 * ==================================
 * Filter: wp_all_export_order_item
 * ==================================
 *
 * Filters the items in a WooCommerce Order to export.
 *
 * Available in WP All Export Pro v1.4.7-Beta-1.35 and higher
 * 
 * @param $is_export_record  bool
 * @param $product_id - the ID of the product
 * @param $export_options
 * @param $export_id  int - The export in progress
 * @return bool (true = export item, false = skip item)
 */
 function filter_my_order_items ($is_export_record, $product_id, $export_options, $export_id) {
	// Unless you want this to execute for every export you should check the id here:
	// if ($export_id === 5) {

	// Your code here

	return true;
}
add_filter("wp_all_export_order_item", "filter_my_order_items", 10, 4);


// ----------------------------
// Example uses below
// ----------------------------


function exclude_order_items_with_specific_category ($is_export_record, $product_id, $export_options, $export_id) {
	$category_to_exclude = "Shoes"; // Exchange this category with the category of products that you're wanting to remove from an Orders export

	if (has_term($category_to_exclude, "product_cat", $product_id)) {
		return false;
	}
	return true;
}
add_filter("wp_all_export_order_item", "exclude_order_items_with_specific_category", 10, 4);
