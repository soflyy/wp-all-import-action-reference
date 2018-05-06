<?php
/**
 * =====================================
 * Filter: wp_all_import_image_filename
 * =====================================
 *
 * Can be used to set a custom filename for an imported image.
 *
 * Will be called for regular image imports and ACF images (see notes
 * about alt/SEO fields).
 *
 * @since 4.3
 *
 * @param $filename    string - The filename as created by the import
 * @param $img_title   string - From "SEO and advanced options". Will always be blank for ACF fields.
 * @param $img_caption string - From "SEO and advanced options". Will always be blank for ACF fields.
 * @param $img_alt     string - From "SEO and advanced options". Will always be blank for ACF fields.
 * @param $article     string
 *
 * @return string
 */
function wpai_image_filename($filename, $img_title, $img_caption, $img_alt, $article)
{
    // Your code
    return $filename;
}

add_filter('wp_all_import_image_filename', 'wpai_image_filename', 10, 5);


// ----------------------------
// Example uses below
// ----------------------------

/**
 * Allows you to base the image name off the alt text. Useful when the image name
 * generated is not unique for each image (uses "example.com/image?id=x" or similar format)
 *
 * Won't work for ACF images since you cant import alt text (etc) with them.
 *
 */
function image_name_from_alt($filename, $img_title, $img_caption, $img_alt, $article)
{
    if (!empty($img_alt)) {
        $filename = sanitize_file_name($img_alt) . '.jpg';
    }
    return $filename;
}

add_filter('wp_all_import_image_filename', 'image_name_from_alt', 10, 5);

/**
 * Allows you to base the image name off the URL hash. Useful when the image name
 * generated is not unique for each image (uses "example.com/image?id=x" or similar format)
 *
 * For this to work, put the entire image URL in the img alt text field.
 *
 */
function image_name_from_hash($filename, $img_title, $img_caption, $img_alt, $article)
{
    if (!empty($img_alt)) {
        $filename = substr(md5($img_alt), 0, 8) . ".jpg";
    }
    return $filename;
}

add_filter('wp_all_import_image_filename', 'image_name_from_hash', 10, 5);
