<?php
/**
 * =======================================
 * Action: pmxe_after_iteration
 * =======================================
 *
 * Runs after each cron processing iteration finishes.
 *
 *
 * @param $export_id int    - The export ID.
 * @param $exportObj object - The export object.
 *
 */


add_action( 'pmxe_after_iteration', 'wpae_continue_cron', 10, 2 );

function wpae_continue_cron( $export_id, $exportObj ) {
	// Do something.
}

 //
 // Example: Make a cron export run continuously.
 //

add_action( 'pmxe_after_iteration', 'wpae_continue_cron', 10, 2 );

function wpae_continue_cron( $export_id, $exportObj ) {
	if ( $export_id == '12' ) { // change this to your export ID
		$cron_processing_url = 'http://lame-addax-cat.w6.wpsandbox.pro/wp-cron.php?export_key=g99mni1B6Kpu&export_id=12&action=processing'; // change to your real processing URL
		header( "Location: " .  $cron_processing_url . "" );
	}
}