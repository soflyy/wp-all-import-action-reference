<?php
/**
 * ==============================================
 * Filter: wp_all_import_set_post_terms
 * ==============================================
 *
 * Called when WP All Import is setting the post taxonomy terms.
 *
 * @param $term_taxonomy_ids    -   Array of taxonomy IDs.
 * @param $tx_name              -   The name of the current taxonomy.
 * @param $pid                  -   The Post ID.
 * @param $import_id            -   The current import ID.
 *
 * @return array
 */
add_filter( 'wp_all_import_set_post_terms', 'wpai_wp_all_import_set_post_terms', 10, 4 );

function wpai_wp_all_import_set_post_terms( $term_taxonomy_ids, $tx_name, $pid, $import_id ) {
        // Code here.
}

// ----------------------------
// Example uses below
// ----------------------------

/**
 * Example: Leave assigned category "Featured" in tact, even if it's not included in the import.
 *
 */
add_filter( 'wp_all_import_set_post_terms', 'wpai_wp_all_import_set_post_terms', 10, 4 );

function wpai_wp_all_import_set_post_terms( $term_taxonomy_ids, $tx_name, $pid, $import_id ) {
        if ( $tx_name == 'product_cat' ){
                $txes_list = get_the_terms($pid, $tx_name);
                if ( ! empty($txes_list) ){
                        foreach ($txes_list as $cat){
                                if ($cat->name == 'Featured'){
                                        $term_taxonomy_ids[] = $cat->term_taxonomy_id;
                                        break;
                                } 
                        }
                }
        }
        return $term_taxonomy_ids;
}