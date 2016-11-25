<?php
/**
 * ==================================
 * Filter: wpallimport_xml_row
 * ==================================
 *
 * Allows reading or modification of the data record before importing
 *
 * Note that this isn't just for XML imports. Data records from other formats (CSV, JSON,
 * Excel) are converted to SimpleXML objects internally for processing.
 *
 * @param $xml_node SimpleXMLElement - An object holding values for the current record
 *
 * @return SimpleXMLElement
 */
function wpai_xml_row($xml_node)
{
    // Modify simpleXML object as needed
    return $xml_node;
}

add_filter('wpallimport_xml_row', 'wpai_xml_row', 10, 1);


// ----------------------------
// Example uses below
// ----------------------------


/**
 * Example of adding a child element called "title"
 *
 */
function add_title_node($node)
{
    $result = $node->xpath('//mydata[1]/*[1]');

    if (!empty($result[0])) {
        $name = $result[0]->getName();
        $node->addChild('title', $name);
    }

    return $node;
}

add_filter('wpallimport_xml_row', 'add_title_node', 10, 1);
