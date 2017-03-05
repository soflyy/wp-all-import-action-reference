<?php
/**
 * ==================================
 * Filter: wp_all_import_feed_type
 * ==================================
 *
 * Can be used to define the feed type.
 *
 * @param $type string 	- The feed type ( 'xml' or 'csv', for example )
 * @param $url string 	- The feed URL
 */

add_filter( 'wp_all_import_feed_type', 'wpai_feed_type', 10, 2 );

function wpai_feed_type( $type, $url ){
        // Check $url and return $type.
}

// ----------------------------
// Example uses below
// ----------------------------

/**
 * Define the type as XML.
 *
 *
 */
add_filter( 'wp_all_import_feed_type', 'wpai_feed_type', 10, 2 );

function wpai_feed_type( $type, $url ){
        if ($url == 'https://www.example.com/feedurl'){
                $type = 'xml';
        }
        return $type;
}