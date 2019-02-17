# WP All Import/Export Action Reference

This GitHub repo serves as documentation for WP All Import and WP All Export's actions. For support, questions, concerns, or anything else, please submit a support request: http://www.wpallimport.com/support/

#### __Note: Check "Issues" for latest undocumented hooks.__

## WP-All-Import

### Before and after import
* [pmxi_before_xml_import](all-import/pmxi_before_xml_import.php) - Executed just before the import begins.
* [pmxi_after_xml_import](all-import/pmxi_after_xml_import.php) - Executed when the entire import completes.
* [wp_all_import_auto_create_csv_headers](all-import/wp_all_import_auto_create_csv_headers.php) - Auto generate headers, or use header in file.
* [wp_all_import_feed_type](all-import/wp_all_import_feed_type.php) - Can be used to define the feed type.
* [wp_all_import_is_check_duplicates](all-import/wp_all_import_is_check_duplicates.php) - Turn duplicate checking on/off.
* [wp_all_import_is_unlink_missing_posts](all-import/wp_all_import_is_unlink_missing_posts.php) - Used to completely remove the relationship between import and post from pmxi_posts database table.
* [wp_all_import_skip_x_csv_rows](all-import/wp_all_import_skip_x_csv_rows.php) - Specifies the amount of rows to be skipped.
* [wp_all_import_curl_download_only](all-import/wp_all_import_curl_download_only.php) - Force WP All Import to download the feed on the first request.

### Modifying post data during import
* [wpallimport_xml_row](all-import/wpallimport_xml_row.php) - Allows modification of each data record from the file before import.
* [pmxi_saved_post](all-import/pmxi_saved_post.php) - Invoked right after saving a post.
* [wp_all_import_variable_product_imported](all-import/wp_all_import_variable_product_imported.php) - Called when WP All Import saves a variable product.
* [wp_all_import_variation_taxonomies](all-import/wp_all_import_variation_taxonomies.php) - Can be used to add taxonomies to WooCommerce product variations.
* [pmxi_after_post_import](all-import/pmxi_after_post_import.php) - Invoked after saving a post (??)
* [pmxi_article_data](all-import/pmxi_article_data.php) - Allows modifying the post body content before save.
* [pmxi_delete_post](all-import/pmxi_delete_post.php) - Triggered before posts are deleted.
* [pmxi_product_variation_saved](all-import/pmxi_product_variation_saved.php) - Called when WP All Import saves a variable product with the "Link all variations" option selected.
* [wp_all_import_make_product_simple](all-import/wp_all_import_make_product_simple.php) - Called after a product is converted into a Simple product by our WooCommerce Add-On, due to a lack of variations.
* [pmxi_single_category](all-import/pmxi_single_category.php) -
* [wp_all_import_set_post_terms](all-import/wp_all_import_set_post_terms.php) - Called when WP All Import is setting the post taxonomy terms.
* [wp_all_import_multi_glue](all-import/wp_all_import_multi_glue.php) - Change the delimiter that's used when querying multiple values with XPath.
* [wp_all_import_phpexcel_object](all-import/wp_all_import_phpexcel_object) - Access/modify the import PHPExcel object.

### Custom fields (post meta)
* [pmxi_custom_field](all-import/pmxi_custom_field.php) - Custom field values can be modified *before* save using this hook.
* [pmxi_update_post_meta](all-import/pmxi_update_post_meta.php) - Called right *after* a custom field is saved. Use this if you need access to meta_id.
* [pmxi_acf_custom_field](all-import/pmxi_acf_custom_field.php) - Filter for "Advanced Custom Field" values.

### Choosing which records to import/update
* [wp_all_import_specified_records](all-import/wp_all_import_specified_records.php) - Allows specifing a list/range of records to import.
* [wp_all_import_is_post_to_create](all-import/wp_all_import_is_post_to_create.php) - Indicate whether the post is to be created.
* [wp_all_import_is_post_to_update](all-import/wp_all_import_is_post_to_update.php) - Indicate whether the post is to be updated.
* [wp_all_import_is_post_to_delete](all-import/wp_all_import_is_post_to_delete.php) - Indicate whether the post is to be deleted.

### Images and attachments
* [pmxi_attachment_uploaded](all-import/pmxi_attachment_uploaded.php) - Invoked right after an attachment was uploaded.
* [pmxi_gallery_image](all-import/pmxi_gallery_image.php) - Invoked right after an image was imported. Usefull if working with 3rd party plugins/themes that have a custom gallery format.
* [wp_all_import_image_filename](all-import/wp_all_import_image_filename.php) - Allows customizing the names of imported images.
* [wp_all_import_images_uploads_dir](all-import/wp_all_import_images_uploads_dir.php) - Allows customizing the path in which images & ACF field uploads are uploaded.
* [wp_all_import_attachments_uploads_dir](all-import/wp_all_import_attachments_uploads_dir.php) - Allows customizing the path in which attachments are uploaded.
* [wp_all_import_handle_upload](all-import/wp_all_import_handle_upload.php) - Filters the data array for attachments & images uploaded through WP All Import.
* [wpallimport_after_images_import](all-import/wpallimport_after_images_import.php) - Called after images are imported, but only when "Keep images currently in Media Library" is enabled.
* [wp_all_import_get_image_from_gallery](all-import/wp_all_import_get_image_from_gallery.php) - Called after an existing image is found in the Media Library. Doesn't work with "Download images hosted elsewhere".
* [wp_all_import_search_image_by_wp_attached_file](all-import/wp_all_import_search_image_by_wp_attached_file.php) - Can be used to stop WP All Import from looking for existing images via _wp_attached_file.


## WP-All-Export

### Modifying post data during export
* [pmxe_exported_post](all-export/pmxe_exported_post.php) - Invoked right after exporting a post.

### Modify exported data rows
* [wp_all_export_csv_rows](all-export/wp_all_export_csv_rows.php) - Filter CSV rows to export.
* [wp_all_export_xml_rows](all-export/wp_all_export_xml_rows.php) - Filter XML rows to export.
* [wp_all_export_after_csv_line](all-export/wp_all_export_after_csv_line.php) - Filters CSV lines.
* [pmxe_woo_field](all-export/pmxe_woo_field.php) - Filters WooCommerce fields.
* [wp_all_export_order_item](all-export/wp_all_export_order_item.php) - Filters WooCommerce Order Items.
* [wp_all_export_implode_delimiter](all-export/wp_all_export_implode_delimiter.php) - Modify the implode delimiter for export fields.

### Modify name or format of export file
* [wp_all_export_additional_data](all-export/wp_all_export_additional_data.php) - Create additional XML nodes for export
* [wp_all_export_is_csv_headers_enabled](all-export/wp_all_export_is_csv_headers_enabled.php) - Can be used to completely remove the CSV header.
* [wp_all_export_export_file_name](all-export/wp_all_export_export_file_name.php) - Specify the export file name.
* [wp_all_export_csv_headers](all-export/wp_all_export_csv_headers.php) - Manipulate export file headers.
* [wp_all_export_pre_csv_headers](all-export/wp_all_export_pre_csv_headers.php) - Allows for CSV headers to be added above the default headers.

### WooCommerce
* [wp_all_export_raw_prices](all-export/wp_all_export_raw_prices.php) - Can be used to disable price formatting for WooCommerce exports.

### ACF
* [wp_all_export_repeater_delimiter](all-export/wp_all_export_repeater_delimiter.php) - Define the delimiter used for ACF Repeater fields.

### Misc
* [wp_all_export_config_options](all-export/wp_all_export_config_options.php) - Set export options
* [wp_all_export_product_variation_mode](all-export/wp_all_export_product_variation_mode.php) - Choose whether to export parent products or just variations.
* [pmxe_before_export](all-export/pmxe_before_export.php) - Perform some action before the export starts.
* [pmxe_after_export](all-export/pmxe_after_export.php) - Perform some action after the export is complete.
* [wp_all_export_generate_bundle](all-export/wp_all_export_generate_bundle.php) - Determine whether the bundle file should be generated.
* [wp_all_export_zapier_response](all-export/wp_all_export_zapier_response.php) -
* [wp_all_export_use_csv_compliant_line_endings](all-export/wp_all_export_use_csv_compliant_line_endings.php) - Use custom CSV writer when affected by https://bugs.php.net/bug.php?id=43225.
* [pmxe_after_iteration](all-export/pmxe_after_iteration.php) - Runs after each cron processing iteration finishes.
