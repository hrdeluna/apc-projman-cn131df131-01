<?php
//******************************************************************
//This file was generated by Cobalt, a rapid application development 
//framework developed by JV Roig (jvroig@jvroig.com).
//
//Cobalt on the web: http://cobalt.jvroig.com
//******************************************************************
require 'path.php';
init_cobalt('View user passport groups');

$page_title       = 'ListView: User Passport Groups';
$db_subclass      = 'user_passport_groups';
$html_subclass    = 'user_passport_groups_html';
$arr_pkey_name = array('passport_group_id');
$results_per_page = LISTVIEW_RESULTS_PER_PAGE;

//user links / passport tags
$add_link         = 'Add user passport groups';
$edit_link        = 'Edit user passport groups';
$delete_link      = 'Delete user passport groups';
$view_link        = 'View user passport groups';

//pages - set to empty if you don't want to include them in the listview
$add_page         = 'add_user_passport_groups.php';
$edit_page        = 'edit_user_passport_groups.php';
$delete_page      = 'delete_user_passport_groups.php';
$view_page        = 'detailview_user_passport_groups.php';
$csv_page         = 'csv_user_passport_groups.php';
$report_page      = 'reporter_user_passport_groups.php';

//Extra entries under operations column (name of include file, not html code)
$operations_extra = '';

//Formatting and alignment options for data columns
$arr_formatting   = array();
$arr_alignment    = array();

require 'components/listview_proc_head.php';
require 'components/listview_proc_html.php';
require 'components/listview_proc_query.php';
require 'components/listview_body_head.php';
require 'components/listview_body_data.php';
require 'components/listview_body_end.php';
