<?php
/**
 * ==================================
 * Action: pmxi_attachment_uploaded
 * ==================================
 *
 * This hook is called after WP All Import creates/updates post attachment file(s).
 * See also pmxi_gallery_image
 *
 * @param $post_id int    - The id of the post just created/updated
 * @param $att_id  int    - The attachment id
 * @param $file    string - The local file path to the attachment
 */
function my_attachment_uploaded($post_id, $att_id, $file)
{


}

add_action('pmxi_attachment_uploaded', 'my_attachment_uploaded', 10, 3);


/**
* Add attachment file extension
*/
function wpai_pmxi_attachment_uploaded( $pid, $attach_id, $attachment_file ) {
	$new_file = $attachment_file . '.pdf';
	if ( rename($attachment_file, $new_file) )
	{
		wp_update_post(array(
			'ID' => $attach_id,			
			'post_mime_type' => 'application/pdf'
		));					
		update_attached_file($attach_id,$new_file);		
	}	
}
add_action('pmxi_attachment_uploaded', 'wpai_pmxi_attachment_uploaded', 10, 3);
