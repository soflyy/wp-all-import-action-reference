<?php
/**
 * ==================================
 * Action: pmxi_before_xml_import
 * ==================================
 *
 * @param $import_id int - The import in progress
 *
 */
function wp_all_import_before_xml_import($import_id)
{
    // Unless you want this code to execute for every import, check the import id
    // if ($import_id === 5) { ... }
}

add_action('pmxi_before_xml_import', 'wp_all_import_before_xml_import', 10, 1);

// ----------------------------
// Example uses below
// ----------------------------

/**
 * Example: Validate XML row.
 *
 */
add_action('pmxi_before_xml_import', 'wpai_pmxi_before_xml_import', 10, 1);
function wpai_pmxi_before_xml_import($import_id){
        $import = new PMXI_Import_Record();
        $import->getById($import_id);                                       
        if ( ! $import->isEmpty() ){
                $file = new PMXI_File_Record();
                $file->getBy( array('import_id' => $import_id), 'id DESC' );
                $local_path = ( ! $file->isEmpty() ) ? wp_all_import_get_absolute_path($file->path) : false;

                if ( ! empty($local_path)) {                                                           

                        if ( @file_exists($local_path) ){                                                                               

                                $chunk = new PMXI_Chunk($local_path, array('element' => $import->root_element, 'encoding' => 'UTF-8') );

                            while ($xml = $chunk->read()) {

                                if ( ! empty($xml) ) { 

                                        $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>" . "\n" . $xml;

                                        $simpleXml = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
   
                                        // validate XML row using SimpleXMLElement object                                       

                                }
                            }
                        }                       
                }
        }
}