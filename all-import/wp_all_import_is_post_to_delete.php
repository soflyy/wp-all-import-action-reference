<?php
/**
 * =======================================
 * Filter: wp_all_import_is_post_to_delete
 * =======================================
 *
 * Return a boolean indicating if the existing record should be deleted.
 *
 * @param $is_post_to_delete boolean    - An integer indicating if the post is slated for deletion (1=true, 0=false)
 * @param $post_id           int        - Post id
 * @param $import            object     - Import object
 *
 * @return bool (true = delete, false = skip)
 */
function my_is_post_to_delete($is_post_to_delete, $post_id, $import)
{
    // Unless you want this code to execute for every import, check the import id    
    // if ((int) $import->id === 5) { ... }
    return true;
}

add_filter('wp_all_import_is_post_to_delete', 'my_is_post_to_delete', 10, 3);


// ----------------------------
// Example uses below
// ----------------------------


/**
 * Example: Delete based on post meta value
 *
 */
function is_post_to_delete_on_meta($is_post_to_delete, $pid, $import)
{
    return ($var = get_post_meta($pid, 'do_not_delete', true)) ? false : true;
}

add_filter('wp_all_import_is_post_to_delete', 'is_post_to_delete_on_meta', 10, 3);


/**
 * Example: Delete orphaned variations
 *
 */
function is_post_to_delete_orphans($to_delete, $pid, $import)
{
    if ($import->options['custom_type'] == 'product') {
        $post_to_delete = get_post($pid);
        switch ($post_to_delete->post_type) {
            case 'product':
                $to_delete = true;
                break;
            case 'product_variation':
                $parent_product = get_post($post_to_delete->post_parent);
                // delete variation only when parent product doesn't exist
                $to_delete = empty($parent_product) ? true : false;
                break;
        }
    }
    return $to_delete;
}

add_filter('wp_all_import_is_post_to_delete', 'is_post_to_delete_orphans', 11, 3);

/**
 * Example: Send posts to trash, instead of deleting them
 *
 */
function import_send_removed_to_trash($is_post_to_delete, $pid, $import) {
	wp_update_post(
		array(
			'ID'    =>  $pid,
			'post_status'   =>  'trash'
		)
	);
}
add_filter('wp_all_import_is_post_to_delete', 'import_send_removed_to_trash', 10, 3);
