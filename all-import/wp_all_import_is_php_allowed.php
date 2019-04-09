<?php
/**
 * =====================================
 * Filter: wp_all_import_is_php_allowed
 * =====================================
 *
 * In case of TRUE value WP All Import will execute PHP functions in import template, e.q.: [str_replace("a", "b", {title[1]})].
 *
 * @param bool $is_php_allowed
 *
 * @return bool
 */
function wpai_wp_all_import_is_php_allowed($is_php_allowed) {
    return $is_php_allowed;
}

add_filter('wp_all_import_is_php_allowed', 'wpai_wp_all_import_is_php_allowed', 10, 1);
