<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class restaurant extends CI_Controller {

    function __construct() {


        parent::__construct();

        $this->load->helper(array('form', 'url'));

        $this->load->library('session');
        $this->load->model('hb_countries_model');
        $this->load->model('restaurant_model');
        $this->load->model('Cities_model');
        $this->load->model('restaurantsmodel');

        $this->load->helper('date');
    }

    public function index() {
        
    if ($this->ion_auth->logged_in()) {     
        $this->load->model('restaurant_model');
        $this->load->model('restaurant_branches_model');
        $user_id = $this->session->userdata('user_id');
        $data['user_id'] = $this->session->userdata('user_id');
        $data['user_data'] = $this->ion_auth->user()->row();
        $user_data= $this->ion_auth->user()->row()->country;
        //print_r($this->get_country_by_ip());
        //exit;
        
        $lat = $this->input->post('lat');
        $lng = $this->input->post('lng');
        $lat = !empty($lat) && is_numeric($lat) ? $lat : 'NULL';
        $lng = !empty($lng) && is_numeric($lng) ? $lng : 'NULL';
        if (!empty($lat) && !empty($lng)) {
            $this->load->model('restaurant_branches_model');
            $restaurants = $this->restaurant_branches_model->get_near_branches($lat, $lng);
            $data['my_restaurant'] = $restaurants;
        }

        $data['folder_name'] = 'restaurant';
        $data['file_name'] = 'my_restaurant';
        $data['nav_name'] = 'nav_main';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        
        $this->load->view('index', $data);
        } 
        else {
                redirect('login');
             }
        
   }
    



    public function add_menu() {
        $this->load->model('restaurant_model');
        $this->load->model('user_menu_categories_model');
        $this->load->model('restaurant_menu_model');
        $data['user_data'] = $this->ion_auth->user()->row();
        $restaurant_id = $this->uri->segment(3);
        if ($this->input->post('add_restaurant_menu')) {
            $cat_data = $_POST;
            for ($i = 0; $i < sizeof($cat_data['name']); $i++) {

                $menu_data['name'] = $cat_data['name'][$i];
                $menu_data['color_code'] = $cat_data['color_code'][$i];
                $menu_data['restaurant_id'] = $restaurant_id;
                $upload_path = 'uploads/restaurantimages/restaurant_categories/';
                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0777, TRUE);
                }
                if (!empty($_FILES['image']['name'][$i]) && $_FILES['image']['error'][$i] == 0) {
                    $type = explode(".", $_FILES['image']['name'][$i]);
                    $_FILES['image']['name'][$i] = $this->random_string() . "." . $type[1];
                    move_uploaded_file($_FILES['image']['tmp_name'][$i], $upload_path . $_FILES['image']['name'][$i]);
                    $menu_data['image'] = base_url() . $upload_path . $_FILES['image']['name'][$i];
                }
                if (!empty($_FILES['logo']['name'][$i]) && $_FILES['logo']['error'][$i] == 0) {
                    $type = explode(".", $_FILES['logo']['name'][$i]);
                    $_FILES['logo']['name'][$i] = $this->random_string() . "." . $type[1];
                    move_uploaded_file($_FILES['logo']['tmp_name'][$i], $upload_path . $_FILES['logo']['name'][$i]);
                    $menu_data['logo'] = base_url() . $upload_path . $_FILES['logo']['name'][$i];
                }


                $category_id = $this->user_menu_categories_model->create($menu_data);
                $menu['category_id'] = $category_id;
                $menu['restaurant_id'] = $restaurant_id;
                $this->restaurant_menu_model->create($menu);
            }
            redirect('restaurant/add_menu_items/' . $restaurant_id . '');
        }
        $data['restaurant_detail'] = $this->restaurant_model->get_by_id($restaurant_id);
        $data['restaurant_id'] = $restaurant_id;
        $data['folder_name'] = 'restaurant';
        $data['file_name'] = 'add_menu';
      
        $data['nav_name'] = 'nav_main';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $this->load->view('index', $data);
    }

    public function add_menu_items() {
        $this->load->model('restaurant_model');
        $this->load->model('user_menu_categories_model');
        $this->load->model('restaurant_menu_model');
        $this->load->model('restaurant_menu_items_model');
        $this->load->model('restaurant_menu_images_model');
        $this->load->model('restaurant_menu_attr_model');
        $data['user_data'] = $this->ion_auth->user()->row();
        $restaurant_id = $this->uri->segment(3);
        if ($this->input->post('add_restaurant_menu_items')) {
            $item_data = $_POST;
            $cat_item_data['menu_id'] = $item_data['menu_id'];
            $cat_item_data['name'] = $item_data['name'];
            $cat_item_data['price'] = $item_data['price'];
            $cat_item_data['description'] = $item_data['description'];
            $item_id = $this->restaurant_menu_items_model->create($cat_item_data);
            $upload_path = 'uploads/restaurantimages/restaurant_categories/items/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, TRUE);
            }
            for ($i = 0; $i < sizeof($_FILES['image_url']['name']); $i++) {
                if (!empty($_FILES['image_url']['name'][$i]) && $_FILES['image_url']['error'][$i] == 0) {
                    $type = explode(".", $_FILES['image_url']['name'][$i]);
                    $_FILES['image_url']['name'][$i] = $this->random_string() . "." . $type[1];
                    move_uploaded_file($_FILES['image_url']['tmp_name'][$i], $upload_path . $_FILES['image_url']['name'][$i]);
                    $images['image_url'] = base_url() . $upload_path . $_FILES['image_url']['name'][$i];
                    $images['item_id'] = $item_id;
                    $this->restaurant_menu_images_model->create($images);
                }
            }
            redirect('restaurant/restaurant_detail/' . $restaurant_id . '');
        }
        $data['restaurant_detail'] = $this->restaurant_model->get_by_id($restaurant_id);
        $data['restaurant_categories'] = $this->user_menu_categories_model->get_by_restaurant_id($restaurant_id);
        $data['folder_name'] = 'restaurant';
        $data['file_name'] = 'add_cat_items';
        $data['nav_name'] = 'nav_main';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $this->load->view('index', $data);
    }

    public function get_all_social_companies() {
        $this->load->model('socail_account_model');
        $data = $this->socail_account_model->get_all();
        echo json_encode($data);
    }

    public function add_item_attribute() {
        $this->load->model('restaurant_model');
        $this->load->model('user_menu_categories_model');
        $this->load->model('restaurant_menu_model');
        $this->load->model('restaurant_menu_items_model');
        $this->load->model('restaurant_menu_images_model');
        $this->load->model('restaurant_menu_attr_model');
        $data['user_data'] = $this->ion_auth->user()->row();
        $restaurant_id = $this->uri->segment(3);
        $item_id = $this->uri->segment(4);
        if ($this->input->post('add_restaurant_menu_item_attr')) {
            $attr_data = $_POST;
//            echo '<pre>';
//            print_r($attr_data);
//            exit();
            if ($attr_data['parent'] == 1) {
                $item_attr_data['item_id'] = $attr_data['item_id'];
                $item_attr_data['attribute_name'] = $attr_data['attribute_name'];
                $item_attr_data['attribute_value'] = $attr_data['attribute_value'];
                $item_attr_data['parent'] = $attr_data['parent'];
                $upload_path = 'uploads/restaurantimages/restaurant_categories/cat_items/item_attr/';
                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0777, TRUE);
                }
                if (!empty($_FILES['userfile']['name']) && $_FILES['userfile']['error'] == 0) {
                    $type = explode(".", $_FILES['userfile']['name']);
                    $_FILES['userfile']['name'] = $this->random_string() . "." . $type[1];
                    move_uploaded_file($_FILES['userfile']['tmp_name'], $upload_path . $_FILES['userfile']['name']);
                    $item_attr_data['item_attr_image'] = base_url() . $upload_path . $_FILES['userfile']['name'];
                }
            } else {
                $item_attr_data['item_id'] = $attr_data['item_id'];
                $item_attr_data['attribute_name'] = $attr_data['attribute_name'];
                $item_attr_data['attribute_value'] = "NULL";
                $item_attr_data['parent'] = $attr_data['parent'];
                $upload_path = 'uploads/restaurantimages/restaurant_categories/cat_items/item_attr/';
                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0777, TRUE);
                }
                if (!empty($_FILES['userfile']['name']) && $_FILES['userfile']['error'] == 0) {
                    $type = explode(".", $_FILES['userfile']['name']);
                    $_FILES['userfile']['name'] = $this->random_string() . "." . $type[1];
                    move_uploaded_file($_FILES['userfile']['tmp_name'], $upload_path . $_FILES['userfile']['name']);
                    $item_attr_data['item_attr_image'] = base_url() . $upload_path . $_FILES['userfile']['name'];
                }
            }
            $this->restaurant_menu_attr_model->create($item_attr_data);
            redirect('restaurant/item_detail/' . $restaurant_id . '/' . $item_id . '');
        }
        $data['item_detail'] = $this->restaurant_menu_items_model->get_by_item_id($item_id);
        $data['folder_name'] = 'restaurant';
        $data['file_name'] = 'add_item_attr';
   
        $data['nav_name'] = 'nav_main';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $this->load->view('index', $data);
    }

    public function restaurant_detail() {
        $this->load->model('restaurant_model');
        $this->load->model('restaurant_menu_model');
        $this->load->model('user_menu_categories_model');
        $this->load->model('restaurant_timing_model');
        $this->load->model('restaurant_social_acc_model');
        $this->load->model('restaurant_mobile_no_model');
        $this->load->model('restaurant_phone_no_model');
        $this->load->model('restaurant_email_model');
        $this->load->model('restaurant_cuisine_type_model');
        $this->load->model('restaurant_promotional_banner_model');
        $this->load->model('restaurant_selected_tags_model');

        $data['user_data'] = $this->ion_auth->user()->row();
        $restaurant_id = $this->uri->segment(3);
        
        $data['restaurants'] = $this->restaurant_model->get_restaurants();
        $data['restaurant_detail'] = $this->restaurant_model->get_by_id($restaurant_id);
        if(empty($data['restaurant_detail']))
         {
             redirect('main');
         }
        $data['res_mobile'] =$this->restaurant_mobile_no_model->get_by_id($restaurant_id);
        $data['res_phone'] =$this->restaurant_phone_no_model->get_by_id($restaurant_id);
        $data['res_email'] =$this->restaurant_email_model->get_by_id($restaurant_id);
        $data['restaurant_categories'] = $this->user_menu_categories_model->get_by_restaurant_id($restaurant_id);
        $data['promotion_banners']=  $this->restaurant_promotional_banner_model->get_by_restaurant_id($restaurant_id);
        $data['cuisine_type'] = $this->restaurant_cuisine_type_model->get_by_restaurant_id($restaurant_id);
        $data['most_used_tags'] =$this->restaurant_selected_tags_model->get_most_use_tags(); 
        $data['restaurant_review'] = $this->restaurant_model->get_restaurant_reviews($restaurant_id);
        $data['restaurant_items'] = $this->restaurant_model->get_limited_by_restaurant_id($restaurant_id);
        $data['restaurant_timing'] = $this->restaurant_timing_model->get_by_restaurant_id($restaurant_id);
        $data['socail_acc'] = $this->restaurant_social_acc_model->get_by_id($restaurant_id);
        $data['restaurant_tag'] = $this->restaurant_selected_tags_model->get_by_id($restaurant_id);
        $data['restaurant_branch'] = $this->restaurant_model->get_restaurant_branches_by_id($restaurant_id);
        $data['restaurant_rating'] = $this->restaurant_model->get_restaurant_rating_by_id($restaurant_id);
     
        
        $data['featured_restaurant'] = $this->restaurant_model->get_featured_restaurant_location();
        $data['user_reviews']= $this->restaurant_model->get_most_user_by_reviews();
        $data['promotion']=  $this->restaurant_promotional_banner_model->count_promotional_id($restaurant_id);
        $data['retaurant_menus']=  $this->restaurant_model->get_restaurant_menus($restaurant_id);
        $data['folder_name'] = 'restaurant';
        $data['file_name'] = 'restaurant_detail';
        $data['nav_name'] = 'nav_main';
        
        if ($this->ion_auth->logged_in()) {
            $data['user_id'] = $this->ion_auth->get_user_id();
            $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header_inner';
        }
        $this->load->view('restaurant_index', $data);
    }

    public function category_detail() {
        $this->load->model('user_menu_categories_model');
        $this->load->model('restaurant_model');
        $data['user_data'] = $this->ion_auth->user()->row();
        $category_id = $this->uri->segment(3);
        $restaurant_id = $this->uri->segment(4);
        $data['restaurants'] = $this->restaurant_model->get_restaurants();
        $data['restaurant_categories'] = $this->user_menu_categories_model->get_by_restaurant_id($restaurant_id);
        $data['category'] = $this->user_menu_categories_model->get_by_id($category_id);
        $data['categories_itmes'] = $this->user_menu_categories_model->get_category_item_by_id($category_id);
        $data['folder_name'] = 'restaurant';
        $data['file_name'] = 'category_detail';
        $data['nav_name'] = 'nav_main';
     if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $this->load->view('index', $data);
    }

    public function category_listing() {
        $this->load->model('user_menu_categories_model');
        $this->load->model('restaurant_model');
        $data['user_data'] = $this->ion_auth->user()->row();
        $data['restaurant_id'] = $this->uri->segment(3);
//        $restaurant_id = $this->uri->segment(4);
        $data['category'] = $this->user_menu_categories_model->get_by_restaurant_id($data['restaurant_id']);
        $data['restaurants'] = $this->restaurant_model->get_restaurants();

        $data['folder_name'] = 'restaurant';
        $data['file_name'] = 'category_listing';

        $data['nav_name'] = 'nav_main';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $this->load->view('index', $data);
    }

    public function item_detail() {
        $this->load->model('restaurant_model');
        $this->load->model('restaurant_menu_model');
        $this->load->model('user_menu_categories_model');
        $this->load->model('restaurant_menu_images_model');
        $this->load->model('restaurant_menu_items_model');
        $this->load->model('restaurant_timing_model');
        $this->load->model('restaurant_menu_attr_model');
        $this->load->model('restaurant_mobile_no_model');
        $this->load->model('restaurant_phone_no_model');
        $this->load->model('restaurant_email_model');


        $data['user_data'] = $this->ion_auth->user()->row();
        $restaurant_id = $this->uri->segment(3);
        $item_id = $this->uri->segment(4);
        $data['restaurant_detail'] = $this->restaurant_model->get_by_id($restaurant_id);
        $data['restaurants'] = $this->restaurant_model->get_restaurants();
        $data['restaurant_categories'] = $this->user_menu_categories_model->get_by_restaurant_id($restaurant_id);
        $data['restaurant_item_detail'] = $this->restaurant_menu_items_model->get_by_item_id($item_id);
        $data['restaurant_menu_attr'] = $this->restaurant_menu_attr_model->get_by_id($item_id);
        $data['items_images'] = $this->restaurant_menu_images_model->get_images_by_item_id($item_id);
        $data['restaurant_timing'] = $this->restaurant_timing_model->get_by_restaurant_id($restaurant_id);
        $data['res_mobile'] =$this->restaurant_mobile_no_model->get_by_id($restaurant_id);
        $data['res_phone'] =$this->restaurant_phone_no_model->get_by_id($restaurant_id);
        $data['res_email'] =$this->restaurant_email_model->get_by_id($restaurant_id);

        $data['restaurant_id'] = $restaurant_id;
        $data['item_id'] = $item_id;
        $data['folder_name'] = 'restaurant';
        $data['file_name'] = 'item_detail';

        $data['nav_name'] = 'nav_main';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
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
    
    public function add_user_review() {              
     $comment = $this->input->post('review_message');
     $rating = $this->input->post('rating');
     $user_id= $this->input->post('user_id');
     $restaurant_id= $this->input->post('restaurant_id');
     $this->load->model('restaurant_model');
        
        if($this->restaurant_model->add_user_comment($user_id,$restaurant_id,$comment,$rating)) 
            {
             $data['restaurant_review'] = $this->restaurant_model->get_restaurant_reviews($restaurant_id);
             $this->load->view('utility/user_restaurant_views', $data, FALSE);
            } else {
                echo "coment not inserted";
            }
    }
    
    public function get_restaurant_review()
    {  
     $restaurant_id= $this->input->post('restaurant_id');
     $this->load->model('restaurant_model');
     $data['restaurant_review'] = $this->restaurant_model->get_restaurant_reviews($restaurant_id);
     $this->load->view('utility/user_restaurant_views', $data, FALSE);
            
    }
    
    
    public function add_new_restaurant()
    {
        
        $data['folder_name'] = 'main';
        $data['file_name'] = 'add_restaurant';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $data['nav_name'] = 'nav_main';
        $data['user_data'] = $this->ion_auth->user()->row();
        $data['city']= $this->restaurantsmodel->get_all_cities();
        $data['countries']= $this->restaurantsmodel->get_all_countries();
        
        $this->load->view('index', $data);
    }
    
    public function suggest_restaurant()
    {
        $data['folder_name'] = 'restaurant';
        $data['file_name'] = 'suggest_restaurant';
        if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
        $data['nav_name'] = 'nav_main';
        $data['user_data'] = $this->ion_auth->user()->row();
        $data['all_countries'] = $this->hb_countries_model->get_all();
        $this->load->view('index', $data);
    } 
    
    public function check_user_exist()
	{
		$username= $_POST["u_name"];
		$this->load->model('restaurant_model');
		$result=$this->restaurant_model->user_exist($username);

		if(!empty($username)) {
		  if($result>0) {
		      echo "<p class='text-danger'>Username Already Exist.</p>";
		  }else{
		      echo "<p class='muted'>Username Available.</p>";
		  }
		}
	}
	
	public function check_name_exist()
	{
		$name= $_POST["name"];
		$this->load->model('restaurant_model');
		$result=$this->restaurant_model->restaurant_name_exist($name);

		if(!empty($name)) {
		  if($result>0) {
		      echo "<p class='text-danger'> Restautrant Name is Exist.</p>";
		  }else{
		      echo "<p class='muted'> Name Available.</p>";
		  }
		}
	}//check restaurant username exits end	
    
        public function restaurant_add()
        {
		// Logo Image Insert
		$config= [
			'upload_path'	   =>   './uploads/restaurantimages',
			'allowed_types'    =>   'gif|png|jpg|jpeg',
		];
                $this->upload->initialize($config);
		$this->load->library('upload', $config);
		$logo= $this->upload->do_upload('logo_image_url');
		$data_logo= $this->upload->data();
		$image['logo']= base_url("uploads/restaurantimages/" . $data_logo['raw_name'] . $data_logo['file_ext']);


		// Cover Image Insert
		if( !empty( $_FILES['cover_image_url']['name'] )){
		$config= [
			'upload_path'	   =>   './uploads/restaurantimages',
			'allowed_types'    =>   'gif|png|jpg|jpeg',
		];
		$this->upload->initialize($config);
		$this->load->library('upload', $config);
		$cover= $this->upload->do_upload('cover_image_url');
		$data_cover= $this->upload->data();
		$image['cover']= base_url("uploads/restaurantimages/" . $data_cover['raw_name'] . $data_cover['file_ext']);
		} else{
			$image['cover'] = '';
		}

		$post= $this->input->post();
		
//                echo $image['logo'];
//                echo "<br>";
//                echo $image['cover'];
//                exit;

		if( $this->restaurant_model->add_restaurant($post, $image) )
		{			
                    redirect('restaurant/thankyou');
		}else{
			//echo "Error";
			 //echo $this->upload->display_errors();
			 $this->session->set_flashdata('feedback', "Restaurant failed To Add... try Again Later");
			 $this->session->set_flashdata('feedback_class', 'alert-danger');
		}
		//redirect('restaurant/add_new_restaurant');            
        }
        
        public function thankyou()
        {
            $data['folder_name'] = 'restaurant';
            $data['file_name'] = 'restaurant_success';
            $data['nav_name'] = 'nav_main';
            if ($this->ion_auth->logged_in()) {
            $data['header_name'] = 'header_user'; // we will change in future header user.php
        } else {
            $data['header_name'] = 'header';
        }
            $this->load->view('index', $data);
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
        
     public function get_all_restaurant()
     {  
        $total_data = $this->restaurant_model->get_all_count();
        $content_per_page = 3; 
        $data['total_data'] = ceil($total_data->tol_records/$content_per_page);
        $data['folder_name'] = 'restaurant';
        $data['file_name'] = 'all_restaurant';
        $data['nav_name'] = 'nav_main';
        $data['header_name'] = 'header';
        $this->load->view('index', $data);
        
        
        
       
     }
     
     
     
      public function load_more()
    {
        $group_no = $this->input->post('group_no');
        echo $group_no;
        $content_per_page = 3;
        $start = ceil($group_no * $content_per_page);
        $all_content = $data['restaurant']=$this->restaurant_model->get_all_restaurant($start,$content_per_page);
        $this->load->view('restaurant/load_more', $data, FALSE);
        
    }
     
    
    public function get_city_by_drop_down(){
        $this->load->model('cities_model');

        $get_country_id = $this->input->POST('country_id', true);


        $cities= $this->cities_model->get_cities_by_countries_id($get_country_id);


        $city_html = '<select id="c1" name="country" class="populate e9"  style="width:40%" required>';

        if($cities){

            foreach($cities as $city) {
                $city_html .= '<option value="' . $city->city_id  . '"> ' . $city->city_name . '</option>';
            }
        }
        $city_html .= '</select>';
        echo $city_html;



    }
}
