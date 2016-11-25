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



// ----------------------------
// Example uses below
// ----------------------------

// To do.


