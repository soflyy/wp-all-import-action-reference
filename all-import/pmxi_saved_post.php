<?php
/**
 * ==================================
 * Action: pmxi_saved_post
 * ==================================
 *
 * Called after a post is created/updated by WP All Import.
 *
 * @param $post_id The id of the post just created/updated
 * @param $xml     SimpleXMLElement representing current record in file
 *
 */
function my_saved_post($post_id, $xml)
{
    /*
     * Here you can use standard WordPress functions like get_post_meta() and get_post()
     * to retrieve the data, make your changes and then use update_post(),
     * and/or update_post() to save them.
     *
     * Tip: If you need to pass data to this function you can use custom fields. For example,
     * you could import a value to a field called "_temp" and then retrieve it here:
     *
     *     $value = get_post_meta($post_id, "_temp");
     *
     * You probably want to delete it before exiting this function:
     *
     *     delete_post_meta($post_id,"_temp");
     *
     */
}

add_action('pmxi_saved_post', 'my_saved_post', 10, 2);


// ----------------------------
// Example uses below
// ----------------------------

/**
 * Append data to a custom field. Requires importing the data to be appended into
 * a temporary custom field in the import.
 *
 * @param $id
 */
function custom_field_append($id)
{
    $value = get_post_meta($id, 'your_meta_key', true);
    $temp = get_post_meta($id, '_temp', true);
    update_post_meta($id, 'your_meta_key', $value . $temp);
    delete_post_meta($id, '_temp');
}

add_action('pmxi_saved_post', 'custom_field_append', 10, 1);


/**
 * Conditionally update a custom field based on the value of a different field.
 *
 * @param $id
 */
function conditional_update($id)
{
    $check = get_post_meta($id, '_my_update_check', true);

    if ($check === 'yes') {
        $new_value = get_post_meta($id, '_my_new_value', true);
        update_post_meta($id, '_my_new_value', $new_value);
    }
}

add_action('pmxi_saved_post', 'conditional_update', 10, 1);
