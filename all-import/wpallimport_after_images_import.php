<?php
/**
 * ==========================================
 * Action: wpallimport_after_images_import
 * ==========================================
 *
 * Called after the images section of the import is processed, but only when the "Keep images currently in Media Library" option is enabled.
 *
 * @param $post_id int                  - The id of the post just created/updated
 * @param $gallery_attachment_ids array - An array of the images that were imported to the post
 * @param $missing_images               - An array of the images that were missing, based on previous imports
 *
 */

 function soflyy_img_import( $post_id, $gallery_attachment_ids, $missing_images ) {
	// do something
}

add_action( 'wpallimport_after_images_import', 'soflyy_img_import', 10, 3 );