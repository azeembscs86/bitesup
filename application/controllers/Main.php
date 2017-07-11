<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class main extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('restaurant_model');
        $this->load->model('cuisine_type_model');
        $this->load->model('user_preference_model');
        $this->load->model('user_selected_tags_model');
        $this->load->model('restaurant_search');
        $this->load->model('hb_countries_model');
        $this->load->model('user_friend_list_model');
        $this->load->model('feeds_model');
        $this->load->model('feed_images_model');
        $this->load->model('feed_details_model');
        $this->load->library('session');
        $this->load->model('restaurant_selected_tags_model');
        $this->load->model('user_friend_list_model');
        $this->load->model('services_model');
        
        
    }

    public function index() {        
        
        
        $data['folder_name'] = 'main';
        $data['file_name'] = 'index';
        $data['nav_name'] = 'nav_main';
        //$data['restaurant'] = $this->restaurant_model->get_all_restaurant();
        $data['restaurant'] = $this->restaurant_model->get_all_popular_restaurant();
        $data['featured_restaurant'] = $this->restaurant_model->get_featured_restaurant_location();
        $data['cusine_type'] = $this->restaurant_model->get_most_use_tags();
        $data['popular_restaurant'] = $this->restaurant_model->get_papular_restaurant_location();
        $data['popular_restaurants'] = $this->restaurant_model->get_popular_restaurants_location();
        $data['restaurants_places'] = $this->restaurant_model->get_restaurants();
        $data['user_reviews']= $this->restaurant_model->get_most_user_by_reviews();
        $data['all_countries'] = $this->hb_countries_model->get_all();
        //$data['categories'] = $this->cuisine_type_model->get_all();
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
            redirect('dashboard');
        } else {
            $data['header_name'] = 'header';
        }
        $this->load->view('index', $data);
    }

    
    public function category_restaurant()
    {
         $category_id = $this->uri->segment(3);
         if(empty($category_id))
         {
             redirect('main');
         }
        $data['folder_name'] = 'main';
        $data['file_name'] = 'restaurant_categories';
        $data['nav_name'] = 'nav_main';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
            redirect('dashboard');
        } else {
            $data['header_name'] = 'header';
        }
        $data['category_id'] = $category_id;
        $data['cusine_type'] = $this->restaurant_model->get_most_use_tags();
        $data['popular_restaurant'] = $this->restaurant_model->get_papular_restaurant_location();
        $data['popular_restaurants'] = $this->restaurant_model->get_popular_restaurants_location();
        $data['restaurants_places'] = $this->restaurant_model->get_restaurants();
        $data['user_reviews']= $this->restaurant_model->get_most_user_by_reviews();
        $this->load->view('index', $data,FALSE);
    }
    
    
    public function load_more_category_restaurant()
    {
        $category_id = $this->input->post('category_id');
        $item_per_page = 9;
        $page_number = filter_var($this->input->post('page'), FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
        if(!is_numeric($page_number)){
            redirect('main');
	}
        $position = (($page_number-1) * $item_per_page);
        $all_content = $this->restaurant_model->get_restaurant_by_cusine_type($category_id,$position,$item_per_page);
        $data['all_content']=$all_content;
        $this->load->view('utility/category_restaurant', $data, FALSE);
    }
    
    
    public function list_category_restaurant()
    {
        $category_id = $this->uri->segment(3);
         if(empty($category_id))
         {
             redirect('main');
         }
        $data['folder_name'] = 'main';
        $data['file_name'] = 'list_restaurant_categories';
        $data['nav_name'] = 'nav_main';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
            redirect('dashboard');
        } else {
            $data['header_name'] = 'header';
        }
         $data['category_id'] = $category_id;
        $data['cusine_type'] = $this->restaurant_model->get_most_use_tags();
        $data['popular_restaurant'] = $this->restaurant_model->get_papular_restaurant_location();
        $data['popular_restaurants'] = $this->restaurant_model->get_popular_restaurants_location();
        $data['restaurants_places'] = $this->restaurant_model->get_restaurants();
        $data['user_reviews']= $this->restaurant_model->get_most_user_by_reviews();
        $this->load->view('index', $data,FALSE);
    }
    
    public function load_list_more_category_restaurant()
    {
        $category_id = $this->input->post('category_id');
        $item_per_page = 9;
        $page_number = filter_var($this->input->post('page'), FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
        if(!is_numeric($page_number)){
            redirect('main');
	}
        $position = (($page_number-1) * $item_per_page);
        $all_content = $this->restaurant_model->get_restaurant_by_cusine_type($category_id,$position,$item_per_page);
        $data['all_content']=$all_content;
        $this->load->view('utility/category_list_restaurant', $data, FALSE);
    }
    
    
    public function register() {
        $data['folder_name'] = 'main';
        $data['header_name'] = 'header';
        $data['nav_name'] = 'nav_main';
        $data['file_name'] = 'register';       
        if ($this->input->post('register_user')) {
            $this->load->model('ion_auth_model');
            $data = $_POST;
            $data['user_type_id'] = '2';
            $email = strtolower($this->input->post('email'));
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if ($this->ion_auth->email_check(strtolower($this->input->post('email')))) {
                $this->session->set_flashdata('error', "Email already exists");
                redirect('main/register');
            }
            if ($this->ion_auth->username_check(strtolower($this->input->post('username')))) {
                $this->session->set_flashdata('error', "Username already exists");
                redirect('main/register');
            }
            $upload_path = 'uploads/userimages/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, TRUE);
            }
            if (!empty($_FILES['user_image']['name']) && $_FILES['user_image']['error'] == 0) {
                $type = explode(".", $_FILES['user_image']['name']);
                $_FILES['user_image']['name'] = $this->random_string() . "." . $type[1];
                move_uploaded_file($_FILES['user_image']['tmp_name'], $upload_path . $_FILES['user_image']['name']);
                $data['user_image_url'] = base_url() . $upload_path . $_FILES['user_image']['name'];
            }
            $upload_path2 = 'uploads/coverimages/';
            if (!is_dir($upload_path2)) {
                mkdir($upload_path2, 0777, TRUE);
            }
            if (!empty($_FILES['cover_image']['name']) && $_FILES['cover_image']['error'] == 0) {
                $type = explode(".", $_FILES['cover_image']['name']);
                $_FILES['cover_image']['name'] = $this->random_string() . "." . $type[1];
                move_uploaded_file($_FILES['cover_image']['tmp_name'], $upload_path2 . $_FILES['cover_image']['name']);
                $data['cover_image_url'] = base_url() . $upload_path2 . $_FILES['cover_image']['name'];


            }
            $data['is_block'] = '0';
            $data['date_created'] = date('y-m-d h:i:s');
            $register_id = $this->ion_auth->register($username, $password, $email, $data, array('2'));
            $tags = $this->input->post('tags');
            $exp_tags = explode(',', $tags);
            foreach ($exp_tags as $row) {
                $this->user_selected_tags_model->create($register_id, $row);
            }
            $this->user_preference_model->create($register_id);
            $errors_array = $this->ion_auth->errors_array();
            $messages_array = $this->ion_auth->messages_array();
            if (!empty($errors_array[0])) {
                $this->session->set_flashdata('error', $errors_array[0]);
            } elseif (!empty($messages_array[0])) {
                $this->session->set_flashdata('message', "Signed Up successfully please verify your account through link sent to your email address");
            }
            redirect('login');
        }
        $this->load->view('index', $data);
    }

    public function requests() {
        if ($this->ion_auth->logged_in()) {
        $data['folder_name'] = 'main';
        $data['file_name'] = 'requests';
        $data['header_name'] = 'header_user';
        $data['nav_name'] = 'nav_main';
        $this->load->model('user_friend_request_model');
        $id = $this->session->userdata('user_id');
        $data['user_id'] = $this->session->userdata('user_id');
        $data['session_id'] = $this->session->userdata('user_id');
        $data['user_data'] = $this->ion_auth->user()->row();
        $data['requests_user'] = $this->user_friend_request_model->get_friend_request($id);
        
        $data['most_used_tags'] =$this->restaurant_selected_tags_model->get_most_use_tags(); //For sidebar
        $data['user_reviews']= $this->restaurant_model->get_most_user_by_reviews(); //For sidebar
        $data['popular_restaurant'] = $this->restaurant_model->get_papular_restaurant_location(); //For Sidebar
        
        $this->load->view('index', $data); 
            
        } else {
           redirect('login');
        }       
    }

    public function users() {
        
    if ($this->ion_auth->logged_in()) {
          
        $data['folder_name'] = 'main';
        $data['file_name'] = 'users';
        $data['header_name'] = 'header_user';
        $data['nav_name'] = 'nav_main';
        $this->load->model('user_friend_list_model');
        $this->load->model('user_friend_request_model');
        $user_id = $this->session->userdata('user_id');
        $data['user_id'] = $this->session->userdata('user_id');
        $data['session_id'] = $this->session->userdata('user_id');
        $friends_request_data = $this->user_friend_request_model->get_by_logged_id($user_id);
        if (!empty($friends_request_data)) {
            foreach ($friends_request_data as $row) {
                $request_list[] = $row->friend_request_id;
            }
            $data['request_list'] = $request_list;
        } else {
            $data['request_list'] = '';
        }
        $friends_data = $this->user_friend_list_model->get_by_logged_id($user_id);
        if (!empty($friends_data)) {
            foreach ($friends_data as $row) {
                $follow_list[] = $row->friend_user_id;
            }
            $data['follow_list'] = $follow_list;
        } else {
            $data['follow_list'] = '';
        }
        $data['users_data'] = $this->ion_auth->users()->result();
        $data['user_data'] = $this->ion_auth->user()->row();
        
        $data['most_used_tags'] =$this->restaurant_selected_tags_model->get_most_use_tags(); //For sidebar
        $data['user_reviews']= $this->restaurant_model->get_most_user_by_reviews(); //For sidebar
        $data['popular_restaurant'] = $this->restaurant_model->get_papular_restaurant_location(); //For Sidebar
        

        $this->load->view('index', $data);
    } else {
           redirect('login');
        } 
        
        }
    

    public function user_detail() {
        $data['folder_name'] = 'main';
       
        $data['nav_name'] = 'nav_main';
        $this->load->model('user_preference_model');
        $this->load->model('user_friend_request_model');
        $this->load->model('user_friend_list_model');
        $user_id = $this->uri->segment(3);
        $id = $this->session->userdata('user_id');
        $user_profile_setting = $this->user_preference_model->get_profile_setting($user_id);
        $friends_request_data = $this->user_friend_request_model->get_friend_list($user_id, $id);
        $data['user_comments'] = $this->restaurant_model->count_user_comments($user_id);
        $data['user_bookmars'] = $this->restaurant_model->count_user_bookmarks($user_id);
        $data['user_profile_visit'] = $this->restaurant_model->count_profile_visit($user_id);
        $data['user_profile_share'] = $this->restaurant_model->count_user_profile_share($user_id);
        $data['user_fav_restaurant'] = $this->restaurant_model->count_user_fav_restaurant($user_id);
        $data['user_been_restaurant'] = $this->restaurant_model->count_user_been_restaurant($user_id);
        $data['user_feeds'] = $this->restaurant_model->count_user_feeds($user_id);
        $data['user_followers'] = $this->user_friend_list_model->count_user_followers($user_id);
        $data['user_followings'] = $this->user_friend_list_model->count_user_followings($user_id);
        
         $data['restaurant_review'] = $this->restaurant_model->get_user_comments($user_id);
         $data['restaurant_bookmars'] = $this->restaurant_model->get_user_bookmars($user_id);
         $data['restaurant_profile_visit'] = $this->restaurant_model->get_user_visits($user_id);
         $data['restaurant_profile_share'] = $this->restaurant_model->get_user_shares($user_id);
         $data['feeds_user'] = $this->restaurant_model->get_user_shares($user_id);
        
       if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
            } else {
            $data['header_name'] = 'header_inner';
            }
        
        if (!empty($friends_request_data)) {
            $data['request_list'] = 'yes';
        } else {
            $data['request_list'] = '';
        }
        $friends_data = $this->user_friend_list_model->get_friend_list($user_id, $id);
        if (!empty($friends_data)) {
            $data['follow_list'] = 'yes';
        } else {
            $data['follow_list'] = '';
        }
        $data['get_following'] = $this->user_friend_list_model->get_followings($user_id);
        $data['get_follower'] = $this->user_friend_list_model->get_follower($user_id);
        $data['profile_setting'] = $user_profile_setting->profile_setting;
        $data['user_data'] = $this->ion_auth->user($id)->row();
        $data['user_data_detail'] = $this->ion_auth->user($user_id)->row();
        $data['popular_restaurant'] = $this->restaurant_model->get_featured_restaurant_location();
        $data['user_reviews']= $this->restaurant_model->get_most_user_by_reviews();
        $data['cusine_type'] = $this->restaurant_search->get_most_use_tags_side();
        $data['restaurants_places'] = $this->restaurant_model->get_restaurants();
        $data['categories'] = $this->cuisine_type_model->get_all();
        $data['file_name'] = 'user_detail_public';
        $this->load->view('index', $data);
    }

    public function accept_request() {
        $this->load->model('user_friend_list_model');
        $this->load->model('user_friend_request_model');
        $user_id = $this->session->userdata('user_id');
        $requested_friend_id = $this->input->post('friend_id');
        $this->user_friend_request_model->accept_request($requested_friend_id, $user_id);
        $this->user_friend_list_model->create($user_id, $requested_friend_id);
    }

    public function cancel_request() {
        $this->load->model('user_friend_request_model');
        $user_id = $this->session->userdata('user_id');
        $requested_friend_id = $this->input->post('friend_id');
        $this->user_friend_request_model->cancel_request($requested_friend_id, $user_id);
    }

    public function follow() {
        $this->load->model('user_friend_list_model');
        $this->load->model('user_friend_request_model');
        $this->load->model('user_preference_model');
        $user_id = $this->session->userdata('user_id');
        $requested_friend_id = $this->input->post('friend_id');
        $statement = $this->user_preference_model->get_profile_setting($requested_friend_id);
        if ($statement->profile_setting === 'Public') {
            $friend_id = $this->user_friend_list_model->create($requested_friend_id, $user_id);
            if (!empty($friend_id)) {
                $data = $this->user_friend_list_model->get_follower($requested_friend_id, $user_id);
                header('Content-Type: application/json');
                echo json_encode($data);
            }
        } elseif ($statement->profile_setting === 'Private') {
            $requested_id = $this->user_friend_request_model->create($requested_friend_id, $user_id);
            if (!empty($requested_id)) {
                header('Content-Type: application/json');
                echo json_encode('');
            }
        }
    }

    

    public function search_result() {
        
        $submit= $this->input->post('submit');
        if(isset($submit)) {
        
            $data['keyword']= $this->input->post('keyword_search');
            $data['location']= $this->input->post('search_location');
            $data['folder_name'] = 'main';
            $data['file_name'] = 'search_restaurant';
            $data['nav_name'] = 'nav_main';  
            
             if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
            } else {
            $data['header_name'] = 'header';
            }
            if(isset($data['keyword'])) {
            $data['latest_restaurant']= $this->restaurant_search->get_latest_restaurant_by_keyword($data['keyword']);
            $data['old_restaurant']= $this->restaurant_search->get_oldest_restaurant_by_keyword($data['keyword']);
            $data['open_restaurant']= $this->restaurant_search->get_open_restaurant_by_keyword($data['keyword']);
            $data['discount_restaurant']= $this->restaurant_search->get_discount_restaurant_by_keyword($data['keyword']);
            $data['near_restaurant']= $this->restaurant_search->get_near_restaurant_by_keyword($data['keyword']);
            }
            
            if($data['location']){
            $total_data = $this->restaurant_search->get_all_count_retaurant_by_location($data['location']);
            $content_per_page = 9; 
            $this->data['total_data'] = ceil($total_data->tol_records/$content_per_page);
            $data['restaurant_keyword']= $this->restaurant_search->get_restaurant_by_location($data['location']);
            $data['latest_restaurant']= $this->restaurant_search->get_latest_restaurant_by_location($data['location']);
            $data['old_restaurant']= $this->restaurant_search->get_oldest_restaurant_by_location($data['location']);
            $data['open_restaurant']= $this->restaurant_search->get_open_restaurant_by_location($data['location']);
            $data['discount_restaurant']= $this->restaurant_search->get_discount_restaurant_by_location($data['location']);
            $data['near_restaurant']= $this->restaurant_search->get_near_restaurant_by_location($data['location']);
            }
            if (isset($data['keyword']) AND isset($data['location'])){
            $data['restaurant_keyword']= $this->restaurant_search->get_restaurant_by_name_location( $data['keyword'], $data['location'] );
            $data['latest_restaurant']= $this->restaurant_search->get_latest_restaurant_by_keylocation($data['keyword'], $data['location']);
            $data['old_restaurant']= $this->restaurant_search->get_oldest_restaurant_by_keylocation($data['keyword'], $data['location']);
            $data['open_restaurant']= $this->restaurant_search->get_open_restaurant_by_keylocation($data['keyword'], $data['location']);
            $data['discount_restaurant']= $this->restaurant_search->get_discount_restaurant_by_keylocation($data['keyword'], $data['location']);
            $data['near_restaurant']= $this->restaurant_search->get_near_restaurant_by_keylocation($data['keyword'], $data['location']);
           }
            $data['popular_restaurant'] = $this->restaurant_model->get_featured_restaurant_location();
            $data['user_reviews']= $this->restaurant_model->get_most_user_by_reviews();
            $data['cusine_type'] = $this->restaurant_search->get_most_use_tags_side();
            $data['restaurants_places'] = $this->restaurant_model->get_restaurants();
            $data['categories'] = $this->cuisine_type_model->get_all();
            $data['user_id'] = $this->session->userdata('user_id');
            $data['user_data'] = $this->ion_auth->user()->row();
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
       
    }
    
    
    public function load_more_search_restaurant()
    {
        $group_no = $this->input->post('group_no');
        $location = $this->input->post('location');
        $content_per_page = 3;
        $start = ceil($group_no * $content_per_page);
        $all_content = $data['restaurant_keyword']=$this->restaurant_model->get_restaurant_by_locations($location,$start,$content_per_page);
        $this->load->view('main/load_more_search_restaurant', $data, FALSE);
    }
    
    
    public function restaurants_sort()
    {
        $keyword= $this->input->post('restaurant_sort');
            
        if($keyword==1)
        {
           $data['restaurant_search']= $this->restaurant_search->get_latest_restaurant();
        }
        else if($keyword==2)
        {
           
            $data['restaurant_search']= $this->restaurant_search->get_oldest_restaurant();
        }
      else if($keyword==3)
        {
        
            $data['restaurant_search']= $this->restaurant_search->get_maxprice_restaurant();
        }
       else if($keyword==4)
        {
           $data['restaurant_search']= $this->restaurant_search->get_minprice_restaurant();
        } 
        
            $data['folder_name'] = 'main';
            $data['file_name'] = 'search_restaurant';
            $data['header_name'] = 'header_inner';
            $data['nav_name'] = 'nav_main'; 
            $this->load->view('index', $data); 
    }

     public function restaurant_sort()
    { 
       $this->load->model('restaurant_search');
       $data['restaurant_keyword']= $this->restaurant_search->get_latest_restaurant();
       $data['folder_name'] = 'main';
       $data['file_name'] = 'search_restaurant';
       $data['header_name'] = 'header_inner';
       $data['nav_name'] = 'nav_main'; 
       $view=$this->load->view('index', $data,True); 
            
    }
    
    public function faqs()
    {
        $data['folder_name'] = 'utility';
        $data['file_name'] = 'faqs';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $data['nav_name'] = 'nav_main';
        $data['user_data'] = $this->ion_auth->user()->row();
        $this->load->view('index', $data);
    }
    
    public function help()
    {
        $data['folder_name'] = 'utility';
        $data['file_name'] = 'help';
        if ($this->ion_auth->logged_in()) {
          $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $data['nav_name'] = 'nav_main';
        $data['user_data'] = $this->ion_auth->user()->row();
        $this->load->view('index', $data);
    }
    
    public function feedback()
    {
        $data['folder_name'] = 'utility';
        $data['file_name'] = 'feedback';
        if ($this->ion_auth->logged_in()) {
           $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $data['nav_name'] = 'nav_main';
        $data['user_data'] = $this->ion_auth->user()->row();
        $this->load->view('index', $data);
    }
    
    
    public function claim_your_listing()
    {
        $data['folder_name'] = 'utility';
        $data['file_name'] = 'claim_your_listing';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $data['nav_name'] = 'nav_main';
        $data['user_data'] = $this->ion_auth->user()->row();
        $this->load->view('index', $data);
    }
    
    
    public function advertise()
    {
        $data['folder_name'] = 'utility';
        $data['file_name'] = 'advertise';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $data['nav_name'] = 'nav_main';
        $data['user_data'] = $this->ion_auth->user()->row();
        $this->load->view('index', $data);
    }
    
    public function guidelines()
    {
        $data['folder_name'] = 'utility';
        $data['file_name'] = 'guidelines';
        if ($this->ion_auth->logged_in()) {
           $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $data['nav_name'] = 'nav_main';
        $data['user_data'] = $this->ion_auth->user()->row();
        $this->load->view('index', $data);
    }
    
    
    public function developers()
    {
        $data['folder_name'] = 'utility';
        $data['file_name'] = 'developers';
        if ($this->ion_auth->logged_in()) {
           $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $data['nav_name'] = 'nav_main';
        $data['user_data'] = $this->ion_auth->user()->row();
        $this->load->view('index', $data);
    }
    
    public function mobile_app()
    {
        $data['folder_name'] = 'utility';
        $data['file_name'] = 'mobile_app';
        if ($this->ion_auth->logged_in()) {
           $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $data['nav_name'] = 'nav_main';
        $data['user_data'] = $this->ion_auth->user()->row();
        $this->load->view('index', $data);
    }
    
    
    public function about_us() {
        $data['folder_name'] = 'main';
        $data['file_name'] = 'about_us';
        if ($this->ion_auth->logged_in()) {
           $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $data['nav_name'] = 'nav_main';
        $data['user_data'] = $this->ion_auth->user()->row();
        $this->load->view('index', $data);
    }
    
    
    public function congralution() {
        $data['folder_name'] = 'main';
        $data['file_name'] = 'cogralate_us';
        if ($this->ion_auth->logged_in()) {
           $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $data['nav_name'] = 'nav_main';
        $data['user_data'] = $this->ion_auth->user()->row();
        $this->load->view('index', $data);
    }
    

    public function blog_detail() {
        $data['folder_name'] = 'main';
        $data['file_name'] = 'blog_detail';
        $this->load->view('index', $data);
    }

    public function blog_listing() {
        $data['folder_name'] = 'main';
        $data['file_name'] = 'blog_listing';
        $this->load->view('index', $data);
    }

    public function company_detail() {
        $data['folder_name'] = 'main';
        $data['file_name'] = 'company_detail';
        $this->load->view('index', $data);
    }

    public function contact() {
        $data['folder_name'] = 'main';
        $data['file_name'] = 'contact';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $data['nav_name'] = 'nav_main';
        $data['user_data'] = $this->ion_auth->user()->row();
        
        $data['most_used_tags'] =$this->restaurant_selected_tags_model->get_most_use_tags(); //For sidebar
        $data['user_reviews']= $this->restaurant_model->get_most_user_by_reviews(); //For sidebar
        $data['popular_restaurant'] = $this->restaurant_model->get_papular_restaurant_location(); //For Sidebar
               
        $this->load->view('index', $data);
    }

    public function index_directory() {
        $data['folder_name'] = 'main';
        $data['file_name'] = 'index_directory';
        $this->load->view('index', $data);
    }

    public function random_string($length = 5) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

    public function user_friend_list(){
        
    if ($this->ion_auth->logged_in()) {         
        $data['folder_name'] = 'main';
        $data['file_name'] = 'my_buddies';
        $data['header_name'] = 'header_user';
        $data['nav_name'] = 'nav_main';
        $this->load->model('user_friend_list_model');
        $user_id = $this->session->userdata('user_id');

        $data['session_id'] = $this->session->userdata('user_id');

        $friends_data = $this->user_friend_list_model->get_by_logged_id($user_id);


        if (!empty($friends_data)) {
            foreach ($friends_data as $row) {
                $follow_list[] = $row->friend_user_id;
            }
            $data['follow_list'] = $follow_list;
        } else {
            $data['follow_list'] = '';
        }

        $data['users_data'] = $this->ion_auth->users()->result();
        $data['user_data'] = $this->ion_auth->user()->row();
        
        $data['most_used_tags'] =$this->restaurant_selected_tags_model->get_most_use_tags(); //For sidebar
        $data['user_reviews']= $this->restaurant_model->get_most_user_by_reviews(); //For sidebar
        $data['popular_restaurant'] = $this->restaurant_model->get_papular_restaurant_location(); //For Sidebar

        $this->load->view('index', $data);
    } 
    else {
        redirect('login');
    }
}


    public function unfollow_user_friend(){

        $user_id = $this->session->userdata('user_id');

        if($this->input->post('friend_id')) {
            $friend_id = $this->input->post('friend_id');
            $this->load->model('user_friend_list_model');
            $this->user_friend_list_model->delete_user_friend($user_id, $friend_id);
            $this->load->model('user_friend_list_model');
            $data['session_id'] = $this->session->userdata('user_id');
            $friends_data = $this->user_friend_list_model->get_by_logged_id($user_id);

            if (!empty($friends_data)) {
                foreach ($friends_data as $row) {
                    $follow_list[] = $row->friend_user_id;
                }
                $data['follow_list'] = $follow_list;
            } else {
                $data['follow_list'] = '';
            }
            $data['users_data'] = $this->ion_auth->users()->result();
            //$data['user_data'] = $this->ion_auth->user()->row();
            $this->session->set_flashdata('success', "Unfollow Successfully ");
            $view = $this->load->view('main/my_buddies_unfollow', $data,true);
            print_r($view);
        }


    }
    
    
    
    public function welcome_user()
    {
        $data['folder_name'] = 'main';
        $data['file_name'] = 'register_success';
        $data['header_name'] = 'header';
        $data['nav_name'] = 'nav_main';
        $this->load->view('index', $data);
    }
    
    public function sitemap() {
        $data['folder_name'] = 'utility';
        $data['file_name'] = 'sitemap';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $data['nav_name'] = 'nav_main';
        $data['user_data'] = $this->ion_auth->user()->row();
        $this->load->view('index', $data);
    }
    
    
    public function security() {
        $data['folder_name'] = 'utility';
        $data['file_name'] = 'security';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $data['nav_name'] = 'nav_main';
        $data['user_data'] = $this->ion_auth->user()->row();
        $this->load->view('index', $data);
    }
    
    
    public function csr() {
        $data['folder_name'] = 'utility';
        $data['file_name'] = 'csr';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $data['nav_name'] = 'nav_main';
        $data['user_data'] = $this->ion_auth->user()->row();
        $this->load->view('index', $data);
    }
    
    public function term_condition() {
        $data['folder_name'] = 'utility';
        $data['file_name'] = 'term_condition';
        if ($this->ion_auth->logged_in()) {
           $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $data['nav_name'] = 'nav_main';
        $data['user_data'] = $this->ion_auth->user()->row();
        $this->load->view('index', $data);
    }
    
    public function privacy() {
        $data['folder_name'] = 'utility';
        $data['file_name'] = 'privacy';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $data['nav_name'] = 'nav_main';
        $data['user_data'] = $this->ion_auth->user()->row();
        $this->load->view('index', $data);
    }
    
    public function restaurant_selected_tags()
    {
        $category_id = $this->uri->segment(3);
        
         if(empty($category_id))
         {
             redirect('main');
         }
        
        $data['restaurant'] = $this->restaurant_model->get_restaurant_by_tags($category_id);
        $data['folder_name'] = 'main';
        $data['file_name'] = 'restaurant_tags';
        $data['nav_name'] = 'nav_main';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
            redirect('dashboard');
        } else {
            $data['header_name'] = 'header';
        }
        $country_name= $this->get_country_by_ip();
        $country_id=$this->hb_countries_model->getCountryByName($country_name);
          $data['category_id'] = $category_id;
        $data['cusine_type'] = $this->restaurant_model->get_most_use_tags();
        $data['popular_restaurant'] = $this->restaurant_model->get_papular_restaurant_location($country_id);
        $data['popular_restaurants'] = $this->restaurant_model->get_popular_restaurants_location($country_id);
        $data['restaurants_places'] = $this->restaurant_model->get_restaurants($country_id);
        $this->load->view('index', $data,FALSE);
    }
    
    
    public function load_more_tag_restaurant()
    {
        $category_id = $this->uri->segment(3);
        $group_no = $this->input->post('group_no');
        $content_per_page = 9;
        $start = ceil($group_no * $content_per_page);
        $all_content = $this->restaurant_model->get_restaurant_by_tags($category_id,$start,$content_per_page);
        $data['all_content']=$all_content;
        $this->load->view('utility/tag_restaurant', $data, FALSE);
    }
    
    
    public function list_restaurant_selected_tags()
    {
        $category_id = $this->uri->segment(3);
        
         if(empty($category_id))
         {
             redirect('main');
         }
        
        $data['restaurant'] = $this->restaurant_model->get_restaurant_by_tags($category_id);
        $data['folder_name'] = 'main';
        $data['file_name'] = 'list_restaurant_tags';
        $data['nav_name'] = 'nav_main';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
            redirect('dashboard');
        } else {
            $data['header_name'] = 'header';
        }
        $country_name= $this->get_country_by_ip();
        $country_id=$this->hb_countries_model->getCountryByName($country_name);
        $data['category_id'] = $category_id;
        $data['cusine_type'] = $this->restaurant_model->get_most_use_tags();
        $data['popular_restaurant'] = $this->restaurant_model->get_papular_restaurant_location($country_id);
        $data['popular_restaurants'] = $this->restaurant_model->get_popular_restaurants_location($country_id);
        $data['restaurants_places'] = $this->restaurant_model->get_restaurants($country_id);
        $this->load->view('index', $data,FALSE);
    }
    
    public function load_list_more_tags_restaurant()
    {
        $category_id = $this->uri->segment(3);
        $group_no = $this->input->post('group_no');
        $content_per_page = 9;
        $start = ceil($group_no * $content_per_page);
        $all_content = $this->restaurant_model->get_restaurant_by_tags($category_id,$start,$content_per_page);
        $data['all_content']=$all_content;
        $this->load->view('utility/tag_list_restaurant', $data, FALSE);
    }
    
    
    public function services_restaurant()
    {
        $category_id = urldecode($this->uri->segment(3));
        $service_id = $this->services_model->getserviebyname($category_id);
        $data['restaurant'] = $this->restaurant_model->get_restaurant_by_services($service_id);
       $data['folder_name'] = 'main';
        $data['file_name'] = 'services_restaurant';
        $data['nav_name'] = 'nav_main';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
            redirect('dashboard');
        } else {
            $data['header_name'] = 'header';
        }
        
        
        $country_name= $this->get_country_by_ip();
        $country_id=$this->hb_countries_model->getCountryByName($country_name);
        $data['category_id'] = $category_id;
        $data['cusine_type'] = $this->restaurant_model->get_most_use_tags();
        $data['popular_restaurant'] = $this->restaurant_model->get_papular_restaurant_location($country_id);
        $data['popular_restaurants'] = $this->restaurant_model->get_popular_restaurants_location($country_id);
        $data['restaurants_places'] = $this->restaurant_model->get_restaurants($country_id);
        $this->load->view('index', $data,FALSE);
        
    }
    
    
    
    
    public function get_country_by_ip()
        {
            $ip_address=$_SERVER['REMOTE_ADDR'];

            /*Get user ip address details with geoplugin.net*/
            $geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip_address;
            $addrDetailsArr = unserialize(file_get_contents($geopluginURL)); 

            /*Get City name by return array*/
            $city = $addrDetailsArr['geoplugin_city']; 

            /*Get Country name by return array*/
            $country = $addrDetailsArr['geoplugin_countryName'];

            /*Comment out these line to see all the posible details*/
            /*echo '<pre>';
            print_r($addrDetailsArr);
            die();*/

            if(!$city){
               $city='Not Define';
            }if(!$country){
               $country='Not Define';
            }
            return $country;
     }
     
    public function check_username_exist($username=false)
    {
        $result=$this->restaurant_model->username_exist($username);

        if(!empty($username)) {
          if($result>0) {
              echo "<p style='color:#a94442; margin-top:5px; margin-bottom:0; font-size:85%; font-weight: 500; font-family:'Arial', sans-serif;'>This Username has been Already Exist.</p>";
          }else{
              echo "<p style='color:green; margin-top:5px; margin-bottom:0; font-size:85%; font-weight: 500; font-family:'Arial', sans-serif;'> Username Available.</p>";
          }
        }
    }
    
    public function check_user_email_exist()
    {
        $email = $this->input->post('email');
        $result=$this->restaurant_model->check_user_email_exist($email);

        if(!empty($email)) {
          if($result>0) {
              echo "<p style='color:#a94442; margin-top:5px; margin-bottom:0; font-size:85%; font-weight: 500; font-family:'Arial', sans-serif;'>This Email has been Already Exist.</p>";
          }else{
              echo "<p style='color:green; margin-top:5px; margin-bottom:0; font-size:85%; font-weight: 500; font-family:'Arial', sans-serif;'> Email Available.</p>";
          }
        }
    }
    
    
    public  function cleanURL($textURL) {
     $URL = strtolower(preg_replace( array('/[^a-z0-9\- ]/i', '/[ \-]+/'), array('', '-'), $textURL));
            return $URL;
     }
}
