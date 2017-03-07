<?php
/**
 * ================================================
 * Action: pmxi_product_variation_saved
 * ================================================
 *
 * Called when WP All Import saves a variable product with the "Link all variations" option selected.
 *
 * @param $variation_id    -   The current variation post ID.
 *
 */
add_action( 'pmxi_product_variation_saved', 'wpai_wp_all_import_variation_imported', 10, 1 );

function wpai_wp_all_import_variation_imported( $variation_id ){
    // Code here.
}

// ----------------------------
// Example uses below
// ----------------------------

/**
 * Example: Get post parent for variation.
 *
 */
add_action( 'pmxi_product_variation_saved', 'wpai_wp_all_import_variation_imported', 10, 1 );

function wpai_wp_all_import_variation_imported( $variation_id ){
    global $wpdb;
    $table = $wpdb->posts;
    $variation = $wpdb->get_row( "SELECT * FROM $table WHERE ID = " . $variation_id );
    $parent_post = $variation->post_parent;
}
