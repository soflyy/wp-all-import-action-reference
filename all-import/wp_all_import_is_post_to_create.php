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
 * @param $continue_import	bool - Default value true.
 * @param $data       		array - An array holding values for the current record. If importing from
 *                            XML, attributes can be accessed as SimpleXMLElement objects.
 * @param $import_id  		int   - Import id. It can be used to make the code limited to a specific import only.
 *  
 *
 * @return bool (true = create, false = skip)
 */
function my_is_post_to_create( $continue_import, $data, $import_id )
{
    // Unless you want this code to execute for every import, check the import id
    // if ($import_id === 5) { ... }
    return true;
}

add_filter('wp_all_import_is_post_to_create', 'my_is_post_to_create', 10, 3);


// ----------------------------
// Example uses below
// ----------------------------


/**
 * Only allow creation of a new post if an existing custom field value
 * doesn't already exist.
 */
function create_only_if_unique_custom_field( $continue_import, $data, $import_id )
{
    // Check for your import
    if ($import_id == 1) {
    	$key_to_look_up = "my_custom_field"; // Change this to your custom field name
    	$value_to_look_up = $data['num'];    // Change this to the column name
	$args = array (
		'post_type'         => array( 'post' ),
		'meta_query'        => array(array(
			'key'       => $key_to_look_up,
			'value'     => $value_to_look_up,
		)),
	);

	$query = new WP_Query( $args );
	return !($query->have_posts());
    }
    else {    
       return true;
    }
}

add_filter('wp_all_import_is_post_to_create', 'create_only_if_unique_custom_field', 10, 3);


/**
 * Compare a date from your import file to a date specified within the function
 * and only import posts if they are newer than the specified date
 */
function my_is_post_to_create( $continue_import, $data, $import_id ) {
    if ( $import_id == 3 ) { // Change this to the ID of your import
        $date_in_file = strtotime( $data['column_4'] ); // Change this to the column name
	$date = "2018-10-10"; // Change this to the date you want to import records from
        $current_date = strtotime($date);
        if ( $date_in_file >= $current_date ) {
            return true;
        } else {
            return false;
        }
    }
    return true;
}
add_filter('wp_all_import_is_post_to_create', 'my_is_post_to_create', 10, 3);
