<?php
/**
 * ==================================
 * Action: pmxi_after_xml_import
 * ==================================
 *
 * Called after an import is complete.
 * Useful for any cleanup or other task that needs to be performed after an import.
 * For hooks to execute after a post is saved see pmxi_after_post_import & pmxi_saved_post
 *
 * @param $import_id int - The import in progress
 */
function after_xml_import($import_id)
{
    // Unless you want this code to execute for every import, check the import id
    // if ($import_id == 5) { ... }
}

add_action('pmxi_after_xml_import', 'after_xml_import', 10, 1);


// ----------------------------
// Example uses below
// ----------------------------

/**
 * Find the import file after the import completes.
 *
 *
 */
add_action( 'pmxi_after_xml_import', 'after_xml_import', 10, 1 );

function after_xml_import( $import_id ) {
    $file = new PMXI_File_Record();
    $file->getBy( array('import_id' => $import_id), 'id DESC' );
    $local_path = ( ! $file->isEmpty() ) ? wp_all_import_get_absolute_path($file->path) : false;
    if ( ! empty($local_path)) {                                                           
        if ( @file_exists($local_path) ){
            // Do something with the file $local_path
        }
    }
}