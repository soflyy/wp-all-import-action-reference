<?php
/**
 * ==================================
 * Action: wp_all_import_make_product_simple
 * ==================================
 *
 * Called after a product is converted into a Simple product by our WooCommerce Add-On, due to a lack of variations.
 *
 * Requires that "Create products with no variations as simple products" is enabled in the "Variations" tab in our WooCommerce Add-On.
 *
 * @since 2.3.6-beta-3.0
 *
 * @param $product_id   int  - Contains the ID of the product just created/updated
 * @param $import_id    int  - Contains the ID of the import
 *
 */
 
function wpai_wp_all_import_make_product_simple($product_id, $import_id){ 
  // Code here.
}

add_action('wp_all_import_make_product_simple', 'wpai_wp_all_import_make_product_simple', 10, 2);
