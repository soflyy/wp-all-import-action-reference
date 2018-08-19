<?php
/**
 * =============================================
 * Filter: wp_all_export_raw_prices
 * =============================================
 *
 * Can be used to disable price formatting for WooCommerce exports.
 *
 * @param $raw_prices bool  - Return true to disable price formatting.
 *
 */

add_filter( 'wp_all_export_raw_prices', '__return_true' );