<?php

class Restaurant_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($item) {
        $data = array(
            'name' => $item['name'],
            'logo_url' => $item['logo_url'],
            'cover_image_url' => $item['cover_image_url'],
            'description' => $item['description'],
            'phone_number' => $item['phone_number'],
            'website_address' => $item['website_address'],
            'cuisine_type_id' => $item['cuisine_type_id'],
            'server' => $item['server'],
            'price_range' => $item['price_range'],
            'payment_methods' => $item['payment_methods'],
            'country_id' => $item['country_id'],
            'city_id' => $item['city_id'],
            'longitude' => $item['longitude'],
            'latitude' => $item['latitude'],
            'min_order' => $item['min_order'],
            'delivery_charges' => $item['delivery_charges'],
            'user_id' => $item['user_id']
        );

        $this->db->insert('restaurant', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function get_by_id($id) {
        $this->db->select('*');
        $this->db->from('restaurant');
        $this->db->join("hb_countries", "restaurant.country_id = hb_countries.country_id");
        $this->db->join("cities", "cities.country_id = hb_countries.country_id AND cities.city_id = restaurant.city_id");
        $this->db->where('restaurant.id', $id);
        $query = $this->db->get();
       // echo $this->db->last_query();exit;

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->row();
        }
    }

    function get_limited_by_restaurant_id($id) {
        $this->db->select('restaurant_menu_items.id as item_id,restaurant_menu_items.name as item_name,restaurant.name as restaurant_name,hb_countries.country_name as country_name,restaurant_menu_images.image_url as item_image,restaurant_menu_items.price as item_price,restaurant_menu_items.description as item_desc');
        $this->db->from('restaurant');
        $this->db->join("hb_countries", "restaurant.country_id = hb_countries.country_id", "LEFT");
        $this->db->join("restaurant_menu", "restaurant.id = restaurant_menu.restaurant_id", "LEFT");
        $this->db->join("restaurant_menu_items", "restaurant_menu.id = restaurant_menu_items.menu_id", "LEFT");
        $this->db->join("restaurant_menu_images", "restaurant_menu_items.id = restaurant_menu_images.item_id", "LEFT");
        $this->db->where('restaurant.id', $id);
        $this->db->group_by('restaurant_menu_items.id');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }

    function get_by_user_id($id) {
        $this->db->select('*');
        $this->db->from('restaurant');
        $this->db->where('user_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }

    function get_all() {
    $this->db->select('*');
    $this->db->from('restaurant');
    $this->db->join("hb_countries", "restaurant.country_id = hb_countries.country_id", "LEFT");
    $this->db->join("restaurant_menu", "restaurant.id = restaurant_menu.restaurant_id", "LEFT");
    $this->db->join("restaurant_menu_items", "restaurant_menu.id = restaurant_menu_items.menu_id", "LEFT");
    $this->db->join("restaurant_menu_images", "restaurant_menu_items.id = restaurant_menu_images.item_id", "LEFT");
    $query = $this->db->get();

    if ($query->num_rows() < 1) {
        return null;
    } else {
        return $query->result();
    }
}

    function get_restaurants() {
        $this->db->select('restaurant.id AS id,restaurant.name AS name ,restaurant.logo_url AS logo_url,hb_countries.country_name as country_name,cities.city_name as city_name,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
        $this->db->from('restaurant');
        $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
        $this->db->join("hb_countries", "restaurant.country_id = hb_countries.country_id", "LEFT");
        $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
        $this->db->group_by('restaurant.id');
        $this->db->order_by('restaurant_reviews', 'DESC');
        $this->db->limit('8');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }

    function get_restaurant($q) {
        $this->db->select('name');
        $this->db->from('restaurant');
        $this->db->like('restaurant.name', $q);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = htmlentities(stripslashes($row['name'])); //build an array
            }
            echo json_encode($row_set); //format the array into json data
        } else {
            $row_set[] = "No records found";
            echo json_encode($row_set);
        }
    }

    function get_place_id($q) {
        $this->db->select('id');
        $this->db->from('restaurant');
        $this->db->where('restaurant.name', $q);
        $query = $this->db->get();
        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->row();
        }

    }

    function update($id, $item) {
        $data = array(
            'name' => $item['name'],
            'logo_url' => $item['logo_url'],
            'cover_image_url' => $item['cover_image_url'],
            'desc' => $item['desc'],
            'phone_number' => $item['phone_number'],
            'website_address' => $item['website_address'],
            'cuisine_type_id' => $item['cuisine_type_id'],
            'server' => $item['server'],
            'price_range' => $item['price_range'],
            'payment_methods' => $item['payment_methods'],
            'country_id' => $item['country_id'],
            'city_id' => $item['city_id'],
            'longitude' => $item['longitude'],
            'latitude' => $item['latitude'],
            'min_order' => $item['min_order'],
            'delivery_charges' => $item['delivery_charges']
        );

        $this->db->where('id', $id);
        $this->db->update('restaurant', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('restaurant');
    }


    function get_all_restaurant() {
        $this->db->select('*');
        $this->db->from('restaurant');
        $this->db->join("(SELECT (SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote,ROUND(AVG(rating),1) AS rating,restaurant_id,COUNT(rating) AS rating_count FROM restaurant_comments GROUP BY restaurant_id)AS rt", "restaurant.id = rt.restaurant_id", "LEFT");
        $this->db->order_by('restaurant.id', 'desc');  
        $this->db->limit(6,0);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }

    
    
    //--------------------get popular restaurant-----------------------------------------------
    public function get_featured_restaurant_location()
    {
            $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
            $this->db->from('restaurant');
            $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
            $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
            $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
            $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
            $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
            $this->db->group_by('restaurant.id');
            $this->db->order_by('restaurant_reviews', 'desc');  
            $this->db->limit(6,0);
            $query = $this->db->get();

            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }
    }
    
    
    
    
    
    //--------------------get popular restaurant-----------------------------------------------
    public function get_featured_restaurants_location($country,$city)
    {
            $this->db->select('cuisine_type.id AS tag_id,cuisine_type.name AS tag_name,count(restaurant_cuisine_type.cuisine_type_id) as total_tags');
            $this->db->from('cuisine_type');
            $this->db->join("restaurant_cuisine_type", "cuisine_type.id=restaurant_cuisine_type.cuisine_type_id", "LEFT");
            $this->db->group_by('cuisine_type.id');
            $this->db->order_by('total_tags', 'desc');  
            $this->db->limit(20,0);
            $query = $this->db->get();

            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }
    }
    
    public function get_papular_restaurant_location()
    {
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
        $this->db->from('restaurant');
        $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
        $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
        $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
        $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
        $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
        $this->db->group_by('restaurant.id');
        $this->db->order_by('restaurant_reviews', 'desc');  
        $this->db->limit(4,0);
        $query = $this->db->get();

            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }
    }
    
    
    //--------------------get popular restaurant-----------------------------------------------
    public function get_popular_restaurants_location($country=0,$city=0)
    {
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
        $this->db->from('restaurant');
        $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
        $this->db->group_by('restaurant.id');
        $this->db->order_by('restaurant_reviews', 'desc');  
        $this->db->limit(6,0);
        $query = $this->db->get();
            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }
    }
    
    public function get_most_use_tags()
    {
            $this->db->select('cuisine_type.id AS tag_id,cuisine_type.name AS tag_name,count(restaurant_cuisine_type.cuisine_type_id) as total_tags,count(restaurant_cuisine_type.restaurant_id) as total_restaurant');
            $this->db->from('cuisine_type');
            $this->db->join("restaurant_cuisine_type", "cuisine_type.id=restaurant_cuisine_type.cuisine_type_id", "LEFT");
            $this->db->group_by('cuisine_type.id');
            $this->db->order_by('total_tags', 'desc');  
            $this->db->limit(25,0);
            $query = $this->db->get();

            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }
    }
    
    
    
    public function get_most_user_by_reviews()
    {
        $this->db->select('users.id AS user_id, users.username AS username, users.first_name AS first_name, users.last_name AS last_name, users.user_image_url AS user_image, users.cover_image_url AS cover_image_url ,hb_countries.country_name as country_name,COUNT(restaurant_comments.user_id) AS user_comments');
        $this->db->from('users');
        $this->db->join("restaurant_comments", "users.id=restaurant_comments.user_id", "LEFT");
        $this->db->join("hb_countries", "hb_countries.country_id=users.country", "LEFT");
        $this->db->group_by('users.id');
        $this->db->order_by('user_comments', 'desc');  
        $this->db->limit(6,0);
        $query = $this->db->get();
            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }
    }
    
    
    public function get_restaurant_reviews($id)
    {
        $this->db->select('restaurant.id AS restaurant_id,restaurant_comments.id AS comments_id,restaurant_comments.date AS coments_date,restaurant_comments.comment AS rec_comments,restaurant_comments.rating AS user_rating,users.first_name AS first_name,users.last_name AS last_name,users.user_image_url AS user_image');
        $this->db->from('restaurant');
        $this->db->join("restaurant_comments", "restaurant.id=restaurant_comments.restaurant_id", "LEFT");
        $this->db->join("users", "users.id=restaurant_comments.user_id", "LEFT");
        $this->db->where('restaurant_id', $id);
        $this->db->order_by('coments_date', 'desc');  
        $query = $this->db->get();
        
            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }
    }
    
    public function add_user_comment($user_id,$restaurant_id,$comment,$rating){
     
     
     $data = array(
         'user_id' => $user_id,
         'comment' => $comment,
         'date'    => date("Y-m-d h:i:s"),
         'rating'  => $rating,
         'restaurant_id' => $restaurant_id        
     );
     
     $query= $this->db->insert('restaurant_comments', $data);
     return $query;	
     
    }
    
    function get_restaurant_branches_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('restaurant_branches');
        $this->db->where('restaurant_id', $id);
        $query = $this->db->get();

        if($query->num_rows()<1){
         return null;
        }
        else{
         return $query->result();
        }
    }
    
    	public function user_exist($username)
	{
		$query= $this->db->select(array('user_name'))
			         ->from('restaurant')
			         ->where('user_name', $username)
			         ->get();
		//return $result= $query->first_row();
		return $result= $query->num_rows(); 

	}

	public function restaurant_name_exist($name)
	{
		$query= $this->db->select(array('name'))
			         ->from('restaurant')
			         ->where('name', $name)
			         ->get();
		//return $result= $query->first_row();
		return $result= $query->num_rows(); 
	}
        
        public function add_restaurant($post, $image)
	{
		$name= $this->input->post('name');
		$description= $this->input->post('description');
		$country_id= $this->input->post('country');
		$city_id= $this->input->post('city');
		$user_name= $this->input->post('u_name');
		$web_address= $this->input->post('website_address');
                $phone= $this->input->post('phone');
                $mobile= $this->input->post('mobile');
                $email= $this->input->post('email');

                
		$data = array(
		'name'=>$name,
		'logo_url' =>  $image['logo'] != 'http://localhost/hungry_buddies/uploads/restaurantimages' ? $image['logo'] : 'NULL',
		'cover_image_url' => $image['cover'] ? $image['cover'] : 'NULL',
		'description'=>$description,
		'website_address'=> $web_address,
		'country_id'=> $country_id,
		'city_id'=> $city_id != "" ? $city_id : 0,
		'user_name'=> $user_name,
		'created_datetime' => date("Y-m-d H:i:s")
		);
		
                //echo "<pre>";
                //print_r($data);
                //exit();
		
		//Add First Entry to Resturant Table
		$query= $this->db->insert('restaurant', $data);
		$last_id = $this->db->insert_id();
		
		//Add Email Address
                if(!empty($email)){
		$query= $this->db->insert('restaurant_email', array('restaurant_id' => $last_id, 'email' => $email ));
                }
		//End email Add
                
                if(!empty($phone)){
		$query= $this->db->insert('restaurant_phone_no', array('restaurant_id' => $last_id, 'phone_no' => $phone ));
                }
                //end phone number

		//Add Mobile Number
                if(!empty($mobile)){
		$query= $this->db->insert('restaurant_mobile_no', array('restaurant_id' => $last_id, 'mobile_no' => $mobile ));
                 }
                //end add mobile
					
		return $query;		
		
	}//Add function End
	
        
        
        public function get_restaurant_by_cusine_type($cuisine_type_id,$start,$content_per_page)
        {
         $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name,restaurant.logo_url AS logo_url,restaurant.description AS description,hb_countries.country_code as country_name,cities.city_name as city_name');
         $this->db->from('restaurant');
         $this->db->join("restaurant_cuisine_type", "restaurant.id=restaurant_cuisine_type.restaurant_id", "LEFT");
         $this->db->join("cuisine_type", "restaurant_cuisine_type.cuisine_type_id = cuisine_type.id", "LEFT");
         $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
         $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
         $this->db->where('restaurant_cuisine_type.cuisine_type_id', $cuisine_type_id);
         $this->db->order_by('restaurant_cuisine_type.id', 'desc');  
         $this->db->limit($content_per_page,$start);
         $query = $this->db->get();
        
            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }
        }
                

    public function get_all_content($start,$content_per_page)
    {
        $sql = "SELECT * FROM  restaurant LIMIT $start,$content_per_page";       
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function get_all_count()
    {
        $sql = "SELECT COUNT(*) as tol_records FROM restaurant";       
        $result = $this->db->query($sql)->row();
        return $result;
    }
    
    public function get_restaurant_menus($resturant_id)
    {
        $this->db->select('restaurant_menu_items.name AS menu_name,restaurant_menu_items.price AS menu_price,restaurant_menu_items.description AS description,restaurant_menu_images.image_url AS menu_image ');
        $this->db->from('restaurant_menu_items');
        $this->db->join("restaurant_menu", "restaurant_menu_items.menu_id = restaurant_menu.id", "LEFT");
        $this->db->join("restaurant_menu_images", "restaurant_menu_images.item_id = restaurant_menu_items.id", "LEFT");
        $this->db->where('restaurant_menu.restaurant_id', $resturant_id);
        $this->db->order_by('restaurant_menu_items.id', 'desc');  
        $query = $this->db->get();
        
            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }
    }
    
    
    public function get_count_restaurant_by_cusine_type($category_id)
    {
        $sql = "SELECT COUNT(*) as tol_records FROM restaurant_cuisine_type where cuisine_type_id=$category_id";       
        $result = $this->db->query($sql)->row();
        return $result;
    }
    
    
    public function get_restaurant_rating_by_id($restaurant_id)
    {
         $sql = "SELECT (SUM(rating) / COUNT(user_id)) AS average_vote FROM restaurant_comments WHERE restaurant_id=$restaurant_id";       
        $result = $this->db->query($sql)->row();
        return $result;
    }
      
    
    public function count_user_comments($user_id)
    {
        $sql = "SELECT count(restaurant_comments.id) as total_comments FROM restaurant_comments WHERE user_id=$user_id";       
        $result = $this->db->query($sql)->row();
        return $result;
        
        
    }
    
    public function count_user_bookmarks($user_id)
    {
       $sql = "SELECT count(user_fav_restaurant.id) as total_bookmarks FROM user_fav_restaurant WHERE user_id=$user_id";       
       $result = $this->db->query($sql)->row();
       return $result; 
    }
    public function count_profile_visit($user_id)
    {
        $sql = "SELECT count(user_visited_places.id) as total_visits FROM user_visited_places WHERE user_id=$user_id";       
       $result = $this->db->query($sql)->row();
       return $result; 
        
    }
    public function count_user_profile_share($user_id)
    {
       $sql = "SELECT count(restaurant_page_share.id) as profile_shares FROM restaurant_page_share WHERE user_id=$user_id";       
       $result = $this->db->query($sql)->row();
       return $result; 
    }
    public function count_user_fav_restaurant($user_id)
    {
       $sql = "SELECT count(user_fav_restaurant.id) as total_favourites FROM user_fav_restaurant WHERE user_id=$user_id";       
       $result = $this->db->query($sql)->row();
       return $result; 
    }
    public function count_user_feeds($user_id)
    {
        $this->db->select('count(feeds.id) as total');
        $this->db->from('feeds');
        $this->db->where('user_id', $user_id);
        $this->db->where('feeds.flag_status', '0');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->row();
        }
    }
    
    
    public function count_user_been_restaurant($user_id)
    {
        
    }
    
    
    public function get_user_comments($user_id)
    {
        $where="user_id=$user_id";
        $this->db->select('id AS coments_id,user_id AS user_id,restaurant_id,COMMENT AS rec_comments,DATE AS coments_date,rating as user_rating');
        $this->db->from('restaurant_comments');
        $this->db->where($where);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
        
    }
    
    
    public function get_user_bookmars($user_id)
    {
        $where="user_fav_restaurant.user_id=$user_id";
       $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount');
        $this->db->from('restaurant');
        $this->db->join("user_fav_restaurant", "restaurant.id =user_fav_restaurant.restaurant_id", "INNER");
         $this->db->where($where);
        $this->db->order_by('restaurant.id', 'DESC');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }
    
    
    public function get_user_visits($user_id)
    {
        $where="user_visited_places.user_id=$user_id";
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount');
        $this->db->from('restaurant');
        $this->db->join("user_visited_places", "restaurant.id =user_visited_places.restaurant_id", "INNER");
        $this->db->where($where);
        $this->db->order_by('restaurant.id', 'DESC');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }
    
    
    public function get_user_shares($user_id)
    {
        $where="restaurant_page_share.user_id=$user_id";
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount');
        $this->db->from('restaurant');
        $this->db->join("restaurant_page_share", "restaurant.id =restaurant_page_share.restaurant_id", "INNER");
        $this->db->where($where);
        $this->db->order_by('restaurant.id', 'DESC');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }
    
    
    public function get_count_restaurant_by_tags($category_id)
    {
        $sql = "SELECT COUNT(*) as tol_records FROM restaurant_selected_tags where tag='$category_id'";  
        $result = $this->db->query($sql)->row();
        return $result;
    }
    
    
    
    public function get_restaurant_by_tags($cuisine_type_id)
        {
         $where="restaurant_selected_tags.tag='$cuisine_type_id'";
         $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name,restaurant.logo_url AS logo_url,restaurant.description AS description,hb_countries.country_code as country_name,cities.city_name as city_name');
         $this->db->from('restaurant_selected_tags');
         $this->db->join("restaurant", "restaurant_selected_tags.restaurant_id=restaurant.id", "INNER");
         $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "INNER");
         $this->db->join("cities", "restaurant.city_id = cities.city_id", "INNER");
         $this->db->where($where);
         $this->db->order_by('restaurant_selected_tags.tag', 'desc');  
        
         
         $query = $this->db->get();
  
            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }
        }
        
        public function get_restaurant_by_services($service_id)
        {
         $where="FIND_IN_SET($service_id, restaurant.server)";
         $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name,restaurant.logo_url AS logo_url,restaurant.description AS description,hb_countries.country_code as country_name,cities.city_name as city_name');
         $this->db->from('restaurant');
         $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "INNER");
         $this->db->join("cities", "restaurant.city_id = cities.city_id", "INNER");
         $this->db->where($where);
         $this->db->order_by('restaurant.id', 'desc');  
         $query = $this->db->get();
  
            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }
        }
        
        public function get_all_popular_restaurant()
        {
            $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews,(SUM(restaurant_comments.rating)/COUNT(restaurant_comments.user_id)) AS average_vote,(AVG(restaurant_comments.rating)/COUNT(restaurant_comments.user_id)) AS average_votes');
            $this->db->from('restaurant');
            $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
            $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
            $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
            $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
            $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
            $this->db->group_by('restaurant_id');
            $this->db->order_by('average_votes', 'desc');  
            $this->db->limit(6,0);
            $query = $this->db->get();

            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }
        }
        
        
        
}
