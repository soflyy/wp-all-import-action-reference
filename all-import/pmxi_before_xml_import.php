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

/**
 * ==================================
 * Action: pmxi_before_xml_import
 * ==================================
 *
 * @param $import_id int - The import in progress
 * This code can be used to prevent a blank file from deleting all records
 *
 */
add_action( 'pmxi_before_xml_import', 'wpai_pmxi_before_xml_import', 10, 1 );

function wpai_pmxi_before_xml_import( $importID ) { 
	$import = new PMXI_Import_Record(); 
	$import->getById($importID);	 
	if ( !$import->isEmpty() && $import->count < 100 ) { 
		$history_file = new PMXI_File_Record(); 
		$history_file->getBy( 'import_id', $importID ); 
		if ( !$history_file->isEmpty() ) {  
			$file_to_import = wp_all_import_get_absolute_path( $history_file->path );	  
			// here you can add you check to determine is file valid or not 
			if ( file_exists( $file_to_import ) and filesize( $file_to_import ) === 0 or $import->count < 100 ) { 
				// reset import data 
				$import->set( array( 
					'queue_chunk_number' => 0,
					'processing' => 0, 
					'imported' => 0, 
					'created' => 0, 
					'updated' => 0, 
					'skipped' => 0, 
					'deleted' => 0, 
					'triggered' => 0, 
					'executing' => 0	 
				))->update();  
				echo 'Import skipped because of empty file / < 100 records';  
				// stop import processing 
				die(); 
			}	 
		}	 
	} 
}
