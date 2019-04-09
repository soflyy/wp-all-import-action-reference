<?php
/**
 * ==================================================
 * Filter: wp_all_import_product_attributes_delimiter
 * ==================================================
 *
 * Modify product attributes delimiter.
 *
 * @param string $delimiter - Attributes delimiter, default value is "|".
 * @param int $product_id - Product ID
 * @param int $import_id - ImportID
 *
 * @return bool
 */
function wpai_wp_all_import_product_attributes_delimiter($delimiter, $product_id, $import_id) {
    return $delimiter;
}

add_filter('wp_all_import_product_attributes_delimiter', 'wpai_wp_all_import_product_attributes_delimiter', 10, 3);
