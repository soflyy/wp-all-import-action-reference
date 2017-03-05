<?php
/**
 * ======================================
 * Filter: wp_all_export_after_csv_line
 * ======================================
 *
 * Filters CSV lines.
 *
 * @param $stream
 * @param $export_id
 *
 * @return stream
 */
function wpae_wp_all_export_after_csv_line( $stream, $export_id ){
    // Code here.
}

add_filter( 'wp_all_export_after_csv_line', 'wpae_wp_all_export_after_csv_line', 10, 2 );

// ----------------------------
// Example uses below
// ----------------------------

/**
 * Example: add custom line ending
 *
 */
add_filter( 'wp_all_export_after_csv_line', 'wpae_wp_all_export_after_csv_line', 10, 2 );

function wpae_wp_all_export_after_csv_line( $stream, $export_id ){
        fwrite( $stream, "\n" );
        return $stream;
}