<?php
/**
 * ===========================================================
 * Filter: wp_all_import_copy_uploaded_file_into_files_folder
 * ===========================================================
 *
 * In case of TRUE value WP All Import will copy uploaded XML files into /wp-content/uploads/wpallimport/files folder.
 *
 * @param $copy_uploaded_files
 *
 * @return bool
 */
function wpai_wp_all_import_copy_uploaded_file_into_files_folder($copy_uploaded_files) {
    return $copy_uploaded_files;
}

add_filter('wp_all_import_copy_uploaded_file_into_files_folder', 'wpai_wp_all_import_copy_uploaded_file_into_files_folder', 10, 1);
