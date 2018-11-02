<?php
/**
 * ===============================================================
 * Filter: wpai_wp_all_import_copy_uploaded_file_into_files_folder
 * ===============================================================
 *
 * Return a boolean indicating if the uploaded file should be copied to the /files directory.
 *
 * Requires WP All Import v4.5.6-beta-1.9+
 *
 * @return bool (true = copy, false = skip)
 */
 
function wpai_wp_all_import_copy_uploaded_file_into_files_folder() {
    return false;
}

add_filter('wp_all_import_copy_uploaded_file_into_files_folder', 'wpai_wp_all_import_copy_uploaded_file_into_files_folder', 10, 1);
