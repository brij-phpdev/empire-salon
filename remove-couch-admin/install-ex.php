<?php
if ( !defined('K_INSTALLATION_IN_PROGRESS') ) die(); // cannot be loaded directly

/* _couch_templates (id, description, title, k_order, custom_params, deleted, , , , , , , , , , , , , , , , ) */
$k_stmt_pre = "INSERT INTO ".K_TBL_TEMPLATES." VALUES ";

/* _couch_fields (id, name, k_type, data, validator_msg, custom_toolbar, collapsed, no_xss_check, class, , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , ) */
$k_stmt_pre = "INSERT INTO ".K_TBL_FIELDS." VALUES ";

/* _couch_pages (id, parent_id, creation_date, is_master, nested_parent_id, pointer_link_detail, file_meta, , , , , , , , , , , , , , , , , , , , , , , , ) */
$k_stmt_pre = "INSERT INTO ".K_TBL_PAGES." VALUES ";

/* _couch_folders (id, template_id, k_desc, , , , , , ) */
$k_stmt_pre = "INSERT INTO ".K_TBL_FOLDERS." VALUES ";

/* _couch_data_text (page_id, value, , ) */
$k_stmt_pre = "INSERT INTO ".K_TBL_DATA_TEXT." VALUES ";

/* _couch_data_numeric (page_id, value, ) */
$k_stmt_pre = "INSERT INTO ".K_TBL_DATA_NUMERIC." VALUES ";

/* _couch_fulltext (page_id, content, ) */
$k_stmt_pre = "INSERT INTO ".K_TBL_FULLTEXT." VALUES ";

/* _couch_comments (id, page_id, email, data, , , , , , , ) */
$k_stmt_pre = "INSERT INTO ".K_TBL_COMMENTS." VALUES ";

/* _couch_relations (pid, cid, , ) */
$k_stmt_pre = "INSERT INTO ".K_TBL_RELATIONS." VALUES ";

/* _couch_sub_templates (template_id, field_id, , , ) */
$k_stmt_pre = "INSERT INTO ".K_TBL_SUB_TEMPLATES." VALUES ";
