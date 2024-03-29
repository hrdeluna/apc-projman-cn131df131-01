<?php
//****************************************************************************************
//Generated by Cobalt, a rapid application development framework. http://cobalt.jvroig.com
//Cobalt developed by JV Roig (jvroig@jvroig.com)
//****************************************************************************************
require 'path.php';
init_cobalt('Edit validate');

if(isset($_GET['validate_id']))
{
    $validate_id = urldecode($_GET['validate_id']);
    require 'form_data_validate.php';

}

if(xsrf_guard())
{
    init_var($_POST['btn_cancel']);
    init_var($_POST['btn_submit']);
    require 'components/query_string_standard.php';
    require 'subclasses/validate.php';
    $dbh_validate = new validate;

    $object_name = 'dbh_validate';
    require 'components/create_form_data.php';

    extract($arr_form_data);

    if($_POST['btn_cancel'])
    {
        log_action('Pressed cancel button');
        redirect("listview_validate.php?$query_string");
    }

    $file_upload_control_name = 'proof_of_id';
    require 'components/upload_generic.php';
    $file_upload_control_name = 'proof_of_address';
    require 'components/upload_generic.php';

    if($_POST['btn_submit'])
    {
        log_action('Pressed submit button');

        $message .= $dbh_validate->sanitize($arr_form_data)->lst_error;
        extract($arr_form_data);

        if($dbh_validate->check_uniqueness_for_editing($arr_form_data)->is_unique)
        {
            //Good, no duplicate in database
        }
        else
        {
            $message = "Record already exists with the same primary identifiers!";
        }

        if($message=="")
        {
            $dbh_validate->edit($arr_form_data);


            redirect("listview_validate.php?$query_string");
        }
    }
}
require 'subclasses/validate_html.php';
$html = new validate_html;
$html->draw_header('Edit Validate', $message, $message_type, TRUE, TRUE);
$html->draw_listview_referrer_info($filter_field_used, $filter_used, $page_from, $filter_sort_asc, $filter_sort_desc);
$html->draw_hidden('validate_id');

$html->draw_controls('edit');

$html->draw_footer();