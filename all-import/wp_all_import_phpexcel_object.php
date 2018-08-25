<?php
/**
 * =======================================
 * Filter: wp_all_import_phpexcel_object
 * =======================================
 *
 * Access/modify the PHPExcel object and file path for the import file.
 *
 *
 * @param $PHPExcel object      - The PHPExcel object.
 * @param $xlsFilePath          - The path to the Excel file.
 *
 */


add_filter( 'wp_all_import_phpexcel_object', 'wpai_wp_all_import_phpexcel_object', 10, 2 );

function wpai_wp_all_import_phpexcel_object( $PHPExcel, $xlsFilePath ) {
	return $PHPExcel;
}