<?php
/**
 * ==================================
 * Filter: wp_all_import_variation_taxonomies
 * ==================================
 *
 * Can be used to add taxonomies to WooCommerce product variations.
 *
 * >>>>>>>>>> ONLY AVAILABLE IN WOOCOMMERCE ADD-ON 2.3.3 BETA 1.2 AND LATER <<<<<<<<<<
 *
 * @param $taxonomies array - List of taxonomies.
 */

add_filter( 'wp_all_import_variation_taxonomies', 'wpai_wp_all_import_variation_taxonomies', 10, 1 );

function wpai_wp_all_import_variation_taxonomies( $taxonomies ){
        if ( ! in_array( 'my_taxonomy_name', $taxonomies ) ) $taxonomies[] = 'my_taxonomy_name';
        return $taxonomies;
}


New beta version released WooCommerce Add-On v2.3.3-beta-1.2 and uploaded to the customer's website.
