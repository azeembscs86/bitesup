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
                <li><a href="<?php echo base_url(); ?>main/requests">Requests</a></li>
                <li><a href="<?php echo base_url(); ?>restaurant/index">Restaurants</a></li>
                <li><a href="#">Managing</a></li>
              
          <?php if(isset($user_id)){?> 
          
                <li><a href="<?php echo base_url(); ?>main/user_friend_list/<?php echo $user_id; ?>">My Buddies</a></li>  
          <?php
          }
          ?>
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
                        <!--Item Detail Content-->
                        <div class="col-md-9">
                            <section class="block" id="main-content">
                                <header class="page-title">
                                    <div class="title">
                                        <h1><?php echo ucwords($user_data_detail->first_name) ?>&nbsp;<?php echo ucwords($user_data_detail->last_name); ?></h1>
                                        <figure>63 Birch Street</figure>
                                    </div>
                                    <div class="info">
                                        <div class="type">
                                            <i><img src="<?php echo base_url(); ?>assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                            <span><?php  echo $user_data_detail->username;?></span>
                                        </div>
                                    </div>
                                </header>
                                <div class="row">
                                    <!--Detail Sidebar-->
                                    <aside class="col-md-4 col-sm-4" id="detail-sidebar">
                                        <!--Contact-->
                                        <section>
                                            
                                            <h3><a class="active" onclick="return restaurant_user_review();">Reviews (<?php echo $user_comments->total_comments; ?>)</a></h3>
                                            <h3><a onclick="return restaurant_user_bookmark();">Bookmarks (<?php echo $user_fav_restaurant->total_favourites; ?>)</a></h3>
                                            <h3><a onclick="return restaurant_user_visits();">Profile visits (<?php echo $user_profile_visit->total_visits; ?>)</a></h3>
                                            <h3><a onclick="return restaurant_user_share();">Profile Share (<?php echo $user_profile_share->profile_shares; ?>)</a></h3>
                                            <h3><a onclick="return restaurant_user_feeds();">Feeds (<?php echo $user_feeds->total; ?>)</a></h3>
                                            <h3><a onclick="return restaurant_user_followers();">Followers (<?php echo $user_followers->total_followers; ?>)</a></h3>
                                            <h3><a onclick="return restaurant_user_followings();">Followings (<?php echo $user_followings->total_followings; ?>)</a></h3>
                                           
                                            
                                            
                                        </section>
                                       
                                       
                                    </aside>
                                    <!--end Detail Sidebar-->
                                    <!--Content-->
                                    <div class="col-md-8 col-sm-8">
                                        <section>
                                            <article class="item-gallery">
                                                <div class="owl-carousel item-slider">
                                                    <div class="slide"><img src="<?php echo base_url(); ?>assets/img/items/1.jpg" data-hash="1" alt=""></div>
                                                    <div class="slide"><img src="<?php echo base_url(); ?>assets/img/items/2.jpg" data-hash="2" alt=""></div>
                                                    <div class="slide"><img src="<?php echo base_url(); ?>assets/img/items/3.jpg" data-hash="3" alt=""></div>
                                                    <div class="slide"><img src="<?php echo base_url(); ?>assets/img/items/4.jpg" data-hash="4" alt=""></div>
                                                    <div class="slide"><img src="<?php echo base_url(); ?>assets/img/items/5.jpg" data-hash="5" alt=""></div>
                                                    <div class="slide"><img src="<?php echo base_url(); ?>assets/img/items/6.jpg" data-hash="6" alt=""></div>
                                                    <div class="slide"><img src="<?php echo base_url(); ?>assets/img/items/7.jpg" data-hash="7" alt=""></div>
                                                </div>
                                                <!-- /.item-slider -->
                                                <div class="thumbnails">
                                                    <span class="expand-content btn framed icon" data-expand="#gallery-thumbnails" >More<i class="fa fa-plus"></i></span>
                                                    <div class="expandable-content height collapsed show-70" id="gallery-thumbnails">
                                                        <div class="content">
                                                            <a href="#1" id="thumbnail-1" class="active"><img src="<?php echo base_url(); ?>assets/img/items/1.jpg" alt=""></a>
                                                            <a href="#2" id="thumbnail-2"><img src="<?php echo base_url(); ?>assets/img/items/2.jpg" alt=""></a>
                                                            <a href="#3" id="thumbnail-3"><img src="<?php echo base_url(); ?>assets/img/items/3.jpg" alt=""></a>
                                                            <a href="#4" id="thumbnail-4"><img src="<?php echo base_url(); ?>assets/img/items/4.jpg" alt=""></a>
                                                            <a href="#5" id="thumbnail-5"><img src="<?php echo base_url(); ?>assets/img/items/5.jpg" alt=""></a>
                                                            <a href="#6" id="thumbnail-6"><img src="<?php echo base_url(); ?>assets/img/items/6.jpg" alt=""></a>
                                                            <a href="#7" id="thumbnail-7"><img src="<?php echo base_url(); ?>assets/img/items/7.jpg" alt=""></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <!-- /.item-gallery -->
                                            <div class="block" id="user_comments">
                                                <header><h2>Comments</h2></header>
                                                <section class="reviews">
                                                
                                            <?php if(!empty($restaurant_review)){ ?>  
                                                <?php foreach($restaurant_review as $review){ ?>
                                                <article class="review">
                                                    <figure class="author">
                                                        <?php
                                                        $doc= $review->coments_date;
                                                        $date = date('d-M-Y h:i A', strtotime($doc));
                                                        ?>
                                                        <div class="date" style="width: 130px; margin-top: 2px;"><?php echo $date; ?></div>
                                                    </figure>
                                                    <!-- /.author-->
                                                    <div class="wrapper">
                                                        <figure class="rating big color" data-rating="<?php if(!empty($review->user_rating)){ echo $review->user_rating; } ?>"></figure>
                                                        
                                                        <p style="margin-top:17px;"><?php echo $review->rec_comments; ?></p>    
                                                    </div>
                                                    <!-- /.wrapper-->
                                                </article>
                                                <?php }//End foreach ?>
                                            <?php } else { //start Else condition ?>
                                                <p>No Comment  Found</p>
                                            <?php } //end else and if condition ?>
                                                
                                                                                               
                                            </section>
                                            </div>
                                            
                                            
                                            
                                            <div class="block" id="book_mark_restaurant" style="display:none;">
                                                <header><h2>Bookmarks</h2></header>
                                    
                 
    
                                        
                                        <?php 
                                    if(!empty($restaurant_bookmars))
                                    {
                                      foreach($restaurant_bookmars as $row)  
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
                                                <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $row->restaurant_id ?>"><strong><?php echo substr($row->restaurant_name,0,15); ?></strong></a>
                                               
                                                
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
                                            
                                            
                                            
                                            <div class="block" id="restaurant_user_visits" style="display:none;">
                                                <header><h2>Restaurant Visits</h2></header>
                                                <?php 
                                    if(!empty($restaurant_profile_visit))
                                    {
                                      foreach($restaurant_profile_visit as $row)  
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
                                                <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $row->restaurant_id ?>"><strong><?php echo substr($row->restaurant_name,0,15); ?></strong></a>
                                               
                                                
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
                                            
                                            
                                            
                                            <div class="block" id="restaurant_user_share" style="display:none;">
                                                <header><h2>Restaurant Shared</h2></header>
                                                <?php 
                                    if(!empty($restaurant_profile_share))
                                    {
                                      foreach($restaurant_profile_share as $row)  
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
                                                <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $row->restaurant_id ?>"><strong><?php echo substr($row->restaurant_name,0,15); ?></strong></a>
                                               
                                                
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
                                            
                                            
                                            <div class="block" id="restaurant_user_feeds" style="display:none;">
                                                <header><h2>Feeds</h2></header>
                                                <p>
                                                    Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam.
                                                    Donec neque massa, viverra interdum eros ut, imperdiet pellentesque mauris.
                                                    Proin sit amet scelerisque risus. Donec semper semper erat ut mollis.
                                                    Curabitur suscipit, justo eu dignissim lacinia, ante sapien pharetra duin
                                                    consectetur eros augue sed ex. Donec a odio rutrum, hendrerit sapien vitae,
                                                    euismod arcu. Suspendisse potenti. Integer ut diam venenatis, pellentesque
                                                    felis eget, elementum enim. Suspendisse sit amet massa commodo nulla iaculis
                                                    fermentum. Integer eget tincidunt est, in imperdiet risus.
                                                    Morbi sit amet urna purus.
                                                </p>
                                            </div>
                                            
                                            
                                            <div class="block" id="restaurant_user_followers" style="display:none;">
                                                <header><h2>Followers</h2></header>
                                                <p>
                                                    Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam.
                                                    Donec neque massa, viverra interdum eros ut, imperdiet pellentesque mauris.
                                                    Proin sit amet scelerisque risus. Donec semper semper erat ut mollis.
                                                    Curabitur suscipit, justo eu dignissim lacinia, ante sapien pharetra duin
                                                    consectetur eros augue sed ex. Donec a odio rutrum, hendrerit sapien vitae,
                                                    euismod arcu. Suspendisse potenti. Integer ut diam venenatis, pellentesque
                                                    felis eget, elementum enim. Suspendisse sit amet massa commodo nulla iaculis
                                                    fermentum. Integer eget tincidunt est, in imperdiet risus.
                                                    Morbi sit amet urna purus.
                                                </p>
                                            </div>
                                            
                                            
                                            
                                            <div class="block" id="restaurant_user_followings" style="display:none;">
                                                <header><h2>Followings</h2></header>
                                                <p>
                                                    Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam.
                                                    Donec neque massa, viverra interdum eros ut, imperdiet pellentesque mauris.
                                                    Proin sit amet scelerisque risus. Donec semper semper erat ut mollis.
                                                    Curabitur suscipit, justo eu dignissim lacinia, ante sapien pharetra duin
                                                    consectetur eros augue sed ex. Donec a odio rutrum, hendrerit sapien vitae,
                                                    euismod arcu. Suspendisse potenti. Integer ut diam venenatis, pellentesque
                                                    felis eget, elementum enim. Suspendisse sit amet massa commodo nulla iaculis
                                                    fermentum. Integer eget tincidunt est, in imperdiet risus.
                                                    Morbi sit amet urna purus.
                                                </p>
                                            </div>
                                           
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
                        
                        <!-- /.col-md-3-->
                        <!--end Sidebar-->
                    </div><!-- /.row-->
                </section>
    <!-- /.container-->
</div>
<!-- end Page Content-->
<script src="<?= base_url() ?>assets/js/jquery.js"></script>

<script>

function restaurant_user_review()
{
    $("#user_comments").show();
    $("#book_mark_restaurant").hide();
    $("#restaurant_user_followings").hide();
    $("#restaurant_user_visits").hide();
    $("#restaurant_user_followers").hide();
    $("#restaurant_user_feeds").hide();
}


function restaurant_user_bookmark()
{
    $("#book_mark_restaurant").show();
    $("#user_comments").hide();
    $("#restaurant_user_followings").hide();
    $("#restaurant_user_visits").hide();
    $("#restaurant_user_followers").hide();
    $("#restaurant_user_share").hide();
    $("#restaurant_user_share").hide();
    $("#restaurant_user_feeds").hide();
}

function restaurant_user_visits()
{
    $("#book_mark_restaurant").hide();
    $("#user_comments").hide();
    $("#restaurant_user_followings").hide();
    $("#restaurant_user_visits").show();
    $("#restaurant_user_followers").hide();
    $("#restaurant_user_share").hide();
    $("#restaurant_user_feeds").hide();
}


function restaurant_user_share()
{
    $("#book_mark_restaurant").hide();
    $("#user_comments").hide();
    $("#restaurant_user_followings").hide();
    $("#restaurant_user_visits").hide();
    $("#restaurant_user_followers").hide();
    $("#restaurant_user_share").show();
    $("#restaurant_user_feeds").hide();
}


function restaurant_user_feeds()
{
    $("#book_mark_restaurant").hide();
    $("#user_comments").hide();
    $("#restaurant_user_followings").hide();
    $("#restaurant_user_visits").hide();
    $("#restaurant_user_followers").hide();
    $("#restaurant_user_share").hide();
    $("#restaurant_user_feeds").show();
}


function restaurant_user_followers()
{
    $("#book_mark_restaurant").hide();
    $("#user_comments").hide();
    $("#restaurant_user_followings").hide();
    $("#restaurant_user_visits").hide();
    $("#restaurant_user_followers").show();
    $("#restaurant_user_share").hide();
    $("#restaurant_user_feeds").hide();
}

function restaurant_user_followings()
{
    $("#book_mark_restaurant").hide();
    $("#restaurant_user_followings").show();
    $("#user_comments").hide();
    $("#restaurant_user_visits").hide();
    $("#restaurant_user_followers").hide();
    $("#restaurant_user_share").hide();
    $("#restaurant_user_feeds").hide();
}
</script>
<script type="text/javascript" >
    $(function () {
        $(".follow").click(function () {
            var reference = this;
            var friend_id = $(this).val();
//            console.log(friend_id);
            var dataString = 'friend_id=' + friend_id;

            $.ajax({
                dataType: "json",
                type: "POST",
                url: "<?php echo base_url() ?>main/follow",
                cache: false,
                data: dataString,
                success: function (response) {
//                    console.log(response);
                    if (response != '') {
                        $(reference).html('Following');
                        $(reference).css('background-color', '#66BD2B');
                        $(reference).removeClass('follow').addClass('add').off('click');
                        $('.follower').hide();
                        var follower = '<div id="award_record">' +
                                '<a class="col-md-4 col-xs-4 well">' + response + ' Follower </a>' +
                                '</div>' ;
                        $("#new_follower").append(follower);

                    }
                    if (response == '') {
                        $(reference).html('Requested');
                        $(reference).css('background-color', 'silver');
                        $(reference).removeClass('follow').addClass('add').off('click');

                    }
                }
            });
        });
        $(".add").click(function () {
            var hello = $(this).val();
            console.log(hello);

        });
    });
</script>