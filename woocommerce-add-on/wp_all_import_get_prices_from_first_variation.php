<?php
/**
 * =====================================================
 * Filter: wp_all_import_get_prices_from_first_variation
 * =====================================================
 *
 * In case of TRUE value WP All Import will set price from first variation and set it to parent product in case when variable product converting to simple.
 *
 * @param bool $get_prices_from_first_variation
 * @param int $product_id - Product ID
 * @param int $import_id - Import ID
 *
 * @return bool
 */
function wpai_wp_all_import_get_prices_from_first_variation($get_prices_from_first_variation, $product_id, $import_id) {
    return $get_prices_from_first_variation;
}

add_filter('wp_all_import_get_prices_from_first_variation', 'wpai_wp_all_import_get_prices_from_first_variation', 10, 3);
