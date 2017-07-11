<?php

class Restaurant_search extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    
    
    
    function search_restaurant($keyword = '', $uid = 0, $lat = 'NULL', $lng = 'NULL',$start = 0, $limit = 10)
    {
        $this->db->select('SQL_CALC_FOUND_ROWS null as rows,restaurant.id AS restaurant_id,restaurant.name AS restaurant_name,restaurant.logo_url AS restaurant_logo,
                            restaurant.cover_image_url AS restaurant_cover_image,restaurant.min_price as min_price,restaurant.max_price as max_price,restaurant.website_address AS restaurant_website,
                            IF(LOCATE(2,restaurant.server) > 0,"YES","NO") AS restaurant_online_delievery,ct.cuisine_type AS restaurant_type,
                            rt.rating AS restaurant_rating,COALESCE(rt.rating_count,"0") AS restaurant_rating_count, IF(user_fav_restaurant.id IS NULL, "NO", "YES") AS bookmark_status,
                            IF(user_visited_places.id IS NULL, "NO", "YES") AS been_status,IF(restaurant_comments.id IS NULL, "NO", "YES") AS restaurant_review,bt.distance', false);
        $this->db->from("(SELECT id AS restaurant_id FROM restaurant WHERE restaurant.name LIKE '$keyword%' UNION SELECT restaurant_id FROM restaurant_selected_tags WHERE tag LIKE '$keyword%') AS ut");
        $this->db->join("restaurant", "ut.restaurant_id  = restaurant.id", "INNER");
        $this->db->join("user_fav_restaurant", "restaurant.id = user_fav_restaurant.restaurant_id", "LEFT");
        $this->db->join("(SELECT dt.restaurant_id,dt.id,distance FROM (SELECT restaurant_branches.restaurant_id,restaurant_branches.id,CONCAT(ROUND(( 3959 * ACOS( COS( RADIANS($lat) ) * COS( RADIANS( latitude ) ) * COS( RADIANS( longitude ) - RADIANS($lng) ) + SIN( RADIANS($lat) ) * SIN( RADIANS( latitude ) ) ) ),2),' miles') AS distance FROM restaurant_branches ORDER BY distance) AS dt GROUP BY dt.restaurant_id)AS bt", "restaurant.id = bt.restaurant_id", "LEFT");
        $this->db->join("(SELECT GROUP_CONCAT(NAME SEPARATOR ',') AS cuisine_type,restaurant_id FROM restaurant_cuisine_type INNER JOIN cuisine_type ON restaurant_cuisine_type.cuisine_type_id = cuisine_type.id GROUP BY restaurant_id) AS ct", "restaurant.id = ct.restaurant_id", "LEFT");
        $this->db->join("(SELECT ROUND(AVG(rating),1) AS rating,restaurant_id,COUNT(rating) AS rating_count FROM restaurant_comments GROUP BY restaurant_id)AS rt", "restaurant.id = rt.restaurant_id", "LEFT");
        $this->db->join("restaurant_comments", "restaurant.id=restaurant_comments.restaurant_id AND restaurant_comments.user_id = '$uid'", "LEFT");
        $this->db->join("user_visited_places", "bt.id = user_visited_places.restaurant_id AND user_visited_places.user_id = '$uid'", "LEFT");
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }  
    }
    
    
    
    
    
    
    public function get_restaurant_by_keyword($keyword) {
        
            $like="restaurant.name like '$keyword%'";
            $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
            $this->db->from('restaurant');
            $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
            $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
            $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
            $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
            $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
            $this->db->where($like);
            $this->db->group_by('restaurant.id');
            $this->db->order_by('average_vote', 'desc');  
            $this->db->limit(30, 0);
            $query = $this->db->get();

            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }  
        
    }
    
    public function get_restaurant_by_location( $location ){
       
    $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
    $this->db->from('restaurant');
    $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
    $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
    $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
    $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
    $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
    $this->db->where('restaurant.country_id', $location);
    $this->db->group_by('restaurant.id');
    $this->db->order_by('average_vote', 'desc'); 
    $this->db->limit(30, 0);
    $query = $this->db->get();
    
//    echo $query; 
//    exit;
    
        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }   //end condition 
       
    }//end function
    
    public function get_restaurant_by_name_location( $keyword , $location ) {
        
    $like="restaurant.country_id=$location AND restaurant.name like '$keyword%'";
    $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
    $this->db->from('restaurant');
    $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
    $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
    $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
    $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
    $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
    $this->db->where($like);
    $this->db->group_by('restaurant.id');
    $this->db->order_by('average_vote', 'desc');  
    $this->db->limit(30, 0);
    $query = $this->db->get();
       

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }   //end condition            
    }
 /*   
    public function get_featured_restaurant_location()
    {        
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
        $this->db->from('restaurant');
        $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
        $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
        $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
        $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
        $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
        $this->db->where('restaurant.country_id', $location);
        $this->db->group_by('restaurant.id');
        $this->db->order_by('restaurant_id', 'desc');  
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }  
        
    }
*/    
    
    public function get_latest_restaurant()
    {
      $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.created_datetime as created_datetime,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
     $this->db->from('restaurant');
     $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
     $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
     $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
     $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
     $this->db->group_by('restaurant.id');
     $this->db->order_by('average_vote', 'DESC');  
     $this->db->limit(30, 0);
     $query = $this->db->get();
        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }  
    }
    
    public function  get_oldest_restaurant()
    {
     $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.created_datetime as created_datetime,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
     $this->db->from('restaurant');
     $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
     $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
     $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
     $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
     $this->db->group_by('restaurant.id');
     $this->db->order_by('average_vote', 'asc');  
     $this->db->limit(30, 0);
     $query = $this->db->get();
        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }  
    }
   
    
    public function  get_maxprice_restaurant()
    {
    $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.created_datetime as created_datetime,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
    $this->db->from('restaurant');
    $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
    $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
    $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
    $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
    $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
    $this->db->group_by('restaurant.id');
    $this->db->order_by('restaurant_max_price', 'desc');  
    $this->db->limit(30, 0);
    $query = $this->db->get();
       

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }  
    }
    
    
    public function  get_minprice_restaurant()
    {
    $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.created_datetime as created_datetime,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews');
    $this->db->from('restaurant');
    $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
    $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
    $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
    $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
    $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
    $this->db->group_by('restaurant.id');
    $this->db->order_by('restaurant_min_price', 'desc');  
    $this->db->limit(30, 0);
    $query = $this->db->get();
       

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }  
    }
    
    
    public function get_latest_restaurant_by_keyword($keyword) {
        
            $like="restaurant.name like '$keyword%'";
            $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.created_datetime as created_datetime,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
            $this->db->from('restaurant');
            $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
            $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
            $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
            $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
            $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
            $this->db->where($like);
            $this->db->group_by('restaurant.id');
            $this->db->order_by('average_vote', 'DESC');  
            $this->db->limit(30, 0);
            $query = $this->db->get();

            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }  
        
    }
    
    
    public function get_oldest_restaurant_by_keyword($keyword) {
        
         $like="restaurant.name like '$keyword%'";    
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.created_datetime as created_datetime,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
            $this->db->from('restaurant');
            $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
            $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
            $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
            $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
            $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
            $this->db->where($like);
            $this->db->group_by('restaurant.id');
            $this->db->order_by('average_vote', 'ASC');  
            $this->db->limit(30, 0);
            $query = $this->db->get();

            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }  
        
    }
    
    
    
    public function get_latest_restaurant_by_location($location){
    $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
    $this->db->from('restaurant');
    $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
    $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
    $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
    $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
    $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
    $this->db->where('restaurant.country_id', $location);
    $this->db->group_by('restaurant.id');
    $this->db->order_by('average_vote', 'DESC');  
    $this->db->limit(30, 0);
    $query = $this->db->get();
   
        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }   
       
    }//end function
    
    
    
    public function get_oldest_restaurant_by_location($location){
    $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
    $this->db->from('restaurant');
    $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
    $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
    $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
    $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
    $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
    $this->db->where('restaurant.country_id', $location);
    $this->db->group_by('restaurant.id');
     $this->db->order_by('average_vote', 'ASC');  
    $this->db->limit(30, 0);
    $query = $this->db->get();
    if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }   
       
    }//end function
    
    public function get_latest_restaurant_by_keylocation( $keyword , $location ) {
        
    $like="restaurant.name like '$keyword%'";
    $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
    $this->db->from('restaurant');
    $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
    $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
    $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
    $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
    $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
    $this->db->where('restaurant.country_id', $location);
    $this->db->like('restaurant.name', $keyword);
    $this->db->group_by('restaurant.id');
     $this->db->order_by('average_vote', 'DESC');  
    $this->db->limit(30, 0);
    $query = $this->db->get();
       

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }   //end condition            
    }
    
    public function get_oldest_restaurant_by_keylocation( $keyword , $location ) {
        
    $like="restaurant.name like '$keyword%'";
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
    $this->db->from('restaurant');
    $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
    $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
    $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
    $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
    $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
    $this->db->where('restaurant.country_id', $location);
    $this->db->like('restaurant.name', $keyword);
    $this->db->group_by('restaurant.id');
     $this->db->order_by('average_vote', 'ASC');  
    $this->db->limit(30, 0);
    $query = $this->db->get();
       

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }   //end condition            
    }
    
    
    public function get_open_restaurant()
    {
        $current_day=date("l");        
        $where="restaurant_timing.start_time != '00:00:00' AND restaurant_timing.end_time != '00:00:00' AND restaurant_timing.status=1 AND restaurant_timing.day='$current_day'";
        $this->db->select('*');
        $this->db->from('restaurant');
        $this->db->join("restaurant_timing", "restaurant.id = restaurant_timing.restaurant_id");
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() < 1) {
           return null;
        } else {
           return $query->result();
        }
        
    }
    
    
    public function get_open_restaurant_by_keyword($keyword)
    {
        $current_day=date("l");        
        $where="restaurant_timing.start_time != '00:00:00' AND restaurant_timing.end_time != '00:00:00' AND restaurant_timing.status=1 AND restaurant_timing.day='$current_day' AND restaurant.name like '$keyword%'";
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,restaurant_timing.start_time as start_time ,restaurant_timing.end_time as end_time,restaurant_timing.day as day, COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
        $this->db->from('restaurant');
        $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
        $this->db->join("restaurant_timing", "restaurant.id = restaurant_timing.restaurant_id");
        $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
        $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
        $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
        $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
        $this->db->where($where);
        $this->db->group_by('restaurant.id');
        $this->db->order_by('average_vote', 'DESC');  
        $this->db->limit(30, 0);
        $query = $this->db->get();
       

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }  
    }
    
    public function get_open_restaurant_by_location($location)
    {
       $current_day=date("l");        
       $where="restaurant.country_id=$location AND restaurant_timing.start_time != '00:00:00' AND restaurant_timing.end_time != '00:00:00' AND restaurant_timing.status=1 AND restaurant_timing.day='$current_day'";
       $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,restaurant_timing.start_time as start_time ,restaurant_timing.end_time as end_time,restaurant_timing.day as day, COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
       $this->db->from('restaurant');
       $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
       $this->db->join("restaurant_timing", "restaurant.id = restaurant_timing.restaurant_id");
       $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
       $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
       $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
       $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
       $this->db->where($where);
       $this->db->group_by('restaurant.id');
       $this->db->order_by('average_vote', 'Desc');  
       $this->db->limit(30, 0);
       $query = $this->db->get();
       if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }   
    }
    
    public function get_open_restaurant_by_keylocation($keyword , $location)
    {
        $current_day=date("l"); 
        
        $where="restaurant.country_id=$location AND restaurant_timing.start_time != '00:00:00' AND restaurant_timing.end_time != '00:00:00' AND restaurant_timing.status=1 AND restaurant_timing.day='$current_day' AND restaurant.name like '$keyword%'";
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,restaurant_timing.start_time as start_time ,restaurant_timing.end_time as end_time,restaurant_timing.day as day, COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
        $this->db->from('restaurant');
        $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
        $this->db->join("restaurant_timing", "restaurant.id = restaurant_timing.restaurant_id");
        $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
        $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
        $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
        $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
        $this->db->where($where);
        $this->db->group_by('restaurant.id');
        $this->db->order_by('average_vote', 'DESC');  
        $this->db->limit(30, 0);
        $query = $this->db->get();
        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }  
    }
    
    
    public function get_discount_restaurant_by_keyword($keyword)
    {
        $where="restaurant.restaurant_discount!='no' AND restaurant.name like '$keyword%'";
        
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.created_datetime as created_datetime,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
            $this->db->from('restaurant');
            $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
            $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
            $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
            $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
            $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
            $this->db->where($where);
            $this->db->group_by('restaurant.id');
            $this->db->order_by('average_vote', 'ASC');  
            $this->db->limit(30, 0);
            $query = $this->db->get();

            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }  
        
    }
    
    
    public function get_discount_restaurant_by_location($location)
    {
        $where="restaurant.country_id=$location AND restaurant.restaurant_discount!='no'";
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
    $this->db->from('restaurant');
    $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
    $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
    $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
    $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
    $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
    $this->db->where($where);
    $this->db->group_by('restaurant.id');
     $this->db->order_by('average_vote', 'ASC');  
    $this->db->limit(30, 0);
    $query = $this->db->get();
    if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }  
        
        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }   //end condition         
        
    }
    
    public function get_discount_restaurant_by_keylocation($keyword,$location)
    {
        $where="restaurant.country_id=$location AND restaurant.restaurant_discount!='no' AND restaurant.name like '$keyword%'";
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
        $this->db->from('restaurant');
        $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
        $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
        $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
        $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
        $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
        $this->db->where($where);
        $this->db->group_by('restaurant.id');
        $this->db->order_by('average_vote', 'ASC');  
        $this->db->limit(30, 0);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }   //end condition         
    }
    
    public function get_near_restaurant_by_keyword($keyword)
    {
        $where="restaurant.name like '$keyword%'";
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name, (3959 * ACOS( COS( RADIANS(37) ) * COS( RADIANS( restaurant_branches.latitude ) ) * COS( RADIANS( restaurant_branches.longitude ) - RADIANS(-122) ) + SIN( RADIANS(37) ) * SIN( RADIANS( restaurant_branches.latitude ) ) ) ) AS distance,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
        $this->db->from('restaurant');
        $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
        $this->db->join("restaurant_branches", "restaurant.id=restaurant_branches.restaurant_id", "LEFT");
        $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
        $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
        $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
        $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
        $this->db->where($where);
        $this->db->group_by('restaurant.id');
        $this->db->having('distance>5');
        $this->db->order_by('distance', 'desc'); 
        $this->db->limit(30, 0);
        $query = $this->db->get();
            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }  
    }
    
    
    public function get_near_restaurant_by_location($location)
    {
     $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name, (3959 * ACOS( COS( RADIANS(37) ) * COS( RADIANS( restaurant_branches.latitude ) ) * COS( RADIANS( restaurant_branches.longitude ) - RADIANS(-122) ) + SIN( RADIANS(37) ) * SIN( RADIANS( restaurant_branches.latitude ) ) ) ) AS distance,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
     $this->db->from('restaurant');
     $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
     $this->db->join("restaurant_branches", "restaurant.id=restaurant_branches.restaurant_id", "LEFT");
     $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
     $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
     $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
     $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
     $this->db->where('restaurant.country_id', $location);
     $this->db->group_by('restaurant.id');
     $this->db->having('distance >5');
     $this->db->order_by('distance', 'desc'); 
     $this->db->limit(30,0);
     $query = $this->db->get();
    
//    echo $query; 
//    exit;
    
        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        } 
    }
    
    public function get_near_restaurant_by_keylocation($keyword,$location)
    {
        $where="restaurant.country_id=$location AND restaurant.name like '$keyword%'";
        $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name, (3959 * ACOS( COS( RADIANS(37) ) * COS( RADIANS( restaurant_branches.latitude ) ) * COS( RADIANS( restaurant_branches.longitude ) - RADIANS(-122) ) + SIN( RADIANS(37) ) * SIN( RADIANS( restaurant_branches.latitude ) ) ) ) AS distance,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
        $this->db->from('restaurant');
        $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
        $this->db->join("restaurant_branches", "restaurant.id=restaurant_branches.restaurant_id", "LEFT");
        $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
        $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
        $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
        $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
        $this->db->where($where);
        $this->db->group_by('restaurant.id');
        $this->db->having('distance >5');
        $this->db->order_by('distance', 'desc'); 
        $this->db->limit(30, 0);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }   //end condition   
    }
    
    public function get_most_use_tags_side()
    {
            $this->db->select('cuisine_type.id AS tag_id,cuisine_type.name AS tag_name,count(restaurant_cuisine_type.cuisine_type_id) as total_tags');
            $this->db->from('cuisine_type');
            $this->db->join("restaurant_cuisine_type", "cuisine_type.id=restaurant_cuisine_type.cuisine_type_id", "LEFT");
            $this->db->group_by('cuisine_type.id');
            $this->db->order_by('total_tags', 'desc');  
            $this->db->limit(10,0);
            $query = $this->db->get();

            if ($query->num_rows() < 1) {
                return null;
            } else {
                return $query->result();
            }
    }
    
    
    
    public function get_all_count_retaurant_by_keyword($keyword)
    {
        $sql = "SELECT COUNT(*) as tol_records FROM restaurant where name like '$keyword%'";       
        $result = $this->db->query($sql)->row();
        return $result;
    }
    
    
    public function get_all_count_retaurant_by_location($keyword)
    {
        $where="country_id=$keyword";
        $sql = "SELECT COUNT(*) as tol_records FROM restaurant where $where";       
        $result = $this->db->query($sql)->row();
        return $result;
    }
 
    
    public function get_restaurant_by_locations($location,$start,$content_per_page){
       
    $this->db->select('restaurant.id AS restaurant_id,restaurant.name AS restaurant_name ,restaurant.logo_url AS logo_url,restaurant.cover_image_url AS cover_image_url ,restaurant.description AS description,restaurant.website_address AS website_address,restaurant.server AS restaurant_server,restaurant.min_price AS restaurant_min_price,restaurant.max_price AS restaurant_max_price,restaurant.min_order AS restaurant_min_order,restaurant.delivery_charges AS delivery_charges,restaurant.restaurant_discount AS restaurant_discount,hb_countries.country_name as country_name,cities.city_name as city_name,cuisine_type.name as cousine_name,COUNT(restaurant_comments.restaurant_id) AS restaurant_reviews,(SUM(restaurant_comments.rating) / COUNT(restaurant_comments.user_id)) AS average_vote');
    $this->db->from('restaurant');
    $this->db->join("restaurant_comments", "restaurant.id =restaurant_comments.restaurant_id", "LEFT");
    $this->db->join("hb_countries", "hb_countries.country_id=restaurant.country_id", "LEFT");
    $this->db->join("cities", "restaurant.city_id = cities.city_id", "LEFT");
    $this->db->join("restaurant_cuisine_type", "restaurant_cuisine_type.restaurant_id =restaurant.id", "LEFT");
    $this->db->join("cuisine_type", "cuisine_type.id =restaurant_cuisine_type.cuisine_type_id", "LEFT");
    $this->db->where('restaurant.country_id', $location);
    $this->db->group_by('restaurant.id');
    $this->db->order_by('average_vote', 'desc'); 
    $this->db->limit($content_per_page, $start);
    $query = $this->db->get();
    
//    echo $query; 
//    exit;
    
        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }   //end condition 
       
    }//end function
}
