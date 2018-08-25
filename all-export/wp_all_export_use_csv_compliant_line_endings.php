<?php
/**
 * =====================================================
 * Filter: wp_all_export_use_csv_compliant_line_endings
 * =====================================================
 *
 * Use custom CSV writer when affected by https://bugs.php.net/bug.php?id=43225
 *
 *
 * @param $use_compliant_endings  bool - Return true to use CSV compliant endings. Default false.
 */
 
// ----------------------------
// Example use below
// ----------------------------

add_filter( 'wp_all_export_csv_strategy', function( $csvStrategy ){
	return \Wpae\Csv\CsvWriter::CSV_STRATEGY_CUSTOM;
}, 10, 1 );

add_filter( 'wp_all_export_use_csv_compliant_line_endings', function( $useCsvCompliantLineEndings ){
	return true;
}, 10, 1 );