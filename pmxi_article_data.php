<?php
/**
 * ==================================
 * Filter: pmxi_article_data
 * ==================================
 *
 * Append content to existing post body.
 *
 * This filter works only when 'Choose which data to update' options is chosen in import settings.
 *
 * @param $articleData    New content is in $articleData['post_content']
 * @param $import         Import object
 * @param $post_to_update Current content is in $post_to_update->post_content 
 *
 * @return mixed
 */
function my_pmxi_article_data($articleData, $import, $post_to_update)
{
    // Add new content to the top of old content
    // $articleData['post_content'] .= $post_to_update->post_content;;

    return $articleData;
}

add_filter('pmxi_article_data', 'my_pmxi_article_data', 10, 3);


// ----------------------------
// Example uses below
// ----------------------------
