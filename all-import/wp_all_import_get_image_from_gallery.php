<?php
/**
 * =============================================
 * Action: wp_all_import_get_image_from_gallery
 * =============================================
 *
 * Called after an existing image is found in the Media Library. Only works with the "Use images currently in Media Library" and "Use images currently uploaded in wp-content/uploads/wpallimport/files/" options.
 *
 * @param $attach object                    - The existing image object that will be attached.
 * @param $image_name string array          - The image name that will be imported.
 * @param $targetDir                        - The directory that the image will be uploaded to.
 *
 */

add_filter('wp_all_import_get_image_from_gallery', 'wpai_wp_all_import_get_image_from_gallery', 10, 3);

function wpai_wp_all_import_get_image_from_gallery( $attach, $image_name, $targetDir ){
	/** 
	* do something with found attachment
	*/
	return $attach; // if attach === false the image will be downloaded 
}