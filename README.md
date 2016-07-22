#WP All Import & WP All Export API 

##WP-All-Import API

### Before import
#####pmxi_before_xml_import
* Executed just before the import begins.
[Details](all-import/pmxi_before_xml_import.php)

#####wpallimport_xml_row
* Allows modification of each data record from the file before import.
[Details](all-import/wpallimport_xml_row.php)

### After import
#####pmxi_saved_post
* Invoked right after saving a post.
[Details](all-import/pmxi_saved_post.php)

#####pmxi_after_post_import
* Invoked after saving a post (??)
[Details](all-import/pmxi_after_post_import.php)

#####pmxi_after_xml_import
* Executed when the entire import completes.
[Details](all-import/pmxi_after_xml_import.php)

### Custom fields (post meta)
#####pmxi_custom_field
* Custom field values can be modified *before* save using this hook.
[Details](all-import/pmxi_custom_field.php)
 
#####pmxi_update_post_meta
* Called right *after* a custom field is saved. Use this if you need access to meta_id.
[Details](all-import/pmxi_update_post_meta.php)

### Choosing which records to import
#####wp_all_import_is_post_to_create
* Indicate whether the post is to be created.
[Details](all-import/wp_all_import_is_post_to_create.php)

#####wp_all_import_is_post_to_update
* Indicate whether the post is to be updated.
[Details](all-import/wp_all_import_is_post_to_update.php)

#####wp_all_import_is_post_to_delete
* Indicate whether the post is to be deleted.
[Details](all-import/wp_all_import_is_post_to_delete.php)

#####wp_all_import_specified_records
* Allows specifing a list/range of records to import.
[Details](all-import/wp_all_import_specified_records.php)

### Images and attachments
#####pmxi_attachment_uploaded
* Invoked right after an attachment was uploaded.
[Details](all-import/pmxi_attachment_uploaded.php)

#####pmxi_gallery_image
* Invoked right after an image was imported. Usefull if working with 3rd party plugins/themes that have a custom gallery format.
[Details](all-import/pmxi_gallery_image.php)

#####wp_all_import_image_filename
* Allows customizing the names of imported images.
[Details](all-import/wp_all_import_image_filename.php)

### Other
#####pmxi_article_data
* Allows modifying the post body content before save.
[Details](all-import/pmxi_article_data.php)

---
##WP-All-Export API

### Misc
#####wp_all_export_csv_rows
* Filter CSV rows to export.
[Details](all-export/wp_all_export_csv_rows.php)

#####wp_all_export_xml_rows
* Filter XML rows to export.
[Details](all-export/wp_all_export_xml_rows.php)

#####wp_all_export_additional_data
* Create additional fields for export.
[Details](all-export/wp_all_export_additional_data.php)
