<?php
/**
 * ==================================
 * Action: pmxi_update_post_meta
 * ==================================
 *
 * This hook is called after WP All Import creates/updates a post meta (a.k.a
 * custom field)
 *
 * @param $post_id int    - The id of the post just created/updated
 * @param $key     string - The custom field key
 * @param $value   mixed  - The custom field value
 */
function my_update_post_meta($post_id, $key, $value)
{


}

add_action('pmxi_update_post_meta', 'my_update_post_meta', 10, 3);


// ----------------------------
// Example uses below
// ----------------------------


// To do.
