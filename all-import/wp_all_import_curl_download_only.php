<?php
/**
 * =======================================
 * Filter: wp_all_import_curl_download_only
 * =======================================
 *
 * Force WP All Import to download the feed on the first request (skips reading headers). Useful if feeds reject multiple pings/requests.
 *
 *
 * @param $download_only bool - True for download only.
 *
 */

add_filter( 'wp_all_import_curl_download_only', 'wpai_wp_all_import_curl_download_only', 10, 1 );
function wpai_wp_all_import_curl_download_only( $download_only ){
	return true;
}