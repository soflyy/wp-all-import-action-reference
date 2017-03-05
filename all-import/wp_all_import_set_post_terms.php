<?php
/**
 * ==============================================
 * Filter: wp_all_import_set_post_terms
 * ==============================================
 *
 * Auto generate headers, or use header in file.
 *
 * @param $term_taxonomy_ids	-	The taxonomy IDs.
 * @param $tx_name				- 	Current taxonomy name.
 * @param $pid 					-	Post ID.
 * @param $import_id			-	Import ID.
 *
 * @return array
 */
add_filter( 'wp_all_import_set_post_terms', 'wpai_wp_all_import_set_post_terms', 10, 4 );

function wpai_wp_all_import_set_post_terms( $term_taxonomy_ids, $tx_name, $pid, $import_id ){
        // Code here.
}

// ----------------------------
// Example uses below
// ----------------------------

/**
 * Example: Leave "Featured" category attached to post, even if it isn't in the import.
 *
 */
add_filter( 'wp_all_import_set_post_terms', 'wpai_wp_all_import_set_post_terms', 10, 4 );

function wpai_wp_all_import_set_post_terms( $term_taxonomy_ids, $tx_name, $pid, $import_id ){
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