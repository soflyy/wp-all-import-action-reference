<?php
/**
 * ================================================
 * Action: wp_all_import_variable_product_imported
 * ================================================
 *
 * Called when WP All Import saves a variable product *without* the "Link all variations" option selected.
 *
 * @param $post_parent    -   The parent post ID of the current variation.
 *
 */
add_action( 'wp_all_import_variable_product_imported', 'wpai_wp_all_import_variable_product_imported', 10, 1 );

function wpai_wp_all_import_variable_product_imported( $post_parent ){
    // Code here.  
}

// ----------------------------
// Example uses below
// ----------------------------

/**
 * Example: Create one variation of "any" for a WooCommerce variable product.
 *
 */
add_action( 'wp_all_import_variable_product_imported', 'wpai_wp_all_import_variable_product_imported', 10, 1 );

function wpai_wp_all_import_variable_product_imported( $post_parent ){
    global $wpdb;
    $table = $wpdb->posts;
    $variations = $wpdb->get_results("SELECT * FROM $table WHERE post_parent = " . $post_parent );
    if ( ! empty($variations)){
        $empty_variation = array_shift($variations);
        if ( ! empty($variations)){
            foreach($variations as $variation){
                wp_delete_post($variation->ID);           
            }
        }
        $table = _get_meta_table('post');
        $post_meta = $wpdb->get_results("SELECT meta_key, meta_value FROM $table WHERE post_id = " . $empty_variation->ID . " AND meta_key LIKE 'attribute%';" );
        if ( ! empty($post_meta)){
            foreach ($post_meta as $meta) {
                update_post_meta($empty_variation->ID, $meta->meta_key, '');
            }
        }
    }   
}
