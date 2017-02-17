#WP All Import/Export Action Reference

##WP-All-Import

### Before and after import
* [pmxi_before_xml_import](all-import/pmxi_before_xml_import.php) - Executed just before the import begins.
* [pmxi_after_xml_import](all-import/pmxi_after_xml_import.php) - Executed when the entire import completes.

### Modifying post data during import
* [wpallimport_xml_row](all-import/wpallimport_xml_row.php) - Allows modification of each data record from the file before import.
* [pmxi_saved_post](all-import/pmxi_saved_post.php) - Invoked right after saving a post.
* [pmxi_after_post_import](all-import/pmxi_after_post_import.php) - Invoked after saving a post (??)
* [pmxi_article_data](all-import/pmxi_article_data.php) - Allows modifying the post body content before save.

### Custom fields (post meta)
* [pmxi_custom_field](all-import/pmxi_custom_field.php) - Custom field values can be modified *before* save using this hook.
* [pmxi_update_post_meta](all-import/pmxi_update_post_meta.php) - Called right *after* a custom field is saved. Use this if you need access to meta_id.

### Choosing which records to import/update
* [wp_all_import_specified_records](all-import/wp_all_import_specified_records.php) - Allows specifing a list/range of records to import.
* [wp_all_import_is_post_to_create](all-import/wp_all_import_is_post_to_create.php) - Indicate whether the post is to be created.
* [wp_all_import_is_post_to_update](all-import/wp_all_import_is_post_to_update.php) - Indicate whether the post is to be updated.
* [wp_all_import_is_post_to_delete](all-import/wp_all_import_is_post_to_delete.php) - Indicate whether the post is to be deleted.

### Images and attachments
* [pmxi_attachment_uploaded](all-import/pmxi_attachment_uploaded.php) - Invoked right after an attachment was uploaded.
* [pmxi_gallery_image](all-import/pmxi_gallery_image.php) - Invoked right after an image was imported. Usefull if working with 3rd party plugins/themes that have a custom gallery format.
* [wp_all_import_image_filename](all-import/wp_all_import_image_filename.php) - Allows customizing the names of imported images.


##WP-All-Export

### Misc
* [wp_all_export_csv_rows](all-export/wp_all_export_csv_rows.php) - Filter CSV rows to export.
* [wp_all_export_xml_rows](all-export/wp_all_export_xml_rows.php) - Filter XML rows to export.
* [wp_all_export_additional_data](all-export/wp_all_export_additional_data.php) - Create additional fields for export.
* [wp_all_export_export_file_name](all-export/wp_all_export_export_file_name.php) - Specify the export file name.
* [pmxe_after_export](all-export/pmxe_after_export.php) - Perform some action after the export is complete.
* [wp_all_export_implode_delimiter](all-export/wp_all_export_implode_delimiter.php) - Modify the implode delimiter for export fields.

