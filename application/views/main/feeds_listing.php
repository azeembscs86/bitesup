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
                <li class="active">Feeds</li>
<!--                <li><a href="main/users">Users</a></li>-->
                <li><a href="<?php echo base_url(); ?>main/requests">Requests</a></li>
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
                    <div class="col-md-12" style="padding: 60px;">
                        <div class="col-md-6">
                            <h1 class="page-title">Feeds</h1>
                        </div>
                        <div class="col-md-6" style="margin-top: 10px;">
                            <div class="form-group">
                                <a href="<?= base_url(); ?>feeds/add_feed" type="submit" class="btn btn-default pull-right" id="submit" >Check In&nbsp;<i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </header>

                <?php
                $iterator = 0;
                if(!empty($feeds)){
                foreach ($feeds as $row) {
                    ?>
                    <article class="blog-post">

                        <header>
                            
                            <?php
                            $imagename = "";
                            $url = @getimagesize($row->user_image_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/userimages/member-3.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $row->user_image_url;
                            }
                            ?>

                            <a href=""><h3 style="font-size: 18px;margin-bottom: 0px;"><img style="height: 65px;width: 65px;border-radius: 50px;margin-right: 10px;"  src="<?php echo $imagesname; ?>" alt=""><?php echo $row->first_name ?>&nbsp;<?php echo $row->last_name ?></h3></a></header>




                            <div class="owl-carousel testimonials" style="padding: 0px;">
                                <?php for ($j = 0; $j < sizeof($feed_images[$iterator]); $j++) { ?>
                                <div class="slide"><h4><img style="height: 400px;width: 900px;"  src="<?php echo $feed_images[$iterator][$j]->image_url; ?>" alt="">
                                        <div class="carousel-caption" style="padding-bottom: 0px;padding-top:0px;left: 0%;right:0%;opacity:0.6;padding-left: 25px;background-color: white;">
                                            <div class="col-sm-6"><img style="padding:8px;width: 78px;border-radius: 50px;float: left;"  src="<?php echo $imagesname; ?>" alt="">
                                            <h1 style="text-align: left;color: black;margin-top: 5px;"><?php echo $row->title; ?></h1><br>
                                            <h2 style="text-align: left;color: black;margin-top: -18px;margin-bottom: 10px;"><?php echo $row->title; ?></h2>
                                            </div>
                                                <div class="col-sm-6 pull-right">
                                                    <div class="box">
                                                        <div class="icon">
                                                            <div class="image"><i class="glyphicon glyphicon-bookmark"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
</h4>
                                </div>

                                <?php } $iterator++; ?>
                            </div>

                        <div class="margin">
                            <?php if(!empty($row->like)){
                                if($row->like == 1){
                           ?>
                            <button   type="button" class="btn-clean2 hit_like" id="1-<?php echo $row->id; ?>"   style="cursor: pointer;" value="<?php echo $row->like; ?>">
                                Like <i class="glyphicon glyphicon-heart"></i>
                            </button>
                            <?php }else{?>

                            <button type="button" class="btn-clean hit_like" id="1-<?php echo $row->id; ?>"   style="cursor: pointer;" value="<?php echo $row->like; ?>">
                                Like <i class="glyphicon glyphicon-heart"></i>
                            </button>
                            <?php }}else{?>
                            <button type="button" class="btn-clean hit_like" id="1-<?php echo $row->id; ?>"   style="cursor: pointer;" value="<?php echo $row->like; ?>">
                                Like <i class="glyphicon glyphicon-heart"></i>
                            </button>
                            <?php } ?>

                            <?php if(!empty($row->tried)){
                                if($row->tried == 2){
                            ?>
                            <button  name="tried_vale_is" type="button" class="btn-clean3 hit_tried" id="2-<?php echo $row->id; ?>"  style="cursor: pointer;" value="<?php echo $row->tried; ?>">
                                Tried <i class="glyphicon glyphicon-ok"></i>
                            </button>
                            <?php }else{?>
                                    <button  name="tried_vale_is" type="button" class="btn-clean hit_tried" id="2-<?php echo $row->id; ?>"  style="cursor: pointer;" value="<?php echo $row->tried; ?>">
                                        Tried <i class="glyphicon glyphicon-ok"></i>
                                    </button>

                            <?php }}else{ ?>
                            <button  name="tried_vale_is" type="button" class="btn-clean hit_tried" id="2-<?php echo $row->id; ?>"  style="cursor: pointer;" value="<?php echo $row->tried; ?>">
                                Tried <i class="glyphicon glyphicon-ok"></i>
                            </button>
                        <?php }?>

                        <?php if(!empty($row->wish)){
                            if($row->wish == 3){
                        ?>
                        <button   type="button" class="btn-clean4 hit_wish" id="3-<?php echo $row->id; ?>"  style="cursor: pointer;" value="<?php echo $row->wish; ?>">
                                Wish <i class="glyphicon glyphicon-star"></i>
                        </button>
                            <?php }else{ ?>
                            <button   type="button" class="btn-clean hit_wish" id="3-<?php echo $row->id; ?>"  style="cursor: pointer;" value="<?php echo $row->wish; ?>">
                                Wish <i class="glyphicon glyphicon-star"></i>
                            </button>
                            <?php }}else{?>
                            <button   type="button" class="btn-clean hit_wish" id="3-<?php echo $row->id; ?>"  style="cursor: pointer;" value="<?php echo $row->wish; ?>">
                                Wish <i class="glyphicon glyphicon-star"></i>
                            </button>
                        <?php } ?>
                        </div>





                        <figure class="meta">
                           
                            <a href="#" class="link-icon"><i class="fa fa-calendar"></i><?php echo $row->datetime ?></a>

                                                        <div class="tags">
                                                            <a href="<?= base_url() ?>feeds/edit_feeds/<?php echo $row->id ?>" class="tag article">Edit</a>
                                                                    <a href="<?= base_url() ?>feeds/delete_feed/<?php echo $row->id ?>" class="tag article">Delete</a>
                                                        </div>
                        </figure>
                        <p><?php echo $row->desc ?>
                        </p>
                        <!--<a style="float: right;" href=" " class="icon">Edit Post</a>-->
                        <a href="<?= base_url() ?>feeds/feed_detail/<?php echo $row->id ?>" class="icon">Read More <i class="fa fa-angle-right"></i></a>
                    </article><!-- /.blog-post -->
                <?php } }?>



                <!--Pagination-->
                <nav>
                    <ul class="pagination pull-right">
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#" class="previous"><i class="fa fa-angle-left"></i></a></li>
                        <li><a href="#" class="next"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </nav>
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
<script>
    $(document).on('click','.hit_like',function(){
        var like_id = $(this).attr('id');
        var value_of_like =  $(this).attr('value');
        console.log(value_of_like);
        var like_ids = like_id.split("-");
        var feed_like = like_ids[0];
        var feed_id = like_ids[1];
        console.log(feed_id);
        $data = 'feed_id=' + feed_id+'&feed_like='+feed_like;
        $.ajax({
            type:'post',
            url:'<?php base_url()?>dashboard/user_like_feed',
            data:$data,
            dataType: 'json',
            success: function (data){
                console.log(data.like);
                if(data != null){
                    if(data.like == 0){
                        $('#1-'+feed_id).addClass('btn-clean');
                        $('#1-'+feed_id).removeClass('btn-clean2');
                    }else{
                        $('#1-'+feed_id).removeClass('btn-clean');
                        $('#1-'+feed_id).addClass('btn-clean2');
                    }
                }



            }

        });

    });



</script>
<script>
    $(document).on('click','.hit_tried',function(){
        var tried_id = $(this).attr('id');
        var tried_ids = tried_id.split("-");
        var feed_tried = tried_ids[0];
        var feed_id = tried_ids[1];
        console.log(feed_id);
        $data = 'feed_id=' + feed_id+'&feed_tried='+feed_tried;
        $.ajax({
            type:'post',
            url:'<?php base_url()?>dashboard/user_like_feed',
            data:$data,
            dataType: 'json',
            success: function (data){
                console.log(data);
                if(data != null){
                    if(data.tried == 0){
                        $('#2-'+feed_id).addClass('btn-clean');
                        $('#2-'+feed_id).removeClass('btn-clean3');
                    }else{
                        $('#2-'+feed_id).removeClass('btn-clean');
                        $('#2-'+feed_id).addClass('btn-clean3');
                    }

                }


            }

        });

    });



</script>
<script>
    $(document).on('click','.hit_wish',function(){
        var wish_id = $(this).attr('id');
        var wish_ids = wish_id.split("-");
        var feed_wish = wish_ids[0];
        var feed_id = wish_ids[1];
        console.log(feed_id);
        $data = 'feed_id=' + feed_id+'&feed_wish='+feed_wish;
        $.ajax({
            type:'post',
            url:'<?php base_url()?>dashboard/user_like_feed',
            data:$data,
            dataType: 'json',
            success: function (data){
                console.log(data);
                if(data != null){
                    if(data.wish == 0){
                        $('#3-'+feed_id).addClass('btn-clean');
                        $('#3-'+feed_id).removeClass('btn-clean4');
                    }else{
                        $('#3-'+feed_id).removeClass('btn-clean');
                        $('#3-'+feed_id).addClass('btn-clean4');
                    }
                }

            }

        });

    });



</script>
