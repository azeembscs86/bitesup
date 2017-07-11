<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('pr')) {

    function pr($data, $id = null) {
        echo "<pre>";
        print_r($data);
        echo "</pre> <br/>";
        if ($id != null) {
            die();
        }
    }

}

if (!function_exists('_last_query')) {

    function _last_query($id = null) {
        $CI = & get_instance();
        pr($CI->db->last_query(), $id);
    }

}


if (!function_exists('_get_engineer_file_to_display')) {

    function _get_engineer_file_to_display($json) {
        $reutrn = '';
        if (!empty($json)) {
            if (isJSON($json)) {
                $files = json_decode($json);
                foreach ($files as $file):
                    $reutrn .= anchor(base_url('assets/uploads/engineer/' . $file->file), $file->name,array('target'=>'_blank')) . ', ';
                endforeach;
            }
        }
        return $reutrn;
    }

}

function isJSON($string) {
    return is_string($string) && is_array(json_decode($string)) ? true : false;
}