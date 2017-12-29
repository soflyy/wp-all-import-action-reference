<?php
/**
 * ======================================
 * Action: wp_all_export_generate_bundle
 * ======================================
 * Determine whether the bundle file should be generated.
 *
 * @return bool (true = create bundle, false = don't create bundle)
 *
 */
add_filter('wp_all_export_generate_bundle', 'wpae_do_not_generate_bundle');

function wpae_do_not_generate_bundle()
{
	return false;
}
