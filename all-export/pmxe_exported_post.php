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

/**
 * Example that checks the export ID
 */
function wpae_pmxe_exported_post($post_id, $exportObject)
{
	$export_id = ( isset( $_GET['id'] ) ? $_GET['id'] : ( isset( $_GET['export_id'] ) ? $_GET['export_id'] : 'new' ) );
	
	if ($export_id == "1") {
		$order = new WC_Order($post_id);
		$order->update_status('completed', 'export_completed'); 
	}
}
add_action('pmxe_exported_post', 'wpae_pmxe_exported_post', 10, 2);
