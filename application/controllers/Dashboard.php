<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class dashboard extends CI_Controller {

    function __construct() {


        parent::__construct();

        $this->load->helper(array('form', 'url'));

        $this->load->library('session');

        $this->load->helper('date');
        $this->load->model('restaurant_model');
        $this->load->model('cuisine_type_model');
        $this->load->model('user_friend_list_model');
        $this->load->model('feeds_model');
        $this->load->model('feed_images_model');
        $this->load->model('feed_details_model');
        $this->load->model('user_preference_model');
        $this->load->model('user_selected_tags_model');
        $this->load->model('restaurant_search');
        $this->load->model('hb_countries_model');
    
    }

    function index() {

      if ($this->ion_auth->logged_in()) {  
        $data['folder_name'] = 'main';
        $data['file_name'] = 'index';
        $data['header_name'] = 'header_user';
        $data['nav_name'] = 'nav_main';
        //$data['restaurant'] = $this->restaurant_model->get_all_restaurant();
        $data['restaurants_places'] = $this->restaurant_model->get_restaurants();
        $data['categories'] = $this->cuisine_type_model->get_all();
        $data['user_id'] = $this->session->userdata('user_id');
        $data['user_data'] = $this->ion_auth->user()->row();
        $data['restaurant'] = $this->restaurant_model->get_featured_restaurant_location();
        $data['cusine_type'] = $this->restaurant_model->get_most_use_tags();
        $data['popular_restaurant'] = $this->restaurant_model->get_papular_restaurant_location();
        $data['popular_restaurants'] = $this->restaurant_model->get_popular_restaurants_location();
        $data['restaurants_places'] = $this->restaurant_model->get_restaurants();
        $data['user_reviews']= $this->restaurant_model->get_most_user_by_reviews();
        $data['all_countries'] = $this->hb_countries_model->get_all();
       
        $images = array();
        $data['session_id'] = $this->session->userdata('user_id');
        $user_id = $this->session->userdata('user_id');
        $friends_data = $this->user_friend_list_model->get_by_logged_id($user_id);

        if (!empty($friends_data)) {
            foreach ($friends_data as $row) {
                $follow_list[] = $row->friend_user_id;
            }

            $friends_list =implode(',',$follow_list);

        }else {
            $friends_list = '';
        }

        $data['feeds']= $this->feeds_model->get_all_feeds_by_firnd_ids($friends_list);

        for ($i = 0; $i < sizeof($data['feeds']); $i++) {
            $images[] = $this->feed_images_model->get_by_id($data['feeds'][$i]->id);
        }
        $data['feed_images'] = $images;


        $this->load->view('index', $data);

    } 
    else {
          redirect('login');
         }
         
    }

    public function profile() {
        
    if ($this->ion_auth->logged_in()) {        
        
        $data['folder_name'] = 'main';
        $data['file_name'] = 'profile';
        $data['header_name'] = 'header_user';
        $data['nav_name'] = 'nav_main';
        $this->load->model('user_preference_model');
        $pref_id = $this->session->userdata('user_id');
        $data['user_id'] = $pref_id;
        $data['user_preference_data']=$this->user_preference_model->get_by_id($pref_id);
        if ($this->input->post('form-profile')) {
            $id = $this->session->userdata('user_id');
            $data = $_POST;
            $this->ion_auth->update($id, $data);
            $this->session->set_flashdata('success', 'Data added');
            redirect('/dashboard/profile/');
        }
        $data['user_data'] = $this->ion_auth->user()->row();
        $this->load->view('index', $data);
        } 
        else {
            redirect('login');
        }
    }

    public function update_profile_pic() {

        $this->load->model('ion_auth_model');

        $user_id = $this->session->userdata('id');

        $upload_path = 'uploads/userimages/';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, TRUE);
        }
        if (!empty($_FILES['file']['name']) && $_FILES['file']['error'] == 0) {
            $type = explode(".", $_FILES['file']['name']);
            $_FILES['file']['name'] = $this->random_string() . "." . $type[1];
            move_uploaded_file($_FILES['file']['tmp_name'], $upload_path . $_FILES['file']['name']);
            $data['user_image_url'] = base_url() . $upload_path . $_FILES['file']['name'];
        }
        $this->ion_auth->update($user_id, $data);
    }

    public function random_string($length = 5) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

    public function user_like_feed(){

        if($this->input->post('feed_id')){

                if($this->input->post('feed_like')){
                    $feeds_like =  $this->input->post('feed_like');
                }else{
                    $feeds_like = '';
                }

                if($this->input->post('feed_tried')){
                    $feeds_tried =  $this->input->post('feed_tried');
                }else{
                    $feeds_tried = '';
                }

                if($this->input->post('feed_wish')){
                    $feeds_wish =  $this->input->post('feed_wish');
                }else{
                    $feeds_wish = '';
                }


            $feeds_id =  $this->input->post('feed_id');
            $user_id = $this->session->userdata('user_id');

            $this->load->model('feed_details_model');
            $feed_available = '';
            $feed_check = $this->feed_details_model->get_by_feed_id($feeds_id);
            if($feed_check != null) {

                $feed_available = $feed_check->feed_id;
                $feed_detail_id = $feed_check->id;

                if ($feed_check->like) {
                    if($feed_check->like == $feeds_like){
                        $feed_is_like = 0;
                    }else{
                        $feed_is_like = 1;
                    }

                } else {
                    $feed_is_like = $feeds_like;
                }

                if ($feed_check->tried) {
                    if($feed_check->tried == $feeds_tried){
                        $feed_is_tried = 0;
                    }else{
                        $feed_is_tried = 2;
                    }

                } else {
                    $feed_is_tried = $feeds_tried;
                }

                if ($feed_check->wish) {
                    if($feed_check->wish == $feeds_wish){
                        $feed_is_wish= 0;
                    }else{
                        $feed_is_wish = 3;
                    }

                } else {
                    $feed_is_wish = $feeds_wish;
                }
            }


            if($feed_available == $feeds_id){
                $data['feed_id'] = $feeds_id;
                $data['user_id'] = $user_id;
                $data['like'] = $feed_is_like;
                $data['tried'] = $feed_is_tried;
                $data['wish'] = $feed_is_wish;

                $this->feed_details_model->update($feed_detail_id,$data);
            }else{
                $data['feed_id'] = $feeds_id;
                $data['user_id'] = $user_id;
                $data['like'] = $feeds_like;
                $data['tried'] = $feeds_tried;
                $data['wish'] = $feeds_wish;
                $this->feed_details_model->create($data);
            }

            $socials_hits =  $this->feed_details_model->get_by_feed_id($feeds_id);

//         / print_r($socials_hits);
            echo json_encode($socials_hits);
        }



    }
    
    
   

}
