<?php
/**
 * This fires just before a post is deleted.
 *
 * @param int $pid - post ID
 * @param PMXI_Import_Record $import - import object
 */
function wpai_pmxi_before_delete_post( $pid, $import ){

}
add_action('pmxi_before_delete_post', 'wpai_pmxi_before_delete_post', 10, 2);
