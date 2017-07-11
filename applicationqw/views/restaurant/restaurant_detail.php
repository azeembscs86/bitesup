  <section class="sub-header">
                <div class="search-bar horizontal collapse" id="redefine-search-form"></div>
                <!-- /.search-bar -->
                <div class="breadcrumb-wrapper">
                    <div class="container">
                        <div class="redefine-search">
                            <a href="#redefine-search-form" class="inner" data-toggle="collapse" aria-expanded="false" aria-controls="redefine-search-form">
                                <span class="icon"></span>
                                <span>Redefine Search</span>
                            </a>
                        </div>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i></a></li>
                            <li class="active">Restaurant Detail</li>
                        </ol>
                        <!-- /.breadcrumb-->
                    </div>
                    <!-- /.container-->
                </div>
                <!-- /.breadcrumb-wrapper-->
            </section>
 
<!--Page Content-->

<div id="page-content">
               
                <section class="container">
                    <div class="row">
                        <!--Item Detail Content-->
                        <div class="col-md-9">
                            <section class="block" id="main-content">
                                <header class="page-title">
                                    <div class="title">
                                        <h1><?php if(!empty($restaurant_detail->name)) { echo $restaurant_detail->name; } ?></h1>                                        
                                    </div>
                                    <div class="info">
                                        <div class="type">
                                            <i><img src="<?php echo  base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                            <span>Restaurant</span>
                                        </div>
                                    </div>
                                </header>
                                <div class="row">
                                    <!--Detail Sidebar-->
                                    <aside class="col-md-4 col-sm-4" id="detail-sidebar">
                                        <!--Contact-->
                                        <section>
                                            <header><h3>Contact</h3></header>
                                             
                                            <div class="restaurant-logo" style="margin-bottom: 20px;">
                               
                                            <?php
                                            $imagename = "";
                                            $url = @getimagesize($restaurant_detail->logo_url);
                                            if (@!is_array($url)) {
                                                $imagelogo = base_url()."uploads/restaurantimages/2ibkt.jpg"; // The image doesn't exist
                                            } else {
                                                $imagelogo = $restaurant_detail->logo_url;
                                            }
                                            ?>
                                                <center><img align="middle" src="<?php echo $imagelogo; ?>" alt="logo" width="110" height="90" style="margin-top:10px;"></center>
                                            </div>
                                            <address>
                                            
                                                <div><?php if(!empty($restaurant_detail->city_name)) { echo $restaurant_detail->city_name; } ?>,<?php if(!empty($restaurant_detail->country_name)) { echo $restaurant_detail->country_name; } ?></div>
                                                <br>
                                                <?php if(!empty($restaurant_branch)) {?>
                                                <?php foreach($restaurant_branch as $branch){ ?>
                                                    <div><?php echo $branch->branch_name; ?></div>
                                                <?php } ?>
                                                <?php } ?>
                                                
                                                <figure>
                                                    
                                                    <?php if(!empty($res_mobile[0]->mobile_no)): ?>
                                                        <?php foreach($res_mobile as $mobile_no): ?>
                                                        
                                                    <?php if(!empty($mobile_no->mobile_no)){ ?>
                                                    <div class="info">
                                                       <i class="fa fa-phone" aria-hidden="true"></i>
                                                        <a href="tel:<?php echo $mobile_no->mobile_no; ?>"><span><?php echo$mobile_no->mobile_no; ?></span></a>
                                                    </div>
                                                    <?php } ?>
                                                    
                                                    
                                                    <?php endforeach; 
                                                              endif;?>
                                                              
                                                              
                                                    <?php if(!empty($res_phone[0]->phone_no)): ?>
                                                        <?php foreach($res_phone as $phone_no): ?>
                                                    
                                                    <?php if(!empty($phone_no->phone_no)){ ?>
                                                    <div class="info">
                                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                                        <a href="tel:<?php echo $phone_no->phone_no; ?>"><span><?php echo $phone_no->phone_no; ?></span></a>
                                                    </div>
                                                     <?php } ?>
                                                    
                                                     <?php endforeach; 
                                                              endif;?>
                                                              
                                                    <?php if(!empty($restaurant_detail->website_address)): ?>
                                                    <div class="info">
                                                        <i class="fa fa-globe"></i>
                                                        <a target="_tab" href="<?php echo $restaurant_detail->website_address; ?>" target="_blank"><?php echo $restaurant_detail->website_address; ?></a>
                                                    </div>
                                                     <?php endif; ?>
                                                </figure>
                                            </address>
                                        </section>
                                        <!--end Contact-->
                                        <!--Rating-->
                                        <section class="clearfix">
                                            <header class="pull-left"><a href="#reviews" class="roll"><h3>Rating</h3></a></header>
                                           <?php 
                                             if($restaurant_rating->average_vote >4)
                                             {
                                            ?>
                                            <figure class="rating big pull-right" data-rating="5"></figure>
                                            <?php 
                                             } else if($restaurant_rating->average_vote >=4 and $restaurant_rating->average_vote <5) {
                                             ?>    
                                            <figure class="rating big pull-right" data-rating="4"></figure>
                                            <?php
                                             }else if($restaurant_rating->average_vote >=3 and $restaurant_rating->average_vote <4)
                                             {
                                            ?>     
                                            <figure class="rating big pull-right" data-rating="3"></figure>
                                            <?php
                                             }else if($restaurant_rating->average_vote >=2 and $restaurant_rating->average_vote <3)
                                             {
                                           ?>      
                                            <figure class="rating big pull-right" data-rating="2"></figure>
                                            <?php
                                             }else if($restaurant_rating->average_vote >=1 and $restaurant_rating->average_vote <2)
                                             {
                                           ?>      
                                            <figure class="rating big pull-right" data-rating="1"></figure>
                                            <?php
                                             }else
                                             {
                                           ?>
                                            <figure class="rating big pull-right" data-rating="0"></figure>
                                            <?php 
                                             }
                                             
                                             ?>
                                        </section>
                                        <!--end Rating-->
                                        <!--Events-->
                                        <section>
                                           <header><h2>Opening Hours</h2></header>
                                           
                                            <?php if(!empty($restaurant_timing)){ ?>                                          
                                           
                                           
                                           
                                           <table>
                                              
                                               
                                           
                                            
                                            <?php foreach( $restaurant_timing as $timing){ ?>    
                                               
                                               <?php
                                              $open_day="";
                                              $timing_day=ucwords($timing->day);
                                                if($timing_day=='Monday'){
                                                     $open_day.="Mon";
                                                } else if($timing_day=='Tuesday') {
                                                    $open_day.="Tues";
                                                }else if ($timing_day=='Wednesday') {
                                                        $open_day.="Wed";
                                                }else if($timing_day=='Thursday'){
                                                    $open_day.="Thu";
                                                }else if($timing_day=='Friday')
                                                {
                                                    $open_day.="Fri";
                                                }else if($timing_day=='Saturday')
                                                {
                                                    $open_day.="Sat";
                                                }
                                                else if($timing_day=='Sunday')
                                                {
                                                    $open_day.="Sun";
                                                }else
                                                {
                                                    $open_day.="";
                                                }
                                                
                                              
                                              ?> 
                                           
                                              <tr>
                                                   <td align="left"><b><?php echo $open_day;  ?></td>
                                                   <td align="center">:</td>
                                                   <td align="left"><?= substr($timing->start_time, 0, -3); ?>-<?= substr($timing->end_time, 0, -3); ?></td>
                                               </tr>
                                               
                                                                          
                                            <?php } ?>
                                          
                                            <?php } else {?>
                                               <tr>
                                                   <td colspan="3">Not Available</td>
                                               
                                                  
                                               </tr>
                                              
                                            <?php } ?>
                                                
                                                </table>
                                        </section>
                                        
                                        
                                       
                                        
                                        
                                       <?php if(!empty($restaurant_tag[0]->tag)){ ?>
                                          <br>
                                          <section>                                         
                                           <header><h2>Restaurant Tags</h2></header>
                                           <ul class="bullets">
                                               <?php
                                               foreach ($restaurant_tag as $tag) { ?>
                                               <li style="width: 60%"><a href="<?php echo  base_url(); ?>main/restaurant_selected_tags/<?php echo $tag->tag;  ?>"><?php echo $tag->tag; ?></a></li>
                                               <?php } ?>
                                           </ul>
                                        </section>
                                        <?php } ?> 
                                        
                                        <!--end Events-->
                                        <!--Contact Form-->
                                        <?php if(!empty($socail_acc) AND $socail_acc[0]->link !=""){ ?>
                                            <br>                                            
                                        <section>                                         
                                           <header><h2>Socia Links</h2></header>                                           
                                           <ul class="list-inline">
                                            <?php foreach($socail_acc as $social) {?>  
                                            <?php
                                            $social_class= "";
                                                if($social->social_acc_id == 1)
                                                {
                                                    $social_class = 'fa-facebook';
                                                }
                                                else if($social->social_acc_id == 2)
                                                {
                                                    $social_class = 'fa-twitter';
                                                }
                                                else if($social->social_acc_id == 3)
                                                {
                                                    $social_class = 'fa-instagram';
                                                }
                                                else if($social->social_acc_id == 4)
                                                {
                                                    $social_class = 'fa-google-plus';
                                                }
                                                else if($social->social_acc_id == 5)
                                                {
                                                    $social_class = 'fa-snapchat';
                                                }
                                                else if($social->social_acc_id == 6)
                                                {
                                                    $social_class = 'fa-youtube';
                                                }
                                                else if($social->social_acc_id == 7)
                                                {
                                                    $social_class = 'fa-pinterest';
                                                }
                                                else if($social->social_acc_id == 8)
                                                {
                                                    $social_class = 'fa-flickr';
                                                }
                                                else if($social->social_acc_id == 9)
                                                {
                                                    $social_class = 'fa-tumblr';
                                                }
                                            ?>
                                            <li><a href="<?php echo $social->link; ?>" target="_blank"><i class="fa <?php echo $social_class; ?>"></i></a></li>                                  
                                            <?php } ?>
                                           </ul>                                       
                                        </section>
                                            <?php } ?>
                                            
                                            
                                            <section>
                                            <header><h3>Services</h3></header>
                                            <?php if(!empty($restaurant_detail->server)){ ?>
                                            <figure>
                                                <?php
                                        if (!empty($restaurant_detail->server)) {
                                            $server = explode("|", $restaurant_detail->server);
                                        } else {
                                            $server = explode(' ', $restaurant_detail->server);
                                        } ?>
                                            <ul class="bullets">
                                            <?php foreach ($all_services as $row) { ?>
                                                
                                               <?php if (in_array($row->id, $server)) { ?>
                                                <li><a href="<?php echo base_url(); ?>main/services_restaurant/<?php echo $row->name; ?>"><?php echo $row->name ?></a></li>
                                                    <?php    } ?>
                                                <?php } ?>
                                            </ul>
                                            </figure>  
                                            <?php } ?>
                                    </section>
                                    
                                        
                                    </aside>
                                    <!--end Detail Sidebar-->
                                    <!--Content-->
                                    <div class="col-md-8 col-sm-8">
                                        <section>
                                            
                                           <?php
                                            $imagename = "";
                                            $url = @getimagesize($restaurant_detail->cover_image_url);
                                            if (@!is_array($url)) {
                                                $imagelogo = base_url()."uploads/restaurantimages/2ibkt.jpg"; // The image doesn't exist
                                            } else {
                                                $imagelogo = $restaurant_detail->cover_image_url;
                                            }
                                            ?>
                                            <div>
                                                <div class="slide"><img src="<?php echo $imagelogo; ?>" alt="<?php if(!empty($restaurant_detail->restaurant_logo_alt)){ echo $restaurant_detail->restaurant_logo_alt;}else{ echo $restaurant_detail->name;} ?>" width="555" height="196"  ></div>
                                            </div>
                                            
                                            <article class="item-gallery">
                                                <div class="owl-carousel item-slider">
                                                   <?php if(!empty($promotion_banners)){ ?> 
                                                    <?php
                                                    $count_banner=1;
                                                    foreach($promotion_banners as $banner){ ?>
                                                    <div class="slide"><img src="<?php echo $banner->image_url; ?>" data-hash="<?php echo $count_banner; ?>" alt=""></div>
                                                <?php 
                                                    $count_banner++; 
                                                    }
                                                   }
//end foreach
                                                    ?>
                                                </div>
                                                
                                               
                                                <!-- /.item-slider -->
                                                <div class="thumbnails">
                                                    
                                                    
                                                <?php if($promotion > 5){ ?>
                                                    <span class="expand-content btn framed icon" data-expand="#gallery-thumbnails" >More<i class="fa fa-plus"></i></span>
                                                <?php }else{
                                                ?>
                                                    <span style="display:none;" class="expand-content btn framed icon" data-expand="#gallery-thumbnails" >More<i class="fa fa-plus"></i></span>   
                                               <?php     
                                                } ?>    
                                                    <div class="expandable-content height collapsed show-70" id="gallery-thumbnails">
                                                        <div class="content">
                                                    <?php
                                                    if(!empty($promotion_banners)){
                                                    $count_banner=1;
                                                    foreach($promotion_banners as $banner){ ?>
                                                            <a href="#<?php echo $count_banner; ?>" onclick="show_logo()" id="thumbnail-<?php echo $count_banner;?>" <?php if($count_banner==1){ ?>class="active"<?php } ?>><img src="<?php echo $banner->image_url; ?>" alt="" width="85" height="65"></a>
                                                        <!--<a href="#2" id="thumbnail-2"><img src="assets/img/items/2.jpg" alt=""></a> -->
                                                       <?php 
                                                       $count_banner++;
                                                       }
}//end foreach ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                           
 
                                            
                                            <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Overview</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Menus</a></li>
    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="home">
          
          <?php if(!empty($restaurant_detail->description)){ ?>
                                            <article class="block">
                                                <header><h2>Description</h2></header>
                                                <p><?php echo $restaurant_detail->description; ?></p>
                                            </article>
                                            <?php } ?>
          
      </div>
      
      
      
      <div role="tabpanel" class="tab-pane"  id="profile">
          
          <article class="block">
                                               
                                                    <?php
                                                    if(!empty($retaurant_menus))
                                                    {
                                                        foreach($retaurant_menus as $restaurant_menu)
                                                        {
                                                            $menu_image = "";
                            $url = @getimagesize($restaurant_menu->menu_image);
                            if (@!is_array($url)) {
                                $menu_image = base_url()."uploads/profile_images/member-3t.jpg"; // The image doesn't exist
                            } else {
                                $menu_image = $restaurant_menu->menu_image;
                            }
                                                    ?>        
                                       
                                                        <div class="list-item">
                                                            <div class="right"><img src="<?php echo $menu_image; ?>"></div>
                                                            <div style="margin-top:10px"></div>
                                                            <div class="left">
                                                                <span><strong><?php echo $restaurant_menu->menu_name; ?></strong><strong style="float:right;">Price:<?php echo $restaurant_menu->menu_price; ?></strong></span>
                                                                <figure><?php echo $restaurant_menu->description; ?></figure>
                                                            </div>
                                                            
                                                           
                                                        </div>
                                                        
              <hr>
                                                   <?php     
                                                     }
                                                    
                                                    }
                                                    ?>
                                                    
                                                    <!-- /.slide -->
                                                    
                                                    <!-- /.slide -->
                                              
                                                <!-- /.list-slider -->
                                            </<article>
      </div>
   
  </div>

</div>





                                            
                                            
                                            
                                            <!-- /.block -->
                                            
                                            <!-- /.block -->
                                            <article class="block">
                                                <header><h2>Categories</h2></header>
                                                <ul class="bullets">
                                                     <?php
                                               if(!empty($cuisine_type)){
                                               foreach ($cuisine_type as $cuisine) { ?>
                                                  <li><a href="<?php echo  base_url(); ?>main/category_restaurant/<?php echo $cuisine->tag_id;  ?>"><?php echo $cuisine->tag_name; ?></a></li>
                                               <?php } } else{ ?>
                                                   <p>No Category Selected</p>
                                               <?php } ?>
                                                </ul>
                                            </article>
                                            <!-- /.block -->
                                            
                                            <!-- /.block -->
                                        </section>
                                        <!--Reviews-->
                                        <section class="block" id="reviews">
                                            <header class="clearfix">
                                                <h2 class="pull-left">Reviews</h2>
                                                <a href="#write-review" class="btn framed icon pull-right roll">Write a review <i class="fa fa-pencil"></i></a>
                                            </header>
                                      
                                            <section class="reviews">
                                                
                                            <?php if(!empty($restaurant_review)){ ?>  
                                                <?php foreach($restaurant_review as $review){ ?>
                                                <article class="review">
                                                    <figure class="author">
                                                        <?php if($review->user_image != 'NULL' AND "") { ?>
                                                        <img src="<?php echo $review->user_image; ?>" alt="">
                                                        <?php } else { ?>
                                                        <img src="<?php echo base_url(); ?>assets/img/default-avatar.png" alt="">
                                                        <?php } ?>
                                                        <?php
                                                        $doc= $review->coments_date;
                                                        $date = date('d-M-Y h:i A', strtotime($doc));
                                                        ?>
                                                        <div class="date" style="width: 130px; margin-top: 2px;"><?php echo $date; ?></div>
                                                    </figure>
                                                    <!-- /.author-->
                                                    <div class="wrapper">
                                                        <h5><?php echo $review->first_name." ".$review->last_name;  ?></h5>
                                                        <figure class="rating big color" data-rating="<?php if(!empty($review->user_rating)){ echo $review->user_rating; } ?>"></figure>
                                                        
                                                        <p style="margin-top:17px;"><?php echo $review->rec_comments; ?></p>    
                                                    </div>
                                                    <!-- /.wrapper-->
                                                </article>
                                                <?php }//End foreach ?>
                                            <?php } else { //start Else condition ?>
                                                <p>No Comment in Found in This Restaurant</p>
                                            <?php } //end else and if condition ?>
                                                
                                                                                               
                                            </section>
                                            <!-- /.reviews-->
                                        </section>
                                        <!-- /#reviews -->
                                        <!--end Reviews-->
                                        <!--Review Form-->
                                        <section id="write-review">
                                            <header>
                                                <h2>Write a Review</h2>
                                            </header>
                                            <form id="form-review" role="form" name="user_restaurant_review" method="post" action="<?php echo base_url(); ?>restaurant/add_user_review" class="background-color-white">
                                                <input type="hidden" id="user_id" name="user_id" value="30">
                                                <input type="hidden" id="date" name="date" value="<?php echo date("Y-m-d h:i:s"); ?>">
                                                <input type="hidden" id="restaurant_id" name="restaurant_id" value="<?php echo $this->uri->segment(3); ?>">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                                                                                
                                                        <div class="form-group">
                                                            <label for="form-review-message">Message</label>
                                                            <textarea class="form-control" id="review_message" name="review_message"  rows="3" required=""></textarea>
                                                        </div>
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-default" id="submit_comment" name="submit_comment" value="Submit Review">
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>
                                                    <div class="col-md-4">
                                                        <aside class="user-rating">
                                                            <label>Your Rating</label>
                                                            <figure class="rating active" id="rating" data-name="value"></figure>
                                                        </aside>
                                                        
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- /.main-search -->
                                        </section>
                                        <!--end Review Form-->
                                    </div>
                                    <!-- /.col-md-8-->
                                </div>
                                <!-- /.row -->
                            </section>
                            <!-- /#main-content-->
                        </div>
                        <!-- /.col-md-8-->
                        <!--Sidebar-->
                        <div class="col-md-3">
                            <aside id="sidebar">
                                <section>
                                    <header><h2>Featured Restaurant</h2></header>
                                    
                                    <?php if(!empty($featured_restaurant)){ ?>
                                    <?php foreach($featured_restaurant as $featured_res) { ?>
                                    <a href="<?= base_url() ?>restaurant/restaurant_detail/<?php echo $featured_res->restaurant_id; ?>" class="item-horizontal small">
                                        <h3><?php echo $featured_res->restaurant_name; ?></h3>
                                        <figure><?php echo $featured_res->city_name .", ". $featured_res->country_name; ?></figure>
                                        <div class="wrapper">
                                            <?php
                                                $imagename = "";
                                                $url = @getimagesize($featured_res->logo_url);
                                                if (@!is_array($url)) {
                                                    $imagesname = base_url()."uploads/restaurantimages/2ibkt.jpg"; // The image doesn't exist
                                                } else {
                                                    $imagesname = $featured_res->logo_url;
                                                }
                                            ?>
                                            <div class="image"><img src="<?php echo $imagesname; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                    <span><?php echo $featured_res->cousine_name; ?></span>
                                                </div>
                                              <?php 
                                             if($featured_res->average_vote >4)
                                             {
                                            ?>
                                            <div class="rating" data-rating="5"></div>
                                            <?php 
                                             } else if($featured_res->average_vote >=4 and $featured_res->average_vote <5) {
                                             ?>    
                                             <div class="rating" data-rating="4"></div>
                                            <?php
                                             }else if($featured_res->average_vote >=3 and $featured_res->average_vote <4)
                                             {
                                            ?>     
                                            <div class="rating" data-rating="3"></div>
                                            <?php
                                             }else if($featured_res->average_vote >=2 and $featured_res->average_vote <3)
                                             {
                                           ?>      
                                             <div class="rating" data-rating="2"></div>
                                            <?php
                                             }else if($featured_res->average_vote >=1 and $featured_res->average_vote <2)
                                             {
                                           ?>      
                                             <div class="rating" data-rating="1"></div>
                                            <?php
                                             }else
                                             {
                                           ?>
                                            <div class="rating" data-rating="0"></div>
                                            <?php 
                                             }
                                             
                                             ?>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }// end foreach ?>     
                                    
                                     <?php } ?>
                                    <!--/.item-horizontal small-->
                                    
                                    <!--/.item-horizontal small-->
                                    
                                    <!--/.item-horizontal small-->
                                </section>
                                
                                <section>
                                    <header><h2>Bitesup Rockstars</h2></header>                                  
                                   <?php if(!empty($user_reviews)){ ?>
                                     <?php foreach($user_reviews as $featured_rev ){ ?>
                                    <a href="<?= base_url() ?>restaurant/restaurant_detail/<?php echo $featured_rev->user_id; ?>" class="item-horizontal small">
                                        <h3><?php echo $featured_rev->first_name ." ". $featured_rev->last_name; ?></h3>
                                        <figure><?php echo $featured_rev->country_name; ?></figure>
                                        <div class="wrapper">
                                            <?php
                            $user_image = "";
                            $url = @getimagesize($featured_rev->user_image);
                            if (@!is_array($url)) {
                                $user_image = base_url()."uploads/profile_images/member-3t.jpg"; // The image doesn't exist
                            } else {
                                $user_image = $featured_rev->user_image;
                            }
                            ?>
                                            <div class="image"><img src="<?php echo $user_image; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                    <span><?php echo $featured_rev->user_comments; ?> Reviews</span>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }// end foreach ?>     
                                    
                                     <?php } ?>
                                    <!--/.item-horizontal small-->
                                    
                                    <!--/.item-horizontal small-->
                                    
                                    <!--/.item-horizontal small-->
                                </section>
                                
                                
                                
                                
                                
                            </aside>
                            <!-- /#sidebar-->
                        </div>
                        <!-- /.col-md-3-->
                        <!--end Sidebar-->
                    </div><!-- /.row-->
                </section>
                <!-- /.container-->
            </div>





            
<!-- end Page Content-->

<script>
    /*
$(document).ready(function(){
$("#submit_comment").click(function(){
var user_id = $("#user_id").val();
var date = $("#date").val();
var restaurant_id = $("#restaurant_id").val();
var review_message = $("#review_message").val();
var rating = $("#rating").val();
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'name1='+ user_id + '&email1='+ date + '&password1='+ restaurant_id + '&contact1='+ review_message + '&contact1='+ rating;
if(name==''||email==''||password==''||contact=='')
{
alert("Please Fill All Fields");
}
else
{
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "ajaxsubmit.php",
data: dataString,
cache: false,
success: function(result){
alert(result);
}
});
}
return false;
});
});
*/
</script>


