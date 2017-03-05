<?php
/**
 * =======================================
 * Filter: wp_all_export_zapier_response
 * =======================================
 *
 *
 * @param $response     - Current response.
 *
 * @return array
 */
add_filter('wp_all_export_zapier_response', 'wpae_wp_all_export_zapier_response', 10, 1);
function wpae_wp_all_export_zapier_response( $response ) {
        // Code here.
}

// ----------------------------
// Example uses below
// ----------------------------


/**
 * Example: Send export bundle file to Zapier.
 *
 */
add_filter('wp_all_export_zapier_response', 'wpae_wp_all_export_zapier_response', 10, 1);
function wpae_wp_all_export_zapier_response( $response ) {

        $export = new PMXE_Export_Record();             

        if ( ! $export->getById($response['export_id'])->isEmpty())
        {                               
                if ( ! empty($export->options['bundlepath']) )
                {
                        $bundle_path = wp_all_export_get_absolute_path($export->options['bundlepath']);

                        $uploads  = wp_upload_dir();

                        if ( @file_exists($bundle_path) )
                        {
                                $response['export_file_url'] = $uploads['baseurl'] . str_replace($uploads['basedir'], '', $bundle_path);                               
                        }                                       
                }               
        }

        return $response;
}
