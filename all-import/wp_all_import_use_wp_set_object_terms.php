<?php
/**
 * ==================================
 * Filter: wp_all_import_use_wp_set_object_terms
 * ==================================
 *
 * Determines behavior of assigment taxonomy term to a post.
 *
 * @param bool $use_wp_set_object_terms - use Wordpress standard function wp_set_object_terms or pure SQL
 * @param $tx_name - taxonomy name
 * @return bool
 */
function wpai_wp_all_import_use_wp_set_object_terms($use_wp_set_object_terms, $tx_name)
{
    return $use_wp_set_object_terms;
}

add_filter('wp_all_import_use_wp_set_object_terms', 'wpai_wp_all_import_use_wp_set_object_terms', 10, 2);
