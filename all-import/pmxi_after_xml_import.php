<?php
/**
 * ==================================
 * Action: pmxi_after_xml_import
 * ==================================
 *
 * Called after an import is complete.
 * Useful for any cleanup or other task that needs to be performed after an import.
 * For hooks to execute after a post is saved see pmxi_after_post_import & pmxi_saved_post
 *
 * @param $import_id int - The import in progress
 */
function after_xml_import($import_id)
{
    // Unless you want this code to execute for every import, check the import id
    // if ($import_id == 5) { ... }
}

add_action('pmxi_after_xml_import', 'after_xml_import', 10, 1);

// ----------------------------
// Example uses below
// ----------------------------
/**
 * Send an email containing the import results after the import has finished.
 *
 */

function email_results( $import_id ) {
	global $wpdb;
	$table = $wpdb->prefix . 'pmxi_imports';
	$data = $wpdb->get_row( 'SELECT * FROM `' . $table . '` WHERE `ID` = "' . $import_id . '"' );
	if ( $data ) {
		$msg = "Import Report for Import ID " . $import_id . "\r\n\r\n";
		$msg .= "Created: " . $data->created . "\r\n";
		$msg .= "Updated: " . $data->updated . "\r\n";
		$msg .= "Skipped: " . $data->skipped . "\r\n";
		$msg .= "Deleted: " . $data->deleted . "\r\n";
		wp_mail( 'youremail@domain.com', 'Import Report', $msg );
	}
}

add_action( 'pmxi_after_xml_import', 'email_results', 10, 1 );
