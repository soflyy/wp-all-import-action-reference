<?php
/**
 * This fires just before a post is deleted.
 *
 * @param $ids array - A list of id's to be deleted.
 */
function wpai_pmxi_delete_post( $ids = array() ){
    foreach($ids as $pid){
        // do something with post using ID - $pid
    }
}
add_action('pmxi_delete_post', 'wpai_pmxi_delete_post', 10, 1);
