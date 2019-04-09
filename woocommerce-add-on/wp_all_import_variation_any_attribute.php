<?php
/**
 * =============================================
 * Filter: wp_all_import_variation_any_attribute
 * =============================================
 *
 * In case of TRUE value and presented attribute value for variation has pipe divided string (L|XL|XXL) then
 * WP All Import will set attribute to 'Any' value.
 *
 * @param bool $variation_any_attribute
 * @param int $import_id
 *
 * @return bool
 */
function wpai_wp_all_import_variation_any_attribute($variation_any_attribute, $import_id) {
    return $variation_any_attribute;
}

add_filter('wp_all_import_variation_any_attribute', 'wpai_wp_all_import_variation_any_attribute', 10, 1);
