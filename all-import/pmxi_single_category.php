<?php
/**
 * ==========================================
 * Filter: pmxi_single_category
 * ==========================================
 *
 * @param $term_into    - ?.
 * @param $tx_name      - The taxonomy name.
 *
 */
add_filter( 'pmxi_single_category', 'wpai_pmxi_single_category', 10, 2 ); 

function wpai_pmxi_single_category( $term_into, $tx_name ) { 
        // Code here.
}

// ----------------------------
// Example uses below
// ----------------------------

/**
 * Example: Only import existing hierarchical categories
 *
 */
add_filter( 'pmxi_single_category', 'wpai_pmxi_single_category', 10, 2 ); 

function wpai_pmxi_single_category( $term_into, $tx_name ) { 
        // here we can check is term exists 
        $term = empty($term_into['parent']) ? term_exists( $term_into['name'], $tx_name, 0 ) : term_exists( $term_into['name'], $tx_name, $term_into['parent'] ); 
        // if term doesn't exists we can return false, so WP All Import will not create it 
        if ( empty($term) and !is_wp_error($term) ) { 
                return false;
        } 
        return $term_into; 
}


/**
 * Example: Only import existing Single Categories
 *
 */

add_filter( 'pmxi_single_category', 'wpai_pmxi_single_category', 10, 2 );
function wpai_pmxi_single_category( $ctx, $tx_name ) {
        $term = is_exists_term($ctx['name'], $tx_name);
        if ( empty($term) and ! is_wp_error($term) ) {
                $ctx = false;
        }
        return $ctx;   
}
