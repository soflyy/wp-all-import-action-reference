<?php
/**
 * =========================================
 * Filter: wp_all_import_images_uploads_dir
 * =========================================
 *
 * Can be used to set a custom path in which images (as well as media intended for ACF fields) are uploaded. Only applies to media uploaded via WP All Import.
 *
 * @since 4.4.9
 *
 * @param $uploads            array - Contains information related to the WordPress uploads path & URL
 * @param $articleData        array - Contains a list of data related to the post/user/taxonomy being imported
 * @param $current_xml_node   array - Contains a list of nodes within the current import record
 * @param $import_id          int   - Contains the ID of the import
 *
 * @return string
 */

add_filter('wp_all_import_images_uploads_dir', 'wpai_wp_all_import_images_uploads_dir', 10, 4);

function wpai_wp_all_import_images_uploads_dir($uploads, $articleData, $current_xml_node, $import_id){

    return $uploads;
}


// ----------------------------
// Example uses below
// ----------------------------


/**
 * Upload all images for the post to a folder called "customfolder"
 *
 */

function wpai_set_custom_upload_folder($uploads, $articleData, $current_xml_node, $import_id) {
	$uploads['path'] = $uploads['basedir'] . '/customfolder';
	$uploads['url'] = $uploads['baseurl'] . '/customfolder';    

	if (!file_exists($uploads['path'])) {
		mkdir($uploads['path'], 0755, true);
	}

	return $uploads;
}

add_filter('wp_all_import_images_uploads_dir', 'wpai_set_custom_upload_folder', 10, 4);

/**
 * Upload all images for the post to a folder based on the post date (in Y/m format)
 *
 * (e.g. if the post was published on June 1st 2017, its images would
 *  be uploaded to /wp-content/uploads/2017/06)
 *
 */
 
function wpai_set_upload_folder_by_post_date($uploads, $articleData, $current_xml_node, $import_id) {
	if ( ! empty($articleData['post_date'])) {
		$uploads['path'] = $uploads['basedir'] . '/' . date("Y/m", strtotime($articleData['post_date']));
		$uploads['url'] = $uploads['baseurl'] . '/' . date("Y/m", strtotime($articleData['post_date']));
		
		if (!file_exists($uploads['path'])) {
			mkdir($uploads['path'], 0755, true);
		}
	}
	return $uploads;
}

add_filter('wp_all_import_images_uploads_dir', 'wpai_set_upload_folder_by_post_date', 10, 4);
