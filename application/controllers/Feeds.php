<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Feeds extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->lang->load('auth');
        $this->load->model('restaurant_model');
        $this->load->model('restaurant_selected_tags_model');
    }

    public function index() {
        
    if ($this->ion_auth->logged_in()) {     
        
        $data['folder_name'] = 'main';
        $data['header_name'] = 'header_user';
        $data['nav_name'] = 'nav_main';
        $data['file_name'] = 'feeds_listing';
        $this->load->model('feeds_model');
        $this->load->model('feed_images_model');
        $images = array();
        $data['user_data'] = $this->ion_auth->user()->row();
        $data['user_id']= $data['user_data']->id;
        //print_r($data['user_id']); exit; 
        
//        $country_name= $this->get_country_by_ip();
//        $country_id=$this->hb_countries_model->getCountryByName($country_name);
        $data['feeds'] = $this->feeds_model->get_all_feeeds($data['user_data']->id);
        $data['most_used_tags'] =$this->restaurant_selected_tags_model->get_most_use_tags(); //For sidebar
        $data['user_reviews']= $this->restaurant_model->get_most_user_by_reviews(); //For sidebar
        $data['popular_restaurant'] = $this->restaurant_model->get_papular_restaurant_location(); //For Sidebar 


        for ($i = 0; $i < sizeof($data['feeds']); $i++) {
            $images[] = $this->feed_images_model->get_by_id($data['feeds'][$i]->id);
        }
        $data['feed_images'] = $images;

        $this->load->view('index', $data);
        } else {
            redirect('login');
        }
    }

    function edit_feeds() {

        $data['folder_name'] = 'main';
        $data['header_name'] = 'header_user';
        $data['nav_name'] = 'nav_main';
        $data['file_name'] = 'edit_feeds';
        $feed_id = $this->uri->segment(3);
        $this->load->model('feeds_model');
        $this->load->model('feed_images_model');
        $this->load->model('restaurant_menu_items_model');
        $data['feeds'] = $this->feeds_model->get_by_id($feed_id);
        $rest_data = $this->feeds_model->get_by_id($feed_id);

        $restaurant_branch_id = $rest_data->branch_id;

        $data['items'] = $this->restaurant_menu_items_model->get_branch_items_by_id($restaurant_branch_id);

        $data['feed_images'] = $this->feed_images_model->get_by_id($feed_id);
       // $data['items']= $this->feeds_model->get_items_data($feed_id);




        if ($this->input->post('edit_image')) {
            $image_id = $this->input->post('id');
            $upload_path = 'uploads/userimages/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, TRUE);
            }
            if (!empty($_FILES['image_url']['name']) && $_FILES['image_url']['error'] == 0) {
                $type = explode(".", $_FILES['image_url']['name']);
                $_FILES['image_url']['name'] = $this->random_string() . "." . $type[1];
                move_uploaded_file($_FILES['image_url']['tmp_name'], $upload_path . $_FILES['image_url']['name']);
                $data['image_url'] = base_url() . $upload_path . $_FILES['image_url']['name'];
                $data['feed_id'] = $feed_id;
                $this->feed_images_model->update($image_id, $data);
                redirect('feeds/edit_feeds/' . $feed_id . '');
            }
        } elseif ($this->input->post('form-edit_feed')) {
            $data = $_POST;

            //$place = $this->input->post('place');
            //$tags_desc = $this->input->post('desc');
            //$tags=$this->getHashtags($tags_desc);
            // $restaurant_id = $this->restaurant_model->get_place_id($place);
            $user_ids = $this->ion_auth->user()->row();
            $data['user_id'] = $user_ids->id;
             $this->feeds_model->update($feed_id,$data);
            redirect('feeds');
            
        }
        $lat = $this->input->post('lat');
        $lng = $this->input->post('lng');
        $lat = !empty($lat) && is_numeric($lat) ? $lat : 'NULL';
        $lng = !empty($lng) && is_numeric($lng) ? $lng : 'NULL';
        if (!empty($lat) && !empty($lng)) {
            $this->load->model('restaurant_branches_model');
            $near_branches = $this->restaurant_branches_model->get_near_branches($lat, $lng);
            $data['near_branches'] = $near_branches;

        }
        $data['user_data'] = $this->ion_auth->user()->row();

        $this->load->view('index', $data);
    }

    function feed_detail() {
      if ($this->ion_auth->logged_in()) {     
        $data['folder_name'] = 'main';
        $data['header_name'] = 'header_user';
        $data['nav_name'] = 'nav_main';
        $data['file_name'] = 'feed_detail';
        $feed_id = $this->uri->segment(3);
        $this->load->model('feeds_model');
        $this->load->model('feed_images_model');
        $data['feeds'] = $this->feeds_model->get_by_id($feed_id);
        $data['feed_images'] = $this->feed_images_model->get_by_id($feed_id);
        $data['user_data'] = $this->ion_auth->user()->row();
        $data['user_id'] =$this->ion_auth->user()->row()->id;       
        $this->load->view('index', $data);
    } else {
            redirect('login');
        }
    }
    
    
      function delete_feed() {
        $feed_id = $this->uri->segment(3);
        $this->load->model('feeds_model');
        $this->load->model('feed_images_model');
        $this->load->model('feed_tags_model');
        $this->feeds_model->delete($feed_id);
        $this->feed_images_model->delete($feed_id);
        $this->feed_tags_model->delete($feed_id);
        redirect('feeds');
    }

    public function getHashtags($string) {
        $hashtags = FALSE;
        preg_match_all("/(#\w+)/u", $string, $matches);
        if ($matches) {
            $hashtagsArray = array_count_values($matches[0]);
            $hashtags = array_keys($hashtagsArray);
        }
        return $hashtags;
    }

    public function add_feed() {
        $data['folder_name'] = 'main';
        $data['header_name'] = 'header_user';
        $data['nav_name'] = 'nav_main';
        $data['file_name'] = 'add_feed';
        $this->load->model('feeds_model');
        $this->load->model('feed_tags_model');
        $this->load->model('restaurant_model');
        $this->load->model('feed_images_model');
        $this->load->model('restaurant_branches_model');
        if ($this->input->post('form-add_feed')) {
            $data = $_POST;

            $place = $this->input->post('place');
            $tags_desc = $this->input->post('desc');
            $tags=$this->getHashtags($tags_desc);
            $restaurant_id = $this->restaurant_model->get_place_id($place);
            $user_ids = $this->ion_auth->user()->row();
            $data['user_id'] = $user_ids->id;
            $data['restaurant_id'] = $restaurant_id->id;


            if (!empty($restaurant_id->id)) {
                $feed_id = $this->feeds_model->create_with_rest_id($data, $restaurant_id->id);
                foreach ($tags as $row) {
                    $this->feed_tags_model->create_with_rest_id($row, $restaurant_id->id, $feed_id);
                }
            } else {
                $feed_id = $this->feeds_model->create($data);
                foreach ($tags as $row) {
                    $this->feed_tags_model->create($row, $feed_id);
                }
            }
            $upload_path = 'uploads/userimages/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, TRUE);
            }
            //$upload_path = 'uploads/userimages/';
            for ($i = 0; $i < sizeof($_FILES['file']['name']); $i++) {
                if (!empty($_FILES['file']['name'][$i]) && $_FILES['file']['error'][$i] == 0) {

                    $type = explode(".", $_FILES['file']['name'][$i]);
                    $_FILES['file']['name'][$i] = $this->random_string() . "." . $type[1];
                    move_uploaded_file($_FILES['file']['tmp_name'][$i], $upload_path . $_FILES['file']['name'][$i]);
                    $images['image_url'] = base_url() . $upload_path . $_FILES['file']['name'][$i];
                    $images['feed_id'] = $feed_id;
                    $this->feed_images_model->create($images);
                }
            }
            redirect('feeds');
        }

        $lat = $this->input->post('lat');
        $lng = $this->input->post('lng');
        $lat = !empty($lat) && is_numeric($lat) ? $lat : 'NULL';
        $lng = !empty($lng) && is_numeric($lng) ? $lng : 'NULL';
        if (!empty($lat) && !empty($lng)) {
            $this->load->model('restaurant_branches_model');
            $near_branches = $this->restaurant_branches_model->get_near_branches($lat, $lng);
            $data['near_branches'] = $near_branches;

        }

        $data['user_data'] = $this->ion_auth->user()->row();
        $this->load->view('index', $data);
    }

    public function profile_Setting() {
        $this->load->model('user_preference_model');
        $id = $this->session->userdata('user_id');
        $data = $_POST;
        $user_profile=$this->user_preference_model->get_profile_setting($id);
        if($user_profile)
        {
          $this->user_preference_model->update($id, $data);
        } else {
            $this->user_preference_model->created_user_profile($id, $data);
        }
        
    }

    public function get_restaurants() {
        $this->load->model('restaurant_model');
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->restaurant_model->get_restaurant($q);
        }
    }

    public function random_string($length = 5) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

    public function get_branch_item(){
//        $this->output->enable_profiler(TRUE);

        $this->load->model('restaurant_menu_items_model');
        $branch_id = $this->input->post('branches_id');
        $items = $this->restaurant_menu_items_model->get_branch_items_by_id($branch_id);


        $html = '';

        if($items){

            foreach ($items as $item){

                $html .= '<option value="' .$item->id . '"> ' . $item->name . '</option>';
            }
        }
        echo $html;


    }

    public function delete_magazine_type(){

        $id = $this->uri->segment(3);
        $feed_id = $this->uri->segment(4);
        $this->load->model('feed_images_model');
        $this->feed_images_model->delete_image($id);
        redirect('feeds/edit_feeds/'.$feed_id);

    }

}
?>


