<?php
/**
 * ==================================
 * Filter: pmxi_custom_field
 * ==================================
 *
 * Custom field values can be filtered before save using this hook.
 *
 * @param $value              string - The new custom field value from the data file
 * @param $post_id            int    - The id of the post
 * @param $key                string - The custom field key
 * @param $existing_meta      array  - An array of all the existing meta values. 
 *                                     Use $existing_meta[$key][0] to read the current value for $key.
 * @param $import_id          int    - The id of the import
 *
 * @return mixed
 */
function my_custom_field($value, $post_id, $key, $existing_meta, $import_id)
{
    // Unless you want this code to execute for every import, check the import id
    // if ($import_id === 5) { ... }

    return $value;
}

add_filter('pmxi_custom_field', 'my_custom_field', 10, 5);


// ----------------------------
// Example uses below
// ----------------------------


/**
 * Only update the custom field if the new value is not empty
 * This code has only been lightly tested/reviewed and is not guaranteed to be completely bug free. Backup first!
 */
function keep_existing_if_empty($value, $post_id, $key, $existing_meta, $import_id)
{
    if ($import_id == 5) { // ENTER THE IMPORT ID HERE
        if ($key == 'ENTER-YOUR-CUSTOM-FIELD-NAME-HERE') {
            if (empty($value)) {
                $value = isset($existing_meta[$key][0]) ? $existing_meta[$key][0] : $value;
            }
        }
    }
    return $value;
}
add_filter('pmxi_custom_field', 'keep_existing_if_empty', 10, 5);



/**
 * Only update the custom field if it's currently empty
 * This code has only been lightly tested/reviewed and is not guaranteed to be completely bug free. Backup first!
 */
function update_existing_if_empty($value, $post_id, $key, $existing_meta, $import_id) 
{
    if ($import_id == 5) { // ENTER THE IMPORT ID HERE
        if ($key == 'ENTER-YOUR-CUSTOM-FIELD-NAME-HERE') {
            if (!isset($existing_meta[$key][0]) || empty($existing_meta[$key][0])) {
                $value = $existing_meta[$key][0];
            }
        }
    }
    return $value;
}

add_filter('pmxi_custom_field', 'update_existing_if_empty', 10, 5);
