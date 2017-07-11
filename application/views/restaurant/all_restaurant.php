<!--Sub Header-->
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
                            <li class="active">Detail</li>
                        </ol>
                        <!-- /.breadcrumb-->
                    </div>
                    <!-- /.container-->
                </div>
                <!-- /.breadcrumb-wrapper-->
            </section>         
            <!--end Sub Header-->
             <!-- Main List Restaurant gird view----->    
            <div id="page-content">
                <section class="container">
                    <div class="">
                        <!--Content-->
                        <div class="">
                            <header>
                                <h1 class="page-title">Search Result</h1>
                            </header>
                            <figure class="filter clearfix">
                                <div class="buttons pull-left">
                                    <a href="#" class="btn icon active" onclick="return girdsection()"><i class="fa fa-th"></i>Grid</a>
                                    <a href="#" class="btn icon" onclick="return listsection()"><i class="fa fa-th-list"></i>List</a>
                                </div>
                                
                                <div class="buttons pull-left" style="margin-left: 200px;">
                                    <button class="btn icon" onclick="return girdOpenRestaurant()"><strong>Open</strong></button>
                                    <button class="btn icon" onclick="return girdNearRestaurant()"><strong>Under 5 Miles</strong></button>
                                    <button class="btn icon" onclick="return girdDiscountRestaurant()"><strong>Discount</strong></button>
                                </div>
                                <div class="pull-right">
                                    <aside class="sorting">
                                        <span>Sorting</span>
                                        <div class="form-group">
                                            <select class="framed" id="restaurant_sort" name="sort" onchange="return loadGirdRestaurant()">
                                                <option value="0">Select Sorting Option</option>
                                                <option value="1">Date - Newest First</option>
                                                <option value="2">Date - Oldest First</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </aside>
                                </div>
                            </figure>

                            <!--Listing Grid-->
                            <section class="block equal-height">
                                <div class="row">
                                 <div class="col-lg-8">   
                                    <?php 
                                    if(!empty($restaurant_keyword))
                                    {
                                      foreach($restaurant_keyword as $row)  
                                      {
                                        
                                 ?>
                            <?php
                            $imagename = "";
                            $url = @getimagesize($row->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $row->logo_url;
                            }
                            ?>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="item">
                                            <div class="image">
                                                <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $row->restaurant_id ?>">
                                                    <div class="overlay">
                                                        <div class="inner">
                                                            <div class="content">
                                                                <h4>Description</h4>
                                                                <p><?php echo $row->description; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <img src="<?php echo $imagesname; ?>" alt="" width="263" height="196">
                                                </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $row->restaurant_id ?>"><h3><?php echo $row->restaurant_name; ?></h3></a>
                                                <figure><?php echo $row->city_name.",".$row->country_name; ?></figure>
                                                <div class="info">
                                                    <div class="type">
                                                        <i><?php echo $row->restaurant_reviews; ?></i>
                                                        <span>Reviews</span>
                                                    </div>
                                                    <div class="rating" data-rating="4"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>
                                    
                                <?php
                                    }
                                    } // end if empty sucess
                                else 
                                    { ?>
                                    
                                    <div style=" margin-left: 30px;" > Result Not Found </div>
                                         
                               <?php }
                                    ?>
                                          
                                    
                                 </div>      
                                  <div class="col-lg-3 col-lg-offset-1">
                            <aside id="sidebar">
                                <section>
                                    <header><h2>Popular Restaurant</h2></header>
                                    <?php if (!empty($popular_restaurant)) {
    foreach ($popular_restaurant as $rest) { ?>
                                    <?php
                            $imagename = "";
                            $url = @getimagesize($rest->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $rest->logo_url;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo  $rest->restaurant_name;?></h3>
                                        <figure><?php echo $rest->city_name.",".$rest->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $imagesname; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                
                                <section>
                                    <header><h2>Most Reviewed Users </h2></header>
                                    <?php if (!empty($user_reviews)) {
    foreach ($user_reviews as $user_row) { ?>
                                    <?php
                            $user_image = "";
                            $url = @getimagesize($user_row->user_image);
                            if (@!is_array($url)) {
                                $user_image = base_url()."uploads/profile_images/member-3t.jpg"; // The image doesn't exist
                            } else {
                                $user_image = $user_row->user_image;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo ucwords($user_row->first_name)."  ".ucwords($user_row->last_name); ?></h3>
                                        <figure><?php echo $user_row->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $user_image; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                               
                                <section>
                                    <header><h2>Most Review Users Categories</h2></header>
                                    <ul class="bullets">
                                        <?php
if (!empty($cusine_type)) {
    foreach ($cusine_type as $category) {
        ?>
                                    <li><a href="#"><?= $category->tag_name; ?></a></li>
    <?php }
} ?>
                                    </ul>
                                </section>
                                <section>
                                    
                                    
                                    <!-- /.form-group -->
                                </section>
                            </aside>
                            <!-- /#sidebar-->
                        </div>  
                                    
                                </div>
                                
                            
                                <!--/.row-->
                            </section>
                            <!--end Listing Grid-->
                            <!--Pagination-->
<!--                            <nav>
                                <ul class="pagination pull-right">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#" class="previous"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#" class="next"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </nav>-->
                            <!--end Pagination-->
                        </div>

                    </div>
                </section>
            </div>
             <!------Main List Restaurant gird view end----->  

         
            
            
      <!-- Latest Restaurant gird----->       
     <div id="page-content-gird-latests" style="display:none;">
                <section class="container">
                    <div class="">
                        <!--Content-->
                        <div class="">
                            <header>
                                <h1 class="page-title">Latest Restaurant Search Results</h1>
                            </header>
                            <figure class="filter clearfix">
                                <div class="buttons pull-left">
                                    <a href="#" class="btn icon active" onclick="return girdsection()"><i class="fa fa-th"></i>Grid</a>
                                    <a href="#" class="btn icon" onclick="return listsection()"><i class="fa fa-th-list"></i>List</a>
                                </div>
                                
                                <div class="buttons pull-left" style="margin-left: 200px;">
                                    <button class="btn icon" onclick="return girdOpenRestaurant()"><strong>Open</strong></button>
                                    <button class="btn icon" onclick="return girdNearRestaurant()"><strong>Under 5 Miles</strong></button>
                                    <button class="btn icon" onclick="return girdDiscountRestaurant()"><strong>Discount</strong></button>
                                </div>
                                <div class="pull-right">
                                    <aside class="sorting">
                                        <span>Sorting</span>
                                        <div class="form-group">
                                            <select class="framed" id="restaurant_latest_sort" name="sort" onchange="return loadlatestGirdRestaurant()">
                                                <option value="0">Select Sorting Option</option>
                                                <option value="1">Date - Newest First</option>
                                                <option value="2">Date - Oldest First</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </aside>
                                </div>
                            </figure>

                            <!--Listing Grid-->
                            <section class="block equal-height">
                                <div class="row">
                                    <div class="col-lg-8">
                                    <?php 
                                    if(!empty($latest_restaurant))
                                    {
                                      foreach($latest_restaurant as $row)  
                                      {
                                        
                                 ?>
                            <?php
                            $imagename = "";
                            $url = @getimagesize($row->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $row->logo_url;
                            }
                            ?>
                                   <div class="col-md-4 col-sm-4">
                                        <div class="item">
                                            <div class="image">
                                                <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $row->restaurant_id ?>">
                                                    <div class="overlay">
                                                        <div class="inner">
                                                            <div class="content">
                                                                <h4>Description</h4>
                                                                <p><?php echo $row->description; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <img src="<?php echo $imagesname; ?>" alt="" width="263" height="196">
                                                </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $row->restaurant_id ?>"><h3><?php echo $row->restaurant_name; ?></h3></a>
                                                <figure><?php echo $row->city_name.",".$row->country_name; ?></figure>
                                                <div class="info">
                                                    <div class="type">
                                                        <i><?php echo $row->restaurant_reviews; ?></i>
                                                        <span>Reviews</span>
                                                    </div>
                                                    <div class="rating" data-rating="4"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>
                                    
                                <?php
                                    }
                                    } // end if empty sucess
                                else 
                                    { ?>
                                    
                                    <div style=" margin-left: 30px;" > Result Not Found </div>
                                         
                               <?php }
                                    ?>
                                </div>      
                                    
                                    <div class="col-lg-3 col-lg-offset-1">
                            <aside id="sidebar">
                                <section>
                                    <header><h2>Popular Restaurant</h2></header>
                                    <?php if (!empty($popular_restaurant)) {
    foreach ($popular_restaurant as $rest) { ?>
                                    <?php
                            $imagename = "";
                            $url = @getimagesize($rest->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $rest->logo_url;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo  $rest->restaurant_name;?></h3>
                                        <figure><?php echo $rest->city_name.",".$rest->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $imagesname; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                
                                <section>
                                    <header><h2>Most Reviewed Users </h2></header>
                                    <?php if (!empty($user_reviews)) {
    foreach ($user_reviews as $user_row) { ?>
                                    <?php
                            $user_image = "";
                            $url = @getimagesize($user_row->user_image);
                            if (@!is_array($url)) {
                                $user_image = base_url()."uploads/profile_images/member-3t.jpg"; // The image doesn't exist
                            } else {
                                $user_image = $user_row->user_image;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo ucwords($user_row->first_name)."  ".ucwords($user_row->last_name); ?></h3>
                                        <figure><?php echo $user_row->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $user_image; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                <section>
                                    <header><h2>Most Review Users Categories</h2></header>
                                    <ul class="bullets">
                                        <?php
if (!empty($cusine_type)) {
    foreach ($cusine_type as $category) {
        ?>
                                    <li><a href="#"><?= $category->tag_name; ?></a></li>
    <?php }
} ?>
                                    </ul>
                                </section>
                                <section>
                                    
                                    
                                    <!-- /.form-group -->
                                </section>
                            </aside>
                            <!-- /#sidebar-->
                        </div>  
                                </div>
                                <!--/.row-->
                            </section>
                            <!--end Listing Grid-->
                            <!--Pagination-->
<!--                            <nav>
                                <ul class="pagination pull-right">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#" class="previous"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#" class="next"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </nav>-->
                            <!--end Pagination-->
                        </div>

                    </div>
                </section>
            </div>       
    
     
      
    <!-------latest restaurant gird end----------->
    
    
    <!--- old restaurant in gird------>
      <div id="page-content-gird-old" style="display:none;">
                <section class="container">
                    <div class="">
                        <!--Content-->
                        <div class="">
                            <header>
                                <h1 class="page-title">Oldest Restaurant Search Results</h1>
                            </header>
                            <figure class="filter clearfix">
                                <div class="buttons pull-left">
                                    <a href="#" class="btn icon active" onclick="return girdsection()"><i class="fa fa-th"></i>Grid</a>
                                    <a href="#" class="btn icon" onclick="return listsection()"><i class="fa fa-th-list"></i>List</a>
                                </div>
                                <div class="buttons pull-left" style="margin-left: 200px;">
                                    <button class="btn icon" onclick="return girdOpenRestaurant()"><strong>Open</strong></button>
                                    <button class="btn icon" onclick="return girdNearRestaurant()"><strong>Under 5 Miles</strong></button>
                                    <button class="btn icon" onclick="return girdDiscountRestaurant()"><strong>Discount</strong></button>
                                </div>
                                <div class="pull-right">
                                    <aside class="sorting">
                                        <span>Sorting</span>
                                        <div class="form-group">
                                            <select class="framed" id="restaurant_old_sort" name="sort" onchange="return loadOldGirdRestaurant()">
                                                <option value="0">Select Sorting Option</option>
                                                <option value="1">Date - Newest First</option>
                                                <option value="2">Date - Oldest First</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </aside>
                                </div>
                            </figure>

                            <!--Listing Grid-->
                            <section class="block equal-height">
                                <div class="row">
                                    <div class="col-lg-8">
                                    <?php 
                                    if(!empty($old_restaurant))
                                    {
                                      foreach($old_restaurant as $row)  
                                      {
                                        
                                 ?>
                            <?php
                            $imagename = "";
                            $url = @getimagesize($row->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $row->logo_url;
                            }
                            ?>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="item">
                                            <div class="image">
                                                <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $row->restaurant_id ?>">
                                                    <div class="overlay">
                                                        <div class="inner">
                                                            <div class="content">
                                                                <h4>Description</h4>
                                                                <p><?php echo $row->description; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <img src="<?php echo $imagesname; ?>" alt="" width="263" height="196">
                                                </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $row->restaurant_id ?>"><h3><?php echo $row->restaurant_name; ?></h3></a>
                                                <figure><?php echo $row->city_name.",".$row->country_name; ?></figure>
                                                <div class="info">
                                                    <div class="type">
                                                        <i><?php echo $row->restaurant_reviews; ?></i>
                                                        <span>Reviews</span>
                                                    </div>
                                                    <div class="rating" data-rating="4"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>
                                    
                                <?php
                                    }
                                    } // end if empty sucess
                                else 
                                    { ?>
                                    
                                    <div style=" margin-left: 30px;" > Result Not Found </div>
                                         
                               <?php }
                                    ?>
                                    </div>
                                    
                                    <div class="col-lg-3 col-lg-offset-1">
                            <aside id="sidebar">
                                <section>
                                    <header><h2>Popular Restaurant</h2></header>
                                    <?php if (!empty($popular_restaurant)) {
    foreach ($popular_restaurant as $rest) { ?>
                                    <?php
                            $imagename = "";
                            $url = @getimagesize($rest->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $rest->logo_url;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo  $rest->restaurant_name;?></h3>
                                        <figure><?php echo $rest->city_name.",".$rest->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $imagesname; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                
                                <section>
                                    <header><h2>Most Reviewed Users </h2></header>
                                    <?php if (!empty($user_reviews)) {
    foreach ($user_reviews as $user_row) { ?>
                                    <?php
                            $user_image = "";
                            $url = @getimagesize($user_row->user_image);
                            if (@!is_array($url)) {
                                $user_image = base_url()."uploads/profile_images/member-3t.jpg"; // The image doesn't exist
                            } else {
                                $user_image = $user_row->user_image;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo ucwords($user_row->first_name)."  ".ucwords($user_row->last_name); ?></h3>
                                        <figure><?php echo $user_row->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $user_image; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                <section>
                                    <header><h2>Most Review Users Categories</h2></header>
                                    <ul class="bullets">
                                        <?php
if (!empty($cusine_type)) {
    foreach ($cusine_type as $category) {
        ?>
                                    <li><a href="#"><?= $category->tag_name; ?></a></li>
    <?php }
} ?>
                                    </ul>
                                </section>
                                <section>
                                    
                                    
                                    <!-- /.form-group -->
                                </section>
                            </aside>
                            <!-- /#sidebar-->
                        </div>
                                </div>
                                <!--/.row-->
                            </section>
                            <!--end Listing Grid-->
                            <!--Pagination-->
<!--                            <nav>
                                <ul class="pagination pull-right">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#" class="previous"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#" class="next"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </nav>-->
                            <!--end Pagination-->
                        </div>

                    </div>
                </section>
            </div>
      
      <!------old restaurant gird end----->
      
      
      
      <!------- open restaurant gird view------------------------------------------->
      <div id="page-content-gird-open" style="display:none;">
                <section class="container">
                    <div class="">
                        <!--Content-->
                        <div class="">
                            <header>
                                <h1 class="page-title">Open Restaurant Search Results</h1>
                            </header>
                            <figure class="filter clearfix">
                                <div class="buttons pull-left">
                                    <a href="#" class="btn icon active" onclick="return girdsection()"><i class="fa fa-th"></i>Grid</a>
                                    <a href="#" class="btn icon" onclick="return listsection()"><i class="fa fa-th-list"></i>List</a>
                                </div>
                                <div class="buttons pull-left" style="margin-left: 200px;">
                                    <button class="btn icon" onclick="return girdOpenRestaurant()"><strong>Open</strong></button>
                                    <button class="btn icon" onclick="return girdNearRestaurant()"><strong>Under 5 Miles</strong></button>
                                    <button class="btn icon" onclick="return girdDiscountRestaurant()"><strong>Discount</strong></button>
                                </div>
                                <div class="pull-right">
                                    <aside class="sorting">
                                        <span>Sorting</span>
                                        <div class="form-group">
                                            <select class="framed" id="restaurant_latest_sort" name="sort" onchange="return loadlatestGirdRestaurant()">
                                                <option value="0">Select Sorting Option</option>
                                                <option value="1">Date - Newest First</option>
                                                <option value="2">Date - Oldest First</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </aside>
                                </div>
                            </figure>

                            <!--Listing Grid-->
                            <section class="block equal-height">
                                <div class="row">
                                    <div class="col-lg-8">   
                                    <?php 
                                    if(!empty($open_restaurant))
                                    {
                                      foreach($open_restaurant as $row)  
                                      {
                                        
                                 ?>
                            <?php
                            $imagename = "";
                            $url = @getimagesize($row->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $row->logo_url;
                            }
                            ?>
                                  <div class="col-md-4 col-sm-4">
                                        <div class="item">
                                            <div class="image">
                                                <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $row->restaurant_id ?>">
                                                    <div class="overlay">
                                                        <div class="inner">
                                                            <div class="content">
                                                                <h4>Description</h4>
                                                                <p><?php echo $row->description; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <img src="<?php echo $imagesname; ?>" alt="" width="263" height="196">
                                                </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $row->restaurant_id ?>"><h3><?php echo $row->restaurant_name; ?></h3></a>
                                                <figure><?php echo $row->city_name.",".$row->country_name; ?></figure>
                                                <div class="info">
                                                    <div class="type">
                                                        <i><?php echo $row->restaurant_reviews; ?></i>
                                                        <span>Reviews</span>
                                                    </div>
                                                    <div class="rating" data-rating="4"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>
                                    
                                <?php
                                    }
                                    } // end if empty sucess
                                else 
                                    { ?>
                                    
                                    <div style=" margin-left: 30px;" > Result Not Found </div>
                                         
                               <?php }
                                    ?>
                                </div> 
                                <div class="col-lg-3 col-lg-offset-1">
                            <aside id="sidebar">
                                <section>
                                    <header><h2>Popular Restaurant</h2></header>
                                    <?php if (!empty($popular_restaurant)) {
    foreach ($popular_restaurant as $rest) { ?>
                                    <?php
                            $imagename = "";
                            $url = @getimagesize($rest->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $rest->logo_url;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo  $rest->restaurant_name;?></h3>
                                        <figure><?php echo $rest->city_name.",".$rest->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $imagesname; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                
                                <section>
                                    <header><h2>Most Reviewed Users </h2></header>
                                    <?php if (!empty($user_reviews)) {
    foreach ($user_reviews as $user_row) { ?>
                                    <?php
                            $user_image = "";
                            $url = @getimagesize($user_row->user_image);
                            if (@!is_array($url)) {
                                $user_image = base_url()."uploads/profile_images/member-3t.jpg"; // The image doesn't exist
                            } else {
                                $user_image = $user_row->user_image;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo ucwords($user_row->first_name)."  ".ucwords($user_row->last_name); ?></h3>
                                        <figure><?php echo $user_row->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $user_image; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                <section>
                                    <header><h2>Most Review Users Categories</h2></header>
                                    <ul class="bullets">
                                        <?php
if (!empty($cusine_type)) {
    foreach ($cusine_type as $category) {
        ?>
                                    <li><a href="#"><?= $category->tag_name; ?></a></li>
    <?php }
} ?>
                                    </ul>
                                </section>
                                <section>
                                    
                                    
                                    <!-- /.form-group -->
                                </section>
                            </aside>
                            <!-- /#sidebar-->
                        </div>
                                </div>
                                <!--/.row-->
                            </section>
                            <!--end Listing Grid-->
                            <!--Pagination-->
<!--                            <nav>
                                <ul class="pagination pull-right">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#" class="previous"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#" class="next"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </nav>-->
                            <!--end Pagination-->
                        </div>

                    </div>
                </section>
            </div>
      
      
      <!---------------open restaurant gird view end------------------------------->
      
      
      <!----------------------discount restaurant gird---------------------------->
      <div id="page-content-gird-discount" style="display:none;">
                <section class="container">
                    <div class="">
                        <!--Content-->
                        <div class="">
                            <header>
                                <h1 class="page-title">Discount Restaurant Search Results</h1>
                            </header>
                            <figure class="filter clearfix">
                                <div class="buttons pull-left">
                                    <a href="#" class="btn icon active" onclick="return girdsection()"><i class="fa fa-th"></i>Grid</a>
                                    <a href="#" class="btn icon" onclick="return listsection()"><i class="fa fa-th-list"></i>List</a>
                                </div>
                                <div class="buttons pull-left" style="margin-left: 200px;">
                                    <button class="btn icon" onclick="return girdOpenRestaurant()"><strong>Open</strong></button>
                                    <button class="btn icon" onclick="return girdNearRestaurant()"><strong>Under 5 Miles</strong></button>
                                    <button class="btn icon" onclick="return girdDiscountRestaurant()"><strong>Discount</strong></button>
                                </div>
                                <div class="pull-right">
                                    <aside class="sorting">
                                        <span>Sorting</span>
                                        <div class="form-group">
                                            <select class="framed" id="restaurant_latest_sort" name="sort" onchange="return loadlatestGirdRestaurant()">
                                                <option value="0">Select Sorting Option</option>
                                                <option value="1">Date - Newest First</option>
                                                <option value="2">Date - Oldest First</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </aside>
                                </div>
                            </figure>

                            <!--Listing Grid-->
                            <section class="block equal-height">
                                <div class="row">
                                  <div class="col-lg-8">     
                                    <?php 
                                    if(!empty($discount_restaurant))
                                    {
                                      foreach($discount_restaurant as $row)  
                                      {
                                        
                                 ?>
                            <?php
                            $imagename = "";
                            $url = @getimagesize($row->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $row->logo_url;
                            }
                            ?>
                                  <div class="col-md-4 col-sm-4">
                                        <div class="item">
                                            <div class="image">
                                                <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $row->restaurant_id ?>">
                                                    <div class="overlay">
                                                        <div class="inner">
                                                            <div class="content">
                                                                <h4>Description</h4>
                                                                <p><?php echo $row->description; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <img src="<?php echo $imagesname; ?>" alt="" width="263" height="196">
                                                </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $row->restaurant_id ?>"><h3><?php echo $row->restaurant_name; ?></h3></a>
                                                <figure><?php echo $row->city_name.",".$row->country_name; ?></figure>
                                                <div class="info">
                                                    <div class="type">
                                                        <i><?php echo $row->restaurant_reviews; ?></i>
                                                        <span>Reviews</span>
                                                    </div>
                                                    <div class="rating" data-rating="4"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>
                                    
                                <?php
                                    }
                                    } // end if empty sucess
                                else 
                                    { ?>
                                    
                                    <div style=" margin-left: 30px;" > Result Not Found </div>
                                         
                               <?php }
                                    ?>
                                </div>
                                <div class="col-lg-3 col-lg-offset-1">
                            <aside id="sidebar">
                                <section>
                                    <header><h2>Popular Restaurant</h2></header>
                                    <?php if (!empty($popular_restaurant)) {
    foreach ($popular_restaurant as $rest) { ?>
                                    <?php
                            $imagename = "";
                            $url = @getimagesize($rest->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $rest->logo_url;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo  $rest->restaurant_name;?></h3>
                                        <figure><?php echo $rest->city_name.",".$rest->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $imagesname; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                
                                <section>
                                    <header><h2>Most Reviewed Users </h2></header>
                                    <?php if (!empty($user_reviews)) {
    foreach ($user_reviews as $user_row) { ?>
                                    <?php
                            $user_image = "";
                            $url = @getimagesize($user_row->user_image);
                            if (@!is_array($url)) {
                                $user_image = base_url()."uploads/profile_images/member-3t.jpg"; // The image doesn't exist
                            } else {
                                $user_image = $user_row->user_image;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo ucwords($user_row->first_name)."  ".ucwords($user_row->last_name); ?></h3>
                                        <figure><?php echo $user_row->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $user_image; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                <section>
                                    <header><h2>Most Review Users Categories</h2></header>
                                    <ul class="bullets">
                                        <?php
if (!empty($cusine_type)) {
    foreach ($cusine_type as $category) {
        ?>
                                    <li><a href="#"><?= $category->tag_name; ?></a></li>
    <?php }
} ?>
                                    </ul>
                                </section>
                                <section>
                                    
                                    
                                    <!-- /.form-group -->
                                </section>
                            </aside>
                            <!-- /#sidebar-->
                        </div>
                                </div>
                                <!--/.row-->
                            </section>
                            <!--end Listing Grid-->
                            <!--Pagination-->
<!--                            <nav>
                                <ul class="pagination pull-right">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#" class="previous"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#" class="next"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </nav>-->
                            <!--end Pagination-->
                        </div>

                    </div>
                </section>
            </div>
      
      
      <!----------------------dicount restaurant gird view end------------------->
      
      <!-------------------near by restaurant---------------------------------->
      <div id="page-content-gird-near" style="display:none;">
                <section class="container">
                    <div class="">
                        <!--Content-->
                        <div class="">
                            <header>
                                <h1 class="page-title">Near By Restaurant Search Results</h1>
                            </header>
                            <figure class="filter clearfix">
                                <div class="buttons pull-left">
                                    <a href="#" class="btn icon active" onclick="return girdsection()"><i class="fa fa-th"></i>Grid</a>
                                    <a href="#" class="btn icon" onclick="return listsection()"><i class="fa fa-th-list"></i>List</a>
                                </div>
                                <div class="buttons pull-left" style="margin-left: 200px;">
                                    <button class="btn icon" onclick="return girdOpenRestaurant()"><strong>Open</strong></button>
                                    <button class="btn icon" onclick="return girdNearRestaurant()"><strong>Under 5 Miles</strong></button>
                                    <button class="btn icon" onclick="return girdDiscountRestaurant()"><strong>Discount</strong></button>
                                </div>
                                <div class="pull-right">
                                    <aside class="sorting">
                                        <span>Sorting</span>
                                        <div class="form-group">
                                            <select class="framed" id="restaurant_latest_sort" name="sort" onchange="return loadlatestGirdRestaurant()">
                                                <option value="0">Select Sorting Option</option>
                                                <option value="1">Date - Newest First</option>
                                                <option value="2">Date - Oldest First</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </aside>
                                </div>
                            </figure>

                            <!--Listing Grid-->
                            <section class="block equal-height">
                                <div class="row">
                                    <div class="col-lg-8">   
                                    <?php 
                                    if(!empty($near_restaurant))
                                    {
                                      foreach($near_restaurant as $row)  
                                      {
                                        
                                 ?>
                            <?php
                            $imagename = "";
                            $url = @getimagesize($row->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $row->logo_url;
                            }
                            ?>
                                   <div class="col-md-4 col-sm-4">
                                        <div class="item">
                                            <div class="image">
                                                <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $row->restaurant_id ?>">
                                                    <div class="overlay">
                                                        <div class="inner">
                                                            <div class="content">
                                                                <h4>Description</h4>
                                                                <p><?php echo $row->description; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <img src="<?php echo $imagesname; ?>" alt="" width="263" height="196">
                                                </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $row->restaurant_id; ?>"><h3><?php echo $row->restaurant_name; ?></h3></a>
                                                <figure><?php echo $row->city_name.",".$row->country_name; ?></figure>
                                                <div class="info">
                                                    <div class="type">
                                                        <i><?php echo $row->restaurant_reviews; ?></i>
                                                        <span>Reviews</span>
                                                    </div>
                                                    <div class="rating" data-rating="4"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>
                                    
                                <?php
                                    }
                                    } // end if empty sucess
                                else 
                                    { ?>
                                    
                                    <div style=" margin-left: 30px;" > Result Not Found </div>
                                         
                               <?php }
                                    ?>
                                </div>
                                <div class="col-lg-3 col-lg-offset-1">
                            <aside id="sidebar">
                                <section>
                                    <header><h2>Popular Restaurant</h2></header>
                                    <?php if (!empty($popular_restaurant)) {
    foreach ($popular_restaurant as $rest) { ?>
                                    <?php
                            $imagename = "";
                            $url = @getimagesize($rest->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $rest->logo_url;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo  $rest->restaurant_name;?></h3>
                                        <figure><?php echo $rest->city_name.",".$rest->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $imagesname; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                
                                <section>
                                    <header><h2>Most Reviewed Users </h2></header>
                                    <?php if (!empty($user_reviews)) {
    foreach ($user_reviews as $user_row) { ?>
                                    <?php
                            $user_image = "";
                            $url = @getimagesize($user_row->user_image);
                            if (@!is_array($url)) {
                                $user_image = base_url()."uploads/profile_images/member-3t.jpg"; // The image doesn't exist
                            } else {
                                $user_image = $user_row->user_image;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo ucwords($user_row->first_name)."  ".ucwords($user_row->last_name); ?></h3>
                                        <figure><?php echo $user_row->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $user_image; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                <section>
                                    <header><h2>Most Review Users Categories</h2></header>
                                    <ul class="bullets">
                                        <?php
if (!empty($cusine_type)) {
    foreach ($cusine_type as $category) {
        ?>
                                    <li><a href="#"><?= $category->tag_name; ?></a></li>
    <?php }
} ?>
                                    </ul>
                                </section>
                                <section>
                                    
                                    
                                    <!-- /.form-group -->
                                </section>
                            </aside>
                            <!-- /#sidebar-->
                        </div>
                                                                      
                                </div>
                                <!--/.row-->
                            </section>
                            <!--end Listing Grid-->
                            <!--Pagination-->
<!--                            <nav>
                                <ul class="pagination pull-right">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#" class="previous"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#" class="next"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </nav>-->
                            <!--end Pagination-->
                        </div>

                    </div>
                </section>
            </div>
      
      
      <!-------------------end near by restaurant------------------------------>
      
      
      
      
      <!-- Main List Restaurant List view----->    
    <div id="page-content1" style="display:none;">
                <section class="container">
                    <div class="row">
                        <!--Content-->
                        <div class="col-md-9">
                            <header>
                                <h1 class="page-title">Search Result Listing</h1>
                            </header>
                            <figure class="filter clearfix">
                                <div class="buttons pull-left">
                                    <a href="#" class="btn icon active" onclick="return girdsection()"><i class="fa fa-th"></i>Grid</a>
                                    <a href="#" class="btn icon" onclick="return listsection()"><i class="fa fa-th-list"></i>List</a>
                                </div>
                                <div class="buttons pull-left" style="margin-left: 97px;">
                                    <button class="btn icon" onclick="return listOpenRestaurant()"><strong>Open</strong></button>
                                    <button class="btn icon" onclick="return listNearRestaurant()"><strong>Under 5 Miles</strong></button>
                                    <button class="btn icon" onclick="return listDiscountRestaurant()"><strong>Discount</strong></button>
                                </div>
                                <div class="pull-right">
                                    <aside class="sorting">
                                        <span>Sorting</span>
                                        <div class="form-group">
                                            <select class="framed" id="list_sort" name="sort" onchange="return loadListRestaurant()">
                                                <option value="0">Select Sorting Option</option>
                                                <option value="1">Date - Newest First</option>
                                                <option value="2">Date - Oldest First</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </aside>
                                </div>
                            </figure>

                            <!--Listing List-->
                            <section class="block listing">
                                <?php 
                                    if(!empty($restaurant_keyword))
                                    {
                                      foreach($restaurant_keyword as $rows)  
                                      {
                                 ?>
                            <?php
                            $imagename = "";
                            $url = @getimagesize($rows->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $rows->logo_url;
                            }
                            ?>
                                <div class="item list">
                                    <div class="image">
                                        <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                        <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rows->restaurant_id ?>">
                                            <div class="overlay">
                                                <div class="inner">
                                                    <div class="content">
                                                        <h4>Description</h4>
                                                        <p><?php echo $rows->description ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <img src="<?php echo $imagesname; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="wrapper">
                                        <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rows->restaurant_id ?>"><h3><?php echo $rows->restaurant_name ?></h3></a>
                                        <figure><?php echo $rows->city_name.",".$rows->country_name ?></figure>
                                        <div class="info">
                                            <div class="type">
                                                 <i><?php echo $rows->restaurant_reviews; ?></i>
                                                        <span>Reviews</span>
                                            </div>
                                            <div class="rating" data-rating="4"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php
                                      }
                                    }
                                else {
                                    echo "<h2>"."Result Not Found"."</h2>";
                                }
                                ?>
                                
                                <!-- /.item-->
                            </section>
                            <!--end Listing List-->
                            <!--Pagination-->
<!--                            <nav>
                                <ul class="pagination pull-right">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#" class="previous"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#" class="next"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </nav>-->
                            <!--end Pagination-->
                        </div>
                        <!--Sidebar-->
                        <div class="col-md-3" style="margin-top:100px;">
                            <aside id="sidebar">
                                <section>
                                    <header><h2>Popular Restaurant</h2></header>
                                    <?php if (!empty($popular_restaurant)) {
    foreach ($popular_restaurant as $rest) { ?>
                                    <?php
                            $imagename = "";
                            $url = @getimagesize($rest->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $rest->logo_url;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo  $rest->restaurant_name;?></h3>
                                        <figure><?php echo $rest->city_name.",".$rest->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $imagesname; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                
                                <section>
                                    <header><h2>Most Reviewed Users </h2></header>
                                    <?php if (!empty($user_reviews)) {
    foreach ($user_reviews as $user_row) { ?>
                                    <?php
                            $user_image = "";
                            $url = @getimagesize($user_row->user_image);
                            if (@!is_array($url)) {
                                $user_image = base_url()."uploads/profile_images/member-3t.jpg"; // The image doesn't exist
                            } else {
                                $user_image = $user_row->user_image;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo ucwords($user_row->first_name)."  ".ucwords($user_row->last_name); ?></h3>
                                        <figure><?php echo $user_row->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $user_image; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                <section>
                                    <header><h2>Most Review Users Categories</h2></header>
                                    <ul class="bullets">
                                        <?php
if (!empty($cusine_type)) {
    foreach ($cusine_type as $category) {
        ?>
                                    <li><a href="#"><?= $category->tag_name; ?></a></li>
    <?php }
} ?>
                                    </ul>
                                </section>
                                <section>
                                    
                                    
                                    <!-- /.form-group -->
                                </section>
                            </aside>
                            <!-- /#sidebar-->
                        </div>
                        <!-- /.col-md-3-->
                        <!--end Sidebar-->
                    </div>
                </section>
            </div>
            
   <!------Main List Restaurant List view end----->  
      
      
     <!--- Latest restaurant in list------>
     <div id="page-content1-list-latest" style="display:none;">
                <section class="container">
                    <div class="row">
                        <!--Content-->
                        <div class="col-md-9">
                            <header>
                                <h1 class="page-title">Latest Search Result Listing </h1>
                            </header>
                            <figure class="filter clearfix">
                                <div class="buttons pull-left">
                                    <a href="#" class="btn icon active" onclick="return girdsection()"><i class="fa fa-th"></i>Grid</a>
                                    <a href="#" class="btn icon" onclick="return listsection()"><i class="fa fa-th-list"></i>List</a>
                                </div>
                                <div class="buttons pull-left" style="margin-left: 97px;">
                                    <button class="btn icon" onclick="return listOpenRestaurant()"><strong>Open</strong></button>
                                    <button class="btn icon" onclick="return listNearRestaurant()"><strong>Under 5 Miles</strong></button>
                                    <button class="btn icon" onclick="return listDiscountRestaurant()"><strong>Discount</strong></button>
                                </div>
                                <div class="pull-right">
                                    <aside class="sorting">
                                        <span>Sorting</span>
                                        <div class="form-group">
                                            <select class="framed" id="list_latest_sort" name="sort" onchange="return loadListLatestRestaurant()">
                                                <option value="0">Select Sorting Option</option>
                                                <option value="1">Date - Newest First</option>
                                                <option value="2">Date - Oldest First</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </aside>
                                </div>
                            </figure>

                            <!--Listing List-->
                            <section class="block listing">
                                <?php 
                                    if(!empty($latest_restaurant))
                                    {
                                      foreach($latest_restaurant as $rows)  
                                      {
                                 ?>
                            <?php
                            $imagename = "";
                            $url = @getimagesize($rows->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $rows->logo_url;
                            }
                            ?>
                                <div class="item list">
                                    <div class="image">
                                        <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                        <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rows->restaurant_id ?>">
                                            <div class="overlay">
                                                <div class="inner">
                                                    <div class="content">
                                                        <h4>Description</h4>
                                                        <p><?php echo $rows->description ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <img src="<?php echo $imagesname; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="wrapper">
                                        <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rows->restaurant_id ?>"><h3><?php echo $rows->restaurant_name ?></h3></a>
                                        <figure><?php echo $rows->city_name.",".$rows->country_name ?></figure>
                                        <div class="info">
                                            <div class="type">
                                                 <i><?php echo $rows->restaurant_reviews; ?></i>
                                                        <span>Reviews</span>
                                            </div>
                                            <div class="rating" data-rating="4"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php
                                      }
                                    }
                                else {
                                    echo "<h2>"."Result Not Found"."</h2>";
                                }
                                ?>
                                
                                <!-- /.item-->
                            </section>
                            <!--end Listing List-->
                            <!--Pagination-->
<!--                            <nav>
                                <ul class="pagination pull-right">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#" class="previous"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#" class="next"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </nav>-->
                            <!--end Pagination-->
                        </div>
                        <!--Sidebar-->
                        <div class="col-md-3" style="margin-top:100px;">
                            <aside id="sidebar">
                                <section>
                                    <header><h2>Popular Restaurant</h2></header>
                                    <?php if (!empty($popular_restaurant)) {
    foreach ($popular_restaurant as $rest) { ?>
                                    <?php
                            $imagename = "";
                            $url = @getimagesize($rest->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $rest->logo_url;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo  $rest->restaurant_name;?></h3>
                                        <figure><?php echo $rest->city_name.",".$rest->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $imagesname; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                
                                <section>
                                    <header><h2>Most Reviewed Users </h2></header>
                                    <?php if (!empty($user_reviews)) {
    foreach ($user_reviews as $user_row) { ?>
                                    <?php
                            $user_image = "";
                            $url = @getimagesize($user_row->user_image);
                            if (@!is_array($url)) {
                                $user_image = base_url()."uploads/profile_images/member-3t.jpg"; // The image doesn't exist
                            } else {
                                $user_image = $user_row->user_image;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo ucwords($user_row->first_name)."  ".ucwords($user_row->last_name); ?></h3>
                                        <figure><?php echo $user_row->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $user_image; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                <section>
                                    <header><h2>Most Review Users Categories</h2></header>
                                    <ul class="bullets">
                                        <?php
if (!empty($cusine_type)) {
    foreach ($cusine_type as $category) {
        ?>
                                    <li><a href="#"><?= $category->tag_name; ?></a></li>
    <?php }
} ?>
                                    </ul>
                                </section>
                                <section>
                                    
                                    
                                    <!-- /.form-group -->
                                </section>
                            </aside>
                            <!-- /#sidebar-->
                        </div>
                        <!-- /.col-md-3-->
                        <!--end Sidebar-->
                    </div>
                </section>
            </div>
    <!------Latest restaurant in list end----->
      
      
      
      
      
      
    <!--- old restaurant in list------>
     <div id="page-content1-list-old" style="display:none;">
                <section class="container">
                    <div class="row">
                        <!--Content-->
                        <div class="col-md-9">
                            <header>
                                <h1 class="page-title">Oldest Search Result Listing</h1>
                            </header>
                            <figure class="filter clearfix">
                                <div class="buttons pull-left">
                                    <a href="#" class="btn icon active" onclick="return girdsection()"><i class="fa fa-th"></i>Grid</a>
                                    <a href="#" class="btn icon" onclick="return listsection()"><i class="fa fa-th-list"></i>List</a>
                                </div>
                                <div class="buttons pull-left" style="margin-left: 97px;">
                                    <button class="btn icon" onclick="return listOpenRestaurant()"><strong>Open</strong></button>
                                    <button class="btn icon" onclick="return listNearRestaurant()"><strong>Under 5 Miles</strong></button>
                                    <button class="btn icon" onclick="return listDiscountRestaurant()"><strong>Discount</strong></button>
                                </div>
                                <div class="pull-right">
                                    <aside class="sorting">
                                        <span>Sorting</span>
                                        <div class="form-group">
                                            <select class="framed" id="list_old_sort" name="sort" onchange="return loadListOldRestaurant()">
                                                <option value="0">Select Sorting Option</option>
                                                <option value="1">Date - Newest First</option>
                                                <option value="2">Date - Oldest First</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </aside>
                                </div>
                            </figure>

                            <!--Listing List-->
                            <section class="block listing">
                                <?php 
                                    if(!empty($old_restaurant))
                                    {
                                      foreach($old_restaurant as $rows)  
                                      {
                                 ?>
                            <?php
                            $imagename = "";
                            $url = @getimagesize($rows->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $rows->logo_url;
                            }
                            ?>
                                <div class="item list">
                                    <div class="image">
                                        <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                        <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rows->restaurant_id ?>">
                                            <div class="overlay">
                                                <div class="inner">
                                                    <div class="content">
                                                        <h4>Description</h4>
                                                        <p><?php echo $rows->description ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <img src="<?php echo $imagesname; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="wrapper">
                                        <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rows->restaurant_id ?>"><h3><?php echo $rows->restaurant_name ?></h3></a>
                                        <figure><?php echo $rows->city_name.",".$rows->country_name ?></figure>
                                        <div class="info">
                                            <div class="type">
                                                 <i><?php echo $rows->restaurant_reviews; ?></i>
                                                        <span>Reviews</span>
                                            </div>
                                            <div class="rating" data-rating="4"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php
                                      }
                                    }
                                else {
                                    echo "<h2>"."Result Not Found"."</h2>";
                                }
                                ?>
                                
                                <!-- /.item-->
                            </section>
                            <!--end Listing List-->
                            <!--Pagination-->
<!--                            <nav>
                                <ul class="pagination pull-right">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#" class="previous"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#" class="next"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </nav>-->
                            <!--end Pagination-->
                        </div>
                        <!--Sidebar-->
                        <div class="col-md-3" style="margin-top:100px;">
                            <aside id="sidebar">
                                <section>
                                    <header><h2>Popular Restaurant</h2></header>
                                    <?php if (!empty($popular_restaurant)) {
    foreach ($popular_restaurant as $rest) { ?>
                                    <?php
                            $imagename = "";
                            $url = @getimagesize($rest->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $rest->logo_url;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo  $rest->restaurant_name;?></h3>
                                        <figure><?php echo $rest->city_name.",".$rest->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $imagesname; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                
                                <section>
                                    <header><h2>Most Reviewed Users </h2></header>
                                    <?php if (!empty($user_reviews)) {
    foreach ($user_reviews as $user_row) { ?>
                                    <?php
                            $user_image = "";
                            $url = @getimagesize($user_row->user_image);
                            if (@!is_array($url)) {
                                $user_image = base_url()."uploads/profile_images/member-3t.jpg"; // The image doesn't exist
                            } else {
                                $user_image = $user_row->user_image;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo ucwords($user_row->first_name)."  ".ucwords($user_row->last_name); ?></h3>
                                        <figure><?php echo $user_row->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $user_image; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                <section>
                                    <header><h2>Most Review Users Categories</h2></header>
                                    <ul class="bullets">
                                        <?php
if (!empty($cusine_type)) {
    foreach ($cusine_type as $category) {
        ?>
                                    <li><a href="#"><?= $category->tag_name; ?></a></li>
    <?php }
} ?>
                                    </ul>
                                </section>
                                <section>
                                    
                                    
                                    <!-- /.form-group -->
                                </section>
                            </aside>
                            <!-- /#sidebar-->
                        </div>
                        <!-- /.col-md-3-->
                        <!--end Sidebar-->
                    </div>
                </section>
            </div>
    <!------Old restaurant in list end----->  
      
      
      
  <!---- open restaurant in list-------> 
  
  <div id="page-content1-open-restaurant" style="display:none;">
                <section class="container">
                    <div class="row">
                        <!--Content-->
                        <div class="col-md-9">
                            <header>
                                <h1 class="page-title">Open Restaurant Result Listing</h1>
                            </header>
                            <figure class="filter clearfix">
                                <div class="buttons pull-left">
                                    <a href="#" class="btn icon active" onclick="return girdsection()"><i class="fa fa-th"></i>Grid</a>
                                    <a href="#" class="btn icon" onclick="return listsection()"><i class="fa fa-th-list"></i>List</a>
                                </div>
                                <div class="buttons pull-left" style="margin-left: 97px;">
                                    <button class="btn icon" onclick="return listOpenRestaurant()"><strong>Open</strong></button>
                                    <button class="btn icon" onclick="return listNearRestaurant()"><strong>Under 5 Miles</strong></button>
                                    <button class="btn icon" onclick="return listDiscountRestaurant()"><strong>Discount</strong></button>
                                </div>
                                <div class="pull-right">
                                    <aside class="sorting">
                                        <span>Sorting</span>
                                        <div class="form-group">
                                            <select class="framed" id="list_sort" name="sort" onchange="return loadListRestaurant()">
                                                <option value="0">Select Sorting Option</option>
                                                <option value="1">Date - Newest First</option>
                                                <option value="2">Date - Oldest First</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </aside>
                                </div>
                            </figure>

                            <!--Listing List-->
                            <section class="block listing">
                                <?php 
                                    if(!empty($open_restaurant))
                                    {
                                      foreach($open_restaurant as $rows)  
                                      {
                                 ?>
                            <?php
                            $imagename = "";
                            $url = @getimagesize($rows->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $rows->logo_url;
                            }
                            ?>
                                <div class="item list">
                                    <div class="image">
                                        <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                        <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rows->restaurant_id ?>">
                                            <div class="overlay">
                                                <div class="inner">
                                                    <div class="content">
                                                        <h4>Description</h4>
                                                        <p><?php echo $rows->description ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <img src="<?php echo $imagesname; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="wrapper">
                                        <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rows->restaurant_id ?>"><h3><?php echo $rows->restaurant_name ?></h3></a>
                                        <figure><?php echo $rows->city_name.",".$rows->country_name ?></figure>
                                        <div class="info">
                                            <div class="type">
                                                 <i><?php echo $rows->restaurant_reviews; ?></i>
                                                        <span>Reviews</span>
                                            </div>
                                            <div class="rating" data-rating="4"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php
                                      }
                                    }
                                else {
                                    echo "<h2>"."Result Not Found"."</h2>";
                                }
                                ?>
                                
                                <!-- /.item-->
                            </section>
                            <!--end Listing List-->
                            <!--Pagination-->
<!--                            <nav>
                                <ul class="pagination pull-right">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#" class="previous"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#" class="next"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </nav>-->
                            <!--end Pagination-->
                        </div>
                        <!--Sidebar-->
                        <div class="col-md-3" style="margin-top:100px;">
                            <aside id="sidebar">
                                <section>
                                    <header><h2>Popular Restaurant</h2></header>
                                    <?php if (!empty($popular_restaurant)) {
    foreach ($popular_restaurant as $rest) { ?>
                                    <?php
                            $imagename = "";
                            $url = @getimagesize($rest->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $rest->logo_url;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo  $rest->restaurant_name;?></h3>
                                        <figure><?php echo $rest->city_name.",".$rest->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $imagesname; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                
                                <section>
                                    <header><h2>Most Reviewed Users </h2></header>
                                    <?php if (!empty($user_reviews)) {
    foreach ($user_reviews as $user_row) { ?>
                                    <?php
                            $user_image = "";
                            $url = @getimagesize($user_row->user_image);
                            if (@!is_array($url)) {
                                $user_image = base_url()."uploads/profile_images/member-3t.jpg"; // The image doesn't exist
                            } else {
                                $user_image = $user_row->user_image;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo ucwords($user_row->first_name)."  ".ucwords($user_row->last_name); ?></h3>
                                        <figure><?php echo $user_row->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $user_image; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                <section>
                                    <header><h2>Most Review Users Categories</h2></header>
                                    <ul class="bullets">
                                        <?php
if (!empty($cusine_type)) {
    foreach ($cusine_type as $category) {
        ?>
                                    <li><a href="#"><?= $category->tag_name; ?></a></li>
    <?php }
} ?>
                                    </ul>
                                </section>
                                <section>
                                    
                                    
                                    <!-- /.form-group -->
                                </section>
                            </aside>
                            <!-- /#sidebar-->
                        </div>
                        <!-- /.col-md-3-->
                        <!--end Sidebar-->
                    </div>
                </section>
            </div>
  
  
  <!--------open restaurant in list end------>
      
  
  
  <!----- near by restaurant in list-------------->
  
  <div id="page-content1-near-by" style="display:none;">
                <section class="container">
                    <div class="row">
                        <!--Content-->
                        <div class="col-md-9">
                            <header>
                                <h1 class="page-title">Near By Restaurant Result Listing</h1>
                            </header>
                            <figure class="filter clearfix">
                                <div class="buttons pull-left">
                                    <a href="#" class="btn icon active" onclick="return girdsection()"><i class="fa fa-th"></i>Grid</a>
                                    <a href="#" class="btn icon" onclick="return listsection()"><i class="fa fa-th-list"></i>List</a>
                                </div>
                                <div class="buttons pull-left" style="margin-left: 97px;">
                                    <button class="btn icon" onclick="return listOpenRestaurant()"><strong>Open</strong></button>
                                    <button class="btn icon" onclick="return listNearRestaurant()"><strong>Under 5 Miles</strong></button>
                                    <button class="btn icon" onclick="return listDiscountRestaurant()"><strong>Discount</strong></button>
                                </div>
                                <div class="pull-right">
                                    <aside class="sorting">
                                        <span>Sorting</span>
                                        <div class="form-group">
                                            <select class="framed" id="list_sort" name="sort" onchange="return loadListRestaurant()">
                                                <option value="0">Select Sorting Option</option>
                                                <option value="1">Date - Newest First</option>
                                                <option value="2">Date - Oldest First</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </aside>
                                </div>
                            </figure>

                            <!--Listing List-->
                            <section class="block listing">
                                <?php 
                                    if(!empty($near_restaurant))
                                    {
                                      foreach($near_restaurant as $rows)  
                                      {
                                 ?>
                            <?php
                            $imagename = "";
                            $url = @getimagesize($rows->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $rows->logo_url;
                            }
                            ?>
                                <div class="item list">
                                    <div class="image">
                                        <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                        <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rows->restaurant_id ?>">
                                            <div class="overlay">
                                                <div class="inner">
                                                    <div class="content">
                                                        <h4>Description</h4>
                                                        <p><?php echo $rows->description ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <img src="<?php echo $imagesname; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="wrapper">
                                        <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rows->restaurant_id ?>"><h3><?php echo $rows->restaurant_name ?></h3></a>
                                        <figure><?php echo $rows->city_name.",".$rows->country_name ?></figure>
                                        <div class="info">
                                            <div class="type">
                                                 <i><?php echo $rows->restaurant_reviews; ?></i>
                                                        <span>Reviews</span>
                                            </div>
                                            <div class="rating" data-rating="4"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php
                                      }
                                    }
                                else {
                                    echo "<h2>"."Result Not Found"."</h2>";
                                }
                                ?>
                                
                                <!-- /.item-->
                            </section>
                            <!--end Listing List-->
                            <!--Pagination-->
<!--                            <nav>
                                <ul class="pagination pull-right">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#" class="previous"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#" class="next"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </nav>-->
                            <!--end Pagination-->
                        </div>
                        <!--Sidebar-->
                        <div class="col-md-3" style="margin-top:100px;">
                            <aside id="sidebar">
                                <section>
                                    <header><h2>Popular Restaurant</h2></header>
                                    <?php if (!empty($popular_restaurant)) {
    foreach ($popular_restaurant as $rest) { ?>
                                    <?php
                            $imagename = "";
                            $url = @getimagesize($rest->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $rest->logo_url;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo  $rest->restaurant_name;?></h3>
                                        <figure><?php echo $rest->city_name.",".$rest->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $imagesname; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                
                                <section>
                                    <header><h2>Most Reviewed Users </h2></header>
                                    <?php if (!empty($user_reviews)) {
    foreach ($user_reviews as $user_row) { ?>
                                    <?php
                            $user_image = "";
                            $url = @getimagesize($user_row->user_image);
                            if (@!is_array($url)) {
                                $user_image = base_url()."uploads/profile_images/member-3t.jpg"; // The image doesn't exist
                            } else {
                                $user_image = $user_row->user_image;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo ucwords($user_row->first_name)."  ".ucwords($user_row->last_name); ?></h3>
                                        <figure><?php echo $user_row->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $user_image; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                <section>
                                    <header><h2>Most Review Users Categories</h2></header>
                                    <ul class="bullets">
                                        <?php
if (!empty($cusine_type)) {
    foreach ($cusine_type as $category) {
        ?>
                                    <li><a href="#"><?= $category->tag_name; ?></a></li>
    <?php }
} ?>
                                    </ul>
                                </section>
                                <section>
                                    
                                    
                                    <!-- /.form-group -->
                                </section>
                            </aside>
                            <!-- /#sidebar-->
                        </div>
                        <!-- /.col-md-3-->
                        <!--end Sidebar-->
                    </div>
                </section>
            </div>
  
  
  
  <!-------Near by restaurant in list ends---------------->
  
  
      
  
  <!-----------Discount restaurant in list------------------------>
      
      <div id="page-content1-discount" style="display:none;">
                <section class="container">
                    <div class="row">
                        <!--Content-->
                        <div class="col-md-9">
                            <header>
                                <h1 class="page-title">Discount Restaurant Search Result Listing</h1>
                            </header>
                            <figure class="filter clearfix">
                                <div class="buttons pull-left">
                                    <a href="#" class="btn icon active" onclick="return girdsection()"><i class="fa fa-th"></i>Grid</a>
                                    <a href="#" class="btn icon" onclick="return listsection()"><i class="fa fa-th-list"></i>List</a>
                                </div>
                                <div class="buttons pull-left" style="margin-left: 97px;">
                                    <button class="btn icon" onclick="return listOpenRestaurant()"><strong>Open</strong></button>
                                    <button class="btn icon" onclick="return listNearRestaurant()"><strong>Under 5 Miles</strong></button>
                                    <button class="btn icon" onclick="return listDiscountRestaurant()"><strong>Discount</strong></button>
                                </div>
                                <div class="pull-right">
                                    <aside class="sorting">
                                        <span>Sorting</span>
                                        <div class="form-group">
                                            <select class="framed" id="list_sort" name="sort" onchange="return loadListRestaurant()">
                                                <option value="0">Select Sorting Option</option>
                                                <option value="1">Date - Newest First</option>
                                                <option value="2">Date - Oldest First</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </aside>
                                </div>
                            </figure>

                            <!--Listing List-->
                            <section class="block listing">
                                <?php 
                                    if(!empty($discount_restaurant))
                                    {
                                      foreach($discount_restaurant as $rows)  
                                      {
                                 ?>
                            <?php
                            $imagename = "";
                            $url = @getimagesize($rows->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $rows->logo_url;
                            }
                            ?>
                                <div class="item list">
                                    <div class="image">
                                        <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                        <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rows->restaurant_id ?>">
                                            <div class="overlay">
                                                <div class="inner">
                                                    <div class="content">
                                                        <h4>Description</h4>
                                                        <p><?php echo $rows->description ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <img src="<?php echo $imagesname; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="wrapper">
                                        <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rows->restaurant_id ?>"><h3><?php echo $rows->restaurant_name ?></h3></a>
                                        <figure><?php echo $rows->city_name.",".$rows->country_name ?></figure>
                                        <div class="info">
                                            <div class="type">
                                                 <i><?php echo $rows->restaurant_reviews; ?></i>
                                                        <span>Reviews</span>
                                            </div>
                                            <div class="rating" data-rating="4"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php
                                      }
                                    }
                                else {
                                    echo "<h2>"."Result Not Found"."</h2>";
                                }
                                ?>
                                
                                <!-- /.item-->
                            </section>
                            <!--end Listing List-->
                            <!--Pagination-->
<!--                            <nav>
                                <ul class="pagination pull-right">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#" class="previous"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#" class="next"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </nav>-->
                            <!--end Pagination-->
                        </div>
                        <!--Sidebar-->
                        <div class="col-md-3" style="margin-top:100px;">
                            <aside id="sidebar">
                                <section>
                                    <header><h2>Popular Restaurant</h2></header>
                                    <?php if (!empty($popular_restaurant)) {
    foreach ($popular_restaurant as $rest) { ?>
                                    <?php
                            $imagename = "";
                            $url = @getimagesize($rest->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $rest->logo_url;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo  $rest->restaurant_name;?></h3>
                                        <figure><?php echo $rest->city_name.",".$rest->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $imagesname; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                
                                <section>
                                    <header><h2>Most Reviewed Users </h2></header>
                                    <?php if (!empty($user_reviews)) {
    foreach ($user_reviews as $user_row) { ?>
                                    <?php
                            $user_image = "";
                            $url = @getimagesize($user_row->user_image);
                            if (@!is_array($url)) {
                                $user_image = base_url()."uploads/profile_images/member-3t.jpg"; // The image doesn't exist
                            } else {
                                $user_image = $user_row->user_image;
                            }
                            ?>
                                    
                                    <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $rest->restaurant_id ?>" class="item-horizontal small">
                                        <h3><?php echo ucwords($user_row->first_name)."  ".ucwords($user_row->last_name); ?></h3>
                                        <figure><?php echo $user_row->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $user_image; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <?php }
} ?>

                                  
                                </section>
                                
                                <section>
                                    <header><h2>Most Review Users Categories</h2></header>
                                    <ul class="bullets">
                                        <?php
if (!empty($cusine_type)) {
    foreach ($cusine_type as $category) {
        ?>
                                    <li><a href="#"><?= $category->tag_name; ?></a></li>
    <?php }
} ?>
                                    </ul>
                                </section>
                                <section>
                                    
                                    
                                    <!-- /.form-group -->
                                </section>
                            </aside>
                            <!-- /#sidebar-->
                        </div>
                        <!-- /.col-md-3-->
                        <!--end Sidebar-->
                    </div>
                </section>
            </div>
      
      
 <!-------------------discount restaurant in list end------------>   
 
 
 
 
 
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>

 <script>
    function girdsection()
    {
          $("#page-content").show();
          $("#page-content1").hide();
          $("#page-content-gird-latests").hide();
          $("#page-content-gird-old").hide();
          $("#page-content1-list-latest").hide();
          $("#page-content1-list-old").hide();
          $("#page-content-gird-open").hide(); 
          $("#page-content-gird-discount").hide();
          $("#page-content-gird-near").hide();
          $("#page-content1-open-restaurant").hide();
          $("#page-content1-near-by").hide();
          $("#page-content1-discount").hide();
    }
    
    function listsection()
    {
         $("#page-content1").show();
         $("#page-content").hide();
         $("#page-content-gird-latests").hide();
         $("#page-content-gird-old").hide();
         $("#page-content1-list-latest").hide();
         $("#page-content1-list-old").hide();
         $("#page-content-gird-open").hide(); 
        $("#page-content-gird-discount").hide();
        $("#page-content-gird-near").hide();
        $("#page-content1-open-restaurant").hide();
          $("#page-content1-near-by").hide();
          $("#page-content1-discount").hide();
    }
            
 </script>    
 <script>
  function loadGirdRestaurant()
  {
      var restaurant_id=document.getElementById('restaurant_sort').value;
     if(restaurant_id==1)
     {
         $("#page-content-gird-latests").show();
         $("#page-content-gird-old").hide(); 
         $("#page-content").hide();
         $("#page-content1").hide();
         $("#page-content1-list-latest").hide();
         $("#page-content1-list-old").hide();
         $("#page-content-gird-open").hide(); 
        $("#page-content-gird-discount").hide();
        $("#page-content-gird-near").hide();
        $("#page-content1-open-restaurant").hide();
          $("#page-content1-near-by").hide();
          $("#page-content1-discount").hide();
     }else if(restaurant_id==2)
     { 
        $("#page-content-gird-old").show(); 
        $("#page-content-gird-latests").hide();
        $("#page-content").hide();
        $("#page-content1").hide();
        $("#page-content1-list-latest").hide();
        $("#page-content1-list-old").hide();
        $("#page-content-gird-open").hide(); 
        $("#page-content-gird-discount").hide();
        $("#page-content-gird-near").hide();
        $("#page-content1-open-restaurant").hide();
          $("#page-content1-near-by").hide();
          $("#page-content1-discount").hide();
     }else
     {
        $("#page-content-gird-old").hide(); 
        $("#page-content-gird-latests").hide();
        $("#page-content").show();
        $("#page-content1").hide();
        $("#page-content1-list-latest").hide();
        $("#page-content1-list-old").hide();
        $("#page-content-gird-open").hide(); 
        $("#page-content-gird-discount").hide();
        $("#page-content-gird-near").hide();
        $("#page-content1-open-restaurant").hide();
          $("#page-content1-near-by").hide();
          $("#page-content1-discount").hide();
     }
         
      
  }
 </script>
 
 <script>
  function loadlatestGirdRestaurant()
  {
      var restaurant_id=document.getElementById('restaurant_latest_sort').value;
     if(restaurant_id==1)
     {
         $("#page-content-gird-latests").show();
         $("#page-content-gird-old").hide(); 
         $("#page-content").hide();
         $("#page-content1").hide();
         $("#page-content1-list-latest").hide();
         $("#page-content1-list-old").hide();
         $("#page-content-gird-open").hide(); 
        $("#page-content-gird-discount").hide();
        $("#page-content-gird-near").hide();
        $("#page-content1-open-restaurant").hide();
          $("#page-content1-near-by").hide();
          $("#page-content1-discount").hide();
     }else if(restaurant_id==2)
     { 
        $("#page-content-gird-old").show(); 
        $("#page-content-gird-latests").hide();
        $("#page-content").hide();
        $("#page-content1").hide();
        $("#page-content1-list-latest").hide();
        $("#page-content1-list-old").hide();
        $("#page-content-gird-open").hide(); 
        $("#page-content-gird-discount").hide();
        $("#page-content-gird-near").hide();
        $("#page-content1-open-restaurant").hide();
          $("#page-content1-near-by").hide();
          $("#page-content1-discount").hide();
     }else
     {
        $("#page-content-gird-old").hide(); 
        $("#page-content-gird-latests").hide();
        $("#page-content").show();
        $("#page-content1").hide();
        $("#page-content1-list-latest").hide();
        $("#page-content1-list-old").hide();
        $("#page-content-gird-open").hide(); 
        $("#page-content-gird-discount").hide();
        $("#page-content-gird-near").hide();
        $("#page-content1-open-restaurant").hide();
          $("#page-content1-near-by").hide();
          $("#page-content1-discount").hide();
     }
         
      
  }
 </script>
 
 
 <script>
  function loadOldGirdRestaurant()
  {
      var restaurant_id=document.getElementById('restaurant_old_sort').value;
     if(restaurant_id==1)
     {
         $("#page-content-gird-latests").show();
         $("#page-content-gird-old").hide(); 
         $("#page-content").hide();
         $("#page-content1").hide();
         $("#page-content1-list-latest").hide();
         $("#page-content1-list-old").hide();
         $("#page-content-gird-open").hide(); 
        $("#page-content-gird-discount").hide();
        $("#page-content-gird-near").hide();
        $("#page-content1-open-restaurant").hide();
          $("#page-content1-near-by").hide();
          $("#page-content1-discount").hide();
     }else if(restaurant_id==2)
     { 
        $("#page-content-gird-old").show(); 
        $("#page-content-gird-latests").hide();
        $("#page-content").hide();
        $("#page-content1").hide();
        $("#page-content1-list-latest").hide();
        $("#page-content1-list-old").hide();
        $("#page-content-gird-open").hide(); 
        $("#page-content-gird-discount").hide();
        $("#page-content-gird-near").hide();
        $("#page-content1-open-restaurant").hide();
          $("#page-content1-near-by").hide();
          $("#page-content1-discount").hide();
     }else
     {
        $("#page-content-gird-old").hide(); 
        $("#page-content-gird-latests").hide();
        $("#page-content").show();
        $("#page-content1").hide();
        $("#page-content1-list-latest").hide();
        $("#page-content1-list-old").hide();
        $("#page-content-gird-open").hide(); 
        $("#page-content-gird-discount").hide();
        $("#page-content-gird-near").hide();
        $("#page-content1-open-restaurant").hide();
          $("#page-content1-near-by").hide();
          $("#page-content1-discount").hide();
     }
         
      
  }
 </script>
 
 
 
 
 <script>
  function loadListRestaurant()
  {
      
      var restaurant_id=document.getElementById('list_sort').value;
     if(restaurant_id==1)
     {
         $("#page-content-gird-latests").hide();
         $("#page-content-gird-old").hide(); 
         $("#page-content").hide();
         $("#page-content1").hide();
         $("#page-content1-list-latest").show();
         $("#page-content1-list-old").hide();
         $("#page-content-gird-open").hide(); 
        $("#page-content-gird-discount").hide();
        $("#page-content-gird-near").hide();
        $("#page-content1-open-restaurant").hide();
          $("#page-content1-near-by").hide();
          $("#page-content1-discount").hide();
     }else if(restaurant_id==2)
     { 
        $("#page-content-gird-old").hide(); 
        $("#page-content-gird-latests").hide();
        $("#page-content").hide();
        $("#page-content1").hide();
        $("#page-content1-list-latest").hide();
        $("#page-content1-list-old").show();
        $("#page-content-gird-open").hide(); 
        $("#page-content-gird-discount").hide();
        $("#page-content-gird-near").hide();
        $("#page-content1-open-restaurant").hide();
          $("#page-content1-near-by").hide();
          $("#page-content1-discount").hide();
     }else
     {
        $("#page-content-gird-old").hide(); 
        $("#page-content-gird-latests").hide();
        $("#page-content").hide();
        $("#page-content1").show();
        $("#page-content1-list-latest").hide();
        $("#page-content1-list-old").hide();
        $("#page-content-gird-open").hide(); 
        $("#page-content-gird-discount").hide();
        $("#page-content-gird-near").hide();
        $("#page-content1-open-restaurant").hide();
          $("#page-content1-near-by").hide();
          $("#page-content1-discount").hide();
     }
        
        
        
  }
 </script>
 
 
 <script>
  function loadListLatestRestaurant()
  {
      
      var restaurant_id=document.getElementById('list_latest_sort').value;
     if(restaurant_id==1)
     {  
         $("#page-content-gird-latests").hide();
         $("#page-content-gird-old").hide(); 
         $("#page-content").hide();
         $("#page-content1").hide();
         $("#page-content1-list-latest").show();
         $("#page-content1-list-old").hide();
         $("#page-content-gird-open").hide(); 
         $("#page-content-gird-discount").hide();
         $("#page-content-gird-near").hide();
         $("#page-content1-open-restaurant").hide();
          $("#page-content1-near-by").hide();
          $("#page-content1-discount").hide();
     }else if(restaurant_id==2)
     { 
        $("#page-content-gird-old").hide(); 
        $("#page-content-gird-latests").hide();
        $("#page-content").hide();
        $("#page-content1").hide();
        $("#page-content1-list-latest").hide();
        $("#page-content1-list-old").show();
        $("#page-content-gird-open").hide(); 
        $("#page-content-gird-discount").hide();
        $("#page-content-gird-near").hide();
        $("#page-content1-open-restaurant").hide();
          $("#page-content1-near-by").hide();
          $("#page-content1-discount").hide();
     }else
     {
        $("#page-content-gird-old").hide(); 
        $("#page-content-gird-latests").hide();
        $("#page-content").hide();
        $("#page-content1").show();
        $("#page-content1-list-latest").hide();
        $("#page-content1-list-old").hide();
        $("#page-content-gird-open").hide(); 
        $("#page-content-gird-discount").hide();
        $("#page-content-gird-near").hide();
        $("#page-content1-open-restaurant").hide();
          $("#page-content1-near-by").hide();
          $("#page-content1-discount").hide();
     }
        
        
        
  }
 </script>
 
 
 <script>
  function loadListOldRestaurant()
  {
      
      var restaurant_id=document.getElementById('list_old_sort').value;
     if(restaurant_id==1)
     {
         $("#page-content-gird-latests").hide();
         $("#page-content-gird-old").hide(); 
         $("#page-content").hide();
         $("#page-content1").hide();
         $("#page-content1-list-latest").show();
         $("#page-content1-list-old").hide();
         $("#page-content-gird-open").hide(); 
        $("#page-content-gird-discount").hide();
        $("#page-content-gird-near").hide();
        $("#page-content1-open-restaurant").hide();
          $("#page-content1-near-by").hide();
          $("#page-content1-discount").hide();
     }else if(restaurant_id==2)
     { 
        $("#page-content-gird-old").hide(); 
        $("#page-content-gird-latests").hide();
        $("#page-content").hide();
        $("#page-content1").hide();
        $("#page-content1-list-latest").hide();
        $("#page-content1-list-old").show();
        $("#page-content-gird-open").hide(); 
        $("#page-content-gird-discount").hide();
        $("#page-content-gird-near").hide();
        $("#page-content1-open-restaurant").hide();
          $("#page-content1-near-by").hide();
          $("#page-content1-discount").hide();
     }else
     {
        $("#page-content-gird-old").hide(); 
        $("#page-content-gird-latests").hide();
        $("#page-content").hide();
        $("#page-content1").show();
        $("#page-content1-list-latest").hide();
        $("#page-content1-list-old").hide();
        $("#page-content-gird-open").hide(); 
        $("#page-content-gird-discount").hide();
        $("#page-content-gird-near").hide();
        $("#page-content1-open-restaurant").hide();
          $("#page-content1-near-by").hide();
          $("#page-content1-discount").hide();
     }
        
  }
 </script>
 
 <script>
  function girdOpenRestaurant()
  {   
        $("#page-content-gird-open").show(); 
        $("#page-content-gird-discount").hide();
        $("#page-content-gird-old").hide(); 
        $("#page-content-gird-latests").hide();
        $("#page-content").hide();
        $("#page-content1").hide();
        $("#page-content1-list-latest").hide();
        $("#page-content1-list-old").hide();
        $("#page-content-gird-near").hide();
        $("#page-content1-open-restaurant").hide();
          $("#page-content1-near-by").hide();
          $("#page-content1-discount").hide();
  }
 </script>
 
 <script>
 function girdDiscountRestaurant()
 {
        $("#page-content-gird-open").hide(); 
        $("#page-content-gird-discount").show();
        $("#page-content-gird-old").hide(); 
        $("#page-content-gird-latests").hide();
        $("#page-content").hide();
        $("#page-content1").hide();
        $("#page-content1-list-latest").hide();
        $("#page-content1-list-old").hide();
        $("#page-content-gird-near").hide();
        $("#page-content1-open-restaurant").hide();
        $("#page-content1-near-by").hide();
        $("#page-content1-discount").hide();
 }
 
 
 
 </script>
 
 <script>
 function girdNearRestaurant()
 {
        $("#page-content-gird-open").hide(); 
        $("#page-content-gird-discount").hide();
        $("#page-content-gird-old").hide(); 
        $("#page-content-gird-latests").hide();
        $("#page-content").hide();
        $("#page-content1").hide();
        $("#page-content1-list-latest").hide();
        $("#page-content1-list-old").hide();
        $("#page-content-gird-near").show();
        $("#page-content1-open-restaurant").hide();
        $("#page-content1-near-by").hide();
        $("#page-content1-discount").hide();
 }
 
 
 
 </script>
 
 
 
 
 
 <script>
 function listNearRestaurant()
 {
        $("#page-content-gird-open").hide(); 
        $("#page-content-gird-discount").hide();
        $("#page-content-gird-old").hide(); 
        $("#page-content-gird-latests").hide();
        $("#page-content").hide();
        $("#page-content1").hide();
        $("#page-content1-list-latest").hide();
        $("#page-content1-list-old").hide();
        $("#page-content-gird-near").hide();
        $("#page-content1-open-restaurant").hide();
        $("#page-content1-near-by").show();
        $("#page-content1-discount").hide();
 }
 
 
 
 </script>
 
 
 <script>
 $(document).ready(function(){
    $(document).on('click','.show_more',function(){
        var ID = $(this).attr('id');
        $('.show_more').hide();
        $('.loding').show();
        $.ajax({
            type:'POST',
            url:'ajax_more.php',
            data:'id='+ID,
            success:function(html){
                $('#show_more_main'+ID).remove();
                $('.tutorial_list').append(html);
            }
        }); 
    });
});    
 </script>      

            