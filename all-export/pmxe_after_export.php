<?php

/**
 * ======================================
 * Action: pmxe_after_export
 * ======================================
 * Perform some action after the export is complete.
 *
 * @param $export_id
 * @param $exportObj
 *
 */
function wp_all_export_after_export($export_id, $exportObj)
{
    // Unless you want this to execute for every export you should check the id here:
    // if ($export_id === 5) {
}
add_action('pmxe_after_export', 'wp_all_export_after_export', 10, 2);
