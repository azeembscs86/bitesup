<?php 
error_reporting(0);
class Restaurantsmodel extends CI_Model{

	public function count_all_restaurants()
	{
		$query= $this->db->select('*')
				         ->from('restaurant')
				         ->get();

		return $query->num_rows();        
	}

	public function all_restaurants_list( $limit, $offset )
	{
		$query= $this->db->select('*')
				         ->from('restaurant')
				         ->join('hb_countries','hb_countries.country_id=restaurant.country_id')
				         ->order_by('created_datetime', 'DESC')
				         ->limit( $limit, $offset )
				         ->get();

		return $query->result();        
	}

	public function search_by_name($search_name)
	{
		$query= $this->db->select()
				         ->from('restaurant')
				         ->join('hb_countries','hb_countries.country_id=restaurant.country_id')
				         ->like('name', $search_name)
				         ->order_by('created_datetime', 'DESC')
				         ->get();

		return $query->result();   
	}

	public function count_search_by_name($search_name)
	{
		$query= $this->db->select()
				         ->from('restaurant')
				         ->join('hb_countries','hb_countries.country_id=restaurant.country_id')
				         ->like('name', $search_name)
				         ->get();

		return $query->num_rows();   
	}
	
	public function search_by_multiples($search_name, $search_country )
	{
		$query= $this->db->select()
				         ->from('restaurant')
				         ->join('hb_countries','hb_countries.country_id=restaurant.country_id')
				         ->where('restaurant.country_id', $search_country)
				         ->like('name', $search_name)
				         ->order_by('created_datetime', 'DESC')
				         ->get();

		return $query->result();   
	}

	public function count_search_by_multiples( $search_name, $search_country )
	{
		$query= $this->db->select()
				         ->from('restaurant')
				         ->join('hb_countries','hb_countries.country_id=restaurant.country_id')
				         ->where('restaurant.country_id', $search_country)
				         ->like('name', $search_name)
				         ->order_by('created_datetime', 'DESC')
				         ->get();

		return $query->num_rows();
	}

	public function search_by_country($search_country)
	{
		$query= $this->db->select('*')
				         ->from('restaurant')
				         ->join('hb_countries','hb_countries.country_id=restaurant.country_id')
				         ->where('restaurant.country_id', $search_country)
				         ->order_by('created_datetime', 'DESC')
				         ->get();

		return $query->result();   
	}

	public function count_search_by_country($search_country)
	{
		$query= $this->db->select('*')
				         ->from('restaurant')
				         ->join('hb_countries','hb_countries.country_id=restaurant.country_id')
				         ->where('restaurant.country_id', $search_country)
				         ->get();

		return $query->num_rows();   
	}


	public function search_by_other($search_other)
	{
		if($search_other) {
 		     		
		$query= $this->db->select('*')
				         ->from('restaurant')
				         ->join('hb_countries','hb_countries.country_id=restaurant.country_id')
				         ->join('restaurant_email','restaurant_email.restaurant_id=restaurant.id')
				         ->join('restaurant_phone_no','restaurant_phone_no.restaurant_id=restaurant.id')
				         ->join('restaurant_mobile_no','restaurant_mobile_no.restaurant_id=restaurant.id')
				         ->where(array("$search_other= "  => ''))
				         ->get();
						
		return $query->result(); 
		}//end if condition 
	}
	
	public function count_search_by_other($search_other)
	{
		if($search_other) {
 		     		
		$query= $this->db->select('*')
				         ->from('restaurant')
				         ->join('hb_countries','hb_countries.country_id=restaurant.country_id')
				         ->join('restaurant_email','restaurant_email.restaurant_id=restaurant.id')
				         ->join('restaurant_phone_no','restaurant_phone_no.restaurant_id=restaurant.id')
				         ->join('restaurant_mobile_no','restaurant_mobile_no.restaurant_id=restaurant.id')
				         ->where(array("$search_other= "  => ''))
				         ->get();
						
		return $query->num_rows(); 
		}//end if condition 
	}
	
	public function search_by_date($date_from, $date_to)
	{
		$query= $this->db->select()
				         ->from('restaurant')
				         ->join('hb_countries','hb_countries.country_id=restaurant.country_id')
				         ->where('created_datetime >=', $date_from)
				         ->where('created_datetime <=', $date_to)

				         ->get();

		return $query->result();   
	}
	
	public function Add_restaurant($post, $image, $promotion_banner)
	{
		$name= $this->input->post('name');
		$description= $this->input->post('description');
		$country_id= $this->input->post('country');
		$city_id= $this->input->post('city');
		$user_name= $this->input->post('u_name');
		$cuise_type= $this->input->post('cuisine_type');
		$pay_method= $this->input->post('payment_method');
		$web_address= $this->input->post('website_address');
		$min_price= $this->input->post('price_from');
		$max_price= $this->input->post('price_to');
		$min_order= $this->input->post('min_delivery');
		$delevery_charges= $this->input->post('delivery_charges');
		$timing_day= $this->input->post('day');
		$timing_start= $this->input->post('start_time');
		$timing_end= $this->input->post('ending_time');
		$timing_status= $this->input->post('status');
		$server= $this->input->post('services');
		$server_imp= @implode("|", $server);
		$social_id= $this->input->post('social_acc_id');
		$social_link= $this->input->post('link');
		$tags_data = $this->input->post('tags_data');
		$tags = @explode("," , $tags_data);
		
		$discount_exist= $this->input->post('restaurant_discount');
                $discount= $this->input->post('discount');
              
                //Check and Assign discount value
                if(!empty($discount_exist) && !empty( $discount) ){
                    $discount_rate= $discount;  //Assign discount value  
                } 
                else {
                    $discount_rate= "no";
                }
		



		$data = array(
		'name'=>$name,
		'logo_url' =>  $image['logo'] != 'http://localhost/masterbites_admin/uploads/restaurants_images' ? $image['logo'] : 'NULL',
		'cover_image_url' => $image['cover'] ? $image['cover'] : 'NULL',
		'description'=>$description,
		'website_address'=> $web_address,
		'server'=> $server_imp ? $server_imp : '',
		'min_price'=> $min_price,
		'max_price'=> $max_price,
		'country_id'=> $country_id,
		'city_id'=> $city_id != "" ? $city_id : 0,
		'min_order'=> $min_order,
		'delivery_charges'=> $delevery_charges,
		'user_name'=> $user_name,
		'salt'=> $user_name,
		'restaurant_discount' => $discount_rate,
		'created_datetime' => date("Y-m-d H:i:s")
		);
		
		//echo "<pre>";
		//print_r($data);
		//exit();
		
		//Add First Entry to Resturant Table
		$query= $this->db->insert('restaurant', $data);
		$last_id = $this->db->insert_id();
		
		//Add Promotion Banners
			if( $promotion_banner != 'http://bitesup.com/bitesup_new/uploads/promotions/'  ){
		foreach ($promotion_banner as $row) {
		$query= $this->db->insert('restaurant_promotional_banner', array('restaurant_id' => $last_id, 'image_url' => $row ));
		}//endforeach for payment method
			}

		//Add Email Address
			if( !empty($this->input->post('email')) ){
		foreach ($this->input->post('email') as $email) {
		$query= $this->db->insert('restaurant_email', array('restaurant_id' => $last_id, 'email' => $email ));
		}//endforeach for email
			}//End email Add

		//Add Phone Number
			if( !empty($this->input->post('phone')) ){
		foreach ($this->input->post('phone') as $phone) {
		$query= $this->db->insert('restaurant_phone_no', array('restaurant_id' => $last_id, 'phone_no' => $phone ));
		}//endforeach for phone number
			}//end phone number

		//Add Mobile Number
			if( !empty($this->input->post('mobile')) ){
		foreach ($this->input->post('mobile') as $mobile) {
		$query= $this->db->insert('restaurant_mobile_no', array('restaurant_id' => $last_id, 'mobile_no' => $mobile ));
		}//endforeach for Mobile number
			} //end add mobile
			
		//Add Selected Tags
			if( is_array($tags) && count($tags) > 0 ){
		foreach ($tags as $row) {
		$query= $this->db->insert('restaurant_selected_tags', array('restaurant_id' => $last_id, 'tag' => $row ));
		}//endforeach for email
			}//End Tags Add		

		//Add Cuisine Type
			if(is_array($cuise_type) && count($cuise_type) > 0){
		foreach ($cuise_type as $cuisine_type) {
		$query= $this->db->insert('restaurant_cuisine_type', array('restaurant_id' => $last_id, 'cuisine_type_id' => $cuisine_type ));		
		}//endforeach for Cuisine Type
			}

		//Add payment method
			if(is_array($pay_method) && count($pay_method) > 0){
		foreach ($pay_method as $payment_method) {
		$query= $this->db->insert('restaurant_payment_methods', array('restaurant_id' => $last_id, 'payment_method_id' => $payment_method ));
		}//endforeach for payment method
			}

		//Add Social Account
			if($social_link[0] != ''){
		foreach (array_combine($social_id, $social_link) as $soc_id => $soc_link){
		$query= $this->db->insert('restaurant_social_acc', array('social_acc_id' => $soc_id, 'link'=> $soc_link, 'restaurant_id' => $last_id ));		
		}//endforeach for Social Account
			}


		// Add Restaurant location
		$temp =count($this->input->post('branch_name'));//counting number of row's
		$branch_name= $this->input->post('branch_name');
		$latitude = $this->input->post('latitude');
		$longitude = $this->input->post('longitude');


		for($i=0; $i<$temp;$i++){
			  $data2 = array(
			  'restaurant_id' =>($last_id),
			  'branch_name' =>$branch_name[$i],
			  'latitude' => $latitude[$i],
			  'longitude' => $longitude[$i]
			      );
			   $query = $this->db->insert('restaurant_branches', $data2);
		}//Restaurant Location End


		// Add Restaurant Timings
		$day_data = $_POST['day'];
		$open_hour_from = $_POST['start_time'];
		$open_hour_to = $_POST['ending_time'];
		$open_status = $_POST['status'];

  		for ($i = 0; $i < sizeof($day_data); $i++) {
                    $entry[$i]['day'] = $day_data[$i];
                    $entry[$i]['start_time'] = $open_hour_from[$i];
                    $entry[$i]['end_time'] = $open_hour_to[$i];
                    $entry[$i]['status'] = $open_status[$i];
                }
                foreach ($entry as $row) {
                    if ($row['status'] == '0') {
                        $rowdata['day'] = $row['day'];
                        $rowdata['start_time'] = '00:00:00';
                        $rowdata['end_time'] = '00:00:00';
                        $rowdata['status'] = $row['status'];
                        $rowdata['restaurant_id'] = $last_id;
                         $query = $this->db->insert('restaurant_timing', $rowdata);
                    } else {
                        $row['restaurant_id'] = $last_id;
                         $query = $this->db->insert('restaurant_timing', $row);
                    }
    			} // End Restaurant Timings
		
		return $query;		
		
	}//Add function End
	
	
	
	public function update_restaurant($restaurant_id, $post, $image)
	{
		$name= $this->input->post('name');
		$description= $this->input->post('description');
		$country_id= $this->input->post('country');
		$city_id= $this->input->post('city');
		$phone_id= $this->input->post('phone_id');
		$phone= $this->input->post('phone');
		$mobile_id= $this->input->post('mobile_id');
		$mobile= $this->input->post('mobile');
		$email_id= $this->input->post('email_id');
		$email= $this->input->post('email');
		$user_name= $this->input->post('u_name');
		$cuise_type= $this->input->post('cuisine_type');
		$pay_method= $this->input->post('payment_method');
		$web_address= $this->input->post('website_address');
		$min_price= $this->input->post('price_from');
		$max_price= $this->input->post('price_to');
		$min_order= $this->input->post('min_delivery');
		$delevery_charges= $this->input->post('delivery_charges');
		$timing_day= $this->input->post('day');
		$timing_start= $this->input->post('start_time');
		$timing_end= $this->input->post('ending_time');
		$timing_status= $this->input->post('status');
		$server= $this->input->post('services');
		$server_imp= @implode("|", $server);
		$social_id= $this->input->post('social_acc_id');
		$social_link= $this->input->post('link');
		
		$discount_exist= $this->input->post('restaurant_discount');
                $discount= $this->input->post('discount');
              
                //Check and Assign discount value
                if(!empty($discount_exist) && !empty( $discount) ){
                    $discount_rate= $discount;  //Assign discount value  
                } 
                else {
                    $discount_rate= "no";
                }



		$data = array(
		'name'=>$name,
		'logo_url' =>  $image['logo'],
		'cover_image_url' => $image['cover'],
		'description'=> $description,
		'website_address'=> $web_address,
		'server'=> $server_imp ? $server_imp : '',
		'min_price'=> $min_price,
		'max_price'=> $max_price,
		'country_id'=> $country_id,
		'city_id'=> $city_id != "" ? $city_id : 0,
		'min_order'=> $min_order,
		'delivery_charges'=> $delevery_charges,
		'user_name'=> $user_name,
		'restaurant_discount' => $discount_rate,   
		'salt'=> $user_name,
		);
		
		
		//Edit First Entry to Resturant Table
		$query= $this->db
			     ->where('id', $restaurant_id)
			     ->update('restaurant', $data);		

/*
		//Edit Email Address
		foreach ( @array_combine($email, $email_id) as $row_email => $row_em_id ) {		
		$query= $this->db
			     ->where('id', $row_em_id)
			     ->update('restaurant_email', array('restaurant_id' => $restaurant_id, 'email' => $row_email ));
		}//endforeach for email	

		//Add Phone Number
		foreach ( @array_combine($phone, $phone_id) as $row_phone => $row_ph_id ) {
		$query= $this->db
			     ->where('id', $row_ph_id)
			     ->update('restaurant_phone_no', array('restaurant_id' => $restaurant_id, 'phone_no' => $row_phone ));
		}//endforeach for phone number
		
*/					
		//Add/Edit payment method
			if(is_array($pay_method) && count($pay_method) > 0){
		foreach ($pay_method as $payment_method) {
		$query= $this->db->insert('restaurant_payment_methods', array('restaurant_id' => $restaurant_id, 'payment_method_id' => $payment_method ));
		}//endforeach for payment method
			}		
/*
		// Edit Restaurant location
		$temp =count($this->input->post('branch_name'));//counting number of row's
		$branch_name= $this->input->post('branch_name');
		$branch_id= $this->input->post('branch_id');
		$latitude = $this->input->post('latitude');
		$longitude = $this->input->post('longitude');


		for($i=0; $i<$temp;$i++){
			  $data_id = array( 'id' => $branch_id[$i] );
			  $data2 = array(
			  'restaurant_id' =>($restaurant_id),
			  'branch_name' =>$branch_name[$i],
			  'latitude' => $latitude[$i],
			  'longitude' => $longitude[$i]
			      );
			   $query = $this->db
	   				 ->where( $data_id )
	   				 ->update('restaurant_branches', $data2);
		}//Restaurant Location End
*/			 
/*
		// Edit Restaurant Social
		$temp =count($this->input->post('socaial_id'));//counting number of row's
		$link= $this->input->post('link');
		$social_edit_id= $this->input->post('socaial_id');
		$social_acc = $this->input->post('social_acc_id');


		for($i=0; $i<$temp;$i++){
			  $data_id = array( 'id' => $social_edit_id[$i] );
			  $data2 = array(
			  'restaurant_id' => ($restaurant_id),
			  'social_acc_id' => $social_acc[$i],
			  'link' => $link[$i]
			      );
			   $query = $this->db
	   				 ->where( $data_id )
	   				 ->update('restaurant_social_acc', $data2);
		}//Restaurant Social End	

*/
		$temp =count($this->input->post('day'));//counting number of row's
		$day_data= $this->input->post('day');
		$open_hour_from= $this->input->post('start_time');
		$open_hour_to = $this->input->post('ending_time');
		$open_status= $this->input->post('status');
		$edit_id_data = $this->input->post('d_id');


		for($i=0; $i<$temp;$i++){
			  $data_id = array( 'id' => $edit_id_data[$i] );
			  $data2 = array(
			  'restaurant_id' => ($restaurant_id),
			  'day' => $day_data[$i],
			  'start_time' => $open_hour_from[$i],
			  'end_time' => $open_hour_to[$i],
			  'status' => $open_status[$i]
			      );
			   $query = $this->db
	   				 ->where( $data_id )
	   				 ->update('restaurant_timing', $data2);
		}
  		 //Edit Restaurant Timings  End

		return $query;		
		
	}//Update function End


	
	public function delete_restaurant_model($restaurant_id)
	{
		$delete_query= $this->db->delete('restaurant', ['id' => $restaurant_id]);
		$delete_query= $this->db->delete('restaurant_email', ['restaurant_id' => $restaurant_id]);
		$delete_query= $this->db->delete('restaurant_phone_no', ['restaurant_id' => $restaurant_id]);
		$delete_query= $this->db->delete('restaurant_mobile_no', ['restaurant_id' => $restaurant_id]);
		$delete_query= $this->db->delete('restaurant_cuisine_type', ['restaurant_id' => $restaurant_id]);
		$delete_query= $this->db->delete('restaurant_payment_methods', ['restaurant_id' => $restaurant_id]);
		$delete_query= $this->db->delete('restaurant_social_acc', ['restaurant_id' => $restaurant_id]);
		$delete_query= $this->db->delete('restaurant_timing', ['restaurant_id' => $restaurant_id]);
		$delete_query= $this->db->delete('restaurant_branches', ['restaurant_id' => $restaurant_id]);
		$delete_query= $this->db->delete('restaurant_promotional_banner', ['restaurant_id' => $restaurant_id]);

		return $delete_query;
	}
	
	
	public function get_all_countries()
	{
		$query= $this->db->select('*')
			         ->from('hb_countries')				      				      
			         ->get();

		return $query->result();   
	}
	
	public function get_all_cities()
	{
		$query= $this->db->select('*')
				         ->from('cities')				      				      
				         ->get();

		return $query->result();   
	}

	public function get_all_services()
	{
		$query= $this->db->select('*')
			         ->from('services')				      				      
			         ->get();

		return $query->result();   
	}

	public function get_all_social()
	{
		$query= $this->db->select('*')
			         ->from('socail_account')				      				      
			         ->get();

		return $query->result();   
	}

	public function get_all_pay_methods()
	{
		$query= $this->db->select('*')
			         ->from('payment_method')				      				      
			         ->get();

		return $query->result();   
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

}