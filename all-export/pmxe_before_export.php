<?php
/**
 * ======================================
 * Action: pmxe_before_export
 * ======================================
 * Perform some action before the export starts.
 *
 * Note: In the case of this hook, the code needs to be added elsewhere.
 * For example, your theme's functions.php file or a plugin like "Code Snippets".
 *
 * @param $export_id   int     - The ID of the export that's running
 *
 */
add_action( 'pmxe_before_export', 'wp_all_export_before_export', 10, 1 );

function wp_all_export_before_export( $export_id )
{
    // Unless you want this to execute for every export you should check the id here:
    // if ($export_id === 5) {
}
