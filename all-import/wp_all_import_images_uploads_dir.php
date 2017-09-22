<?php
/**
 * =========================================
 * Filter: wp_all_import_images_uploads_dir
 * =========================================
 *
 * Can be used to set a custom path in which media is uploaded.
 *
 * @since 4.3
 *
 * @param $uploads
 * @param $articleData
 * @param $current_xml_node
 * @param $import_id
 *
 * @return string
 */

add_filter('wp_all_import_images_uploads_dir', 'wpai_wp_all_import_images_uploads_dir', 10, 4);

function wpai_wp_all_import_images_uploads_dir($uploads, $articleData, $current_xml_node, $import_id){

    return $uploads;
}


// ----------------------------
// Example uses below
// ----------------------------


add_filter('wp_all_import_images_uploads_dir', 'wpai_wp_all_import_images_uploads_dir', 10, 4);

function wpai_wp_all_import_images_uploads_dir($uploads, $articleData, $current_xml_node, $import_id){
    if ( ! empty($articleData['post_date'])){
        $uploads['path'] = $uploads['basedir'] . '/' . date("Y/m", strtotime($articleData['post_date']));
        $uploads['url'] = $uploads['baseurl'] . '/' . date("Y/m", strtotime($articleData['post_date']));
    }
    return $uploads;
}
