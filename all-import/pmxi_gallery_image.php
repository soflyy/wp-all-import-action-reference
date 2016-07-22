<?php
/**
 * ==================================
 * Action: pmxi_gallery_image
 * ==================================
 * This is called for images imported via the default image field and ACF image fields.
 *
 * This is usually used when a plugin/theme uses a special custom field to store
 * the image gallery information
 *
 * @param $post_id The id of the post just created/updated
 * @param $att_id  The attachment id of the image
 * @param $file    The local file path to the full size image
 */
function my_gallery_image($post_id, $att_id, $file)
{


}

add_action('pmxi_gallery_image', 'my_gallery_image', 10, 3);


// ----------------------------
// Example uses below
// ----------------------------


/**
 * For image galleries with the format:
 *
 * array (
 *   image_id_1 => "image_url_1",
 *   image_id_2 => "image_url_2",
 *   ...
 * );
 *
 */
function gallery_id_url($post_id, $att_id, $filepath, $is_keep_existing_images)
{
    $key = '_gallery';  // Edit this: Set meta key for gallery array here
    $size = 'full';     // Edit this: Set WordPress image size for the URL here (e.g. "full" or "thumb")

    $gallery = get_post_meta($post_id, $key, TRUE);
    if (empty($gallery)) {
        $gallery = array();
    }

    if (!isset($gallery[$att_id])) {
        $src = wp_get_attachment_image_src($att_id, $size);
        $gallery[$att_id] = $src[0];
        update_post_meta($post_id, $key, $gallery);
    }
}

add_action('pmxi_gallery_image', 'gallery_id_url', 10, 4);

/**
 * For image galleries with the format:
 *
 * array (
 *   0 => image_id_1,
 *   1 => image_id_2,
 *   ...
 * );
 *
 */
function gallery_n_id($post_id, $att_id, $filepath, $is_keep_existing_images)
{
    $key = '_gallery';  // Edit this: Set meta key for gallery array here

    $gallery = get_post_meta($post_id, $key, TRUE);
    if (empty($gallery)) {
        $gallery = array();
    }

    if (!in_array($att_id, $gallery)) {
        $gallery[] = $att_id;
        update_post_meta($post_id, $key, $gallery);
    }
}

add_action('pmxi_gallery_image', 'gallery_n_id', 10, 4);


/**
 * For image galleries where each image id is saved as an individual post meta value with the same key (ie. No arrays)
 *
 */
function gallery_meta_id($post_id, $att_id, $filepath, $is_keep_existing_images)
{
    $key = '_gallery'; // Edit this: Set meta key for gallery array here

    $result = get_post_meta($post_id, $key, FALSE);
    if (is_array($result)) {
        if (!in_array($att_id, $result)) {
            add_post_meta($post_id, $key, $att_id);
        }
    }
}

add_action('pmxi_gallery_image', 'gallery_meta_id', 10, 4);


/**
 * For galleries where image id's are saved as a single string
 * with a comma or other separators:
 *
 * "23,25,31"
 *
 */
function gallery_ids_in_string($post_id, $att_id, $filepath, $is_keep_existing_images)
{
    $key = '_gallery'; // Edit this: Set meta key for gallery array here
    $separator = ",";

    $gallery = get_post_meta($post_id, $key, true);
    if (is_string($gallery) || is_empty($gallery) || ($gallery == false)) {
        $gallery = explode($separator, $gallery);
        if (!in_array($att_id, $gallery)) {
            if ($gallery[0] == '') unset($gallery[0]);
            $gallery[] = $att_id;
            update_post_meta($post_id, $key, implode($separator, $gallery));
        }
    }
}

add_action('pmxi_gallery_image', 'gallery_ids_in_string', 10, 4);


