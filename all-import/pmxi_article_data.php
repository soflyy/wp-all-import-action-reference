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
 * @param $articleData          array  - TODO: Verify ... New content is in $articleData['post_content']
 * @param $import               object - TODO: Verify
 * @param $post_to_update       object - Current content is in $post_to_update->post_content
 * @param $current_xml_node     object - Current XML node
 *
 * @return mixed
 */
function my_pmxi_article_data($articleData, $import, $post_to_update, $current_xml_node)
{
    // Add new content to the top of old content
    // $articleData['post_content'] .= $post_to_update->post_content;

    return $articleData;
}

add_filter('pmxi_article_data', 'my_pmxi_article_data', 10, 4);
