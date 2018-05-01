<?php

/**
 * ======================================
 * Action: pmxe_after_export
 * ======================================
 * Perform some action after the export is complete.
 *
 * Note: In the case of this hook, the code needs to be added elsewhere.
 * For example, your theme's functions.php file or a plugin like "Code Snippets".
 *
 * @param $export_id   int     - The ID of the export that's running
 * @param $exportObj   object  - Contains all of the data related to the export (export stats, export settings, the data being exported, etc.).
 *
 */
function wp_all_export_after_export($export_id, $exportObj)
{
    // Unless you want this to execute for every export you should check the id here:
    // if ($export_id === 5) {
}
add_action('pmxe_after_export', 'wp_all_export_after_export', 10, 2);

// ----------------------------
// Example uses below
// ----------------------------

/**
 * Gets the export file once the export is complete
 */

add_action('pmxe_after_export', 'wpae_get_file_after_export', 10, 2);
function wpae_get_file_after_export($export_id, $exportObj){
	
	// Check whether "Secure Mode" is enabled in All Export -> Settings
	$is_secure_export = PMXE_Plugin::getInstance()->getOption('secure');
	
	if (!$is_secure_export) {
		$filepath = get_attached_file($exportObj->attch_id);                    
	} else {
		$filepath = wp_all_export_get_absolute_path($exportObj->options['filepath']);
	}
	// Code to handle $filepath here
	// e.g., rename( $filepath, "/path/to/new/folder/export-file-name.csv" );
}
