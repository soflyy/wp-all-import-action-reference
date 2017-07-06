<?php
/**
 * ==================================
 * Action: pmxe_exported_post
 * ==================================
 *
 * Called after a post is exported (added to the export file) by WP All Export.
 *
 * @param $post_id int               - The id of the post just exported
 * @param $exportObj SimpleXMLElement - An object holding values for the current record
 *
 */

/**
 * Example code to change the order status to 'completed' on exporting
 */
function wpae_pmxe_exported_post($post_id, $exportObject)
{
    $order = new WC_Order($post_id);
    $order->update_status('completed', 'export_completed'); 
}

add_action('pmxe_exported_post', 'wpae_pmxe_exported_post', 10, 2);