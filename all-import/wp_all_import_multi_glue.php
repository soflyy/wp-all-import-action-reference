<?php
/**
 * =======================================
 * Filter: wp_all_import_multi_glue
 * =======================================
 *
 * Change the delimiter used when querying multiple values with XPath. 
 * 
 * For example, {image} could return: image1, image2, image3. If you want to change it to "image1|image2|image3", you can use this hook.
 *
 *
 * @param $delimiter string    - The delimiter.
 *
 */


add_filter( 'wp_all_import_multi_glue', 'wpai_wp_all_import_multi_glue', 10, 1 );
function wpai_wp_all_import_multi_glue( $delimiter ) {
   return $delimiter;
}


 //
 // Example: Change commas to pipes.
 //

 add_filter( 'wp_all_import_multi_glue', 'wpai_wp_all_import_multi_glue', 10, 1 );
 function wpai_wp_all_import_multi_glue( $delimiter ) {
    return "|";
 }