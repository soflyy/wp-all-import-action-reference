<?php
/**
 * ========================================
 * Filter: wp_all_import_is_post_to_create
 * ========================================
 *
 * Return a boolean indicating if the record should be imported. Note that
 * this is only for new posts. The "wp_all_import_is_post_to_update"
 * filter is for updating existing posts
 *
 * @param $data       array - An array holding values for the current record. If importing from
 *                                 XML, attributes can be accessed as SimpleXMLElement objects.
 * @param $import_id  int   - Import id. It can be used to make the code limited to a specific
 *                                 import only. 
 *
 * @return bool (true = create, false = skip)
 */
function my_is_post_to_create($data, $import_id)
{
    // your code here
    return true;
}

add_filter('wp_all_import_is_post_to_create', 'my_is_post_to_create', 10, 2);


// ----------------------------
// Example uses below
// ----------------------------


/**
 * Only allow creation of a new post if an existing custom field value
 * doesn't already exist.
 *
 * @param $data
 *
 * @return bool
 */
function create_only_if_unique_custom_field($data)
{
    $key_to_look_up = "my_custom_field"; // Change this to your custom field name
    $value_to_look_up = $data['num'];    // Change this to the column name

	$args = array (
		'post_type'         => array( 'post' ),
		'meta_query'        => array(
			array(
				'key'       => $key_to_look_up,
				'value'     => $value_to_look_up,
				'compare'   => '=',
			),
		),
	);

	$query = new WP_Query( $args );
	return !($query->have_posts());
}

add_filter('wp_all_import_is_post_to_create', 'create_only_if_unique_custom_field', 10, 2);



