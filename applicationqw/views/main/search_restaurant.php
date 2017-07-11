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
    <div id="page-content">
    <section id="listing" class="block">
                    <div class="container">
                        <div class="row">
                            
                            <header id="header-gird-main">
                                <h1 class="page-title">Search Result</h1>
                            </header>
                            <header id="header-gird-open" style="display:none;">
                                <h1 class="page-title">Open Restaurant Listing</h1>
                            </header>
                            <header id="header-gird-near" style="display:none;">
                                <h1 class="page-title">Near Restaurant</h1>
                            </header>
                            <header id="header-gird-discount" style="display:none;">
                                <h1 class="page-title">Discount Restaurant</h1>
                            </header>
                            <header id="header-gird-latest" style="display:none;">
                                <h1 class="page-title">latest Restaurant</h1>
                            </header>
                            <header id="header-gird-Oldest" style="display:none;">
                                <h1 class="page-title">Search Result</h1>
                            </header>
                            <header id="header-list-main" style="display:none;">
                                <h1 class="page-title">Search Result Listing</h1>
                            </header>
                            <header id="header-list-open" style="display:none;">
                                <h1 class="page-title">Open Restaurant Listing</h1>
                            </header>
                            <header id="header-list-near" style="display:none;">
                                <h1 class="page-title">Near Restaurant Listing</h1>
                            </header>
                            
                            <header id="header-list-discount" style="display:none;">
                                <h1 class="page-title">Discount Restaurant Listing</h1>
                            </header>
                            
                            <header id="header-list-latest" style="display:none;">
                                <h1 class="page-title">Latest Restaurant Listing</h1>
                            </header>
                            
                            <header id="header-list-oldest" style="display:none;">
                                <h1 class="page-title">Oldest Restaurant Listing</h1>
                            </header>
                            
                            <div class="filter clearfix" id="gird-list-view">
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
                            </div>
                            
                            <div class="filter clearfix" id="list-display-view" style="display:none">
                                <div class="buttons pull-left">
                                    <a href="#" class="btn icon" onclick="return girdsection()"><i class="fa fa-th"></i>Grid</a>
                                    <a href="#" class="btn icon active" onclick="return listsection()"><i class="fa fa-th-list"></i>List</a>
                                </div>
                                <div class="buttons pull-left" style="margin-left: 200px;">
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
                            </div>
                            <div style="margin-top:60px;"></div>        
                            
                            
                            <div class="col-md-9 col-sm-9" id="gird-main-view">
                                <section class="equal-height">
                                    <div class="row">
                                        
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
                                                            <i><img src="<?=base_url() ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                            <span>Rating</span>
                                                        </div>
                                                      <?php 
                                             if($row->average_vote >4)
                                             {
                                            ?>
                                            <div class="rating" data-rating="5"></div>
                                            <?php 
                                             } else if($row->average_vote >=4 and $row->average_vote <5) {
                                             ?>    
                                             <div class="rating" data-rating="4"></div>
                                            <?php
                                             }else if($row->average_vote >=3 and $row->average_vote <4)
                                             {
                                            ?>     
                                            <div class="rating" data-rating="3"></div>
                                            <?php
                                             }else if($row->average_vote >=2 and $row->average_vote <3)
                                             {
                                           ?>      
                                             <div class="rating" data-rating="2"></div>
                                            <?php
                                             }else if($row->average_vote >=1 and $row->average_vote <2)
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
                                
                                </section>
                              

                            </div>
                           
                            <!------------- gird open restaurant--------------------->             
                            <div class="col-md-9 col-sm-9" id="gird-open-view" style="display:none">
                                <section class="equal-height">
                                    <div class="row">
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
                                                            <i><img src="<?=base_url() ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                            <span>Rating</span>
                                                        </div>
                                                      <?php 
                                             if($row->average_vote >4)
                                             {
                                            ?>
                                            <div class="rating" data-rating="5"></div>
                                            <?php 
                                             } else if($row->average_vote >=4 and $row->average_vote <5) {
                                             ?>    
                                             <div class="rating" data-rating="4"></div>
                                            <?php
                                             }else if($row->average_vote >=3 and $row->average_vote <4)
                                             {
                                            ?>     
                                            <div class="rating" data-rating="3"></div>
                                            <?php
                                             }else if($row->average_vote >=2 and $row->average_vote <3)
                                             {
                                           ?>      
                                             <div class="rating" data-rating="2"></div>
                                            <?php
                                             }else if($row->average_vote >=1 and $row->average_vote <2)
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
                                
                                </section>
                              

                            </div>            
                            
                      <!-------------------------- gird near by restaurant---------------------------->      
                     
                    <div class="col-md-9 col-sm-9" id="gird-near-view" style="display:none">
                                <section class="equal-height">
                                    <div class="row">
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
                                                <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $row->restaurant_id ?>"><h3><?php echo $row->restaurant_name; ?></h3></a>
                                                <figure><?php echo $row->city_name.",".$row->country_name; ?></figure>
                                                <div class="info">
                                                    <div class="type">
                                                            <i><img src="<?=base_url() ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                            <span>Rating</span>
                                                        </div>
                                                      <?php 
                                             if($row->average_vote >4)
                                             {
                                            ?>
                                            <div class="rating" data-rating="5"></div>
                                            <?php 
                                             } else if($row->average_vote >=4 and $row->average_vote <5) {
                                             ?>    
                                             <div class="rating" data-rating="4"></div>
                                            <?php
                                             }else if($row->average_vote >=3 and $row->average_vote <4)
                                             {
                                            ?>     
                                            <div class="rating" data-rating="3"></div>
                                            <?php
                                             }else if($row->average_vote >=2 and $row->average_vote <3)
                                             {
                                           ?>      
                                             <div class="rating" data-rating="2"></div>
                                            <?php
                                             }else if($row->average_vote >=1 and $row->average_vote <2)
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
                                
                                </section>
                              

                            </div>  
                      
                      <!-----------------------gird near by restaurant end-------------------------->
                      
                            
                      
                      <!-------------------------- gird discount by restaurant---------------------------->      
                     
                    <div class="col-md-9 col-sm-9" id="gird-discount-view" style="display:none">
                                <section class="equal-height">
                                    <div class="row">
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
                                                            <i><img src="<?=base_url() ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                            <span>Rating</span>
                                                        </div>
                                                      <?php 
                                             if($row->average_vote >4)
                                             {
                                            ?>
                                            <div class="rating" data-rating="5"></div>
                                            <?php 
                                             } else if($row->average_vote >=4 and $row->average_vote <5) {
                                             ?>    
                                             <div class="rating" data-rating="4"></div>
                                            <?php
                                             }else if($row->average_vote >=3 and $row->average_vote <4)
                                             {
                                            ?>     
                                            <div class="rating" data-rating="3"></div>
                                            <?php
                                             }else if($row->average_vote >=2 and $row->average_vote <3)
                                             {
                                           ?>      
                                             <div class="rating" data-rating="2"></div>
                                            <?php
                                             }else if($row->average_vote >=1 and $row->average_vote <2)
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
                                
                                </section>
                              

                            </div>  
                      
                      <!-----------------------gird discount by restaurant end-------------------------->
                      
                      
                      
                      <!-------------------------- gird latest by restaurant---------------------------->      
                     
                    <div class="col-md-9 col-sm-9" id="gird-latest-view" style="display:none">
                                <section class="equal-height">
                                    <div class="row">
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
                                                            <i><img src="<?=base_url() ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                            <span>Rating</span>
                                                        </div>
                                                      <?php 
                                             if($row->average_vote >4)
                                             {
                                            ?>
                                            <div class="rating" data-rating="5"></div>
                                            <?php 
                                             } else if($row->average_vote >=4 and $row->average_vote <5) {
                                             ?>    
                                             <div class="rating" data-rating="4"></div>
                                            <?php
                                             }else if($row->average_vote >=3 and $row->average_vote <4)
                                             {
                                            ?>     
                                            <div class="rating" data-rating="3"></div>
                                            <?php
                                             }else if($row->average_vote >=2 and $row->average_vote <3)
                                             {
                                           ?>      
                                             <div class="rating" data-rating="2"></div>
                                            <?php
                                             }else if($row->average_vote >=1 and $row->average_vote <2)
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
                                
                                </section>
                              

                            </div>  
                      
                      <!-----------------------gird latest restaurant end-------------------------->
                      
                      
                      
                      <!-------------------------- gird oldest by restaurant---------------------------->      
                     
                    <div class="col-md-9 col-sm-9" id="gird-oldest-view" style="display:none">
                                <section class="equal-height">
                                    <div class="row">
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
                                                            <i><img src="<?=base_url() ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                            <span>Rating</span>
                                                        </div>
                                                      <?php 
                                             if($row->average_vote >4)
                                             {
                                            ?>
                                            <div class="rating" data-rating="5"></div>
                                            <?php 
                                             } else if($row->average_vote >=4 and $row->average_vote <5) {
                                             ?>    
                                             <div class="rating" data-rating="4"></div>
                                            <?php
                                             }else if($row->average_vote >=3 and $row->average_vote <4)
                                             {
                                            ?>     
                                            <div class="rating" data-rating="3"></div>
                                            <?php
                                             }else if($row->average_vote >=2 and $row->average_vote <3)
                                             {
                                           ?>      
                                             <div class="rating" data-rating="2"></div>
                                            <?php
                                             }else if($row->average_vote >=1 and $row->average_vote <2)
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
                                
                                </section>
                              

                            </div>  
                      
                      <!-----------------------gird oldest restaurant end-------------------------->
                      
                      
                      
                            
                            <div  class="col-md-9 col-sm-9" id="list-main-view" style="display:none;">
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
                                                            <i><img src="<?=base_url() ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                            <span>Rating</span>
                                                        </div>
                                                      <?php 
                                             if($row->average_vote >4)
                                             {
                                            ?>
                                            <div class="rating" data-rating="5"></div>
                                            <?php 
                                             } else if($row->average_vote >=4 and $row->average_vote <5) {
                                             ?>    
                                             <div class="rating" data-rating="4"></div>
                                            <?php
                                             }else if($row->average_vote >=3 and $row->average_vote <4)
                                             {
                                            ?>     
                                            <div class="rating" data-rating="3"></div>
                                            <?php
                                             }else if($row->average_vote >=2 and $row->average_vote <3)
                                             {
                                           ?>      
                                             <div class="rating" data-rating="2"></div>
                                            <?php
                                             }else if($row->average_vote >=1 and $row->average_vote <2)
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
                                </div>
                               <?php
                                      }
                                    }
                                else {
                                    echo "<h2>"."Result Not Found"."</h2>";
                                }
                                ?>
                            </div>         
                            
     <!--------------------------list open Restaurant----------------------------------------->
        <div  class="col-md-9 col-sm-9" id="list-open-view" style="display:none;">
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
                                                            <i><img src="<?=base_url() ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                            <span>Rating</span>
                                                        </div>
                                                      <?php 
                                             if($row->average_vote >4)
                                             {
                                            ?>
                                            <div class="rating" data-rating="5"></div>
                                            <?php 
                                             } else if($row->average_vote >=4 and $row->average_vote <5) {
                                             ?>    
                                             <div class="rating" data-rating="4"></div>
                                            <?php
                                             }else if($row->average_vote >=3 and $row->average_vote <4)
                                             {
                                            ?>     
                                            <div class="rating" data-rating="3"></div>
                                            <?php
                                             }else if($row->average_vote >=2 and $row->average_vote <3)
                                             {
                                           ?>      
                                             <div class="rating" data-rating="2"></div>
                                            <?php
                                             }else if($row->average_vote >=1 and $row->average_vote <2)
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
                                </div>
                               <?php
                                      }
                                    }
                                else {
                                    echo "<h2>"."Result Not Found"."</h2>";
                                }
                                ?>
                            </div>
                            
     <!---------------------------list open restaurant close----------------------------------->                       
                            
     
     
     <!--------------------------list discount Restaurant----------------------------------------->
        <div  class="col-md-9 col-sm-9" id="list-discount-view" style="display:none;">
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
                                                            <i><img src="<?=base_url() ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                            <span>Rating</span>
                                                        </div>
                                                      <?php 
                                             if($row->average_vote >4)
                                             {
                                            ?>
                                            <div class="rating" data-rating="5"></div>
                                            <?php 
                                             } else if($row->average_vote >=4 and $row->average_vote <5) {
                                             ?>    
                                             <div class="rating" data-rating="4"></div>
                                            <?php
                                             }else if($row->average_vote >=3 and $row->average_vote <4)
                                             {
                                            ?>     
                                            <div class="rating" data-rating="3"></div>
                                            <?php
                                             }else if($row->average_vote >=2 and $row->average_vote <3)
                                             {
                                           ?>      
                                             <div class="rating" data-rating="2"></div>
                                            <?php
                                             }else if($row->average_vote >=1 and $row->average_vote <2)
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
                                </div>
                               <?php
                                      }
                                    }
                                else {
                                    echo "<h2>"."Result Not Found"."</h2>";
                                }
                                ?>
                            </div>
                            
     <!---------------------------list discount restaurant close----------------------------------->
      
     
     <!--------------------------list near Restaurant----------------------------------------->
        <div  class="col-md-9 col-sm-9" id="list-near-view" style="display:none;">
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
                                                            <i><img src="<?=base_url() ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                            <span>Rating</span>
                                                        </div>
                                                      <?php 
                                             if($row->average_vote >4)
                                             {
                                            ?>
                                            <div class="rating" data-rating="5"></div>
                                            <?php 
                                             } else if($row->average_vote >=4 and $row->average_vote <5) {
                                             ?>    
                                             <div class="rating" data-rating="4"></div>
                                            <?php
                                             }else if($row->average_vote >=3 and $row->average_vote <4)
                                             {
                                            ?>     
                                            <div class="rating" data-rating="3"></div>
                                            <?php
                                             }else if($row->average_vote >=2 and $row->average_vote <3)
                                             {
                                           ?>      
                                             <div class="rating" data-rating="2"></div>
                                            <?php
                                             }else if($row->average_vote >=1 and $row->average_vote <2)
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
                                </div>
                               <?php
                                      }
                                    }
                                else {
                                    echo "<h2>"."Result Not Found"."</h2>";
                                }
                                ?>
                            </div>
                            
     <!---------------------------list near restaurant close----------------------------------->
     
     
     
     <!--------------------------list latest Restaurant----------------------------------------->
        <div  class="col-md-9 col-sm-9" id="list-latest-view" style="display:none;">
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
                                                            <i><img src="<?=base_url() ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                            <span>Rating</span>
                                                        </div>
                                                      <?php 
                                             if($row->average_vote >4)
                                             {
                                            ?>
                                            <div class="rating" data-rating="5"></div>
                                            <?php 
                                             } else if($row->average_vote >=4 and $row->average_vote <5) {
                                             ?>    
                                             <div class="rating" data-rating="4"></div>
                                            <?php
                                             }else if($row->average_vote >=3 and $row->average_vote <4)
                                             {
                                            ?>     
                                            <div class="rating" data-rating="3"></div>
                                            <?php
                                             }else if($row->average_vote >=2 and $row->average_vote <3)
                                             {
                                           ?>      
                                             <div class="rating" data-rating="2"></div>
                                            <?php
                                             }else if($row->average_vote >=1 and $row->average_vote <2)
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
                                </div>
                               <?php
                                      }
                                    }
                                else {
                                    echo "<h2>"."Result Not Found"."</h2>";
                                }
                                ?>
                            </div>
                            
     <!---------------------------list latest restaurant close----------------------------------->
     
     
     
     <!--------------------------list oldest Restaurant----------------------------------------->
        <div  class="col-md-9 col-sm-9" id="list-oldest-view" style="display:none;">
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
                                                            <i><img src="<?=base_url() ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                            <span>Rating</span>
                                                        </div>
                                                      <?php 
                                             if($row->average_vote >4)
                                             {
                                            ?>
                                            <div class="rating" data-rating="5"></div>
                                            <?php 
                                             } else if($row->average_vote >=4 and $row->average_vote <5) {
                                             ?>    
                                             <div class="rating" data-rating="4"></div>
                                            <?php
                                             }else if($row->average_vote >=3 and $row->average_vote <4)
                                             {
                                            ?>     
                                            <div class="rating" data-rating="3"></div>
                                            <?php
                                             }else if($row->average_vote >=2 and $row->average_vote <3)
                                             {
                                           ?>      
                                             <div class="rating" data-rating="2"></div>
                                            <?php
                                             }else if($row->average_vote >=1 and $row->average_vote <2)
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
                                </div>
                               <?php
                                      }
                                    }
                                else {
                                    echo "<h2>"."Result Not Found"."</h2>";
                                }
                                ?>
                            </div>
                            
     <!---------------------------list oldest restaurant close----------------------------------->
     
                            <!-------side bar----------------->
                            <div class="col-md-3 col-sm-3">
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
                                                <?php 
                                             if($rest->average_vote >4)
                                             {
                                            ?>
                                            <div class="rating" data-rating="5"></div>
                                            <?php 
                                             } else if($rest->average_vote >=4 and $rest->average_vote <5) {
                                             ?>    
                                             <div class="rating" data-rating="4"></div>
                                            <?php
                                             }else if($rest->average_vote >=3 and $rest->average_vote <4)
                                             {
                                            ?>     
                                            <div class="rating" data-rating="3"></div>
                                            <?php
                                             }else if($rest->average_vote >=2 and $rest->average_vote <3)
                                             {
                                           ?>      
                                             <div class="rating" data-rating="2"></div>
                                            <?php
                                             }else if($rest->average_vote >=1 and $rest->average_vote <2)
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
                                       <?php }
                                    } ?>
                                    </section>
                                    
                                    
                                    <section>
                                    <header><h2>Bitesup Rockstars </h2></header>
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
                                    
                                    <a href="<" class="item-horizontal small">
                                        <h3><?php echo ucwords($user_row->first_name)."  ".ucwords($user_row->last_name); ?></h3>
                                        <figure><?php echo $user_row->country_name; ?></figure>
                                        <div class="wrapper">
                                            <div class="image"><img src="<?php echo $user_image; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                   
                                                </div>
                                                
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
                                    
                                </aside>
                                <!--/#sidebar-->
                            </div>
                            <!--/.col-md-3-->
                        </div>
                        <!--/.row-->
                    </div>
                    <!--/.block-->
                </section>
              
            </div>      




<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
var total_record = 0;
var total_groups = <?php echo $total_data; ?>;  
var location = <?php echo $restaurant_keyword; ?>; 
alert(location);
$('#gird-main-view').load("<?php echo base_url() ?>main/load_more_search_restaurant",
 {'group_no':total_record},{'location':location}, function() {total_record++;});
$(window).scroll(function() {       
    if($(window).scrollTop() + $(window).height() == $(document).height())  
    {           
        if(total_record <= total_groups)
        {
          loading = true; 
          $('.loader_image').show(); 
          $.post('<?php echo site_url() ?>main/load_more_search_restaurant',{'group_no': total_record},{'location': location}
            function(data){ 
                if (data != "") {                               
                    $("#gird-main-view").append(data);     
                    $('.loader_image').hide();                  
                    total_record++;
                }
            });     
        }
    }
});
});
</script>



<script>
    function girdsection()
    {
       $("#gird-list-view").show();
       $("#list-display-view").hide();
       $("#gird-main-view").show();
       $("#list-main-view").hide();
       $("#gird-open-view").hide();
       $("#gird-near-view").hide();
       $("#gird-discount-view").hide();
       $("#gird-latest-view").hide();
       $("#gird-oldest-view").hide();
       $("#list-open-view").hide();
       $("#list-discount-view").hide();
       $("#list-near-view").hide();
       $("#list-latest-view").hide();
       $("#list-oldest-view").hide();
       $("#header-gird-main").show();
       $("#header-gird-open").hide();
       $("#header-gird-near").hide();
       $("#header-gird-discount").hide();
       $("#header-gird-latest").hide();
       $("#header-gird-Oldest").hide();
       $("#header-list-main").hide();
       $("#header-list-open").hide();
       $("#header-list-near").hide();
       $("#header-list-discount").hide();
       $("#header-list-latest").hide();
       $("#header-list-oldest").hide();
       
    }
  </script>
      <script>
    function listsection()
    {
       $("#list-display-view").show();
       $("#list-main-view").show();
       $("#gird-list-view").hide();
       $("#gird-main-view").hide();
       $("#gird-open-view").hide();
       $("#gird-near-view").hide();
       $("#gird-discount-view").hide();
       $("#gird-latest-view").hide();
       $("#gird-oldest-view").hide();
       $("#list-open-view").hide();
       $("#list-discount-view").hide();
       $("#list-near-view").hide();
       $("#list-latest-view").hide();
       $("#list-oldest-view").hide();
       $("#header-gird-main").hide();
       $("#header-gird-open").hide();
       $("#header-gird-near").hide();
       $("#header-gird-discount").hide();
       $("#header-gird-latest").hide();
       $("#header-gird-Oldest").hide();
       $("#header-list-main").show();
       $("#header-list-open").hide();
       $("#header-list-near").hide();
       $("#header-list-discount").hide();
       $("#header-list-latest").hide();
       $("#header-list-oldest").hide();
    }
            
 </script>
 
 
 
 <script>
  function girdOpenRestaurant()
  {   
       $("#gird-list-view").show();
       $("#list-display-view").hide();
       $("#gird-main-view").hide();
       $("#list-main-view").hide();
       $("#gird-open-view").show();
       $("#gird-near-view").hide();
       $("#gird-discount-view").hide();
       $("#gird-latest-view").hide();
       $("#gird-oldest-view").hide();
       $("#list-open-view").hide();
       $("#list-discount-view").hide();
       $("#list-near-view").hide();
        $("#list-latest-view").hide();
       $("#list-oldest-view").hide();
       $("#header-gird-main").hide();
       $("#header-gird-open").show();
       $("#header-gird-near").hide();
       $("#header-gird-discount").hide();
       $("#header-gird-latest").hide();
       $("#header-gird-Oldest").hide();
       $("#header-list-main").hide();
       $("#header-list-open").hide();
       $("#header-list-near").hide();
       $("#header-list-discount").hide();
       $("#header-list-latest").hide();
       $("#header-list-oldest").hide();
  }
 </script>
 
 
 
 
 <script>
 function girdNearRestaurant()
 {
       $("#gird-list-view").show();
       $("#list-display-view").hide();
       $("#gird-main-view").hide();
       $("#list-main-view").hide();
       $("#gird-open-view").hide();
       $("#gird-near-view").show();
       $("#gird-discount-view").hide();
       $("#gird-latest-view").hide();
       $("#gird-oldest-view").hide();
       $("#list-open-view").hide();
       $("#list-discount-view").hide();
       $("#list-near-view").hide();
       $("#list-latest-view").hide();
       $("#list-oldest-view").hide();
       $("#header-gird-main").hide();
       $("#header-gird-open").hide();
       $("#header-gird-near").show();
       $("#header-gird-discount").hide();
       $("#header-gird-latest").hide();
       $("#header-gird-Oldest").hide();
       $("#header-list-main").hide();
       $("#header-list-open").hide();
       $("#header-list-near").hide();
       $("#header-list-discount").hide();
       $("#header-list-latest").hide();
       $("#header-list-oldest").hide();
 }
 
 
 
 </script>
 
 
 <script>
 function girdDiscountRestaurant()
 {
       $("#gird-list-view").show();
       $("#list-display-view").hide();
       $("#gird-main-view").hide();
       $("#list-main-view").hide();
       $("#gird-open-view").hide();
       $("#gird-near-view").hide();
       $("#gird-discount-view").show();
       $("#gird-latest-view").hide();
       $("#gird-oldest-view").hide();
       $("#list-open-view").hide();
       $("#list-discount-view").hide();
       $("#list-near-view").hide();
        $("#list-latest-view").hide();
       $("#list-oldest-view").hide();
       $("#header-gird-main").hide();
       $("#header-gird-open").hide();
       $("#header-gird-near").hide();
       $("#header-gird-discount").show();
       $("#header-gird-latest").hide();
       $("#header-gird-Oldest").hide();
       $("#header-list-main").hide();
       $("#header-list-open").hide();
       $("#header-list-near").hide();
       $("#header-list-discount").hide();
       $("#header-list-latest").hide();
       $("#header-list-oldest").hide();
 }
 
 
 
 </script>
 
 
 
 <script>
  function loadGirdRestaurant()
  {
      var restaurant_id=document.getElementById('restaurant_sort').value;
     if(restaurant_id==1)
     {
       $("#gird-list-view").show();
       $("#gird-latest-view").show();
       $("#list-display-view").hide();
       $("#gird-main-view").hide();
       $("#list-main-view").hide();
       $("#gird-open-view").hide();
       $("#gird-near-view").hide();
       $("#gird-discount-view").hide();
       $("#gird-oldest-view").hide();
       $("#list-open-view").hide();
       $("#list-discount-view").hide();
       $("#list-near-view").hide();
        $("#list-latest-view").hide();
       $("#list-oldest-view").hide();
       $("#header-gird-main").hide();
       $("#header-gird-open").hide();
       $("#header-gird-near").hide();
       $("#header-gird-discount").hide();
       $("#header-gird-latest").show();
       $("#header-gird-Oldest").hide();
       $("#header-list-main").hide();
       $("#header-list-open").hide();
       $("#header-list-near").hide();
       $("#header-list-discount").hide();
       $("#header-list-latest").hide();
       $("#header-list-oldest").hide();
     }else if(restaurant_id==2)
     { 
       $("#gird-list-view").show();
       $("#list-display-view").hide();
       $("#gird-main-view").hide();
       $("#list-main-view").hide();
       $("#gird-open-view").hide();
       $("#gird-near-view").hide();
       $("#gird-discount-view").hide();
       $("#gird-latest-view").hide();
       $("#gird-oldest-view").show();
       $("#list-open-view").hide();
       $("#list-discount-view").hide();
       $("#list-near-view").hide();
        $("#list-latest-view").hide();
       $("#list-oldest-view").hide();
       $("#header-gird-main").hide();
       $("#header-gird-open").hide();
       $("#header-gird-near").hide();
       $("#header-gird-discount").hide();
       $("#header-gird-latest").hide();
       $("#header-gird-Oldest").show();
       $("#header-list-main").hide();
       $("#header-list-open").hide();
       $("#header-list-near").hide();
       $("#header-list-discount").hide();
       $("#header-list-latest").hide();
       $("#header-list-oldest").hide();
     }else
     {
       $("#gird-list-view").show();
       $("#list-display-view").hide();
       $("#gird-main-view").show();
       $("#list-main-view").hide();
       $("#gird-open-view").hide();
       $("#gird-near-view").hide();
       $("#gird-discount-view").hide();
       $("#gird-latest-view").hide();
       $("#gird-oldest-view").hide();
       $("#list-open-view").hide();
       $("#list-discount-view").hide();
       $("#list-near-view").hide();
        $("#list-latest-view").hide();
       $("#list-oldest-view").hide();
       $("#header-gird-main").show();
       $("#header-gird-open").hide();
       $("#header-gird-near").hide();
       $("#header-gird-discount").hide();
       $("#header-gird-latest").hide();
       $("#header-gird-Oldest").hide();
       $("#header-list-main").hide();
       $("#header-list-open").hide();
       $("#header-list-near").hide();
       $("#header-list-discount").hide();
       $("#header-list-latest").hide();
       $("#header-list-oldest").hide();
     }
         
      
  }
 </script>
 
 <script>
 function listOpenRestaurant()
 {   
      $("#list-display-view").show();
      $("#list-open-view").show();
      $("#list-main-view").hide();
      $("#gird-list-view").hide();
      $("#gird-main-view").hide();
      $("#gird-open-view").hide();
      $("#gird-near-view").hide();
      $("#gird-discount-view").hide();
      $("#gird-latest-view").hide();
      $("#gird-oldest-view").hide();
      $("#list-discount-view").hide();
      $("#list-near-view").hide();
       $("#list-latest-view").hide();
       $("#list-oldest-view").hide();
       $("#header-gird-main").hide();
       $("#header-gird-open").hide();
       $("#header-gird-near").hide();
       $("#header-gird-discount").hide();
       $("#header-gird-latest").hide();
       $("#header-gird-Oldest").hide();
       $("#header-list-main").hide();
       $("#header-list-open").show();
       $("#header-list-near").hide();
       $("#header-list-discount").hide();
       $("#header-list-latest").hide();
       $("#header-list-oldest").hide();
 }
 </script>
 
 
 <script>
 function listDiscountRestaurant()
 {
      $("#list-display-view").show();
      $("#list-open-view").hide();
      $("#list-main-view").hide();
      $("#gird-list-view").hide();
      $("#gird-main-view").hide();
      $("#gird-open-view").hide();
      $("#gird-near-view").hide();
      $("#gird-discount-view").hide();
      $("#gird-latest-view").hide();
      $("#gird-oldest-view").hide();
      $("#list-discount-view").show();
      $("#list-near-view").hide();
       $("#list-latest-view").hide();
       $("#list-oldest-view").hide();
       $("#header-gird-main").hide();
       $("#header-gird-open").hide();
       $("#header-gird-near").hide();
       $("#header-gird-discount").hide();
       $("#header-gird-latest").hide();
       $("#header-gird-Oldest").hide();
       $("#header-list-main").hide();
       $("#header-list-open").hide();
       $("#header-list-near").hide();
       $("#header-list-discount").show();
       $("#header-list-latest").hide();
       $("#header-list-oldest").hide();
 }
 
 </script>
 
 
 
 <script>
 function listNearRestaurant()
 {
      $("#list-display-view").show();
      $("#list-near-view").show();
      $("#list-open-view").hide();
      $("#list-main-view").hide();
      $("#gird-list-view").hide();
      $("#gird-main-view").hide();
      $("#gird-open-view").hide();
      $("#gird-near-view").hide();
      $("#gird-discount-view").hide();
      $("#gird-latest-view").hide();
      $("#gird-oldest-view").hide();
      $("#list-discount-view").hide();
       $("#list-latest-view").hide();
       $("#list-oldest-view").hide();
       $("#header-gird-main").hide();
       $("#header-gird-open").hide();
       $("#header-gird-near").hide();
       $("#header-gird-discount").hide();
       $("#header-gird-latest").hide();
       $("#header-gird-Oldest").hide();
       $("#header-list-main").hide();
       $("#header-list-open").hide();
       $("#header-list-near").show();
       $("#header-list-discount").hide();
       $("#header-list-latest").hide();
       $("#header-list-oldest").hide();
 }
 
 </script>
 
 
 
 <script>
  function loadListRestaurant()
  {
      
      var restaurant_id=document.getElementById('list_sort').value;
     if(restaurant_id==1)
     {
         $("#list-display-view").show();
      $("#list-near-view").hide();
      $("#list-open-view").hide();
      $("#list-main-view").hide();
      $("#gird-list-view").hide();
      $("#gird-main-view").hide();
      $("#gird-open-view").hide();
      $("#gird-near-view").hide();
      $("#gird-discount-view").hide();
      $("#gird-latest-view").hide();
      $("#gird-oldest-view").hide();
      $("#list-discount-view").hide();
       $("#list-latest-view").show();
       $("#list-oldest-view").hide();
       $("#header-gird-main").hide();
       $("#header-gird-open").hide();
       $("#header-gird-near").hide();
       $("#header-gird-discount").hide();
       $("#header-gird-latest").hide();
       $("#header-gird-Oldest").hide();
       $("#header-list-main").hide();
       $("#header-list-open").hide();
       $("#header-list-near").hide();
       $("#header-list-discount").hide();
       $("#header-list-latest").show();
       $("#header-list-oldest").hide();
     }else if(restaurant_id==2)
     { 
        $("#list-display-view").show();
      $("#list-near-view").hide();
      $("#list-open-view").hide();
      $("#list-main-view").hide();
      $("#gird-list-view").hide();
      $("#gird-main-view").hide();
      $("#gird-open-view").hide();
      $("#gird-near-view").hide();
      $("#gird-discount-view").hide();
      $("#gird-latest-view").hide();
      $("#gird-oldest-view").hide();
      $("#list-discount-view").hide();
       $("#list-latest-view").hide();
       $("#list-oldest-view").show();
       $("#header-gird-main").hide();
       $("#header-gird-open").hide();
       $("#header-gird-near").hide();
       $("#header-gird-discount").hide();
       $("#header-gird-latest").hide();
       $("#header-gird-Oldest").hide();
       $("#header-list-main").hide();
       $("#header-list-open").hide();
       $("#header-list-near").hide();
       $("#header-list-discount").hide();
       $("#header-list-latest").hide();
       $("#header-list-oldest").show();
     }else
     {
       $("#list-display-view").show();
      $("#list-near-view").show();
      $("#list-open-view").hide();
      $("#list-main-view").hide();
      $("#gird-list-view").hide();
      $("#gird-main-view").hide();
      $("#gird-open-view").hide();
      $("#gird-near-view").hide();
      $("#gird-discount-view").hide();
      $("#gird-latest-view").hide();
      $("#gird-oldest-view").hide();
      $("#list-discount-view").hide();
       $("#list-latest-view").hide();
       $("#list-oldest-view").hide();
       $("#header-gird-main").hide();
       $("#header-gird-open").hide();
       $("#header-gird-near").hide();
       $("#header-gird-discount").hide();
       $("#header-gird-latest").hide();
       $("#header-gird-Oldest").hide();
       $("#header-list-main").show();
       $("#header-list-open").hide();
       $("#header-list-near").hide();
       $("#header-list-discount").hide();
       $("#header-list-latest").hide();
       $("#header-list-oldest").hide();
     }
        
        
        
  }
 </script>