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
                <li><a href="<?php echo base_url(); ?>dashboard/profile">Profile</a></li>
                <li><a href="<?php echo base_url(); ?>feeds">Feeds</a></li>
<!--                <li><a href="main/users">Users</a></li>-->
                <li class="active">Requests</li>
                <li><a href="<?php echo base_url(); ?>restaurant/index">Restaurants</a></li>
<!--                <li><a href="#">Managing</a></li>-->
                <li><a href="<?php echo base_url(); ?>main/user_friend_list/<?php echo $user_id; ?>">My Buddies</a></li>  
                <li><a href="<?php echo base_url(); ?>login/logout">Logout</a></li>               
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
    <section class="container">
        <div class="row">
            <div class="col-md-9">
                <header>
                    <h1 class="page-title">Requests</h1>
                </header>

                <!--Company Members-->
                <section>
                    <header><h2></h2></header>
                    <div class="row">
                        <?php
                        if (!empty($requests_user)) {
                            foreach ($requests_user as $row) {
                                if ($session_id == $row->id) {
                                    
                                } else {
                                    ?>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="member">
                                            <?php if (!empty($row->user_image_url)) { ?>
                                                <img src="<?php echo $row->user_image_url ?>" alt="">
                                            <?php } else { ?>
                                                <img src="<?php echo base_url() ?>images/default.gif" alt="">
            <?php } ?>

                                            <h4><a href="<?= base_url() ?>main/user_detail/<?php echo $row->user_id ?>"><?php echo $row->first_name ?>&nbsp;<?php echo $row->last_name ?></a></h4>
                                            <hr>

                                            <div class="social">

                                                <button style="background-color: grey" value = "<?php echo $row->user_id ?>" id="accept" class = "btn btn-default btn-large accept ">Accept</button>
                                                <button style="background-color: grey" value = "<?php echo $row->user_id ?>" id="cancel" class = "btn btn-default btn-large cancel ">Cancel</button>

                                            </div>
                                        </div>
                                        <!--/.member-->
                                    </div>
                                    <!--/.col-md-4-->
                                    <?php
                                }
                            }
                        } else {                            echo '<h4>You Have No Request!</h4>';}
                        ?>
                    </div>
                    <!--/.row-->
                </section>
                <!--end Company Members-->

                <!--Pagination-->
<!--                <nav>
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
        </div>
    </section>
</div>
<!-- end Page Content-->
<script src="<?= base_url() ?>assets/js/jquery.js"></script>
<script type="text/javascript" >
    $(function () {
        $(".accept").click(function () {
            var reference = this;
            var friend_id = $(this).val();
//            console.log(friend_id);
            var dataString = 'friend_id=' + friend_id;

            $.ajax({
                dataType: "json",
                type: "POST",
                url: "<?php echo base_url() ?>main/accept_request",
                cache: false,
                data: dataString,
                success: function (response) {
                    console.log(response);
                    if (response != '') {
                        $(reference).html('Accepted');
                        $(reference).css('background-color', '#66BD2B');
                        $('#cancel').remove();

                    }
                    if (response == '') {
                        $(reference).html('Requested');
                        $(reference).css('background-color', 'silver');
                        $('#accept').remove();

                    }
                }
            });
        });
           $(".cancel").click(function () {
            var reference = this;
            var friend_id = $(this).val();
//            console.log(friend_id);
            var dataString = 'friend_id=' + friend_id;

            $.ajax({
                dataType: "json",
                type: "POST",
                url: "<?php echo base_url() ?>main/cancel_request",
                cache: false,
                data: dataString,
                success: function () {
//                    console.log(response);
                        $(reference).html('Canceled');
                        $(reference).css('background-color', 'silver');
                        $('#accept').remove();

                  
                 
                }
            });
        });
    });
</script>



