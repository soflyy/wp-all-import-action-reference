#WP All Import/Export Action Reference

##WP-All-Import

### Before and after import
* [pmxi_before_xml_import](all-import/pmxi_before_xml_import.php) - Executed just before the import begins.
* [pmxi_after_xml_import](all-import/pmxi_after_xml_import.php) - Executed when the entire import completes.
* [wp_all_import_feed_type](all-import/wp_all_import_feed_type.php) - Determine the feed type.
* [wp_all_import_auto_create_csv_headers](all-import/wp_all_import_auto_create_csv_headers.php) - Decide whether to generate headers.
* [wp_all_import_is_check_duplicates](all-import/wp_all_import_is_check_duplicates.php) - Determine whether to check for duplicates during the import.

### Modifying post data during import
* [wpallimport_xml_row](all-import/wpallimport_xml_row.php) - Allows modification of each data record from the file before import.
* [pmxi_saved_post](all-import/pmxi_saved_post.php) - Invoked right after saving a post.
* [pmxi_after_post_import](all-import/pmxi_after_post_import.php) - Invoked after saving a post (??)
* [pmxi_article_data](all-import/pmxi_article_data.php) - Allows modifying the post body content before save.
* [pmxi_single_category](all-import/pmxi_single_category.php) - Can be used to determine which taxonomies are attached to post.
* [wp_all_import_set_post_terms](all-import/wp_all_import_set_post_terms.php) - Called when setting the post taxonomy terms.

### Custom fields (post meta)
* [pmxi_custom_field](all-import/pmxi_custom_field.php) - Custom field values can be modified *before* save using this hook.
* [pmxi_update_post_meta](all-import/pmxi_update_post_meta.php) - Called right *after* a custom field is saved. Use this if you need access to meta_id.

### Choosing which records to import/update
* [wp_all_import_specified_records](all-import/wp_all_import_specified_records.php) - Allows specifing a list/range of records to import.
* [wp_all_import_is_post_to_create](all-import/wp_all_import_is_post_to_create.php) - Indicate whether the post is to be created.
* [wp_all_import_is_post_to_update](all-import/wp_all_import_is_post_to_update.php) - Indicate whether the post is to be updated.
* [wp_all_import_is_post_to_delete](all-import/wp_all_import_is_post_to_delete.php) - Indicate whether the post is to be deleted.
* [wp_all_import_is_unlink_missing_posts](all-import/wp_all_import_is_unlink_missing_posts.php) - Indicate whether to terminate the relationship between post and import in database.

### Images and attachments
* [pmxi_attachment_uploaded](all-import/pmxi_attachment_uploaded.php) - Invoked right after an attachment was uploaded.
* [pmxi_gallery_image](all-import/pmxi_gallery_image.php) - Invoked right after an image was imported. Usefull if working with 3rd party plugins/themes that have a custom gallery format.
* [wp_all_import_image_filename](all-import/wp_all_import_image_filename.php) - Allows customizing the names of imported images.

### ACF Add-On
* [pmxi_acf_custom_field](all-import/pmxi_acf_custom_field.php) - Called for custom fields in the ACF add-on section.

### WooCommerce Add-On
* [wp_all_import_variation_taxonomies](all-import/wp_all_import_variation_taxonomies.php) - Used to add taxonomies to variations.
* [wp_all_import_variable_product_imported](all-import/wp_all_import_variable_product_imported.php) - Called when a normal variable product is imported.
* [pmxi_product_variation_saved](all-import/pmxi_product_variation_saved.php) - Called when a "Link all variations" variation is saved.


##WP-All-Export

### Misc
* [wp_all_export_csv_rows](all-export/wp_all_export_csv_rows.php) - Filter CSV rows to export.
* [wp_all_export_xml_rows](all-export/wp_all_export_xml_rows.php) - Filter XML rows to export.
* [wp_all_export_additional_data](all-export/wp_all_export_additional_data.php) - Create additional fields for export.
* [wp_all_export_export_file_name](all-export/wp_all_export_export_file_name.php) - Specify the export file name.
* [pmxe_after_export](all-export/pmxe_after_export.php) - Perform some action after the export is complete.
* [pmxe_woo_field](all-export/pmxe_woo_field.php) - Modify WooCommerce field data.
* [wp_all_export_is_csv_headers_enabled](all-export/wp_all_export_is_csv_headers_enabled.php) - Enable/disable headers.
* [wp_all_export_after_csv_line](all-export/wp_all_export_after_csv_line.php) - Add custom line ending.
* [wp_all_export_config_options](all-export/wp_all_export_config_options.php) - Change WP All Export configuration options.
* [wp_all_export_csv_headers](all-export/wp_all_export_csv_headers.php) - Modify the header/columns.
* [wp_all_export_zapier_response](all-export/wp_all_export_zapier_response.php) - Modify response to Zapier.
