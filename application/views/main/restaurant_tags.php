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
                            <li class="active">Restaurant by Tags</li>
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
                <section id="featured" class="block equal-height">
        <div class="container">

            <div class="row">
                <div class="col-lg-8">
                    <header><h2 style="margin-bottom: 95px;margin-left: 15px;">Restaurants By Category</h2></header>
                   <figure class="filter clearfix">
                                <div class="buttons pull-left">
                                  <a href="<?php echo base_url() ?>main/restaurant_selected_tags/<?php echo $category_id; ?>" class="btn icon  active"><i class="fa fa-th"></i>Grid</a>
                                    <a href="<?php echo base_url() ?>main/list_restaurant_selected_tags/<?php echo $category_id; ?>" class="btn icon"><i class="fa fa-th-list"></i>List</a>
                                </div>
                                
                            </figure>
                    
                   <?php
if(!empty($restaurant)) {
            foreach ($restaurant as $content) {?>
<?php
                            $imagename = "";
                            $url = @getimagesize($content->logo_url);
                            if (@!is_array($url)) {
                                $imagesname = base_url()."uploads/restaurantimages/blue-chilli.jpg"; // The image doesn't exist
                            } else {
                                $imagesname = $content->logo_url;
                            }
                            ?>
                 <div class="col-md-4 col-sm-4">
                                        <div class="item">
                                            <div class="image">
                                                <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $content->restaurant_id ?>">
                                                        <div class="overlay">
                                                            <div class="inner">
                                                                <div class="content">
                                                                    <h4>Description</h4>
                                                                    <p><?php echo $content->description; ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <img src="<?php echo $imagesname; ?>" alt="" width="263" height="196">
                                                    </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="<?=base_url() ?>restaurant/restaurant_detail/<?php echo $content->restaurant_id ?>"><h4><?php echo substr($content->restaurant_name,0,10); ?></h4></a>
                                                <figure><?php echo $content->city_name.",".$content->country_name; ?></figure>
                                                
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>         
     <?php
            }                     
}else 
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
                                $imagesname = "http://www.bitesup.com/masterbites/uploads/restaurantimages/2ibkt.jpg"; // The image doesn't exist
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
                                    <li><a href="<?php echo base_url(); ?>main/category_restaurant/<?php echo $category->tag_id;  ?>"><?= $category->tag_name; ?></a></li>
    <?php }
} ?>
                                    </ul>
                                </section>
                                <section>
                                    
                                    
                                    <!-- /.form-group -->
                                </section>
                            </aside>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
        <div class="background opacity-5">
            <img src="<?=base_url()?>assets/img/restaurants-bg2.jpg" alt="">
        </div>
    </section>
            </div>
             
             
             
             
             
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script>
    $(document).ready(function() {
var total_record = 1;
var total_groups = <?php echo $total_data; ?>;  
$('#results').load("<?php echo base_url() ?>main/load_more_tag_restaurant", {'group_no':total_record}, function() {total_record++;});
$(window).scroll(function() {       
    if($(window).scrollTop() + $(window).height() == $(document).height())  
    {           
        if(total_record <= total_groups)
        {
            loading = true; 
            $('.loader_image').show(); 
            $.post('<?php echo site_url() ?>main/load_more_tag_restaurant',{'group_no': total_record},
            function(data){ 
                if (data != "") {                               
                    $("#results").append(data);  
                    $('.loader_image').hide();                  
                    total_record++;
                }
            });     
        }
    }
});
});
</script>    
