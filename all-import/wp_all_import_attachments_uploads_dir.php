<?php
/**
 * =========================================
 * Filter: wp_all_import_attachments_uploads_dir
 * =========================================
 *
 * Can be used to set a custom path in which attachments are uploaded. Only applies to attachments uploaded via WP All Import.
 *
 * For importing images, please the documentation for the "wp_all_import_images_uploads_dir" filter.
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

add_filter('wp_all_import_attachments_uploads_dir', 'wpai_wp_all_import_attachments_uploads_dir', 10, 4);
function wpai_wp_all_import_attachments_uploads_dir($uploads, $articleData, $current_xml_node, $import_id){

	return $uploads;

}
