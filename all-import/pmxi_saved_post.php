<?php
/**
 * ==================================
 * Action: pmxi_saved_post
 * ==================================
 *
 * Called after a post is created/updated by WP All Import.
 *
 * @param $post_id int               - The id of the post just created/updated
 * @param $xml_node SimpleXMLElement - An object holding values for the current record
 *
 */
function my_saved_post($post_id, $xml_node)
{
    /*
     * Here you can use standard WordPress functions like get_post_meta() and get_post() to
     * retrieve data, make changes and then save them with update_post() and/or update_post_meta()
     *
     * There are two ways to access the data from the current record in your import file:
     *
     * 1) Custom fields. For example, you could import a value to a custom field called "_temp" and
     *  then retrieve it here. Since it's only temporary, you'd probably want to delete it immediately:
     *
     *     $my_value = get_post_meta($post_id, "_temp", true);
     *     delete_post_meta($post_id,"_temp");
     *
     * 2) The $xml param (a SimpleXMLElement object). This can be complex to work with if you're not
     * used to iterators and/or xpath syntax. It's usually easiest to convert it a nested array using:
     *
     *     $record = json_decode(json_encode((array) $xml_node), 1);
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


//=========================================================================================================


/**
 * Append data to any field using a temporary custom field. Works with core post fields
 * like post_title and custom fields like _my_custom_field
 *
 * TODO: There is no check to make sure the data isn't appended over and over on each run.
 *
 * http://imgur.com/a/q6Uxh
 *
 */
add_action('pmxi_saved_post', function ($id) {
    $values = get_post_meta($id, '_append_to', true);
	if (!is_array($values)) return;
	$post = get_post($id);
	foreach ($values as $key => $value) {
		if (strpos($key, "post_") === 0) $post->{$key} .= $value;
        else update_post_meta($id, $key, get_post_meta($id, $key, true) . $value);
	}
	wp_update_post($post);
    delete_post_meta($id, '_append_to');
}, 10, 1);


