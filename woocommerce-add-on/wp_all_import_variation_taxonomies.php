<?php
/**
 * ==================================
 * Filter: wp_all_import_variation_taxonomies
 * ==================================
 *
 * Can be used to add taxonomies to WooCommerce product variations.
 *
 *
 * @param $taxonomies array - List of taxonomies.
 */

add_filter( 'wp_all_import_variation_taxonomies', 'wpai_wp_all_import_variation_taxonomies', 10, 1 );

function wpai_wp_all_import_variation_taxonomies( $taxonomies ){
        if ( ! in_array( 'my_taxonomy_name', $taxonomies ) ) $taxonomies[] = 'my_taxonomy_name';
        return $taxonomies;
}