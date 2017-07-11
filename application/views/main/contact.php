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
                            <li class="active">Contact</li>
                        </ol>
                        <!-- /.breadcrumb-->
                    </div>
                    <!-- /.container-->
                </div>
                <!-- /.breadcrumb-wrapper-->
            </section>
            <!--end Sub Header-->

            <!--Page Content-->
            <div id="page-content">
                <section id="map-simple" class="map-contact"></section>
                <section class="container">
                    <div class="row">
                        <!--Content-->
                        <div class="col-md-9">
                            <header>
                                <h1 class="page-title">Contact</h1>
                            </header>
                            <section>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <header class="no-border"><h3>Address</h3></header>
                                        <address>
                                            <div><strong>Resturant</strong></div>
                                            <div>63 Birch Street</div>
                                            <div>Granada Hills, CA 91344</div>
                                            <br>
                                            <figure>
                                                <div class="info">
                                                    <i class="fa fa-mobile"></i>
                                                    <span>818-832-5258</span>
                                                </div>
                                                <div class="info">
                                                    <i class="fa fa-phone"></i>
                                                    <span>+1 123 456 789</span>
                                                </div>
                                                <div class="info">
                                                    <i class="fa fa-globe"></i>
                                                    <a href="#">www.spotterlimited.com</a>
                                                </div>
                                            </figure>
                                        </address>
                                    </div>
                                    <!--/.col-md-4-->
                                    <div class="col-md-4 col-sm-4">
                                        <header class="no-border"><h3>Social Networks</h3></header>
                                        <a href="#" class="social-button"><i class="fa fa-twitter"></i>Twitter</a>
                                        <a href="#" class="social-button"><i class="fa fa-facebook"></i>Facebook</a>
                                        <a href="#" class="social-button"><i class="fa fa-pinterest"></i>Pinterest</a>
                                    </div>
                                    <!--/.col-md-4-->
                                    <div class="col-md-4 col-sm-4">
                                        <header class="no-border"><h3>About Us</h3></header>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tristique imperdiet
                                            nibh tincidunt fermentum. Nunc enim nibh, convallis et tincidunt in, vehicula a diam.
                                            Nullam in risus erat
                                        </p>
                                        <a href="about-us.html" class="read-more icon">Read More</a>
                                    </div>
                                    <!--/.col-md-4-->
                                </div>
                                <!--/.row-->
                            </section>
                            <hr>
                            <section>
                                <header class="no-border"><h3>Contact Form</h3></header>
                                <form id="contact-form" role="form" method="post" action="?" class="background-color-white">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="company-form-name">Name</label>
                                                <input type="text" class="form-control" id="company-form-name" name="company-form-name" required>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!--/.col-md-6-->
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="company-form-email">Email</label>
                                                <input type="email" class="form-control" id="company-form-email" name="company-form-email" required>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!--/.col-md-6-->
                                    </div>
                                    <div class="form-group">
                                        <label for="company-form-message">Message</label>
                                        <textarea class="form-control" id="company-form-message" name="company-form-message"  rows="3" required></textarea>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default icon">Send a Message<i class="fa fa-angle-right"></i></button>
                                    </div>
                                    <!-- /.form-group -->
                                </form>
                                <!--/#contact-form-->
                            </section>
                        </div>
                        <!--Sidebar-->
                    <div class="col-md-3" style="margin-top:45px;">
                            <aside id="sidebar">                   
                                <!-- Popular Restaurant start-->    
                               <?php if(!empty($popular_restaurant)){ ?>
                                <section>
                                    <header><h2>Popular Restaurant</h2></header>
                                    <?php foreach($popular_restaurant as $popular_res) { ?>
                                    <a href="<?= base_url() ?>restaurant/restaurant_detail/<?php echo $popular_res->restaurant_id; ?>" class="item-horizontal small">
                                        <h3><?php echo $popular_res->restaurant_name; ?></h3>
                                        <figure><?php echo $popular_res->city_name .", ". $popular_res->country_name; ?></figure>
                                        <div class="wrapper">
                                            <?php
                                                $imagename = "";
                                                $url = @getimagesize($popular_res->logo_url);
                                                if (@!is_array($url)) {
                                                    $imagesname = "http://www.bitesup.com/masterbites/uploads/restaurantimages/2ibkt.jpg"; // The image doesn't exist
                                                } else {
                                                    $imagesname = $popular_res->logo_url;
                                                }
                                            ?>
                                            <div class="image"><img src="<?php echo $imagesname; ?>" alt=""></div>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                    <span><?php echo $popular_res->cousine_name; ?></span>
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php }// end foreach ?>                           
                                </section>    
                               <?php } ?>
                    <!-- Popular Restaurant End-->
                                               

                    
                 <!-- Featured Reviews Start-->
                    <?php if(!empty($user_reviews)){ ?>
                            <section>
                                <header><h2>Featured Users</h2></header>
                                <?php foreach($user_reviews as $featured_rev ){ ?>
                            <?php
                            $user_image = "";
                            $url = @getimagesize($featured_rev->user_image);
                            if (@!is_array($url)) {
                                $user_image = base_url()."uploads/profile_images/member-3t.jpg"; // The image doesn't exist
                            } else {
                                $user_image = $featured_rev->user_image;
                            }
                            ?>
                                <a href="#" class="item-horizontal small">
                                    <h3><?php echo $featured_rev->first_name ." ". $featured_rev->last_name; ?></h3>
                                     <figure><?php echo $featured_rev->country_name; ?></figure>
                                    <div class="wrapper">
                                        <div class="image"><img src="<?php echo $user_image; ?>" alt=""></div>
                                        <div class="info">
                                            <div class="type">                                               
                                                <span><?php echo $featured_rev->user_comments; ?> Reviews</span>
                                            </div>
                                            <div class="rating" data-rating="4"></div>
                                            
                                        </div>
                                    </div>
                                </a>  
                                <?php } ?>
                            </section>
                    <?php } //end if ?>
                    <!-- Featured Reviews End-->
                    
                    <section>
                        <?php if(!empty($most_used_tags)){ ?>
                        <header><h2>Features Categories</h2></header>
                        <ul class="bullets">
                           <?php foreach($most_used_tags as $row) { ?>
                            <li><?php echo $row->tag_name; ?></li>                                                    
                           <?php }//end foreach ?>
                        </ul>
                        <?php }//End if condition ?>
                    </section>
                    
                </aside>
                <!-- /#sidebar-->
            </div>
            <!-- /.col-md-3-->
                        <!--end Sidebar-->
                    </div>
                </section>
            </div>
            <!-- end Page Content-->

