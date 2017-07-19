<?php
/**
 * ==============================================
 * Filter: wp_all_export_product_variation_mode
 * ==============================================
 * Choose whether to export parent products or just variations.
 *
 * Available in WP All Export Pro v1.4.7-Beta-1.35 and higher
 *
 * @param $exportVariationMode
 * @param $exportID  int
 *
 */
 
// Stop parent products from exporting for all exports

add_filter('wp_all_export_product_variation_mode', 'export_only_variations', 10, 2);

function export_only_variations($exportVariationMode, $exportID){
	return XmlExportEngine::VARIABLE_PRODUCTS_EXPORT_VARIATION; // Only export variations for variable products, don't export the parent products
}

// Stop parent products from exporting for specific export

add_filter('wp_all_export_product_variation_mode', 'export_only_variations_for_specific_export', 10, 2);

function export_only_variations_for_specific_export($exportVariationMode, $exportID){
	if($exportID && $exportID == 4) {
		return XmlExportEngine::VARIABLE_PRODUCTS_EXPORT_VARIATION; // Only export variations for variable products, don't export the parent products
	} else {
		return $exportVariationMode;
	}
}
