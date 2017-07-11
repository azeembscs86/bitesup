<?php

if (!function_exists('get_levels')) {

    function get_levels() {
        $CI = & get_instance();
        return $CI->db->where('id !=', -1)->get('levels')->result_array();
    }

}

if (!function_exists('get_level_id')) {

    function get_level_id($level) {
        $CI = & get_instance();
        $rs = $CI->db->select('id')->where('name', $level)->get('levels')->result_array();
        if ($rs) {
            return $rs[0]['id'];
        }
        return 0;
    }

}

if (!function_exists('_convert_into_dropdown_options')) {

    function _convert_into_dropdown_options($data, $def = '', $array = true, $empty = false) {
        $options['def'] = $def;
        if ($empty)
            $options['lists']['-1'] = $def;
        if(empty($data)):
            $options['lists']['-1'] = '';
        endif;
        
        if ($array) {
            foreach ($data as $d):
                if ($d['name'] == $def || $d['id'] == $def) {
                    $options['def'] = $d['id'];
                }
                $options['lists'][$d['id']] = $d['name'];
            endforeach;
        } else {
            foreach ($data as $d):
                if ($d->name == $def || $d->id == $def)
                    $options['def'] = $d->id;
                $options['lists'][$d->id] = $d->name;
            endforeach;
        }
        return $options;
    }

}

if (!function_exists('_get_customer_list')) {

    function _get_customer_list() {
        $CI = & get_instance();
        $CI->load->model('customers_model');
        $a = convert_into_dropdown_options($CI->customers_model->getCustomersList(), '', false, true);
        _pr($a);
    }

}

if (!function_exists('get_allowed_extention')) {

    function get_allowed_extention() {
        return 'gif|jpg|png|pdf|docx|XPS';
    }

}

if (!function_exists('_do_upload')) {

    function _do_upload($path) {
        $CI = & get_instance();
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png|pdf|docx|xps';
        $config['max_size'] = '3048';
        $config['max_width'] = '3024';
        $config['max_height'] = '3024';

        $CI->load->library('upload', $config);

        if (!$CI->upload->do_upload()) {
            $error = array('error' => $CI->upload->display_errors());
            _pr($error, 1);
        } else {
            $data = $CI->upload->data();
            return $data['file_name'];
        }
        return FALSE;
    }

}

if (!function_exists('_add_ban_condition')) {

    function _add_ban_condition($table = 'au') {
        $CI = & get_instance();
        $CI->db->where($table . '.banned !=', 1);
    }

}

if (!function_exists('_add_soft_delete_condition')) {

    function _add_soft_delete_condition($table) {
        $CI = & get_instance();
        $CI->db->where($table . '.deleted !=', 1);
    }

}

if (!function_exists('_check_unique_column')) {

    function _check_unique_column($table, $column, $value, $update_id = false) {
        $CI = & get_instance();
        if ($update_id)
            $CI->db->where('id !=', $update_id);
        return $CI->db->where('deleted !=',1)->where($column, $value)->count_all_results($table);
    }

}
if (!function_exists('_limit_text')) {
    function _limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '...';
      }
      return $text;
    }
}
if (!function_exists('_remove_last_word')) {
    function _remove_last_word($text) {
        $temp_array = explode(" ",$text);
        $temp_array[count($temp_array)-2]='';
        $text =implode(' ',$temp_array);
        
      
      return $text;
    }
}

if (!function_exists('_display_job_cities')) {
    function _display_job_cities($job_cities = array(),$all_cities =array()) {
//        pr($job_cities);
//            pr($all_cities,1);
        if(sizeof($job_cities) >0 && sizeof($all_cities) >0){
            
            $return_string = "";
            foreach($job_cities as $job_city){                
                foreach($all_cities as $city){
                    if($city->city_id == $job_city['city_id']){
                        $return_string .= $city->city_name.' ,';
                        
                        break;
                    }
                }
            }
            
            $return_string = rtrim($return_string, ",");
            
            return $return_string;
        }else{
            return "";
        }
    }
}

